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
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url() ?>/assets/img/icon/192x192.png">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/style.css">
    <link rel="manifest" href="__manifest.json">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .error {color: #FF0000;}
        table {
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
        border: 1px solid #ddd;
        }

        th, td {
        text-align: left;
        padding: 8px;
        }

        .card-header {
            height: 170px;
            overflow: hidden;
            margin: 10px;
            position: relative;
        }
    </style>
</head>

<body class="bg-white">

    <!-- loader -->
    <div id="loader">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- * loader -->

    <!-- App Header -->
    <div class="appHeader bg-primary text-light">
        <div class="left">
            <a href="javascript:;" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">Blog Post</div>
        <div class="right">
            <a href="javascript:;" class="headerButton">
                <ion-icon name="bookmark-outline"></ion-icon>
            </a>
            <a href="#" class="headerButton" data-toggle="modal" data-target="#actionSheetShare">
                <ion-icon name="share-outline"></ion-icon>
            </a>
        </div>
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">

        <div class="blog-post">
            <div class="mb-2">
                <img src="assets/img/sample/photo/wide1.jpg" alt="image" class="imaged square w-100">
            </div>
            <h1 class="title">How to take Landscape Photos in 10 Easy Ways</h1>

            <div class="post-header">
                <div>
                    <a href="#">
                        <img src="assets/img/sample/avatar/avatar1.jpg" alt="avatar" class="imaged w24 rounded mr-05">
                        Alex Edwards
                    </a>
                </div>
                Jun 11, 2020
            </div>
            <div class="post-body">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur at magna porttitor lorem mollis
                    ornare. Fusce varius varius massa. Vivamus nec odio tempus, condimentum ex eget, varius diam.
                </p>
                <p>
                    Ut id fermentum nisi. In hac habitasse platea dictumst. Praesent ornare eget neque ut cursus. Nunc
                    efficitur laoreet vulputate. Curabitur mi ligula, aliquet commodo leo in, consectetur venenatis
                    tellus. Maecenas quis vehicula erat, vitae finibus tellus.
                </p>
                <p>
                    Cras rhoncus ipsum quis lacus aliquam, quis euismod ligula varius. Phasellus ac odio rhoncus,
                    aliquet nisl lobortis, commodo orci. Quisque bibendum est ut pellentesque hendrerit.
                </p>
                <img src="assets/img/sample/photo/wide2.jpg" alt="image">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur at magna porttitor lorem mollis
                    ornare. Fusce varius varius massa. Vivamus nec odio tempus, condimentum ex eget, varius diam.
                </p>
                <h2>Heading</h2>
                <p>
                    Ut id fermentum nisi. In hac habitasse platea dictumst. Praesent ornare eget neque ut cursus. Nunc
                    efficitur laoreet vulputate. Curabitur mi ligula, aliquet commodo leo in, consectetur venenatis
                    tellus. Maecenas quis vehicula erat, vitae finibus tellus.
                </p>
                <h4>Subtitle</h4>
                <p>
                    Cras rhoncus ipsum quis lacus aliquam, quis euismod ligula varius. Phasellus ac odio rhoncus,
                    aliquet nisl lobortis, commodo orci. Quisque bibendum est ut pellentesque hendrerit.
                </p>
                <h4>Subtitle</h4>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur at magna porttitor lorem mollis
                    ornare. Fusce varius varius massa. Vivamus nec odio tempus, condimentum ex eget, varius diam.
                </p>
            </div>
        </div>


        <div class="section mt-4">
            <button type="button" class="btn btn-outline-primary btn-block" data-toggle="modal"
                data-target="#actionSheetShare">
                <ion-icon name="share-outline"></ion-icon>
                Share This Post
            </button>
        </div>

        <div class="divider mt-4 mb-3"></div>

        <div class="section">
            <div class="section-title mb-1">
                <h3 class="mb-0">Comments (3)</h3>
            </div>
            <div class="pt-2 pb-2">
                <!-- comment block -->
                <div class="comment-block">
                    <!--item -->
                    <div class="item">
                        <div class="avatar">
                            <img src="assets/img/sample/avatar/avatar1.jpg" alt="avatar" class="imaged w32 rounded">
                        </div>
                        <div class="in">
                            <div class="comment-header">
                                <h4 class="title">Diego Morata</h4>
                                <span class="time">just now</span>
                            </div>
                            <div class="text">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </div>
                            <div class="comment-footer">
                                <a href="javascript:;" class="comment-button">
                                    <ion-icon name="heart-outline"></ion-icon>
                                    Like (523)
                                </a>
                                <a href="javascript:;" class="comment-button">
                                    <ion-icon name="chatbubble-outline"></ion-icon>
                                    Reply
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- * item -->
                    <!--item -->
                    <div class="item">
                        <div class="avatar">
                            <img src="assets/img/sample/avatar/avatar3.jpg" alt="avatar" class="imaged w32 rounded">
                        </div>
                        <div class="in">
                            <div class="comment-header">
                                <h4 class="title">Henry Itondo</h4>
                                <span class="time">05:50 PM</span>
                            </div>
                            <div class="text">
                                Sed laoreet leo eget maximus ultricies.
                            </div>
                            <div class="comment-footer">
                                <a href="javascript:;" class="comment-button">
                                    <ion-icon name="heart" class="text-danger"></ion-icon>
                                    Like (4)
                                </a>
                                <a href="javascript:;" class="comment-button">
                                    <ion-icon name="chatbubble-outline"></ion-icon>
                                    Reply
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- * item -->
                    <!--item -->
                    <div class="item">
                        <div class="avatar">
                            <img src="assets/img/sample/avatar/avatar4.jpg" alt="avatar" class="imaged w32 rounded">
                        </div>
                        <div class="in">
                            <div class="comment-header">
                                <h4 class="title">Carmelita Marsham</h4>
                                <span class="time">Sep 23, 2020</span>
                            </div>
                            <div class="text">
                                Vivamus lobortis, orci et commodo pulvinar, eros nibh volutpat ipsum, in rhoncus risus
                                dolor.
                            </div>
                            <div class="comment-footer">
                                <a href="javascript:;" class="comment-button">
                                    <ion-icon name="heart-outline"></ion-icon>
                                    Like (5)
                                </a>
                                <a href="javascript:;" class="comment-button">
                                    <ion-icon name="chatbubble-outline"></ion-icon>
                                    Reply
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- * item -->
                </div>
                <!-- * comment block -->
            </div>
        </div>

        <div class="divider mt-2 mb-3"></div>

        <div class="section mt-2">
            <h3 class="mb-0">Send a Comment</h3>
            <div class="pt-2 pb-2">
                <form>
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <input type="text" class="form-control" id="name5" placeholder="Name">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <input type="email" class="form-control" id="email5" placeholder="Email">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <textarea id="comment" rows="4" class="form-control" placeholder="Comment"></textarea>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="mt-1">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                            Send
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>
    <!-- * App Capsule -->

    <!-- Share Action Sheet -->
    <div class="modal fade action-sheet inset" id="actionSheetShare" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Share with</h5>
                </div>
                <div class="modal-body">
                    <ul class="action-button-list">
                        <li>
                            <a href="#" class="btn btn-list" data-dismiss="modal">
                                <span>
                                    <ion-icon name="logo-facebook"></ion-icon>
                                    Facebook
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="btn btn-list" data-dismiss="modal">
                                <span>
                                    <ion-icon name="logo-twitter"></ion-icon>
                                    Twitter
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="btn btn-list" data-dismiss="modal">
                                <span>
                                    <ion-icon name="logo-instagram"></ion-icon>
                                    Instagram
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="btn btn-list" data-dismiss="modal">
                                <span>
                                    <ion-icon name="logo-linkedin"></ion-icon>
                                    Linkedin
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- * Share Action Sheet -->

    <!-- App Bottom Menu -->
    <div class="appBottomMenu">
        <a href="index.html" class="item">
            <div class="col">
                <ion-icon name="home-outline"></ion-icon>
            </div>
        </a>
        <a href="app-components.html" class="item">
            <div class="col">
                <ion-icon name="cube-outline"></ion-icon>
            </div>
        </a>
        <a href="page-chat.html" class="item">
            <div class="col">
                <ion-icon name="chatbubble-ellipses-outline"></ion-icon>
                <span class="badge badge-danger">5</span>
            </div>
        </a>
        <a href="app-pages.html" class="item">
            <div class="col">
                <ion-icon name="layers-outline"></ion-icon>
            </div>
        </a>
        <a href="javascript:;" class="item" data-toggle="modal" data-target="#sidebarPanel">
            <div class="col">
                <ion-icon name="menu-outline"></ion-icon>
            </div>
        </a>
    </div>
    <!-- * App Bottom Menu -->

    <!-- App Sidebar -->
    <div class="modal fade panelbox panelbox-left" id="sidebarPanel" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">

                    <!-- profile box -->
                    <div class="profileBox">
                        <div class="image-wrapper">
                            <img src="assets/img/sample/avatar/avatar1.jpg" alt="image" class="imaged rounded">
                        </div>
                        <div class="in">
                            <strong>Julian Gruber</strong>
                            <div class="text-muted">
                                <ion-icon name="location"></ion-icon>
                                California
                            </div>
                        </div>
                        <a href="javascript:;" class="close-sidebar-button" data-dismiss="modal">
                            <ion-icon name="close"></ion-icon>
                        </a>
                    </div>
                    <!-- * profile box -->

                    <ul class="listview flush transparent no-line image-listview mt-2">
                        <li>
                            <a href="index.html" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="home-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    Discover
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="app-components.html" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="cube-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    Components
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="app-pages.html" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="layers-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    <div>Pages</div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="page-chat.html" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="chatbubble-ellipses-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    <div>Chat</div>
                                    <span class="badge badge-danger">5</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <div class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="moon-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    <div>Dark Mode</div>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input dark-mode-switch"
                                            id="darkmodesidebar">
                                        <label class="custom-control-label" for="darkmodesidebar"></label>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>

                    <div class="listview-title mt-2 mb-1">
                        <span>Friends</span>
                    </div>
                    <ul class="listview image-listview flush transparent no-line">
                        <li>
                            <a href="page-chat.html" class="item">
                                <img src="assets/img/sample/avatar/avatar7.jpg" alt="image" class="image">
                                <div class="in">
                                    <div>Sophie Asveld</div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="page-chat.html" class="item">
                                <img src="assets/img/sample/avatar/avatar3.jpg" alt="image" class="image">
                                <div class="in">
                                    <div>Sebastian Bennett</div>
                                    <span class="badge badge-danger">6</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="page-chat.html" class="item">
                                <img src="assets/img/sample/avatar/avatar10.jpg" alt="image" class="image">
                                <div class="in">
                                    <div>Beth Murphy</div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="page-chat.html" class="item">
                                <img src="assets/img/sample/avatar/avatar2.jpg" alt="image" class="image">
                                <div class="in">
                                    <div>Amelia Cabal</div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="page-chat.html" class="item">
                                <img src="assets/img/sample/avatar/avatar5.jpg" alt="image" class="image">
                                <div class="in">
                                    <div>Henry Doe</div>
                                </div>
                            </a>
                        </li>
                    </ul>

                </div>

                <!-- sidebar buttons -->
                <div class="sidebar-buttons">
                    <a href="javascript:;" class="button">
                        <ion-icon name="person-outline"></ion-icon>
                    </a>
                    <a href="javascript:;" class="button">
                        <ion-icon name="archive-outline"></ion-icon>
                    </a>
                    <a href="javascript:;" class="button">
                        <ion-icon name="settings-outline"></ion-icon>
                    </a>
                    <a href="javascript:;" class="button">
                        <ion-icon name="log-out-outline"></ion-icon>
                    </a>
                </div>
                <!-- * sidebar buttons -->
            </div>
        </div>
    </div>
    <!-- * App Sidebar -->

    <!-- ///////////// Js Files ////////////////////  -->
    <!-- Jquery -->
    <script src="assets/js/lib/jquery-3.4.1.min.js"></script>
    <!-- Bootstrap-->
    <script src="assets/js/lib/popper.min.js"></script>
    <script src="assets/js/lib/bootstrap.min.js"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.js"></script>
    <!-- Owl Carousel -->
    <script src="assets/js/plugins/owl-carousel/owl.carousel.min.js"></script>
    <!-- jQuery Circle Progress -->
    <script src="assets/js/plugins/jquery-circle-progress/circle-progress.min.js"></script>
    <!-- Base Js File -->
    <script src="assets/js/base.js"></script>


</body>

</html>