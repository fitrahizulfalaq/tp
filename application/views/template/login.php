<!doctype html>
<html lang="id">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#0E86D4">

    <title> .:: KITAPKU APPS - APLIKASI MONITORING TENAGA PENDAMPING JAWA TIMUR ::.</title>
    <meta name="description" content="KITAPKU APPS - APLIKASI MONITORING TENAGA PENDAMPING JAWA TIMUR MADE WITH LOVE BY UPTKUKM.ID">
    <meta name="keywords" content="uptkukm, upt, uptkukmjatim, tenaga pendamping jawa timur" />
    <meta name="image" content="https://d1fdloi71mui9q.cloudfront.net/iA77vXfcT265XvBR2dZs_AP04aC2F3SG4yePf">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="http://www.uptdiklatkukmjatim.id/kontak/">
    <meta property="og:title" content="KITAPKU APPS - APLIKASI MONITORING TENAGA PENDAMPING JAWA TIMUR MADE WITH LOVE BY UPTKUKM.ID">
    <meta property="og:description" content="KITAPKU APPS - APLIKASI MONITORING TENAGA PENDAMPING JAWA TIMUR MADE WITH LOVE BY UPTKUKM.ID">
    <meta property="og:image" content="https://d1fdloi71mui9q.cloudfront.net/iA77vXfcT265XvBR2dZs_AP04aC2F3SG4yePf">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="http://www.uptdiklatkukmjatim.id/kontak/">
    <meta property="twitter:title" content="KITAPKU APPS - APLIKASI MONITORING TENAGA PENDAMPING JAWA TIMUR MADE WITH LOVE BY UPTKUKM.ID">
    <meta property="twitter:description" content="KITAPKU APPS - APLIKASI MONITORING TENAGA PENDAMPING JAWA TIMUR MADE WITH LOVE BY UPTKUKM.ID">
    <meta property="twitter:image" content="https://d1fdloi71mui9q.cloudfront.net/iA77vXfcT265XvBR2dZs_AP04aC2F3SG4yePf">

    <link rel="icon" type="image/png" href="<?= base_url() ?>/assets/img/favicon.png" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url() ?>/assets/img/icon/kitapku.png">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/style.css">
    <link rel="manifest" href="manifest.json">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/fontawesome-free/css/all.min.css">
</head>

<body class="bg-white">

    <!-- loader -->
    <div id="loader">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- * loader -->

    <!-- App Capsule -->
    <?= $contents ?>
    <!-- * App Capsule -->


    <!-- ///////////// Js Files ////////////////////  -->
    <script>
        let installEvent = null;
        let installButton = document.getElementById("install");
        let enableButton = document.getElementById("enable");

        enableButton.addEventListener("click", function() {
            this.disabled = true;
            startPwa(true);
        });

        if (localStorage["pwa-enabled"]) {
            startPwa();
        }

        function startPwa(firstStart) {
            localStorage["pwa-enabled"] = true;

            if (firstStart) {
                location.reload();
            }

            window.addEventListener("load", () => {
                navigator.serviceWorker.register("/service-worker.js")
                    .then(registration => {
                        console.log("Service Worker is registered", registration);
                        enableButton.parentNode.remove();
                    })
                    .catch(err => {
                        console.error("Registration failed:", err);
                    });
            });

            window.addEventListener("beforeinstallprompt", (e) => {
                e.preventDefault();
                console.log("Ready to install...");
                installEvent = e;
                document.getElementById("install").style.display = "initial";
            });

            setTimeout(cacheLinks, 500);

            function cacheLinks() {
                caches.open("pwa").then(function(cache) {
                    let linksFound = [];
                    document.querySelectorAll("a").forEach(function(a) {
                        linksFound.push(a.href);
                    });

                    cache.addAll(linksFound);
                });
            }

            if (installButton) {
                installButton.addEventListener("click", function() {
                    installEvent.prompt();
                });
            }
        }
    </script>
    <!-- Jquery -->
    <script src="<?= base_url() ?>/assets/js/lib/jquery-3.4.1.min.js"></script>
    <!-- Bootstrap-->
    <script src="<?= base_url() ?>/assets/js/lib/popper.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/lib/bootstrap.min.js"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.js"></script>
    <!-- Owl Carousel -->
    <script src="<?= base_url() ?>/assets/js/plugins/owl-carousel/owl.carousel.min.js"></script>
    <!-- jQuery Circle Progress -->
    <script src="<?= base_url() ?>/assets/js/plugins/jquery-circle-progress/circle-progress.min.js"></script>
    <!-- Base Js File -->
    <script src="<?= base_url() ?>/assets/js/base.js"></script>

</body>

</html>