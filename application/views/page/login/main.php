<div id="appCapsule" class="pt-0">
    <div class="login-form mt-1">
        <div class="section">
            <img src="<?= base_url() ?>/assets/img/icon/logo-kitapku.png" alt="image" class="form-image">
        </div>
        <div class="section mt-1">
            <hr>
            <h2>Monitoring Kinerja Tenaga Pendamping Koperasi dan UKM</h2>
            <!-- <h4>LOGIN</h4> -->
        </div>
        <div class="section mt-1 mb-5">
            <?php $this->view('message'); ?>
            <form action="<?= site_url('auth/process') ?>" method="post" id="FormLogin">
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <input type="email" name="username" class="form-control" placeholder="Masukkan Email" required>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                </div>

                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan Password">
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <button type="submit" name="login" class="btn btn-success btn-block">LOGIN <ion-icon name="log-in-outline"></ion-icon></button>
                        <hr>
                        <a href="<?= base_url("auth/loginOTP") ?>" class="btn btn-warning btn-block"><ion-icon name="logo-whatsapp"></ion-icon> Login Via No HP</a>
                        <a href="<?= base_url("auth/google") ?>" class="btn btn-danger btn-block"><ion-icon name="logo-google"></ion-icon> Login With Google</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>