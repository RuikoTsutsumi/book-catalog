<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Http\Requests\BookRequest;

class ItemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 商品一覧
     */
    public function index()
    {
        // 商品一覧取得
        // $items = Item::all();
        $items = Item::paginate(20);
        $keyword = "";
        

        return view('item.index', compact('items','keyword'));
    }

    /**
     * 商品登録
     */

    //  $_SESSION["checkPointURL"] = $_SERVER['REQUEST_URI']; 

     public function addPage(Request $request)
     {
        return view('item.add');
     }

    public function add(BookRequest $request)
    {
        // POSTリクエストのとき
        // if ($request->isMethod('post')) {
            // バリデーション
            // $this->validate($request, [
            //     'title' => 'required|max:100',
            // ]);
            // base64_encodeで画像データを文字列化する・file_get_contentsでファイルを取得する
            $image = base64_encode(file_get_contents($request->image));
            // 商品登録
            Item::create([
                'user_id' => Auth::user()->id,
                'title' => $request->title,
                'image' => $image,
                'price' => $request->price,
                'category' => $request->category,
                'author' => $request->author,
                'detail' => $request->detail,
            ]);

            return redirect('/items');
        // }
              
    }


// 商品削除
    public function destroy($id)
    {
        // itemsテーブルから指定のIDのレコード1件を取得
        $item = Item::find($id);
        // レコードを削除
        $item->delete();
        // 削除したら一覧画面にリダイレクト
        return redirect('/items');
    }
  /**
     * 編集画面の表示
     */
    public function edit($id)
    {
        $item = Item::find($id);

        return view('item.edit',[
            "item"=>$item
        ]);
    }
     /**
     * 更新
     */
     public function update(Request $request)
     {
 
         $message = [
             'id.required' => '商品IDを入力してください',
             'title.required' => 'タイトルを入力してください',
             'price.required' => '価格を入力してください',
            //  'image.required' => 'ファイルを選択してください',          
             'category.required' => 'カテゴリーを入力してください',
             'author.required' => '著者名を入力してください',
             'detail.required' => '詳細を入力してください',
             'price.integer' => '価格は半角数字を入力してください',
         ];
 
         $validator = $request->validate([
             'id' => 'required',
             'title' => 'required',
            //  'image' => 'required',
             'category' => 'required',
             'author' => 'required',
             'detail' => 'required',
             'price' => 'required | integer',
         ], $message);
 
        //  if ($validator->fails()) {
        //      return redirect('/item/edit/'. $request->id)
        //      ->withErrors($validator)
        //      ->withInput();
        //  }
         $title = $request->title;
         $price = $request->price;
         $category = $request->category;
         $author = $request->author;
         $detail =$request->detail;
         $encodedBase64Str = null;
   
         if (isset($request->item_image)) {
             $file = file_get_contents($request->item_image);
             $encodedBase64Str = base64_encode($file);
             Item::where("id",$request->id)->update([
                 "user_id" => 1,
                 "title" => $title,
                 "price" => $price,
                 "category" => $category,
                 "author" => $author,
                 "detail" => $detail,
                 
                 "image" => $encodedBase64Str,
             ]);
         }else{
             Item::where("id",$request->id)->update([
                "title" => $title,
                "price" => $price,
                "category" => $category,
                "author" => $author,
                "detail" => $detail,
             ]);
         }
         return redirect("/items");  
     }
/**
 * 詳細画面
 */
    public function detail($id)
    {
    $item = Item::find($id);

        return view('item.detail',[
            "item"=>$item
        ]);
}
/* 
検索画面
 */
//    public function search()
//    {
//     return view('item.search');
//    }

/* 
検索画面
 */
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $query = Item::query();

        if(!empty($keyword)) {
            $query->where('title', 'LIKE', "%{$keyword}%")
                ->orWhere('author', 'LIKE', "%{$keyword}%");
        }

        $items = $query->paginate(20);

        return view('item.index', compact('items', 'keyword'));
    }

    public function bookmark_items()
    {
        $items = \Auth::user()->bookmark_items()->orderBy('created_at', 'desc')->paginate(10);


        $data = [
            'items' => $items,
        ];
        return view('item.bookmarks', $data);
    }
}
