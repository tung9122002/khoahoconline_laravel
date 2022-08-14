<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gửi Email bằng STMP Gmail</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
    <h3>Xin chào {{$email['dathang']['name']}}</h3>
    <h5>Bạn đã đăng ký khóa học thành công</h5>
    <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Họ tên</th>
            <th scope="col">Địa chỉ</th>
            <th scope="col">Email</th>
            <th scope="col">Số điện thoại</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th>{{$emails['dathang']['name']}}</th>
            <td>{{$emails['dathang']['dia_chi']}}</td>
            <td>{{$emails['dathang']['email']}}</td>
            <td>{{$emails['dathang']['sdt']}}</td>
          </tr>
        </tbody>
      </table>
</body>
</html>