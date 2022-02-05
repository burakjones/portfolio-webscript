<div class="container mt-5">

    <div class="row mt-5 mb-5 text-white text-center">

       <div class="col-sm-6">
           <div class="profil-img">
               <img src="<?=$hakkimdaVeri['hakkimda_logo']?>" alt="headerLogo">
           </div>
       </div>
        <div class="col-sm-6 mt-5">
            <h2 class="display-4"><?=$hakkimdaVeri['hakkimda_isim']?></h2>
                <h5 class="text-muted text-right user-select-none">/Portfolyo</h5>
        </div>
    </div>
<hr>
    <div class="row text-white text-center mt-5">
        <div class="col-sm m-auto">
            <h2><span class="badge badge-pill dark shadow">Çalıştığım Yerler</span></h2>
        </div>
    </div>

<div class="profil-imgs m-auto mt-5">
    <div class="row text-center text-white-50 m-auto">
        <?php foreach ($firmaSearch as $readFirma1):?>
        <div class="col-sm-6 mt-4">
            <div class="kutu">
            <img src="<?=$readFirma1['firmaURL']?>" class="rounded-circle mt-3" alt="firmaLogo" width="100" height="100">
            <h4 class="mt-2"><?=$readFirma1['firmaName']?></h4>
            <p class="text-left pl-4 pr-4 pb-3"><?=$readFirma1['firmaDesc']?></p>
            </div>
        </div>
       <?php endforeach;?>
    </div>
</div>


<hr>
    <div class="row text-white text-center mt-5">
        <div class="col-sm m-auto">
            <h2><span class="badge badge-pill dark shadow">Ben</span></h2>
        </div>
    </div>
    <div class="row mt-5 text-white text-center">
        <div class="col-sm-6">
            <img src="https://resimkutuphanesi.play.tc/library/kit2.png" alt="hakkimda">
            <h3><span class="badge badge-pill badge-light">Hakkımda</span></h3>
            <p class="lead">
                <?=$hakkimdaVeri['hakkimda_yazi']?>
            </p>
        </div>
        <div class="col-sm-6">

            <img src="https://resimkutuphanesi.play.tc/library/kit6.png" alt="skill">
            <h2><span class="badge badge-pill badge-light mt-2">Seviyelerim</span></h2>
            <ul class="mt-3">
                <?php foreach ($skillSearch as $readSkill):?>
                <li><h4><span class="badge badge-pill uzun w-25" style="background: <?=$readSkill['skillColor']?>"><?=$readSkill['skillName']?></span> <i class="fas fa-caret-right"></i> %<?=$readSkill['skillRate']?></h4></li>
                <?php endforeach;?>
            </div>
        </div>
    </div>
<hr>

    <div class="row text-white text-center mt-5">
        <div class="col-sm m-auto">
            <h2><span class="badge badge-pill dark shadow">Sosyal Medya</span></h2>
        </div>
    </div>


<div class="profil-social">
    <div class="row text-center mt-5 text-white">
        <?php if($readSocial['instagram'] != ""):?>
        <div class="col-sm-4 mb-5">
            <a href="https://instagram.com/<?=$readSocial['instagram']?>" target="_blank" class="instagram">
                <i class="fab fa-instagram"></i>
                <h5>Instagram</h5></a>
        </div>
        <?php endif;?>
        <?php if($readSocial['discord'] != ""):?>
        <div class="col-sm-4 mb-5">
            <a href="https://discord.com/channels/@me/<?=$readSocial['discord']?>" target="_blank" class="discord">
                <i class="fab fa-discord"></i>
                <h5>Discord</h5></a>
        </div>
        <?php endif;?>
        <?php if($readSocial['whatsapp'] != ""):?>
        <div class="col-sm-4 mb-5">
            <a href="https://api.whatsapp.com/send/?phone=90<?=$readSocial['whatsapp']?>&text&app_absent=0" target="_blank" class="whatsapp">
                <i class="fab fa-whatsapp"></i>
                <h5>Whatsapp</h5></a>
        </div>
        <?php endif;?>
        <?php if($readSocial['github'] != ""):?>
        <div class="col-sm-4 mb-5">
            <a href="https://github.com/<?=$readSocial['github']?>" target="_blank" class="github">
                <i class="fab fa-github"></i>
                <h5>Github</h5></a>
        </div>
        <?php endif;?>
        <?php if($readSocial['spotify'] != ""):?>
        <div class="col-sm-4 mb-5">
            <a href="<?=$readSocial['spotify']?>" target="_blank" class="spotify">
                <i class="fab fa-spotify"></i>
                <h5>Spotify</h5></a>
        </div>
        <?php endif;?>
        <?php if($readSocial['papara'] != ""):?>
        <div class="col-sm-4 mb-5" data-toggle="tooltip" data-placement="top" title="<?=$readSocial['papara']?>">
            <a href="#" class="papara">
                <i class="fas fa-lira-sign" ></i>
                <h5>Papara</h5></a>
        </div>
        <?php endif;?>
        <?php if($readSocial['facebook'] != ""):?>
        <div class="col-sm-4 mb-5">
            <a href="https://facebook.com/<?=$readSocial['facebook']?>" target="_blank" class="facebook">
                <i class="fab fa-facebook"></i>
                <h5>Facebook</h5></a>
        </div>
        <?php endif;?>
    </div>



</div>



