<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Hyper - Responsive Bootstrap 4 Admin Dashboard</title>

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
		<meta content="Coderthemes" name="author" />

		<link rel="shortcut icon" href="assets/images/favicon.ico">
		<link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
		<link href="/assets/css/app.min.css" rel="stylesheet" type="text/css" />
	</head>

	<body class="authentication-bg">
		<div class="account-pages mt-5 mb-5">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-5">
						<div class="card">
							<div class="card-header pt-4 pb-4 text-center bg-primary">
								<a href="#">
									<span><img src="/assets/images/logo.png" alt="" height="18"></span>
								</a>
							</div>
							<div class="card-body p-4">
								<div class="text-center">
									<h1 class="text-error"><?php echo $code;?></h1>
									<h5 class="text-uppercase text-danger mt-3"><?php echo $msg;?></h5>
									<a class="btn btn-primary mt-3" href="javascript:history.back(-1)"><i class="mdi mdi-reply"></i>返 回</a>
								</div>
							</div>
						</div>
					</div> 
				</div>
			</div>
		</div>

		<footer class="footer footer-alt">
		2018 - 2019 © Hyper - Coderthemes.com
		</footer>
		<script src="/assets/js/app.min.js"></script>
	</body>
</html>
