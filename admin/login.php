<div class="container text-white text-center">
    <div class="row mb-5">
        <div class="col-sm mt-5 text-center">
            <h1 class="display-4">Oturum Aç</h1>
        </div>

    </div>

    <div class="row mt-5 text-white text-center">
        <div class="col-sm mt-5">
            <form action="" method="POST">
                <input type="hidden" name="giris_yap" value="1">
                <input type="hidden" name="token" value="<?php echo $_SESSION['token']?>">
                <div class="form-group">
                    <label>Kullanıcı Adı</label>
                    <input type="text" name="username" required autocomplete="off" class="form-control w-25 input m-auto text-white text-center">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Şifre</label>
                    <input type="password" name="password" required autocomplete="off" class="form-control w-25 input m-auto text-white text-center">
                </div>
                <button type="submit" class="btn btn-dark">Giriş Yap</button>
            </form>
        </div>
    </div>
</div>

<style>
    .input { background: #1b1b1b; outline: none; border: 1px solid gray}
    .input:focus { background: #2b2b2b; outline: none }
</style>

