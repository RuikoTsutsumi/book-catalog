<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    public function store($itemId) {
        $user = \Auth::user();
        if (!$user->is_bookmark($itemId)) {
            $user->bookmark_items()->attach($itemId);
        }
        return back();
    }
    public function destroy($itemId) {
        $user = \Auth::user();
        if ($user->is_bookmark($itemId)) {
            $user->bookmark_items()->detach($itemId);
        }
        return back();
    }

    public function bookmark_items()
    {
        $items = \Auth::user()->bookmark_items()->orderBy('created_at', 'desc')->paginate(10);
        // $data = [
        //     'items' => $items,
        // ];
        return view('items.bookmarks', $items);
    }


}
