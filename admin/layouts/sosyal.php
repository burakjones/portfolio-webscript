<div class="container">
    <div class="row mt-3">
        <div class="col-sm-4 mt-5">
            <h1 class="display-4 text-left">Sosyal Medya</h1>
        </div>
    </div>

<form action="" method="POST">
    <input type="hidden" name="sosyalGuncelle" value="1">
    <input type="hidden" name="token" value="<?=$_SESSION['token']?>">
    <div class="row mt-5 mb-5">
        <div class="col-sm-6 mt-2">
            <h4 class="instagram"><i class="fab fa-instagram"></i> Instagram</h4>
        </div>
        <div class="col-sm-6">
            <input type="text" placeholder="Silmek için boş bırakın." data-toggle="tooltip" data-placement="top" title="Kullanıcı adınızı girin." name="instagram" value="<?=$readSocial['instagram']?>" class="input input-group w-75 text-white">
        </div>
    </div>

    <div class="row mt-5 mb-5">
        <div class="col-sm-6 mt-2">
            <h4 class="facebook"><i class="fab fa-facebook"></i> Facebook</h4>
        </div>
        <div class="col-sm-6">
            <input type="text" placeholder="Silmek için boş bırakın." data-toggle="tooltip" data-placement="top" title="Kullanıcı adınızı girin." name="facebook" value="<?=$readSocial['facebook']?>" class="input input-group w-75 text-white">
        </div>
    </div>

    <div class="row mt-5 mb-5">
        <div class="col-sm-6 mt-2">
            <h4 class="discord"><i class="fab fa-discord"></i> Discord</h4>
        </div>
        <div class="col-sm-6">
            <input type="text" placeholder="Silmek için boş bırakın." data-toggle="tooltip" data-placement="top" title="ID'nizi girin." name="discord" value="<?=$readSocial['discord']?>" class="input input-group w-75 text-white">
        </div>
    </div>

    <div class="row mt-5 mb-5">
        <div class="col-sm-6 mt-2">
            <h4 class="spotify"><i class="fab fa-spotify"></i> Spotify</h4>
        </div>
        <div class="col-sm-6">
            <input type="text" placeholder="Silmek için boş bırakın." data-toggle="tooltip" data-placement="top" title="Profilinize girdikten sonra isminize sağ tıklayın, bağlantıyı kopyala deyin ve buraya yapıştırın." name="spotify" value="<?=$readSocial['spotify']?>" class="input input-group w-75 text-white">
        </div>
    </div>


    <div class="row mt-5 mb-5">
        <div class="col-sm-6 mt-2">
            <h4 class="whatsapp"><i class="fab fa-whatsapp"></i> Whatsapp</h4>
        </div>
        <div class="col-sm-6">
            <input type="tel" data-toggle="tooltip" data-placement="top" title="0 Olmadan girin. Örn: 5372670820" placeholder="Silmek için boş bırakın." name="whatsapp" value="<?=$readSocial['whatsapp']?>" class="input input-group w-75 text-white">
        </div>
    </div>
    <div class="row mt-5 mb-5">
        <div class="col-sm-6 mt-2">
            <h4 class="github"><i class="fab fa-github"></i> Github</h4>
        </div>
        <div class="col-sm-6">
            <input type="text" placeholder="Silmek için boş bırakın." data-toggle="tooltip" data-placement="top" title="Kullanıcı adınızı girin." name="github" value="<?=$readSocial['github']?>" class="input input-group w-75 text-white">
        </div>
    </div>
    <div class="row mt-5 mb-5">
        <div class="col-sm-6 mt-2">
            <h4 class="papara"><i class="fas fa-lira-sign"></i> Papara</h4>
        </div>
        <div class="col-sm-6">
            <input type="text" placeholder="Silmek için boş bırakın." data-toggle="tooltip" data-placement="top" title="Papara Numaranızı girin." name="papara" value="<?=$readSocial['papara']?>" class="input input-group w-75 text-white">
        </div>
    </div>


    <div class="row mt-5 mb-5">
        <div class="col-sm">
            <a href="/burak.cf/admin/"><input type="submit" name="gonder" value="Kaydet" class="btn btn-dark text-light"></a>
        </div>
    </div>
</form>
</div>