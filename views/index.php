<div class="main">
<?php
    foreach($posts as $post){
        ?>
        <p>
            <a href="<?php echo $post['link'];?>"><?php echo $post['title'];?></a>
        </p>
        <?php
    }
?>
</div>