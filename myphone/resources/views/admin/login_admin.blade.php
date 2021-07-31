<head>
    <link rel="stylesheet" href="css/login.css">
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Jquery -->
    <script src="lib/Jquery/Jquery.min.js"></script>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>
        
function kiemTraDangNhap(){
    a=document.getElementById("username").value;
    b=document.getElementById("password").value;
    if(a == "")
        {
            alert("Tài khoản không được để trống!Vui lòng nhập tài khoản.");
            form.username.focus();
            return false;
        }
    if(b == "")
        {
            alert("Mật khẩu không được để trống!Vui lòng nhập mật khẩu.");
            form.password.focus();
            return false;
        }
    return true;
}
    </script>

</head>
 <body class="main-bg" id="hienthiadmin">
        <div class="login-container text-c animated flipInX">
                <div>
                    <h1 class="logo-badge text-whitesmoke"><span class="fa fa-user-circle"></span></h1>
                </div>
                    <h3 class="text-whitesmoke">Đăng nhập Admin</h3>
                    <p class="text-whitesmoke"></p>
                <div class="container-content">
                    <form action="{{route('login_ad')}}" method="post" enctype="multipart/form-data" name="form" class="margin-t" onsubmit="return kiemTraDangNhap();">
                        @csrf
						@if (session('errors'))
						<div class="alert alert-danger alert-dismissible" role="alert">
							<strong>{{$errors}}</strong>
						</div>
						@endif
                        <div class="form-group">
                            <input name="username" id="username" type="text" class="form-control" placeholder="Tên đăng nhập" required="">
                        </div>
                        <div class="form-group">
                            <input name="password" id="password" type="password" class="form-control" placeholder="*****" required="">
                        </div>
                        <button type="submit" class="form-button button-l margin-b" >Sign In</button>
                    </form>
                </div>
            </div>  
            </body>

