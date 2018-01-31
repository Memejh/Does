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
 
           
           <?php $blog->blogOnC("tabs2 cid-qHJ9gv4gsu","tabs2-r","0","0,0,0");?>
      <br><br>
           <div class="container">
                <div class="row">
                        <div class="col-md-12">
                            <ul class="nav nav-tabs" role="tablist"> 
                                <?php 
                                $blog->tabsPanel("สหกิจศึกษา/ แบบฟอร์มสำหรับสหกิจศึกษา","tabs2-r_tab0");
                                $blog->tabsPanel("แบบฟอร์ม คณาจารย์ / งานพัฒนาหลักสูตร","tabs2-r_tab1");
                                $blog->tabsPanel("แบบฟอร์ม คณาจารย์ / งานทะเบียนนิสิตและประมวลผล","tabs2-r_tab2");
                                $blog->tabsPanel("แบบฟอร์ม คณาจารย์ / งานวิเทศสัมพันธ์","tabs2-r_tab3");
                                $blog->tabsPanel("แบบฟอร์ม คณาจารย์ / งานสนับสนุนวิชาการ UP-DOES","tabs2-r_tab4");
                                $blog->tabsPanel("ปฏิทินการศึกษา","tabs2-r_tab5");
                        
                                ?>
                            </ul></div>
                            <div class="col-md-12">
                        <div class="tab-content">
                            <?php 
                            $blog->tabsPaneOn("tab1","in active");
                            $t= $db->getYears("news","year");
                            $blog->divOn("timeline","margin-left:10%;");
                           for($i=0;$i<count($t);$i++){
                              // $blog->h('2',$t[$i],'');
                               $news = DB::table('news')->where('cat', 64)->where('year', $t[$i])->orderBy('year','desc')->get();
                               $blog->ul('');
                               foreach ($news as $newsOut) {
                                 $link="";
                                 if($newsOut->url !=""){$link =$newsOut->url;}
                                 else {$link= "http://www.does.up.ac.th/upload/".$newsOut->file;}
                                 $blog->timeLine('',$newsOut->title_th,$db->convertDate($newsOut->create_date),$link,"text-align:left; font-size:12px!important;");
                               }
                               $blog->eul('');
                           }
                            $blog->divOff();
                            $blog->tabsPaneOff();
                        ?>    
                    
                        <?php 
                            $blog->tabsPaneOn("tab2","");
                            $t= $db->getYears("news","year");
                            $blog->divOn("timeline","margin-left:10%;");
                           for($i=0;$i<count($t);$i++){
                               //$blog->h('2',$t[$i],'');
                               $news = DB::table('news')->where('cat', 63)->where('year', $t[$i])->orderBy('year','desc')->get();
                               $blog->ul('');
                               foreach ($news as $newsOut) {
                                 $link="";
                                 if($newsOut->url !=""){$link =$newsOut->url;}
                                 else {$link= "http://www.does.up.ac.th/upload/".$newsOut->file;}
                                 $blog->timeLine('',$newsOut->title_th,$db->convertDate($newsOut->create_date),$link,"text-align:left; font-size:12px!important;");
                               }
                               $blog->eul('');
                           }
                            $blog->divOff();
                            $blog->tabsPaneOff();
                        ?>

                        <?php 
                        $blog->tabsPaneOn("tab3","");
                        $t= $db->getYears("news","year");
                        $blog->divOn("timeline","margin-left:10%;");
                       for($i=0;$i<count($t);$i++){
                          // $blog->h('2',$t[$i],'');
                           $news = DB::table('news')->where('cat', 50)->where('year', $t[$i])->orderBy('year','desc')->get();
                           $blog->ul('');
                           foreach ($news as $newsOut) {
                             $link="";
                             if($newsOut->url !=""){$link =$newsOut->url;}
                             else {$link= "http://www.does.up.ac.th/upload/".$newsOut->file;}
                             $blog->timeLine('',$newsOut->title_th,$db->convertDate($newsOut->create_date),$link,"text-align:left; font-size:12px!important;");
                           }
                           $blog->eul('');
                       }
                        $blog->divOff();
                       $blog->tabsPaneOff();
                        ?>

                        <?php 
                        $blog->tabsPaneOn("tab4","");
                        $t= $db->getYears("news","year");
                        $blog->divOn("timeline","margin-left:10%;");
                       for($i=0;$i<count($t);$i++){
                          // $blog->h('2',$t[$i],'');
                           $news = DB::table('news')->where('cat', 49)->where('year', $t[$i])->orderBy('year','desc')->get();
                           $blog->ul('');
                           foreach ($news as $newsOut) {
                             $link="";
                             if($newsOut->url !=""){$link =$newsOut->url;}
                             else {$link= "http://www.does.up.ac.th/upload/".$newsOut->file;}
                             $blog->timeLine('',$newsOut->title_th,$db->convertDate($newsOut->create_date),$link,"text-align:left; font-size:12px!important;");
                           }
                           $blog->eul('');
                       }
                        $blog->divOff();
                      $blog->tabsPaneOff();
                        ?>

                        <?php 
                        $blog->tabsPaneOn("tab5","");
                        $t= $db->getYears("news","year");
                        $blog->divOn("timeline","margin-left:10%;");
                       for($i=0;$i<count($t);$i++){
                          // $blog->h('2',$t[$i],'');
                           $news = DB::table('news')->where('cat', 48)->where('year', $t[$i])->orderBy('year','desc')->get();
                           $blog->ul('');
                           foreach ($news as $newsOut) {
                             $link="";
                             if($newsOut->url !=""){$link =$newsOut->url;}
                             else {$link= "http://www.does.up.ac.th/upload/".$newsOut->file;}
                             $blog->timeLine('',$newsOut->title_th,$db->convertDate($newsOut->create_date),$link,"text-align:left; font-size:12px!important;");
                           }
                           $blog->eul('');
                       }
                        $blog->divOff();
                       $blog->tabsPaneOff();
                        ?>

                        <?php 
                        $blog->tabsPaneOn("tab6","");
                        echo '<center><a href="http://www.reg.up.ac.th" class="btn btn-success">www.reg.up.ac.th</a></center>';
                        $blog->divOff();
                       $blog->tabsPaneOff();
                        ?>

                        </div>
                    </div>
                </div>
            </div>
           <?php $blog->blogOffC();?>

           <?php 
           $menu->footer();
           $header->getScript();
        ?>
    </body>
    </html>

    <?php 
        function tab1(){

        }
      ?>