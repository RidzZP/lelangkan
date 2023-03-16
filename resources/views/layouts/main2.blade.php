<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Lelangkan</title>
	<!-- core:css -->
	<link rel="stylesheet" href="../assets/vendors/core/core.css">
	<!-- endinject -->
    <!-- plugin css for this page -->
	<link rel="stylesheet" href="../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
	<!-- end plugin css for this page -->
	<!-- inject:css -->
	<link rel="stylesheet" href="../assets/fonts/feather-font/css/iconfont.css">
	<link rel="stylesheet" href="../assets/vendors/flag-icon-css/css/flag-icon.min.css">
	<!-- endinject -->
    <!-- Layout styles -->  
	<link rel="stylesheet" href="../assets/css/demo_5/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../assets/images/favicon.png" />
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <style>
    body {
        font-family: 'Poppins';
    }
    </style>
</head>
<body>
	<div class="main-wrapper">
		<div class="horizontal-menu">
			<nav class="navbar top-navbar">
				<div class="container">
					<div class="navbar-content">
						<a href="#" class="navbar-brand">
							Lelang<span>kan</span>
						</a>
						{{-- <form class="search-form">
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text">
										<i data-feather="search"></i>
									</div>
								</div>
								<input type="text" class="form-control" id="navbarForm" placeholder="Search here...">
							</div>
						</form> --}}
						<button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
							<i data-feather="menu"></i>					
						</button>
					</div>
				</div>
			</nav>
			<nav class="bottom-navbar ">
				<div class="container ">
					<ul class="nav page-navigation d-flex justify-content-center">
						<li class="nav-item">
							<a class="nav-link" href="/">
								<i class="link-icon" data-feather="home"></i>
								<span class="menu-title">Beranda</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="penawaran-barang">
								<i class="link-icon" data-feather="box"></i>
								<span class="menu-title">Penawaran</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="" class="nav-link">
								<i class="link-icon" data-feather="mail"></i>
								<span class="menu-title">History</span>
								<i class="link-arrow"></i>
							</a>
							<div class="submenu">
								<ul class="submenu-item">
									<li class="nav-item"><a class="nav-link" href="history">Penawaran</a></li>
									<li class="nav-item"><a class="nav-link" href="pemenang-lelang">Pemenang lelang</a></li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="login">
								<i class="link-icon" data-feather="log-out"></i>
								<span class="menu-title">Logout</span>
							</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	
		<div class="page-wrapper">

			<div class="page-content">
                @yield('konten')
			</div>
		</div>
	</div>

	<!-- core:js -->
	<script src="../assets/vendors/core/core.js"></script>
	<!-- endinject -->
    <!-- plugin js for this page -->
    <script src="../assets/vendors/chartjs/Chart.min.js"></script>
    <script src="../assets/vendors/jquery.flot/jquery.flot.js"></script>
    <script src="../assets/vendors/jquery.flot/jquery.flot.resize.js"></script>
    <script src="../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="../assets/vendors/apexcharts/apexcharts.min.js"></script>
    <script src="../assets/vendors/progressbar.js/progressbar.min.js"></script>
	<!-- end plugin js for this page -->
	<!-- inject:js -->
	<script src="../assets/vendors/feather-icons/feather.min.js"></script>
	<script src="../assets/js/template.js"></script>
	<!-- endinject -->
    <!-- custom js for this page -->
    <script src="../assets/js/dashboard.js"></script>
    <script src="../assets/js/datepicker.js"></script>
	<!-- end custom js for this page -->
</body>
</html>    