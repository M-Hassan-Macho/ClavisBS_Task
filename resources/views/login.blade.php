<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Demo | Dashboard</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
	<br><br><br>
	<center>
		<h1>Demo Admin Dashboard</h1>
	</center>
	<br><br><br>
	<div class="row justify-content-center">
		<div class="col-md-4">
			<div class="card">
				@if($message = Session::get('success'))
				<div class="alert alert-info">
					{{ $message }}
				</div>
				@endif
				<div class="card-header">Login</div>
				<div class="card-body">
					<form action="{{ route('login') }}" method="post">
						@csrf
						<div class="form-group mb-3">
							<input type="text" name="email" class="form-control" placeholder="Email" />
							@if($errors->has('email'))
							<span class="text-danger">{{ $errors->first('email') }}</span>
							@endif
						</div>
						<div class="form-group mb-3">
							<input type="password" name="password" class="form-control" placeholder="Password" />
							@if($errors->has('password'))
							<span class="text-danger">{{ $errors->first('password') }}</span>
							@endif
						</div>
						<div class="d-grid mx-auto">
							<button type="subit" class="btn btn-dark btn-block">Login</button><br>
							<a href="#">Forgot Password ?</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<br>
	<center>
		<div class="footer">
			Copyright &copy; 2023 &mdash; Demo
		</div>
	</center>
</body>

</html>