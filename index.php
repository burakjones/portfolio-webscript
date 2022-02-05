<?php require "admin/settings.php";?>
<?php $veri = $db->query("SELECT * FROM blogs")?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink">
    <!-- Favicon değiştirebilirsiniz.-->
    <link rel="icon" type="image/x-icon" href="https://img.icons8.com/clouds/150/000000/puzzle.png">
    <!-- CSS-->
    <link rel="stylesheet"  href="assets/css/normal.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <title><?=$hakkimdaVeri['hakkimda_isim']?> - Kişisel Website'm</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
	<style>
        body { background: #121212};
    </style>
</head>
<body>
<div class="container .d-flex">
    <div class="row mt-5 mb-5">
        <div class="area">
            <ul class="nav justify-content-center mb-3 m-auto" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-hakkimda-tab" data-toggle="pill" href="#pills-hakkimda" role="tab" aria-controls="pills-hakkimda" aria-selected="true">Hakkımda</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-blog-tab" data-toggle="pill" href="#pills-blog" role="tab" aria-controls="pills-blog" aria-selected="false">Blog</a>
                </li>
            </ul>

            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-hakkimda" role="tabpanel" aria-labelledby="pills-hakkimda-tab"><?php require "layouts/profil.php";?></div>
                <div class="tab-pane fade" id="pills-blog" role="tabpanel" aria-labelledby="pills-blog-tab"><?php require "layouts/blog.php";?></div>
            </div>

        </div>
    </div>
</div>

<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

    $(document).ready(function(){
        // Add smooth scrolling to all links
        $("a").on('click', function(event) {

            // Make sure this.hash has a value before overriding default behavior
            if (this.hash !== "") {
                // Prevent default anchor click behavior
                event.preventDefault();

                // Store hash
                var hash = this.hash;

                // Using jQuery's animate() method to add smooth page scroll
                // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 200, function(){

                    // Add hash (#) to URL when done scrolling (default click behavior)
                    window.location.hash = hash;
                });
            } // End if
        });
    });
</script>
</body>
</html>