<?php $__env->startSection('content'); ?>
<?php
use App\NewsData;
//INCLUDE File for use class and new instance;
include_once(app_path() . '../frontend/header.php');
include_once(app_path() . '../frontend/menu.php');
include_once(app_path() . '../frontend/media.php');
include_once(app_path() . '../frontend/custom.php');
include_once(app_path() . '../frontend/blog.php');
include_once(app_path() . '../core_function/core.php');
include_once(app_path() . '/backend/MediaManager.php');
include_once(app_path() . '/backend/Dialog.php');

//NEW Instance class for use;
$header = new header();
$menu = new menu();
$media = new media();
$custom = new custom();
$blog = new blog();
$db = new databaseGet();
$media_manage = new MediaManager();
$dialog = new Dialog();
?>
<?php
        $message = "0";
        $alid = "0";
        if(isset($_GET['mes'])){$message = $_GET['mes'];};
        if(isset($_GET['al'])){$alid = $_GET['al'];};
?>
<?php

      if(isset($_GET["ns"])){
        $ns = $_GET["ns"];
        $news= DB::table('news')->join('news_cat', 'news.cat', '=', 'news_cat.id')->where("cat",$_GET["ns"])->paginate(10);
        $newsName = DB::table('news_cat')->where("id",$_GET["ns"])->get();
        $name =  $newsName[0]->name_th;
      }
      else {

        $ns = 0; $name="หมวดหมู่ทั้งหมด";
}
      ?>
<div class="main-content">

    <h2><i class="far fa-list-alt"></i>  จัดการข่าวสาร
        <div class="btn-group pull-right">
            <a href="<?php echo e(action('NewsController@index')); ?>"><button type="button" class="btn btn-primary"><i class="fas fa-plus-square"></i> เพิ่มข่าวสาร</button></a>
        </div>
    </h2>
    <hr>
    <?php
    $news_cat = DB::table('news_cat')->get();
    ?>
    <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><?php echo $name; ?>
        <span class="caret"></span></button>
        <ul class="dropdown-menu">
            <?php
            echo '<li><a href="'.url("content").'">หมวดหมู่ทั้งหมด</a></li>';
            foreach($news_cat as $news_cats){
                echo '<li><a href="'.url("content").'?ns='.$news_cats->id.'">'.$news_cats->name_th.'</a></li>';
            }
          ?>
        </ul>
      </div>
<br>

<form action="<?php echo e(url('/content')); ?>" method="get">
<div class="input-group">
  <input type="text" name="keyword" class="form-control" placeholder="ค้นหา">
  <div class="input-group-btn">
        <input type="submit" value="ค้นหา" class="form-control" >
  </div>
</div>
</form>
    <table id="example" class="display table table-striped" cellspacing="0">
        <thead>
            <tr>
                <th>ลำดับ</th>
                <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('title_th','หัวข้อภาษาไทย'));?></th>
                <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('title_en','หัวข้อภาษาอังกฤษ'));?></th>
                <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('name_th','หมวดหมู่'));?></th>
                <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('type','ชนิด'));?></th>
                <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('last_user_new','ผู้ใช้ล่าสุด'));?></th>
                <th>แก้ไขล่าสุด</th>
                <th>แก้ไข</th>
                <th>ลบ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i=1;
            if(isset($_GET['page'])){
                if($_GET['page']>1){

                    $i = (10*$_GET['page'])-9;
                }
            }

            foreach ($news as $new) {
                //usleep(5000);
                $nid = $new->nid;
                $title_en = $new->title_en;
                $title_th = $new->title_th;
                $year = $new->year;
                $type = $new->type;
                $last_user = $new->last_user_new;
                $last_date = $new->last_date_new;

              echo '<tr>
                    <td>'. $i++ .' </td>
                    <td>'. $title_th .'</td>
                    <td>'. $title_en .' </td>
                    <td>'.$new->name_th .'</td>
                    <td>'. $db->convertTypeNews($new->type) .' </td>
                    <td>'. $last_user .' </td>
                    <td>'. $db->convertDate($last_date).'</td>
                    <td> <a href="'.action('NewsController@edit', $nid ) .' " class="btn btn-warning"><i class="far fa-edit"></i> แก้ไข</a></td>
                    <td><button class="btn btn-danger" data-toggle="modal" data-target="#delete"  data-id="'. $new->nid .'" data-name_th="'. $db->explode($new->title_th) .'"
                     data-name_en="'. $new->title_en .'" data-img="'. $new->img .'"><i class="fas fa-trash-alt"></i> ลบ</button>
                         </td>
                    </td>

            </tr>' ;
          } ?>
        </tbody>
    </table>
    <?php echo $news->appends(\Request::except('page'))->render(); ?>

</div>

<div class="modal fade" id="delete" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-center ">ต้องการลบข่าวสาร</h2>
            </div>
            <div class="modal-body text-center ">
                <div class="text-center" style="font-size:6em; ">
                    <i style="color:crimson;" class="fas fa-trash-alt faa-shake animated"></i>
                </div>
                <div class="form-group text-left">
                    <label for="name_th">หัวข้อภาษาไทย</label>
                    <input type="text" id="name_th"  class="form-control" disabled/>
                </div>
                <div class="form-group text-left">
                    <label for="name_en">หัวข้อภาษาอังกฤษ</label>
                    <input type="text" id="name_en"  class="form-control" disabled/>
                </div>

                <a id="delx" style="font-size:18px;" class="btn btn-success btn-lg" ><i class="fas fa-check-circle"></i> ตกลง</a>
                <button type="button" style="font-size:18px;" class="btn btn-warning btn-lg" data-dismiss="modal"><i class="fas fa-times-circle"></i> ยกเลิก</button>
                <hr>
            </div>
        </div>
    </div>

</div>
<?php
if($message!="0"){
    if($message == "errorDB"){
        $dialog->customMessageDefault("deleteMessage","เกิดข้อผิดพลาด","fas fa-exclamation-triangle","red","จากการลบข้อมูลในฐานข้อมูล",url('content'));
    }
    else if($message == "deleteError"){
        $dialog->customMessageDefault("deleteMessage","เกิดข้อผิดพลาด","fas fa-exclamation-triangle","red","จากการลบไฟล์ในโฮส",url('content'));
    }
    else if($message == "deleteOK"){
        $dialog->customMessageDefault("deleteMessage","ลบข้อมูลสำเร็จ","fas fa-check-circle","#66FF33","",url('content'));
    }
    else if($message == "fileUpdateOK"){
        $dialog->customMessageDefault("ui","อัพเดทข้อมูลสำเร็จ","fas fa-check-circle","#66FF33","",url('content'));
    }
    else if($message == "fileUpdateError"){
        $dialog->customMessageDefault("updateMessage","เกิดข้อผิดพลาด","fas fa-exclamation-triangle","red","จากการอัพเดทข้อมูลลงฐานข้อมูล",url('content'));
    }
    else if($message == "createNewsOK"){
        $dialog->customMessageDefault("createMessage","เพิ่มข่าวสารสำเร็จ","fas fa-check-circle","#66FF33","จากการอัพเดทข้อมูลลงฐานข้อมูล",url('content'));
    }
    else if($message == "createNewsError"){
        $dialog->customMessageDefault("createMessage","เกิดข้อผิดพลาดในการเพิ่มข่าวสาร","fa-exclamation-triangle","red","จากการอัพเดทข้อมูลลงฐานข้อมูล",url('content'));
    }
}
?>
<script>
    $('#delete').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var sent1 = button.data('name_th') // Extract info from data-* attributes
      var sent2 = button.data('id')
      var sent3 = button.data('name_en')
      var sent4 = button.data('img')
      var modal = $(this)
      var delink = "<?php echo action('NewsController@destroy'); ?>?nid="
      var deletew = document.getElementById('delx')
      deletew.href = delink+sent2+"&img="+sent4
      modal.find('.modal-body #name_th').val(sent1)
      modal.find('.modal-body #id').val(sent2)
      modal.find('.modal-body #name_en').val(sent3)
    })
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>