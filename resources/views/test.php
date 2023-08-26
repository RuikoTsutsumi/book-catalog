<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        .example3 table{
            width: 100%;
        }
        .example3 tr{
            font-size: 0;
        }
        .example3 td{
            display: inline-block; /* display: table-cell;から変更 */
            height: 80px; /* セルの高さ */
            width: 25%; /* 4つの場合、100%幅を4分割した25%とします */
            overflow: auto; /* 高さがあふれた場合に自動的にスクロールバーを表示 */
            box-sizing: border-box; /* borderがあると改行される事象を抑止 */
            font-size: 16px;
        }
        </style>
            
        <div class="example3">
            <table border="1">
                <tr>
                    <td>セル1-1</td>
                    <td>セル1-2</td>
                    <td>セル1-3</td>
                    <td>セル1-4セル1-4セル1-4セル1-4セル1-4セル1-4セル1-4セル1-4セル1-4セル1-4セル1-4セル1-4セル1-4セル1-4セル1-4セル1-4セル1-4セル1-4セル1-4セル1-4セル1-4セル1-4セル1-4セル1-4セル1-4セル1-4セル1-4セル1-4セル1-4セル1-4セル1-4セル1-4セル1-4</td>
                </tr>
                <tr>
                    <td>セル2-1</td>
                    <td>セル2-2<br>セル2-2<br>セル2-2<br>セル2-2<br>セル2-2<br>セル2-2<br>セル2-2<br>セル2-2<br>セル2-2<br>セル2-2<br>セル2-2<br>セル2-2<br>セル2-2<br>セル2-2</td>
                    <td>セル2-3</td>
                    <td>セル2-4</td>
                </tr>
            </table>
</body>
</html>