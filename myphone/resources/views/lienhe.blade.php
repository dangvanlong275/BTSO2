
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    @includeIf('view_s.header_v')
<div class="personal">
    <div style="height: 40px; background-color: rgb(202 173 29); margin: 10px;">
        <p class="personal-header">Báo cáo sự cố</p>
    </div>
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif
    <form method="POST" action="{{ route('lienhe') }}" enctype="multipart/form-data" id="info">@csrf

        <div class="personal-item">
            <label for="Fullname" style="color: red">Người gửi:</label>
            <input type="text" id="Fullname" name="Fullname" placeholder="Họ tên người gửi..."><br>
        </div>
        <div style="display: flex;">

            <div class="personal-item" style="width: 50%;">
                <label for="Phone" style="color: red">Số điện thoại:</label>
                <input type="text" id="Phone" name="Phone" placeholder="Số điện thoại..." pattern="[0-9]{10}"
                    title="Số điện thoại phải đủ 10 số">
            </div>

            <div class="personal-item" style="width: 52%; margin-left: 2%;">
                <label for="Email" style="color: red">Email:</label><br>
                <input type="text" id="Email" name="Email" placeholder="Email..."
                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="example@hotmail.com"><br>
            </div>
        </div>
        <div class="personal-item">
            <label for="noidung" style="color: red; font-size:25px">Nội dung báo cáo:</label><br>
            <textarea style="margin-top: 12px; padding:5px" name="noidung" id="noidung" cols="51" rows="7"
                placeholder="Nội dung...."></textarea>
        </div>

        <input type="submit" value="Gửi" style="background:rgb(79 215 96)" class="edit-btn">

    </form>
</div>
@includeIf('view_s.footer_v')