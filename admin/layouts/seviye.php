<div class="container text-white">
    <div class="row">
        <div class="col-sm mb-4">
            <p class="display-4 text-left">Seviye</p>
        </div>
    </div>

  <?php  if(!$skillSearch->rowCount() > 0): ?>

    <div class="row">
    <div class="col-sm">
        <div class="alert alert-dark w-50 m-auto" role="alert">
            Hiç seviye bulunamadı!
        </div>
    </div>
    </div>
    <?php else:?>
    <?php foreach($skillSearch as $readSkill):?>
        <div class="seviye mb-5">
            <form action="" method="POST">
                <input type="hidden" name="token" value="<?=$_SESSION['token']?>">
                <input type="hidden" name="skillUpdate" value="1">
                <input type="hidden" name="id" value="<?=$readSkill['id']?>">
                <div class="row mt-5 ml-5">
                    <div class="col-sm-6">
                        <h4>Seviye Adı:</h4>
                    </div>
                    <div clasS="col-sm-6">
                        <input type="text" name="skillName" class="input input-group text-white w-50" value="<?=$readSkill['skillName']?>">
                    </div>
                </div>
                <div class="row mt-2 ml-5">
                    <div class="col-sm-6">
                        <h4 class="pl-3">Seviye Oranı (%)</h4>
                    </div>
                    <div class="col-sm-6">
                        <input type="number"  name="skillNumber" class="input input-group text-white w-50" value="<?=$readSkill['skillRate']?>">
                    </div>
                </div>
                <div class="row mt-2 ml-5 pb-3">
                    <div class="col-sm-6">
                        <h4 class="pl-3">Seviye Rengi <small>(Arkaplan)</small></h4>
                    </div>
                    <div class="col-sm-6">
                        <input type="color" name="skillColor" class="input input-group text-white w-50" value="<?=$readSkill['skillColor']?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm mt-3 mb-4">
                        <a href="/admin/seviye/sil/<?=$readSkill['id']?>"><input type="button" name="sil" class="btn btn-danger text-right" value="Sil"></a>
                        <a href="#"><input type="submit" name="gonder" class="btn btn-success" value="Değişiklikleri Kaydet"></a>
                    </div>
                </div>
            </form>
        </div>
    <?php endforeach;?>
    <?php endif;?>


    <div class="row mt-5">
        <div class="col-sm-4">
            <h1 class="display-4 text-left">Seviye Ekle</h1>
        </div>
    </div>

<form action="" method="POST">
    <input type="hidden" name="newSkill" value="1">
    <input type="hidden" name="token" value="<?=$_SESSION['token']?>">
    <div class="row mt-5 ml-5">
    <div class="col-sm-6">
        <h4>Seviye Adı</h4>
    </div>
        <div class="col-sm-6">
            <input type="text" name="skillName" required class="input input-group m-auto text-white w-25">
        </div>
    </div>
    <div class="row mt-5 ml-5">
    <div class="col-sm-6">
        <h4>Seviye Oranı (%)</h4>
    </div>
        <div class="col-sm-6">
            <input type="number" name="skillRate" min="1" max="100" class="input text-white m-auto input-group w-25" required aria-valuemax="2">
        </div>
    </div>
    <div class="row mt-5 ml-5">
    <div class="col-sm-6">
        <h4>Seviye Rengi <small>(Arkaplan)</small></h4>
    </div>
        <div class="col-sm-6">
            <input type="color" name="skillColor" required class="input text-white m-auto input-group w-25">
        </div>
    </div>
        <div class="row mt-5 mb-5">
            <div class="col-sm">
                <a href="#"><input type="submit" name="gonder" class="btn btn-lg btn-dark" value="Ekle"></a>
            </div>
        </div>
</form>
</div>