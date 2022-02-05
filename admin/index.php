<?php
session_start();
require "settings.php";

// Admin Hesabı oluştur
if(post("hesap_olustur")) {
    $user_id = rand(0,9999);
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
  
        $gonder = $db->prepare("INSERT INTO adminaccount (user_id, username, password, email) VALUES (?,?,?,?)");
        $gonder->execute([$user_id, $username, $password, "admin@admin.com"]);
    header("Location: /admin/");
}


// Oturum Açma işlemi
if(post("giris_yap")) {
    if(post('username') && post("password") && post("token")) {
        $username = temizle(post("username"));
        $query = $db->query("SELECT * FROM adminaccount WHERE username = '$username'");
        $result = $query->fetch(PDO::FETCH_ASSOC);
        $password = password_verify(post('password'), $result['password']);
        $query  = $db->prepare("SELECT * FROM adminaccount WHERE username = '$username' LIMIT 1");
        $query->execute();
        $giris = $query->fetch(PDO::FETCH_ASSOC);

        if($query->rowCount() > 0) {
            if($giris['password'] == $password) {
                $_SESSION['user_id'] = $giris['user_id'];
                header("Location: /admin/");
                die;
            }else {
                echo "<script> alert('Şifre yanlış.') </script>";
            }
        }else {
            echo "<div class='alert alert-dark w-25 m-auto' role='alert'>
  Böyle bir kullanıcı bulunamadı! <br>Bilgileri doğru girdiğinden emin ol!
</div>";
        }
    }
}

// Hakkımda Sayfası Güncelleme İşlemi
if(isset($_POST['hakkimda'])) {

    if(post("token")) {
        $isim = temizle($_POST['hakkimda_isim']);
        $logo = temizle($_POST['hakkimda_logo']);
        $yazi = temizle($_POST['hakkimda_yazi']);
        $url = temizle($_POST['hakkimda_url']);
    $gonder = $db->prepare("UPDATE hakkimda SET hakkimda_isim = ?, hakkimda_logo = ?, hakkimda_yazi = ?, hakkimda_url = ? WHERE id = ?");
    $gonder->execute([
            $isim,
            $logo,
            $yazi,
        $url,
        1
    ]);
    }
    header("Location: /admin/");
}


// Blog yazısı Güncelleme İşlemi
if(post('edit')) {
   if(!is_numeric($_POST['title']) && !is_numeric($_POST['content'])) {
       $id = $_POST['id'];
       $baslik = temizle($_POST['title']);
       $icerik = temizle($_POST['content']);
       $gonder = $db->prepare("UPDATE blogs SET title = ?, content = ? WHERE id = ?");
       $gonder->execute([
               $baslik,
           $icerik,
           $id
       ]);
   }
   header("Location: /admin/");
}

// Yeni Seviye Ekleme İşlemi
if(post("newSkill")) {
    $skillname = temizle($_POST['skillName']);
    $skillrate = temizle($_POST['skillRate']);
    $skillcolor = temizle($_POST['skillColor']);

    if(strlen($skillrate) > 3){
        echo "Lütfen düzgün bir oran giriniz.";
    }else {
        $gonder = $db->prepare("INSERT INTO myskills (skillName, skillRate, skillColor) VALUES (?,?,?)");
        $gonder->execute([
                $skillname,
            $skillrate,
            $skillcolor
        ]);
    }
    header("Location: /admin/");
}


// Yeni Yazı Ekleme İşlemi
if(post('new_blog')) {
    $title = temizle($_POST['title']);
    $content = temizle($_POST['content']);
    $postid = rand(0,99999);
    if(!is_numeric($_POST['title']) && !is_numeric($_POST['content'])) {
        $gonder = $db->prepare("INSERT INTO blogs (postID, title, content) VALUES (?,?,?)");
        $gonder->execute([$postid, $title, $content]);
    }
    header("Location: /admin/");
}

// Seviyeyi Güncelleme İşlemi
if(post("skillUpdate")) {
    $id = $_POST['id'];
    $skillName = temizle($_POST['skillName']);
    $skillRate = temizle($_POST['skillNumber']);
    $skillColor = temizle($_POST['skillColor']);

    $gonder = $db->prepare("UPDATE myskills SET skillName = ?, skillRate = ?, skillColor = ? WHERE id = ?");
    $gonder->execute([$skillName, $skillRate, $skillColor, $id]);
    header("Location: /admin/");
}

// Sosyal Medya Güncelleme İşlemi
// temizle() fonksiyonunu kullanma
// sebebim ise XSS site scripting açığını
// engellemek.
if(post("sosyalGuncelle")) {
    $instagram = temizle($_POST['instagram']);
    $facebook = temizle($_POST['facebook']);
    $discord = temizle($_POST['discord']);
    $spotify = temizle($_POST['spotify']);
    $github = temizle($_POST['github']);
    $whatsapp = temizle($_POST['whatsapp']);
    $papara = temizle($_POST['papara']);

    if(!is_numeric($instagram) && !is_numeric($facebook) && !is_numeric($discord)) {
        $gonder = $db->prepare("UPDATE social SET instagram = ?, facebook = ?, discord = ?, spotify = ?, papara = ?, whatsapp = ?, github = ? WHERE id = 8");
        $sonuc = $gonder->execute([$instagram, $facebook, $discord, $spotify, $papara, $whatsapp, $github]);
        if($sonuc) {
            header("Location: /admin/");
        }
    }
}


// Yeni Firma Ekleme
if(post("newFirma")) {
    $url = temizle($_POST['firmaURL']);
    $name = temizle($_POST['firmaName']);
    $desc = temizle($_POST['firmaDesc']);

    if(!is_numeric($url) && !is_numeric($name) && !is_numeric($desc)) {
        $sql = $db->prepare("INSERT INTO firma (firmaurl, firmaname, firmadesc) VALUES (?,?,?)");
        $sql->execute([
                $url,
            $name,
            $desc
        ]);
    }
    header("Location: /admin/");
}

// Firma Güncelleme İşlemi
if(post("firmaUpdate")) {
    $id = $_POST['id'];
    $url = temizle($_POST['firmaURL']);
    $name = temizle($_POST['firmaName']);
    $desc = temizle($_POST['firmaDesc']);

    if(!is_numeric($url) && !is_numeric($name) && !is_numeric($desc)) {
        $sql = $db->prepare("UPDATE firma SET firmaName = ?, firmaURL = ?, firmaDesc = ? WHERE id = ?");
        $sql->execute([
            $name,
            $url,
            $desc,
            $id
        ]);
    }

}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <title>Yönetim Paneli</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink">
    <link rel="stylesheet" href="../assets/css/dash.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <style>
        body { background: #222 }
        .input { background: #1b1b1b;
            outline: none;
            transition: 0.5s;
            border: 1px solid gray;
            border-radius: 10px;
            min-height: 50px;
            padding: 10px;
        }
        .input:focus { background: #2b2b2b; outline: none; }
        hr { background: gray}
    </style>

</head>
<body>
<?php
$ara = $db->query("SELECT * FROM adminaccount");
if(!$ara->rowCount() > 0):
?>

<div class="container text-white text-center">
    <div class="row mb-5">
        <div class="col-sm mt-5 text-center">
            <h1 class="display-4">Admin Hesabı Oluştur</h1>
        </div>

    </div>

    <div class="row mt-5 text-white text-center">
        <div class="col-sm mt-5">
            <form action="" method="POST">
                <input type="hidden" name="hesap_olustur" value="1">
                <input type="hidden" name="token" value="<?php echo $_SESSION['token']?>">
                <div class="form-group">
                    <label>Kullanıcı Adı</label>
                    <input type="text" name="username" required autocomplete="off" class="form-control w-25 input m-auto text-white text-center">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Şifre</label>
                    <input type="password" name="password" required autocomplete="off" class="form-control w-25 input m-auto text-white text-center">
                </div>
                <button type="submit" class="btn btn-dark">Kayıt Et</button>
            </form>
        </div>
    </div>
</div>

<style>
    .input { background: #1b1b1b; outline: none; border: 1px solid gray}
    .input:focus { background: #2b2b2b; outline: none }
</style>

<?php else:?>

<?php if(!isset($_SESSION['user_id'])):?>
<?php require "login.php";?>
<?php else: ?>
       <div class="container-fluid mt-5 text-white text-center">
           <div class="area">
               <div class="row mt-5">
                   <div class="col-6 mt-5">
                       <h1 class="display-4">Admin Panel</h1>
                   </div>
                   <div class="col-6">
                       <img src="https://resimkutuphanesi.play.tc/library/vipplus.png">
                   </div>
               </div>
               <hr>
   <?php if($_GET['sayfa'] == 'index'):?>

               <div class="row mt-5">
                   <div class="col-sm m-auto">
                       <h2><span class="badge badge-pill dark shadow">Panel Hakkında</span></h2>
                   </div>
               </div>

               <div class="row mt-5">
                   <div class="col-sm-6">
                       <img src="https://resimkutuphanesi.play.tc/library/kit14.png">
                       <h3><span class="badge badge-pill mt-4 badge-light">Burasıda Neresi?</span></h3>
                       <p class="lead">Merhaba, burası kendi özel siteni
                           kişiselleştirebileceğin bir admin (yönetim) panelidir.
                           üstteki alttaki menüden istediğin ayarı değiştirebilirsin
                       </p>
                   </div>
                   <div class="col-sm-6">
                       <img src="https://resimkutuphanesi.play.tc/library/key1.png">
                       <h3><span class="badge badge-pill mt-4 badge-light">Neler yapabilirim?</span></h3>
                       <p class="lead">Blog yazısı ekleyebilirsin, silebilirsin, düzenleyebilirsin..
                           "Hakkımda" yazılarını düzenleyebilirsin. Kendi seviyelerine ait bilgileri ekleyebilirsin..
                       </p>
                   </div>
               </div>
               <hr>

               <ul class="nav justify-content-center mb-3 m-auto" id="pills-tab" role="tablist">
                   <li class="nav-item" role="presentation">
                       <a class="nav-link" id="pills-hakkimda-tab" data-toggle="pill" href="#pills-hakkimda" role="tab" aria-controls="pills-hakkimda" aria-selected="false">Hakkımda</a>
                   </li>
                   <li class="nav-item" role="presentation">
                       <a class="nav-link" id="pills-firma-tab" data-toggle="pill" href="#pills-firma" role="tab" aria-controls="pills-firma" aria-selected="false">Firma</a>
                   </li>
                   <li class="nav-item" role="presentation">
                       <a class="nav-link" id="pills-blogs-tab" data-toggle="pill" href="#pills-blogs" role="tab" aria-controls="pills-blogs" aria-selected="false">Bloglar</a>
                   </li>
                   <li class="nav-item" role="presentation">
                       <a class="nav-link" id="pills-newblog-tab" data-toggle="pill" href="#pills-newblog" role="tab" aria-controls="pills-newblog" aria-selected="false">Yeni Blog</a>
                   </li>
                   <li class="nav-item" role="presentation">
                       <a class="nav-link" id="pills-seviye-tab" data-toggle="pill" href="#pills-seviye" role="tab" aria-controls="pills-seviye" aria-selected="false">Seviye</a>
                   </li>
                   <li class="nav-item" role="presentation">
                       <a class="nav-link" id="pills-sosyal-tab" data-toggle="pill" href="#pills-sosyal" role="tab" aria-controls="pills-sosyal" aria-selected="false">Sosyal Medya</a>
                   </li>
               </ul>

               <div class="tab-content" id="pills-tabContent">
                   <div class="tab-pane fade show active" id="pills-hakkimda" role="tabpanel" aria-labelledby="pills-hakkimda-tab"><?php require "layouts/hakkimda.php" ?></div>
                   <div class="tab-pane fade" id="pills-firma" role="tabpanel" aria-labelledby="pills-firma-tab"><?php require "layouts/firma.php"?></div>
                   <div class="tab-pane fade" id="pills-blogs" role="tabpanel" aria-labelledby="pills-blogs-tab"><?php require "layouts/blogs.php"?></div>
                   <div class="tab-pane fade" id="pills-newblog" role="tabpanel" aria-labelledby="pills-newblog-tab"><?php require "layouts/new_blog.php"?></div>
                   <div class="tab-pane fade" id="pills-seviye" role="tabpanel" aria-labelledby="pills-seviye-tab"><?php require "layouts/seviye.php"?></div>
                   <div class="tab-pane fade" id="pills-sosyal" role="tabpanel" aria-labelledby="pills-sosyal-tab"><?php require "layouts/sosyal.php"?></div>
               </div>
           </div>
       </div>
       </div>
   <?php elseif($_GET['sayfa'] == 'duzenle'):?>
   <?php

        $id = $_GET['id'];
        $arat3 = $db->prepare("SELECT * FROM blogs WHERE id = ?");
        $arat3->execute([$id]);
        $sonuc = $arat3->fetch();

        if(!$arat3->rowCount() > 0):
            die("böyle bir blog yazısı yok."); ?>
        <?php else:?>
            <div class="container">
                <div class="row">
                    <div class="col">

                        <div class="row mt-5">
                            <div class="col-sm-6">
                                <h1 class="font-weight-normal mb-5">Yazı Düzenle</h1>
                            </div>
                            <div class="col-sm-6">
                                <h1><span class="badge badge-secondary">#<?=$sonuc['id']?></span></h1>
                            </div>
                        </div>
                    <form action="/admin/" method="POST">
                        <input type="hidden" name="edit" value="1">
                        <input type="hidden" name="id" value="<?=$sonuc['id']?>">
                        <input type="hidden" name="token" value="<?=$_SESSION['token']?>">
                        <div class="row mt-5">
                            <div class="col-4">
                                <h3 class="text-right">Başlık:</h3>
                            </div>
                            <div class="col-8">
                                <input type="text" class="input input-group text-white text-center w-50" name="title" value="<?=$sonuc['title']?>">
                            </div>
                        </div>
                       <div class="row mt-5">
                        <div class="col-4">
                            <h3 class="text-right">İçerik:</h3>
                        </div>
                        <div class="col-8">
                            <textarea class="input input-group text-white text-center w-50" name="content" style="overflow: hidden"><?=$sonuc['content']?></textarea>
                        </div>
                       </div>


                        <div class="row mt-5 mb-5">
                            <div class="col-sm">
                                <a href=""> <button type="submit" class="btn btn-dark">Kaydet</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        <?php endif;?>

<?php elseif($_GET['sayfa'] == "firmasil"):

            $id = $_GET['id'];
             $query = $db->query("SELECT * FROM firma WHERE id = '$id'");
             $firma = $query->fetch();
                if(!$query->rowCount() > 0):
                die("Böyle bir firma eklememişsiniz.");
                else:
            ?>
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <div class="alert alert-warning w-50 m-auto" role="alert">
                        <h3 class="display-4"><i class="fas fa-exclamation-triangle"></i> Dikkat!</h3>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-sm">
                    <h3 class="m-auto font-weight-lighter"><?=$firma['firmaName']?></h3>
                    adlı firmayı siliyorsun...
                </div>
            </div>
        </div>


        <div class="row mt-5">
            <div class="col-sm">
                <h2>Silmek istediğinize emin misiniz?</h2>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-sm-6 text-center m-auto">
                <a href="/admin/firma/silindi/<?=$firma['id']?>" class="btn btn-lg btn-danger text-right">Sil</a>
            </div>
            <div class="col-sm-6">
                <a href="/admin" class="btn btn-lg btn-info">Hayır</a>
            </div>
        </div>
        <?php endif;?>
        <?php elseif($_GET['sayfa'] == "firmasilindi"):

                $id = $_GET['id'];
        $query = $db->query("DELETE FROM firma WHERE id = '$id'");
       header("Location: /admin/");

        ?>


        <?php elseif ($_GET['sayfa'] == 'seviye_silindi'):

            $id = $_GET['id'];
            $query = $db->query("DELETE FROM myskills WHERE id = '$id'");
            if($query) {
                echo "Başarıyla silindi. " . "yönlendiriliyorsunuz.";
                header("Location: /admin/");
            }?>

                <?php elseif($_GET['sayfa'] == 'seviye_sil'):
                    $id = $_GET['id'];
            $query = $db->query("SELECT * FROM myskills WHERE id = '$id'");
            $seviye = $query->fetch();

            if(!$query->rowCount() > 0):
                die("Böyle bir seviye yok.");
                else:
                ?>

            <div class="container">
                <div class="row">
                    <div class="col-sm">
                        <div class="alert alert-warning w-50 m-auto" role="alert">
                            <h3 class="display-4"><i class="fas fa-exclamation-triangle"></i> Dikkat!</h3>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-sm">
                <h3 class="m-auto font-weight-lighter"><?=$seviye['skillName']?></h3>
                adlı seviyeyi siliyorsun...
            </div>
        </div>
    </div>


        <div class="row mt-5">
            <div class="col-sm">
                <h2>Silmek istediğinize emin misiniz?</h2>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-sm-6 text-center m-auto">
                <a href="/admin/seviye/silindi/<?=$seviye['id']?>" class="btn btn-lg btn-danger text-right">Sil</a>
            </div>
            <div class="col-sm-6">
                <a href="/admin" class="btn btn-lg btn-info">Hayır</a>
            </div>
        </div>
        <?php endif;?>
       <?php elseif($_GET['sayfa'] == 'silindi'):
           $id = $_GET['id'];
               $query = $db->query("DELETE FROM blogs WHERE id = '$id'");
               if($query) {
                   echo "Başarıyla silindi!" . " yönlendiriliyorsunuz.";
                   header("Location: /admin/");
               }
       ?>


       <?php elseif($_GET['sayfa'] == 'sil'):


        $id = $_GET['id'];
        $arat3 = $db->prepare("SELECT * FROM blogs WHERE id = ?");
        $arat3->execute([$id]);
        $sonuc = $arat3->fetch();

       if(!$arat3->rowCount() > 0):
           die("böyle bir blog yazısı yok.");?>
       <?php else:?>
    <div class="container">


        <div class="row">
            <div class="col-sm">
                <div class="alert alert-warning w-50 m-auto" role="alert">
                    <h3 class="display-4"><i class="fas fa-exclamation-triangle"></i> Dikkat!</h3>
                </div>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-sm mt-3">
                <h3 class="m-auto font-weight-lighter"><?=$sonuc['title']?></h3>
                adlı yazıyı siliyorsun...
            </div>
        </div>


        <div class="row mt-5">
            <div class="col-sm">
                <h2>Silmek istediğinize emin misiniz?</h2>
            </div>
        </div>

       <div class="row mt-3">
           <div class="col-sm-6 text-center m-auto">
               <a href="/admin/silindi/<?=$sonuc['id']?>" class="btn btn-lg btn-danger text-right">Sil</a>
           </div>
           <div class="col-sm-6">
               <a href="/admin" class="btn btn-lg btn-info">Hayır</a>
           </div>
       </div>

    </div>
       <?php endif;?>
   <?php endif;?>
<?php endif;?>
<?php endif;?>
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
</body>
</html>
