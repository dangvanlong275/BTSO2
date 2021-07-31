<!DOCTYPE html>
<html>

<head>
	<title> SignUp </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<!-- Custom Theme files -->
	<link href="css/register.css" rel="stylesheet" type="text/css" media="all" />
	<!-- //Custom Theme files -->
	<!-- web font -->
	<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
	<!-- //web font -->
</head>

<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>REGISTER</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form action="{{route('register')}}" method="post" enctype="multipart/form-data"> @csrf
					<input class="text" type="text" name="Firstname" placeholder="First name" required="">
					<input class="text  email" type="text" name="Lastname" placeholder="Last name" required="">
					<input class="text" type="text" name="Phone" placeholder="Phone" required pattern="[0-9]{10}">
					<input class="text email" type="email" name="Email" placeholder="Email" required="">
					<input class="text" type="text" name="Address" placeholder="Address" required="">
					<div class="gende" style="margin: 20px;">
						<span>Giới tính :</span>
						<input class="radio" type="radio" name="Gender" value="Nam" checked>Nam
						<input class="radio" type="radio" name="Gender" value="Nữ">Nữ
					</div>
					<input class="text email" type="text" name="Username" placeholder="Username" required="">
					<input class="text" type="password" name="password" placeholder="Password" required="">
					<input type="submit" value="SIGNUP">
				</form>
				<p>Don't have an Account? <a href="login"> Login Now!</a></p>
			</div>
		</div>
	</div>
	<!-- //main -->
</body>

</html>