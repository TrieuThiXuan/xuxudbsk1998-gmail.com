<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table border="0" cellpadding="0" cellspacing="0" width="100%"
       style="border-collapse:collapse;border:0;max-width:700px!important;background-color: #f5f5f5;font-family: Arial">
    <tbody id="body-main">
    <tr id="content" style="margin-bottom: 20px">
        <td style="text-align: center; padding-bottom: 20px;">
            <p>Địa chỉ email của bạn {{ $user->email }}đã tạo thành công tài khoản trên trang {{ config('app.url') }}</p>
            <p>Để kích hoạt tài khoản, vui lòng click vào nút "Kích hoạt" bên dưới</p>
            <form method="POST" action="{{ $url }}">
                @csrf
                <button class="btn btn-success" type="submit">Kích hoạt</button>
            </form>
        </td>
    </tr>
    </tbody>
</table>
</body>
</html>
