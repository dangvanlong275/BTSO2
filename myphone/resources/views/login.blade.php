
<!DOCTYPE html>
<html>

<head>
	<title> SIGN IN </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<!-- Custom Theme files -->
	<link href="css/register.css" rel="stylesheet" type="text/css" media="all" />
	<!-- //Custom Theme files -->
	<!-- web font -->
	<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
	<!-- //web font --><!-- Load font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<style>
	.home{
		margin-left: 720px;
	}
	.home a{
		color: black;
	}
</style>
<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>SINGIN</h1>
		<div class="home"><a href="home" class="link-secondary"><i class="fa fa-home" ></i>Home</a>
		</div>
		<div class="wrap-login100">
			<div class="main-agileinfo">
				<div class="agileits-top">
					<form action="{{route('login_nd')}}" method="post" enctype="multipart/form-data"> @csrf
						@if (session('errors'))
						<div class="alert alert-danger alert-dismissible" role="alert">
							<strong>{{$errors}}</strong>
						</div>
						@endif
						<input class="text email" type="text" name="username" placeholder="Username" required>
						<input class="text" type="password" name="password" placeholder="Password" required>
						<input type="submit" value="SIGIN">
					</form>
					<p>Don't have an Account? <a href="login"> Sign up now!</a></p>
				</div>
			</div>
		</div>
		<!-- //main -->
</body>

</html>