<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <p class="display-4 text-left">Yazı Ekle</p>
        </div>
    </div>

    <form action="" method="POST">
    <input type="hidden" name="new_blog" value="1">
        <input type="hidden" name="token" value="<?=$_SESSION['token']?>">
    <div class="row mt-5 ml-5">
    <div class="col-sm-4">
        <h4>Başlık</h4>
    </div>
        <div class="col-sm-8">
            <input type="text" class="input input-group text-white w-75" name="title" placeholder="Başlığı giriniz.">
        </div>
    </div>

    <div class="row ml-5 mt-5">
        <div class="col-sm-4">
            <h4>İçerik</h4>
        </div>
        <div class="col-sm-8">
            <textarea class="input input-group text-white w-75" name="content" placeholder="İçerik kısmını giriniz."></textarea>
        </div>
    </div>

    <div class="row m-5">
        <div class="col-sm m-auto">
            <input type="submit" name="gonder" class="btn btn-lg btn-dark" value="Ekle">
        </div>
    </div>
    </form>
</div>