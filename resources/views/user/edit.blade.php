<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>edit</title>
</head>

<body>
    <form action="{{ url('user/update') }}" method="post">
        <table>
            <tr>
                {{ csrf_field() }}
                <input type="hidden" , name="id" value="{{ $books->id }}">
                <td>價格</td>
                <td><input type="text" name="price" value="{{ $books->price }}"></td>
            </tr>

            <tr>
                <td></td>
                <td><input type="submit" value="修改"></td>
            </tr>
        </table>
    </form>

</body>

</html>
