<?php


define("host", "hostadres");
define("dbname", "veritabanı_adı");
define("user", "kullanıcı_adı");
define("pass", "şifre");

try {
    $db = new PDO("mysql:host=" . host . ";dbname=" . dbname . ";charset=utf8", user, pass);
}catch(PDOException $e) {
    die($e->getMessage());
}
function temizle($str) {
    return htmlspecialchars($str);
}

function post($isim) {
    if(isset($_POST[$isim]))
        return $_POST[$isim];
}

$_SESSION['token'] = uniqid();

$arat1 = $db->query("SELECT * FROM hakkimda WHERE id = 1");
$hakkimdaVeri = $arat1->fetch();

$arat2 = $db->query("SELECT * FROM blogs");

$skillSearch = $db->query("SELECT * FROM myskills");
$socialSearch = $db->query("SELECT * FROM social");
$readSocial = $socialSearch->fetch();

$firmaSearch = $db->query("SELECT * FROM firma");




function kisalt($str, $limit = 10) {
    $karakterSayisi = strlen($str);
    if($karakterSayisi > $limit) {
        if(function_exists('mb_substr')){
            $str = mb_substr($str, 0, $limit, 'utf8') . '...';
        }else {
            $str = substr($str, 0, $limit) . '...';
        }
    }
    return $str;
}

?>