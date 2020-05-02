<div class="navbar">
    <div class="main flex">
        <div class="flex">
            <a class="flex" href="/">
            <img class="logo" src="<?php echo $site['logo'];?>" alt=""> <span class="site_name"><?php echo $site['name'];?></span>
            </a>
        </div>
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
</div>
