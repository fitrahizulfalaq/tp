<!-- App Capsule -->
<div id="appCapsule">

<div class="section mt-2">
    <div class="section">
        <h1 class="mb-0"><?= date('d / M / y')?></h1>
        <h4 class="mb-0">Input Kunjungan Hari Ini </h4>
    </div>
    <hr>    

    <div class="section mt-2 mb-5" >
        <div class="form-group boxed">
            <div class="input-wrapper">
                <label class="label" for="name3">Kunjungan <span class="error">*</span></label>
                    
                    <select name="tipe" class="form-control" onchange="ukmkoperasi()" id="pilihtipe">
                    <option value="">--PILIH KUNJUNGAN--</option>
                    <option value="UKM" >UKM</option>
                    <option value="KOPERASI" >KOPERASI</option>
                    <option value="CALON WIRAUSAHA" >CALON WIRAUSAHA</option>
                    <option value="LAINNYA" >LAINNYA</option>
                    </select>
            </div>
        </div>
        <hr>
        <form action="<?=base_url("")?>" enctype="multipart/form-data" method="post" id="ukm" style="visibility: hidden;">               
            <div class="form-group boxed" >
                <div class="input-wrapper">                                     
                    <label class="label" for="name3">Nama <span id="alert-resume" class="error">*</span></label>
                    <input type="text" id="word" name="nama" class="form-control" placeholder="Nama Pelaku Usaha/Koperasi yang dikunjungi" required>
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>                    
                </div>
                <hr>
                <div class="input-wrapper">                                     
                    <label class="label" for="name3">Jenis Kelamin <span id="alert-resume" class="error">*</span></label>                   
                    <div class="btn-group btn-group-toggle" data-toggle="buttons" required>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="jk" id="option2" value="Laki-Laki"> Laki-Laki
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="jk" id="option3" value="Perempuan"> Perempuan
                        </label>
                    </div>
                </div>
                <hr> 
                <div class="input-wrapper">                                     
                    <label class="label" for="name3">No. Telepon (WhatsApp) <span id="alert-resume" class="error">*</span></label>
                    <input type="tel" id="word" name="hp" class="form-control" placeholder="No. Telp/WhatsApp Pelaku Usaha/Koperasi yang dikunjungi" required>
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>                    
                </div>
                <hr>
                <div class="input-wrapper">                                     
                    <label class="label" for="name3">Tujuan <span id="alert-resume" class="error">*</span></label>
                    <input type="text" id="word" name="tujuan" class="form-control" placeholder="Tujuan Kunjungan" required>
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>                    
                </div>

            </div>            
            <hr>

            <input type="hidden" value="<?= $lat?>" name="lat">
            <input type="hidden" value="<?= $lng?>" name="lng">
            <input type="hidden" value="<?= $loc_img?>" name="loc_img">

            <div class="form-button">
                <button type="submit" onclick="return checkWordCount()" class="btn btn-success btn-block btn-lg">KIRIM</button>
            </div>
        </form>

        <form action="<?=base_url("")?>" enctype="multipart/form-data" method="post" id="lainnya" style="visibility: hidden;">               
            <div class="form-group boxed" >
                <div class="input-wrapper">                                     
                    <label class="label" for="name3">Nama <span id="alert-resume" class="error">*</span></label>
                    <input type="text" id="word" name="nama" class="form-control" placeholder="Nama Pelaku Usaha/Koperasi yang dikunjungi" required>
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>                    
                </div>
                <hr>
                <div class="input-wrapper">                                     
                    <label class="label" for="name3">Jenis Kelamin <span id="alert-resume" class="error">*</span></label>                   
                    <div class="btn-group btn-group-toggle" data-toggle="buttons" required>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="jk" id="option2" value="Laki-Laki"> Laki-Laki
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="jk" id="option3" value="Perempuan"> Perempuan
                        </label>
                    </div>
                </div>
                <hr> 
                <div class="input-wrapper">                                     
                    <label class="label" for="name3">No. Telepon (WhatsApp) <span id="alert-resume" class="error">*</span></label>
                    <input type="tel" id="word" name="hp" class="form-control" placeholder="No. Telp/WhatsApp Pelaku Usaha/Koperasi yang dikunjungi" required>
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>                    
                </div>
                <hr>
                <div class="input-wrapper">                                     
                    <label class="label" for="name3">Tujuan <span id="alert-resume" class="error">*</span></label>
                    <input type="text" id="word" name="tujuan" class="form-control" placeholder="Tujuan Kunjungan" required>
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>                    
                </div>

            </div>            
            <hr>

            <input type="hidden" value="<?= $lat?>" name="lat">
            <input type="hidden" value="<?= $lng?>" name="lng">
            <input type="hidden" value="<?= $loc_img?>" name="loc_img">

            <div class="form-button">
                <button type="submit" onclick="return checkWordCount()" class="btn btn-success btn-block btn-lg">KIRIM</button>
            </div>
        </form>
    </div> 

    <a href="#" class="button goTop">
        <ion-icon name="arrow-up-outline"></ion-icon>
    </a>

</div>
<!-- * App Capsule -->



<script type="text/javascript">

function ukmkoperasi()
    {
        var x = document.getElementById("pilihtipe").value;
        if(x=="UKM"){
            document.getElementById("ukm").style.visibility = 'visible';
        }else if(x=="KOPERASI"){
            document.getElementById("ukm").style.visibility = 'visible';
        }else if(x=="CALON WIRAUSAHA"){
            document.getElementById("ukm").style.visibility = 'visible';
        }else{
            document.getElementById("ukm").style.visibility = 'hidden';
            document.getElementById("lainnya").style.visibility = 'visible';
        }
        
    }
</script>