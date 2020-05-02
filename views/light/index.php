<div class="main">
<?php
    foreach($posts as $post){
        ?>
        <div class="post_item">
            <a class="flex full" href="<?php echo $post['link'];?>">
                <span><?php echo $post['title'];?></span>
                <span><?php echo $post['posttime'];?></span>
            </a>
        </div>
        <?php
    }
?>
</div>