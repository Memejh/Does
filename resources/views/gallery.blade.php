<!doctype html>
<?php 
//INCLUDE File for use class and new instance;
include_once(app_path() . '/frontend/header.php');
include_once(app_path() . '/frontend/menu.php');
include_once(app_path() . '/frontend/media.php');
include_once(app_path() . '/frontend/custom.php');
include_once(app_path() . '/frontend/blog.php');
include_once(app_path() . '/core_function/core.php');

//NEW Instance class for use;
$header = new header();
$menu = new menu();
$media = new media();
$custom = new custom();
$blog = new blog();
$db = new databaseGet();
?>

<html lang="{{ app()->getLocale() }}">
    <head>
      <?php
       $header->getHead(""); 
       $header->getCss();
       $custom->getCustom('custom_index');
      ?>
    </head>
    <body>
           <?php $menu->navbar("black"); ?>
           <?php 
           $gallery = DB::table('gallery_pic')->orderBy('create_date','desc')->limit(121)->get();
           $i=0; $pic="";
             foreach ($gallery as $gallerys) {
               $pic[$i] = 'http://www.does.up.ac.th/v3/Gallery/Picture/'.$gallerys->img; $i++;
           }
              $media->gallery($pic);
           $menu->footer();
           $header->getScript();
        ?>
    </body>
    </html>
 