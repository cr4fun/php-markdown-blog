<?php
require __DIR__ . '/../vendor/autoload.php';
use flight\Engine;
require __DIR__ . '/../lib/spyc.php';
$app = new Engine();

Flight::set('flight.views.path', '../views');

function getlinks($dir){
    $files = array();
    $links = array();
    if ($handle = opendir($dir)) {
        while (($file = readdir($handle)) !== false) {
            // //去除特殊目录
            // if ($file != "." && $file != "..") {
            //     //判断子目录是否还存在子目录
            //     if (is_dir($dir . "/" . $file)) {
            //         //递归调用本函数，再次获取目录
            //         $files[$file] = my_scandir($dir . "/" . $file);
            //     } else {
            //         //获取目录数组
            //         $files[] = $dir . "/" . $file;
            //     }
            // }
            if ($file != "." && $file != "..") {
                $files[] = "$dir/$file";
            }
        }
        //关闭文件夹
        closedir($handle);
    }
    foreach ($files as $file){
        $title = gettitle($file);
        $title = str_replace("# ","",$title);
        $link = str_replace("$dir","",$file);
        $link = str_replace(".md","",$link);
        $links[] = array('title'=>$title,'link'=>$link);
    }
    return $links;
}

//从markdown文件里获得标题
function gettitle($file){
    $f= fopen($file,"r");
    $title = fgets($f);
    fclose($f);
    $title = str_replace("# ","",$title);
    return $title;
}

function getpages(){
    $pages = getlinks('../pages');
    $pages[] = array('title'=>'首页','link'=> '/');
    return $pages;
}
function getposts(){
    $posts_new = array();
    $posts = getlinks('../posts');
    foreach($posts as $post){
        $title = $post['title'];
        $link = $post['link'];
        $line_2_arr_str = str_replace("/","",$link);
        $arr = explode("-", $line_2_arr_str);
        $posttime = "$arr[0]-$arr[1]-$arr[2]";
        $link = str_replace("-","/",$link);
        $posts_new[] = array('title'=>$title,'link'=>$link,'posttime'=>$posttime);
    }

    return array_reverse($posts_new);
}

function getconfig(){
    return spyc_load_file('../conf.yaml');
}

$app->route('GET /', function(){
    $pages = getpages();
    $posts = getposts();
    $conf = getconfig();
    $site_name = $conf["site_name"];
    $author = $conf["author"];
    $face = $conf["face"];
    $theme_css = $conf["theme"];
    $md_css = $conf["markdown"];
    $links = $conf["friendlinks"];
    Flight::render('header', array(
        'pages' => $pages,
    ), 'header_content');
    Flight::render('index', array(
        'site_name'=>$site_name,
        'face' => $face,
        'pages'=>$pages,
        'posts'=>$posts
    ), 'body_content');
    Flight::render('layout', array(
        'site_name' => $site_name,
        'title' => $site_name,
        'theme_css' => $theme_css,
        'md_css'=> $md_css,
        'links'=> $links
    ));
});

$app->route('GET /@n', function($n){
    $conf = getconfig();
    $pages = getpages();
    $site_name = $conf["site_name"];
    $theme_css = $conf["theme"];
    $md_css = $conf["markdown"];
    $links = $conf["friendlinks"];
    $markdownfile = "../pages/$n.md";
    if(file_exists($markdownfile)){
        $Parsedown = new Parsedown();
        $markdown_code = file_get_contents($markdownfile);
        $html_code = $Parsedown->text($markdown_code);
        $title = gettitle($markdownfile);
        
        Flight::render('header', array(
            'pages' => $pages,
        ), 'header_content');
        Flight::render('page', array(
            'html' => $html_code,
        ), 'body_content');
        Flight::render('layout', array(
            'site_name' => $site_name,
            'title' => $title,
            'theme_css' => $theme_css,
            'md_css'=> $md_css,
            'links'=> $links
        ));
    }else{
        Flight::render('404');
    }
});

$app->route('GET /@y/@m/@d/@n', function($y,$m,$d,$n){
    $conf = getconfig();
    $site_name = $conf["site_name"];
    $pages = getpages();
    $theme_css = $conf["theme"];
    $md_css = $conf["markdown"];
    $author = $conf["author"];
    $links = $conf["friendlinks"];
    $markdownfile = "../posts/$y-$m-$d-$n.md";
    if(file_exists($markdownfile)){
        $Parsedown = new Parsedown();
        $markdown_code = file_get_contents($markdownfile);
        $title = gettitle($markdownfile);
        $markdown_code = str_replace("# $title","",$markdown_code);
        $html_code = $Parsedown->text($markdown_code);
        Flight::render('header', array(
            'pages' => $pages,
        ), 'header_content');
        Flight::render('post', array(
            'title' => $title,
            'posttime' => "$y-$m-$d",
            'author' => $author,
            'html' => $html_code,
        ), 'body_content');
        Flight::render('layout', array(
            'site_name' => $site_name,
            'title' => $title,
            'theme_css' => $theme_css,
            'md_css'=> $md_css,
            'links'=> $links
        ));
    }else{
        Flight::render('404');
    }
});

$app->map('notFound', function(){
    Flight::render('404');
});

$app->start();
?>
