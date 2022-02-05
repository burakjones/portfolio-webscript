<div class="container">

    <div class="row mt-5">
        <div class="col-sm-4">
            <h4 class="display-4">Firma</h4>
        </div>
    </div>

    <?php foreach ($firmaSearch as $readFirma):?>
    <form action="" method="POST">
        <input type="hidden" value="1" name="firmaUpdate">
        <input type="hidden" value="<?=$readFirma['id']?>" name="id">
        <input type="hidden" name="token" value="<?=$_SESSION['token']?>">
    <div class="firma-box mb-5 mt-5 pb-4">

        <div class="row pt-4">
            <div class="col-sm m-auto">
                <img src="<?=$readFirma['firmaURL']?>" alt="firmalogo" class="rounded-circle" width="100" height="100">
            </div>
        </div>
    <div class="row mt-5 mb-2">
        <div class="col-sm-4">
            <h4>Firma Logo (URL)</h4>
        </div>
        <div class="col-sm-6">
            <input type="url" name="firmaURL" data-toggle="tooltip" data-placement="top" title="HızlıResim sitesinden fotoğrafınızı yükleyip linkini alabilirsiniz." value="<?=$readFirma['firmaURL']?>" class="input input-group text-white m-auto w-75">
        </div>


    </div>
    <div class="row mb-2">
        <div class="col-sm-4">
            <h4>Firma Adı</h4>
        </div>
        <div class="col-sm-6">
            <input type="text" name="firmaName" value="<?=$readFirma['firmaName']?>" class="input input-group text-white m-auto w-75">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4 mt-2">
            <h4>Firma Hakkında</h4>
        </div>
        <div class="col-sm-6">
            <textarea name="firmaDesc" class="input input-group text-white m-auto w-75"><?=$readFirma['firmaDesc']?></textarea>
        </div>
    </div>

        <div class="row mt-5">
            <div class="col-sm">
               <a href="/admin/firma/sil/<?=$readFirma['id']?>"> <input type="button" class="btn btn-danger" name="gonder" value="Sil"></a>
                <input type="submit" class="btn btn-dark" name="gonder" value="Kaydet">
            </div>
        </div>

    </div>
    </form>
<?php endforeach;?>

    <div class="row">
        <div class="col-sm-4">
            <p class="display-4">Firma Ekle</p>
        </div>
    </div>

    <form action="" method="POST">
        <input type="hidden" name="newFirma" value="1">
        <input type="hidden" name="token" value="<?=$_SESSION['token']?>">
    <div class="row mt-5">
        <div class="col-sm-6">
            <h4>Firma Logo URL</h4>
        </div>
        <div class="col-sm-6">
            <input type="url" data-toggle="tooltip" data-placement="top" title="HızlıResim sitesinden fotoğrafınızı yükleyip linkini alabilirsiniz." required placeholder="URL olarak giriniz." name="firmaURL" class="input input-group text-white m-auto w-75">
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-sm-6">
            <h4>Firma Adı</h4>
        </div>
        <div class="col-sm-6">
            <input type="text" required placeholder="Firma ismini giriniz." name="firmaName" class="input input-group text-white m-auto w-75">
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-sm-6">
            <h4>Firma Açıklama</h4>
        </div>
        <div class="col-sm-6">
            <textarea name="firmaDesc" required placeholder="Firma açıklaması." class="input input-group text-white m-auto w-75"></textarea>
        </div>
    </div>

    <div class="row mt-5 mb-5">
        <div class="col-sm">
            <input type="submit" class="btn btn-dark" value="Ekle">
        </div>
    </div>
    </form>

</div>