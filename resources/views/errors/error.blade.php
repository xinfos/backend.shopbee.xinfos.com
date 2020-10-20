<!DOCTYPE>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc." />

	<link rel="shortcut icon" href="/assets/dashkit/images/logo.png" />

	<link rel="stylesheet" href="/assets/dashkit/fonts/feather/feather.css" />
	<link rel="stylesheet" href="/assets/dashkit/css/app.css">
	<link rel="stylesheet" href="/assets/dashkit/css/theme.min.css" id="stylesheetLight">
	<link rel="stylesheet" href="/assets/dashkit/css/theme-dark.min.css" id="stylesheetDark">

	<title>Error</title>
</head>

<body class="d-flex align-items-center bg-auth border-top border-top-2 border-primary">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-12 col-md-6 offset-xl-2 offset-md-1 order-md-2 mb-5 mb-md-0">
				<div class="text-center">
					<img src="/assets/dashkit/images/errors/lost.svg" alt="..." class="img-fluid">
				</div>
			</div>
			<div class="col-12 col-md-5 col-xl-4 order-md-1 my-5">
				<div class="text-center">
					<h1 class="text-uppercase display-1 mb-3"><?php echo $code; ?> error</h1>
					<h2 class="display-5 mb-3"><?php echo $msg; ?> 😭</h2>

					<a href="/shop/dashboard" class="btn btn btn-primary mt-3">
						返回首页
					</a>
				</div>
			</div>
		</div>
	</div>
	<script src="/assets/dashkit/js/theme.min.js"></script>
</body>

</html>