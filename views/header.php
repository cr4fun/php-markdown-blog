<div class="main">
    <div class="navs">
    <?php
    foreach($pages as $page){
    ?>
        <a class="nav" href="<?php echo $page['link'];?>"><?php echo $page['title'];?></a>
    <?php
    }
    ?>
    </div>
</div>
