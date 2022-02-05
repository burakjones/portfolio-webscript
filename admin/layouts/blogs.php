<div class="container mt-5">


    <div class="row">
        <div class="col-sm-4">
            <p class="display-4 text-left">Blog yazıları</p>
        </div>
    </div>

    <div class="row mt-5">
        <table class="table mb-5 mt-3 table-borderless text-white text-center">
            <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Başlık</th>
                <th scope="col">Yazı</th>
                <th scope="col">Tarih</th>
                <th scope="col">İşlem</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($arat2 as $readBlog): ?>
                <input type="hidden" name="token" value="<?=$_SESSION['token']?>">
            <tr>
                <th scope="row"><?=$readBlog['id']?></th>
                <td><?=$readBlog['title']?></td>
                <td><?php echo kisalt($readBlog['content'], 50)?></td>
                <td><?=$readBlog['writeDate']?></td>
                <td><a href="/admin/sil/<?=$readBlog['id']?>" class="btn btn-danger">Sil</a></td>
                <td><a href="/admin/duzenle/<?=$readBlog['id']?>" class="btn btn-light">Düzenle</a></td>
            </tr>       
            <?php endforeach;?>
            </tbody>
        </table>
    </div>

</div>