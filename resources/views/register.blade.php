<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Login</title>
	<!-- core:css -->
	<link rel="stylesheet" href="../../../assets/vendors/core/core.css">
	<!-- endinject -->
    <!-- plugin css for this page -->
	<!-- end plugin css for this page -->
	<!-- inject:css -->
	<link rel="stylesheet" href="../../../assets/fonts/feather-font/css/iconfont.css">
	<link rel="stylesheet" href="../../../assets/vendors/flag-icon-css/css/flag-icon.min.css">
	<!-- endinject -->
    <!-- Layout styles -->  
	<link rel="stylesheet" href="../../../assets/css/demo_2/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../../assets/images/favicon.png" />
</head>
<body>
	<div class="main-wrapper">
		<div class="page-wrapper full-page">
			<div class="page-content d-flex align-items-center justify-content-center">

				<div class="row w-100 mx-0 auth-page">
					<div class="col-md-8 col-xl-6 mx-auto">
						<div class="card">
							<div class="row">
                                <div class="col-md-4 pr-md-0">
                                    <div class="auth-left-wrapper">
                                        <img src="./assets/images/login.jpg" alt="" width="260" height="452">
                                    </div>
                                </div>
                                <div class="col-md-8 pl-md-0">
                                    <div class="auth-form-wrapper px-4 py-5">
                                        <a href="#" class="noble-ui-logo logo-light d-block mb-2">Lelang<span>kan</span></a>
                                        <h5 class="text-muted font-weight-normal mb-4">Selamat datang! silahkan login terlebih dahulu</h5>
                                        <form action="buat-akun" method="post">
											@csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nama Lengkap</label>
                                                <input type="nama_lengkap" class="form-control" name="nama_lengkap" id="exampleInputEmail1" placeholder="Nama Lengkap">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Username</label>
                                                <input type="username" class="form-control" name="username" id="exampleInputEmail1" placeholder="Username">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Password</label>
                                                <input type="password" class="form-control" name="password" id="exampleInputPassword1" autocomplete="current-password" placeholder="Password">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Telepon</label>
                                                <input type="telp" class="form-control" name="telp" id="exampleInputEmail1" placeholder="Telepon">
                                            </div>
                                            <div class="mt-3">
												<button class="btn btn-primary mr-2 mb-2 mb-md-0 text-white" type="submit">Register</button>
                                            </div>
                                            <a href="register.html" class="d-block mt-3 text-muted">Belum Punya Akun? <u>Register</u></a>
                                        </form>
                                    </div>
                                </div>
                            </div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- core:js -->
	<script src="../../../assets/vendors/core/core.js"></script>
	<!-- endinject -->
    <!-- plugin js for this page -->
	<!-- end plugin js for this page -->
	<!-- inject:js -->
	<script src="../../../assets/vendors/feather-icons/feather.min.js"></script>
	<script src="../../../assets/js/template.js"></script>
	<!-- endinject -->
    <!-- custom js for this page -->
	<!-- end custom js for this page -->
</body>
</html>