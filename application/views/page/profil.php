<!-- App Capsule -->
<div id="appCapsule">

<div class="section mt-2">
    <div class="profile-head">
        <div class="avatar">
            <img src="<?=base_url()?>/assets/img/favicon.png" alt="avatar" class="imaged w64 rounded">
        </div>
        <div class="in">
            <h3 class="name">NAMA TENAGA PENDAMPING</h3>
            <h5 class="subtext">ASAL KAB/KOTA</h5>
        </div>
    </div>
</div>


<div class="section mt-2">
<div class="section full">
    <div class="wide-block transparent p-0">
        <div class="form-group boxed" >
            <div class="input-wrapper">                                     
                <label class="label" for="name3">Username <span id="alert-resume" class="error">*</span></label>
                <input type="text" id="word" name="username" class="form-control" placeholder="" readonly>
                <i class="clear-input">
                    <ion-icon name="close-circle"></ion-icon>
                </i>                    
            </div>
            <hr>
            <div class="input-wrapper">                                     
                <label class="label" for="name3">Nama <span id="alert-resume" class="error">*</span></label>  
                <input type="text" id="word" name="nama" class="form-control" placeholder="Nama lengkap dan gelar" required minlength="10">
                <i class="clear-input">
                    <ion-icon name="close-circle"></ion-icon>
                </i>
            </div>
            <hr>
            <div class="input-wrapper">                                     
                <label class="label" for="name3">Password <span id="alert-resume" class="error">*</span></label>  
                <input type="password" id="word" name="password" class="form-control" placeholder="Password" required minlength="5">
                <i class="clear-input">
                    <ion-icon name="close-circle"></ion-icon>
                </i>
            </div>
            <hr>
            <div class="input-wrapper">                                     
                <label class="label" for="name3">Email <span id="alert-resume" class="error">*</span></label>  
                <input type="email" id="word" name="email" class="form-control" placeholder="Email" required minlength="10">
                <i class="clear-input">
                    <ion-icon name="close-circle"></ion-icon>
                </i>
            </div>
            <hr>
            <div class="input-wrapper">                                     
                <label class="label" for="name3">NIK <span id="alert-resume" class="error">*</span></label>  
                <input type="text" id="word" name="nik" class="form-control" placeholder="NIK" minlength="16" required>
                <i class="clear-input">
                    <ion-icon name="close-circle"></ion-icon>
                </i>
            </div>
            <hr>
            <div class="input-wrapper">                                     
                <label class="label" for="name3">Tempat Lahir <span id="alert-resume" class="error">*</span></label>  
                <input type="text" id="word" name="tempatlahir" class="form-control" placeholder="Tempat lahir" minlength="5" required>
                <i class="clear-input">
                    <ion-icon name="close-circle"></ion-icon>
                </i>
            </div>
            <hr>
            <div class="input-wrapper">                                     
                <label class="label" for="name3">Tanggal Lahir <span id="alert-resume" class="error">*</span></label>  
                <input type="date" id="word" name="tanggallahir" class="form-control" placeholder="Tanggal lahir" required>
                <i class="clear-input">
                    <ion-icon name="close-circle"></ion-icon>
                </i>
            </div>
            <hr>
            <div class="input-wrapper">                                     
                <label class="label" for="name3">Jenis Kelamin <span id="alert-resume" class="error">*</span></label>                   
                <div class="btn-group btn-group-toggle" data-toggle="buttons" required>
                    <label class="btn btn-outline-primary">
                        <input type="radio" name="kelamin" id="option2" value="Laki-Laki"> Laki-Laki
                    </label>
                    <label class="btn btn-outline-primary">
                        <input type="radio" name="kelamin" id="option3" value="Perempuan"> Perempuan
                    </label>
                </div>
            </div>
            <hr>
            <div class="input-wrapper">                                     
                <label class="label" for="name3">Hp <span id="alert-resume" class="error">*</span></label>  
                <input type="text" id="word" name="hp" class="form-control" placeholder="HP" minlength="10" required>
                <i class="clear-input">
                    <ion-icon name="close-circle"></ion-icon>
                </i>
            </div>
            <hr>
            <div class="input-wrapper">                                     
                <label class="label" for="name3">Agama <span id="alert-resume" class="error">*</span></label>  
                <input type="text" id="word" name="agama" class="form-control" placeholder="Agama" minlength="5" required>
                <i class="clear-input">
                    <ion-icon name="close-circle"></ion-icon>
                </i>
            </div>
            <hr>
            <div class="input-wrapper">                                     
                <label class="label" for="name3">Domisili <span id="alert-resume" class="error">*</span></label>  
                <input type="text" id="word" name="domisili" class="form-control" placeholder="Domisili" minlength="10" required>
                <i class="clear-input">
                    <ion-icon name="close-circle"></ion-icon>
                </i>
            </div>
            <hr>
            <div class="input-wrapper">                                     
                <label class="label" for="name3">Pernikahan <span id="alert-resume" class="error">*</span></label>  
                <input type="text" id="word" name="pernikahan" class="form-control" placeholder="pernikahan" required>
                <i class="clear-input">
                    <ion-icon name="close-circle"></ion-icon>
                </i>
            </div>
            <hr>
            <div class="input-wrapper">
                <label class="label">Pendidikan Terakhir <span id="alert-resume" class="error">*</span></label>
                <select name="pendidikan" class="form-control" >
                    <option value="SD/MI/Sederajat">SD/MI</option>
                    <option value="SMP" >SMP/MTS</option>
                    <option value="SMA/SMK/MA" >SMA/SMK/MA</option>
                    <option value="D-III" >D-III</option>
                    <option value="D-IV" >D-IV</option>
                    <option value="S-1" >S-1</option>
                    <option value="S-2" >S-2</option>
                </select>
            </div>
            <hr>
            <div class="input-wrapper">                                     
                <label class="label" for="name3">Tahun Bergabung <span id="alert-resume" class="error">*</span></label>  
                <input type="text" id="word" name="tahungabung" class="form-control" placeholder="pernikahan" required>
                <i class="clear-input">
                    <ion-icon name="close-circle"></ion-icon>
                </i>
            </div>
            <hr>
            <div class="input-wrapper">                                     
                <label class="label" for="name3">List Device Terdaftar </label>  
                <p> List Device</p>
                
            </div>
            <hr>
            <div class="input-wrapper">                                     
                <label class="label" for="name3">Riwayat Login </label>  
                <p> Riwayat Login</p>
            </div>

        </div>        
    </div>
</div>
</div>




</div>
<!-- * App Capsule -->