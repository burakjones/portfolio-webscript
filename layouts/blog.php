<div class="container text-white text-center">
    <div class="row mt-5">
        <hr>
        <?php foreach($veri as $site):?>
        <div class="col-sm mb-4">
            <div class="blog">
           <h2 class="mt-4 pl-3"><?=$site['title']?> <small class="text-muted" style="font-size: 20px">/ <?=$site['writeDate']?></small></h2>
            <div class="col-sm m-auto">
                <p class="lead mb-4">
                    <div class="blog-text mb-4 m-auto">
                    <?= $site['content']?>
                </div>
                    </p>
            </div>
        </div>
    </div>
       <?php endforeach;?>
</div>
</div>