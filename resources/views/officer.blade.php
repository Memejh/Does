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
        <style>
            .pagination{
              padding: 30px 0;
            }

            .pagination ul{
              padding:0;
              background-color:white;
              list-style-type: none;
              margin: auto;
              top: 0;
              right: 0;
              bottom: 0;
              left: 0;
            }

            .pagination li{
              display: inline-block;
              padding: 10px 18px;
              color: #222;
            }
            .pagination li.active{
              display: inline-block;
              padding: 10px 18px;
              background-color:#42bcf4;
              color:white;
            }

            .pagination li.hover{
              background-color:#b1e3f9;
            }

        </style>

        <?php $blog->blogOnC("tabs2 cid-qHJ9gv4gsu", "tabs2-r", "0", "0,0,0"); ?>
        <br><br>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-tabs" role="tablist">
                        <?php
                        $num =60;

                        if(isset($_GET['tid'])){
                            $num = $_GET['tid'];
                        }
                        ?>
                      <?php
                      $news = DB::table('news_cat')->orderby('order')->orderby('last_date')->get();
                     foreach($news as $new)
                     {
                          if ($new->type_news_cat == 4){
                            tabsPanels($new->name_th,$new->id,$num);
                          }else{
                            continue;
                      }
                   }
                      ?>

                      <?php
                        // tabsPanels(__("m"),42,$num);
                        // tabsPanels(__("n"), 41,$num);
                        // tabsPanels(__("o"), 35,$num);
                        // tabsPanels(__("p"), 422,$num);
                        // tabsPanels(__("q"), 37,$num);
                        // tabsPanels(__("r"), 38,$num);
                        // tabsPanels(__("s"), 47,$num);
                        ?>

                    </ul></div>
                <div class="col-md-12">
                    <div class="tab-content">

                    <?php

                        $blog->tabsPaneOn("tab1", "in active");

                            $news1 = DB::table('news')->where('cat', $num)->orderBy('orders', 'asd')->orderBy('last_date_new', 'DESC')->paginate(10);

                            ?>
                            <div class="container-fluid" style="text-align:left!important; border-radius: 20px; box-shadow:0 3px 36px 0 rgba(0, 0, 0, 0.6); background-color:white; 	border: 5px solid #ffffff;">
                                <br><div class="row">
                                <?php
                            foreach ($news1 as $newsOut) {
                                try{
                                $link = "";
                                if ($newsOut->url != "") {
                                    $link = $newsOut->url;
                                } else {
                                    $link = "http://www.does.up.ac.th/upload/" . $newsOut->file;
                                }
                               echo '<div class="col-sm-1"><img src="./assets/images/Picture2.png" style="height:60px; width:65px;" alt=""></div>';
                               echo '<div class="col-sm-11"><a href="'.$link.'" class="display-7" style="text-align:left!important; font-size:16px;">'.$newsOut->title_th.'<br><span style="text-align:left!important; font-size:12px; color:#D3D3D3; ">'.$db->convertDate($newsOut->create_date_new).'</span></a></div>';

                               echo '<div class="col-sm-12"><hr></div>';
                          }catch(Exception $e){continue;}

                            }

                            ?>  </div>
                            <div class="pagination center-block">{!! str_replace('/?', '?',$news1->render()) !!}</div>
                        </div>
                        <?php

                        $blog->tabsPaneOff();
                        ?>

                    </div>
                </div>
            </div>
        </div>
<?php $blog->blogOffC(); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>

    $('div.pagination ul.pagination li').each(function(){
        var link =  $(this).find('a') ;
        link.attr("href", link.attr('href')+"&tid="+<?php echo $num;  ?>)

});


</script>
<?php
$menu->footer();
$header->getScript();
?>
    </body>
</html>

<?php
function tabsPanels($h1, $tabid,$num) {
    $active = '';
 if($tabid == $num){$active = "active";}
    echo '<li class="" ><a class="nav-link mbr-fonts-style display-7 '.$active.'" style=""  href="'.url('officer').'?tid='.$tabid.'" >
    ' . $h1 . '</a></li>';
}
?>
