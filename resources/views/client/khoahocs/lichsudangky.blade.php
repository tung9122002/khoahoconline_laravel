@extends('client.templates.layout')
@section('content')
<style>
    .styled-table {
    width:1000px;
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}
.styled-table thead tr {
    background-color: #009879;
    color: #ffffff;
    text-align: left;
}
.styled-table th,
.styled-table td {
    padding: 12px 20px;
}
.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
}
.styled-table tbody tr.active-row {
    font-weight: bold;
    color: #009879;
}
</style>
<br>
<center>
    <table class="styled-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Tên Lớp</th>
                <th>Khóa Học</th>
                <th>Giá</th>
                <th>Địa chỉ</th>
                <th>Sđt</th>
                <th>Trạng thái</th>
                <th>Hủy đăng ký</th>
                <th>Xóa</th>
            </tr>
        </thead>
        @foreach ($list as $item)
        <tbody>
          <tr>
              <td>{{$item->name}}</td>
              <td>{{$item->email}}</td>
              <td>{{$item->ten_lop}}</td>
              <td>{{$item->ten_khoahoc}}</td>
              <td>{{$item->gia_khoahoc}}$</td>
              <td>{{$item->dia_chi}}</td>
              <td>{{$item->sdt}}</td>
              <td>
                @if ($item->trang_thai==0)
                <center><span class="btn btn-primary">Đang duyệt</span></center>
                @elseif($item->trang_thai==1)
                <center><span class="btn btn-success">Đã duyệt</span></center>
                @else
                <center><span class="btn btn-danger">Đã hủy</span></center>
                @endif   
              </td>
              <td>
                <form method="post" action="{{route('admin.dang-ky.dangky_update',[$item->id])}}">
                    @csrf
                    <input type="text" name="trang_thai" value="3" hidden>
                    <button onclick="confirm('Bạn đã hủy thành công!')" class="btn btn-success" type="submit">Hủy</button>
                </form>
                
              </td>
                <td><a onclick="confirm('Bạn đã xóa thành công!')" class="btn btn-danger" href="{{route('admin.dang-ky.dangky_delete',[$item->id])}}">Xóa</a></td>
          </tr>
      </tbody>
        @endforeach
        
    </table>
</center>

@endsection
