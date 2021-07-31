
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

@include('view_s.header_v')

@php
    $info = session()->get('user');
    @endphp
<div class="personal">
    <div style="height: 40px; background-color: rgb(202, 29, 124); margin: 10px;">
        <p class="personal-header">Thông tin cá nhân</p>
    </div>
    <form method="POST" action="{{ route('edit_user') }}" enctype="multipart/form-data"  id="info">@csrf
        <div style="display: flex;">
            <div class="personal-item" style="width: 50%;">
                <label for="Ho">Họ:</label><br>
                <input type="text" id="Ho" name="Firstname" placeholder="Nhập họ..." value="{{$info->Ho}}"><br>
            </div>

            <div class="personal-item" style="width: 52%; margin-left: 2%;">
                <label for="name">Tên:</label><br>
                <input type="text" id="name" name="Lastname" placeholder="Nhập tên..." value="{{$info->Ten}}"><br>
            </div>
        </div>

        <div class="personal-item-selector">
            <label for="gender">Giới tính:</label>
            @switch($info->GioiTinh)
            @case('Nam')
            <input type="radio" name="Gender" value="Nam" checked>Nam
            <input type="radio" name="Gender" value="Nữ">Nữ
            <input type="radio" name="Gender" value="Khác">Khác...
            @break
            @case('Nữ')
            <input type="radio" name="Gender" value="Nam">Nam
            <input type="radio" name="Gender" value="Nữ" checked>Nữ
            <input type="radio" name="Gender" value="Khác">Khác...

            @break
            @default

            <input type="radio" name="Gender" value="Nam">Nam
            <input type="radio" name="Gender" value="Nữ">Nữ
            <input type="radio" name="Gender" value="Khác" checked>Khác...
            @endswitch
        </div>

        <div class="personal-item">
            <label for="fname">Số điện thoại:</label><br>
            <input type="text" id="fname" name="Phone" placeholder="Nhập số điện thoại..."
                pattern="[0-9]{10,11}" title="Số điện thoại từ 10 tới 11 số" value="{{$info->SDT}}"><br>
        </div>

        <div class="personal-item">
            <label for="fname">Email:</label><br>
            <input type="email" id="fname" name="Email" placeholder="Nhập email..."
                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="example@hotmail.com"
                value="{{$info->Email}}"><br>
        </div>

        <div class="personal-item">
            <label for="fname">Địa chỉ:</label><br>
            <input type="text" id="fname" name="Address" placeholder="Nhập địa chỉ..." value="{{$info->DiaChi}}"><br>
        </div>

        <input type="submit" value="Sửa" class="edit-btn">

    </form>
</div>
<footer>
    @include('view_s.footer_v')
</footer>