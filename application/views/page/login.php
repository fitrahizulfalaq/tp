<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title>KITAPKU</title>
    <meta name="description" content="Mobilekit HTML Mobile UI Kit">
    <meta name="keywords" content="bootstrap 4, mobile template, cordova, phonegap, mobile, html" />
    <link rel="icon" type="image/png" href="<?=base_url()?>/assets/img/favicon.png" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="<?=base_url()?>/assets/img/icon/kitapku.png">
    <link rel="stylesheet" href="<?=base_url()?>/assets/css/style.css">
    <link rel="manifest" href="__manifest.json">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="bg-white">

    <!-- loader -->
    <div id="loader">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- * loader -->


    <!-- App Capsule -->
    <div id="appCapsule" class="pt-0">

        <div class="login-form mt-1">
            <div class="section">
<<<<<<< HEAD
                <img src="<?=base_url()?>/assets/img/icon/logo-kitapku.png" alt="image" class="form-image">
=======
                <img src="<?=base_url()?>/assets/img/sample/photo/vector4.png" alt="image" class="form-image">
                
>>>>>>> 5a398928f5758de08380e66024e80a7c20362ef5
            </div>
            <div class="section mt-1">
                <h3>Kinerja Tenaga Pendamping Koperasi dan UKM</h3>
                <h4>LOGIN</h4>
            </div>
            <div class="section mt-1 mb-5">
                <form action="<?=site_url('auth/process')?>" method="post" id="FormLogin">
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <input type="email" class="form-control" id="email1" placeholder="Masukkan Email">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <input type="password" class="form-control" id="password1" placeholder="Masukkan Password">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <!-- <div class="form-links mt-2">
                        <div>
                            <a href="page-register.html">Register Now</a>
                        </div>
                        <div><a href="page-forgot-password.html" class="text-muted">Forgot Password?</a></div>
                    </div> -->

                    <div class="row">          
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block btn-lg">LOGIN <i class="fa fa-forward"></i></button>
                        <hr>
                        <a href="<?=base_url("auth/loginOTP")?>" class="btn btn-success btn-block btn-lg"><i class="fa fa-whatsapp"></i> Login via WA</a>
                    </div>
                    </div>
                    

                </form>
            </div>
        </div>


    </div>
    <!-- * App Capsule -->



    <!-- ///////////// Js Files ////////////////////  -->
    <!-- Jquery -->
    <script src="<?=base_url()?>/assets/js/lib/jquery-3.4.1.min.js"></script>
    <!-- Bootstrap-->
    <script src="<?=base_url()?>/assets/js/lib/popper.min.js"></script>
    <script src="<?=base_url()?>/assets/js/lib/bootstrap.min.js"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.js"></script>
    <!-- Owl Carousel -->
    <script src="<?=base_url()?>/assets/js/plugins/owl-carousel/owl.carousel.min.js"></script>
    <!-- jQuery Circle Progress -->
    <script src="<?=base_url()?>/assets/js/plugins/jquery-circle-progress/circle-progress.min.js"></script>
    <!-- Base Js File -->
    <script src="<?=base_url()?>/assets/js/base.js"></script>


</body>

</html>