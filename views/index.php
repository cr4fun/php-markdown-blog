<div class="main">
<img src="<?php echo $face;?>" alt="">
<h1><?php echo $site_name;?></h1>
<?php
    foreach($posts as $post){
        ?>
        <p>
            <a href="<?php echo $post['link'];?>"><?php echo $post['title'];?> <?php echo $post['posttime'];?></a>
        </p>
        <?php
    }
?>
</div>