<!doctype html>
<?php 
//INCLUDE File for use class and new instance;
include_once(app_path() . '/frontend/header.php');
include_once(app_path() . '/frontend/menu.php');
include_once(app_path() . '/frontend/media.php');
include_once(app_path() . '/frontend/custom.php');
include_once(app_path() . '/frontend/blog.php');

//NEW Instance class for use;
$header = new header();
$menu = new menu();
$media = new media();
$custom = new custom();
$blog = new blog();
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
        <?php  $menu->navbar("");
               $media->slide();
               $slideshow = DB::table('slideshow')->get();

               foreach ($slideshow as $slide) {
               //echo $slide->url;
                }
        ?>
        <?php $blog->blogOn("cid23","0","on");?>
                 <div class="col-sm-12">
                <hr><h1 class="display-4" style="color:#3399FF;">พร้อมให้บริการ ทำงานเป็นทีม ยิ้มแย้มแจ่มใส <b>ใส่ใจคุณภาพ</b> </h1> <hr>
                 </div>
        <?php $blog->blogOff();?>
    
        <?php $blog->blogOn("cid-qHHI4vdCrx","0.7","on");

        $newsUpdate = DB::table('news')->orderBy('year','desc')->where('cat','!=', 47)->limit(10)->get();
        $newsActivity = DB::table('news')->orderBy('year','desc')->where('cat',47)->limit(10)->get();
        ?>
            <div class="col-sm-5"  id="todolist">
                    <hr>
                    <h2 class="display-5" style="color:#0066FF;">ข่าวใหม่</h2><hr>
                <div class="card">
                    
                    <div class="row">
                           <?php  foreach ($newsUpdate as $newsOut) {
                                $link="";
                                if($newsOut->url !=""){$link =$newsOut->url;}
                                else {$link= "http://www.does.up.ac.th/upload/".$newsOut->file;}
                                echo '<div class="col-sm-2"><img src="./assets/images/Picture2.png" style="height:60px; width:60px;" alt=""></div>';
                                echo '<div class="col-sm-10"><a href="'.$link.'" class="display-7">'.$newsOut->title_th.'</a></div>';
                                echo "<br>";
                              }

                            ?>
                    </div>
                </div>
                <br>
                <center><a href="<?php echo url("news"); ?>" class="btn btn-success display-7" style="height:5%;background-color:#6600FF; border-color:transparent; color:white;">ดูทั้งหมด</a></center>
            </div>
            <?php $blog->nullBlog('2'); ?>
            <div class="col-sm-5" id="todolist">
                    <hr>
                        <h2 class="display-5" style="color:#0066FF;">ข่าวกิจกรรม</h2><hr>
                    <div class="card">
                     
                        <div class="row">
                                <?php  foreach ($newsActivity as $newsOut) {
                                    $link="";
                                    if($newsOut->url !=""){$link =$newsOut->url;}
                                    else {$link= "http://www.does.up.ac.th/upload/".$newsOut->file;}
                                    echo '<div class="col-sm-2"><img src="./assets/images/Picture2.png" style="height:60px; width:60px;" alt=""></div>';
                                    echo '<div class="col-sm-10"><a href="'.$link.'" class="display-7">'.$newsOut->title_th.'</a></div>';
                                    echo "<br>";
                                  }
    
                                ?>
                        
                        </div> 
                     
                    </div>
                    <br>
                    <center><a href="<?php echo url("news"); ?> " class="btn btn-success display-7" style="height:5%;background-color:#6600FF; border-color:transparent; color:white;">ดูทั้งหมด</a></center>
            </div> 
        <?php $blog->blogOff();?>
    <?php 
    
    $gallery = DB::table('gallery_pic')->orderBy('create_date','desc')->limit(12)->get();
    $i=0; $pic="";
      foreach ($gallery as $gallerys) {
        $pic[$i] = 'http://www.does.up.ac.th/v3/Gallery/Picture/'.$gallerys->img; $i++;
    }
       $media->gallery($pic);
       $menu->footer();
       $header->getScript();
    ?>
 

 <!--   <form action="/does/public/insert" method="post">
 {{ csrf_field() }}
            <input name="username" type="text" >
            <br><br>
           
            <input name="submit" type="submit" value="send">
             
            </form> -->

    </body>
</html>
