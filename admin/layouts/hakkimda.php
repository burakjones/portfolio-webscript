<div class="container mt-5 text-white text-center">

    <div class="row">
        <div class="col-sm-4">
            <p class="display-4 text-left">Hakkımda</p>
        </div>
    </div>


    <form action="" method="POST">
        <input type="hidden" name="hakkimda" value="1">
        <input type="hidden" name="token" value="<?=$_SESSION['token']?>">
        <div class="row ml-5 mt-5">
            <div class="col-sm-4">
                <h4 class="text-right">İsim / Nick</h4>
            </div>
            <div class="col-sm-8">
                <input type="text" placeholder="Örn: Burak ÖĞÜTÇEN / xKRAL_TR" class="input input-group text-white m-auto w-50" value="<?=$hakkimdaVeri['hakkimda_isim']?>" required name="hakkimda_isim">
            </div>
        </div>

        <div class="row ml-5 mt-5">
            <div class="col-sm-4">
                <h4 class="text-right">Header Logo</h4>
            </div>
            <div class="col-sm-8">
                <input type="url" data-toggle="tooltip" data-placement="top" title="HızlıResim sitesinden fotoğrafınızı yükleyip linkini alabilirsiniz." placeholder="Örn: https://resimkutuphanesi.play.tc/library/builder.png" class="input input-group text-white m-auto w-50" value="<?=$hakkimdaVeri['hakkimda_logo']?>" required name="hakkimda_logo">
            </div>
        </div>

        <div class="row ml-5 mt-5">
            <div class="col-sm-4">
                <h4 class="text-right">Bio</h4>
            </div>
            <div class="col-sm-8">
                <textarea placeholder="Örn: Merhaba ben xxx, xx yaşındayım şurada okuyorum." class="input input-group m-auto text-white w-50" required name="hakkimda_yazi"><?=$hakkimdaVeri['hakkimda_yazi']?></textarea>
            </div>
        </div>

        <div class="row mt-5 text-white text-center ml-5">
            <div class="col-sm-4">
                <h4 class="text-right">Resim URL <small data-toggle="tooltip" data-placement="top" data-html="true" title="<img src='<?=$hakkimdaVeri['hakkimda_url']?>'>">(Görüntüle)</small></h4>
            </div>
            <div class="col-sm-8">
                <input type="url" placeholder="Örn: https://xxxx.com/xx.png" class="input input-group m-auto text-white w-50" required name="hakkimda_url" value="<?=$hakkimdaVeri['hakkimda_url']?>">
            </div>
        </div>


        <div class="row m-5">
            <div class="col-sm m-auto">
                <input type="submit" name="gonder" class="btn btn-lg btn-dark" value="Kaydet">
            </div>
        </div>
    </form>
</div>

