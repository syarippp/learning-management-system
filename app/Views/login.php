<!DOCTYPE html>
<html lang="en" class="h-100" id="login-page1">
<head>
	<title> Login </title>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Gleek - Bootstrap Admin Dashboard HTML Template</title>
    <!-- Favicon icon -->
    <!-- <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png"> -->
    <!-- Custom Stylesheet -->
    <link href="<?= base_url(''); ?>main/css/style.css" rel="stylesheet">

</head>

<body class="h-100">
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <div class="login-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card">
                            <div class="card-body">                             	

                                <h2 class="text-center mt-5">Masuk</h2>
                                <p class="text-center">Silahkan Masukkan Username & Password</p>

                                <?php if (session()->getFlashKeys()): ?>
                                        <?php echo session()->getFlashdata('salahpw'); ?>
                                        <?php echo session()->getFlashdata('belumlogin'); ?>
                                <?php endif; ?>

                                <form id="login-form" name="login-form" class="mb-0" action="<?php echo base_url('home/masuk') ?>" method="post">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Username" name="username" required="">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password" name="password" required="">
                                    </div>
                                    <div class="text-center mb-4 mt-5">
                                    	<!-- <p class="text-center">Belum punya akun? Silahkan Daftar <a href="#">Disini</a></p> -->
                                        <button type="submit" class="btn btn-primary">Masuk</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
    <!-- Common JS -->
    <script src="<?= base_url(''); ?>main/assets/plugins/common/common.min.js"></script>
    <!-- Custom script -->
    <script src="<?= base_url(''); ?>main/js/custom.min.js"></script>
    <script src="<?= base_url(''); ?>main/js/settings.js"></script>
    <script src="<?= base_url(''); ?>main/js/gleek.js"></script>
    <script src="<?= base_url(''); ?>main/js/styleSwitcher.js"></script>
</body>

</html>