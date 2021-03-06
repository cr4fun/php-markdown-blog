<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $site['name']?></title>
    <link type="text/css" rel="styleSheet"  href="/markdown/md.css" />
    <link type="text/css" rel="styleSheet"  href="/themes/<?php echo $theme_css;?>.css" />
</head>
<body>
<?php echo $header_content; ?>
<?php echo $body_content; ?>
<footer>
    <p><?php echo $site['name'];?> 自豪地采用 <a href="https://github.com/cr4fun/php-markdown-blog">php-markdown-blog</a> 创建</p>
    <p>友情链接：
        <?php
            foreach($links as $link){
                ?>
                <a href="<?php echo $link['url'] ?>" target="_blank"><?php echo $link['name'] ?></a>
                <?php
            }
        ?>
    </p>
</footer>
</body>
</html>