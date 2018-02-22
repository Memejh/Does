@extends('layouts.navbar')

@section('content')
<div class="main-content">
  <?php
  //INCLUDE File for use class and new instance;
  include_once(app_path() . '/frontend/header.php');
  include_once(app_path() . '/frontend/menu.php');
  include_once(app_path() . '/frontend/media.php');
  include_once(app_path() . '/frontend/custom.php');
  include_once(app_path() . '/frontend/blog.php');
  include_once(app_path() . '/core_function/core.php');
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
    $slide = DB::table('slideshow')->get();
    ?>
    <h2><span class="glyphicon glyphicon-film"></span>&nbsp;จัดการสไลด์
        <div class="btn-group pull-right">
            <a data-toggle="modal" data-target="#addsl"  class="btn btn-primary"><i class="fas fa-plus-square"></i> สร้างสไลด์</a>
    </h2>
      <hr>
    <table id="example" class="display table table-striped" cellspacing="0">
    <thead>
    <tr>
    <th>#</th>
    <th>@sortablelink('id','ไอดีสไลด์')</th>
    <th>@sortablelink('orders','ลำดับสไลด์')</th>
    <th>@sortablelink('url','ลิ้งค์')</th>
    <th>@sortablelink('des','แสดง')</th>
    <th>@sortablelink('img_name','ชื่อสไลด์')</th>
    <th>@sortablelink('create_user','สร้างโดย')</th>
    <th>@sortablelink('create_date','วันที่สร้าง')</th>
    <th>@sortablelink('last_user','แก้ไขโดย')</th>
    <th>@sortablelink('last_date','แก้ไขล่าสุด')</th>
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
        foreach($slide as $ss) {
          $btn = '<a href="'.url('/slideDes').'?id='.$ss->id.'py0" class="btn btn-success">แสดง</a>';
          if($ss->des == 0){
            $btn = '<a href="'.url('/slideDes').'?id='.$ss->id.'py1" class="btn btn-danger">ไม่แสดง</a>';
          }
            echo '<tr>

                                <td>' . $i++ . '</td>
                                <td><button   class="btn btn-info disabled" style="border-radius: 0px; ">ไอดีสไลด์: '.$ss->id .'</button><br><img class="zoom" style="height:150px; width:250px; border: 3px solid #3cc3d8;   " src="' . asset("Slides/".$ss->img_name ). '"/></td>
                                <td><p >' . $ss->orders . '</p></td>
                                <td>' . $ss->url . '</td>
                                <td>'.$btn.'</td>
                                <td>' . $ss->img_name . '</td>
                                <td>' . $ss->create_user . '</td>
                                <td>' . $db->convertDate($ss->create_date) . '</td>
                                <td>' . $ss->last_user . '</td>
                                <td>' . $ss->last_date . '</td>
                                <td><a data-toggle="modal" data-target="#edContent" data-img_name="' .$ss->img_name .'" data-id="' . $ss->id . '"data-order="' . $ss->orders . '" data-url="' . $ss->url . '" class="btn btn-warning"><i class="far fa-edit"></i> แก้ไข</a></td>
                                <td><a data-toggle="modal" data-target="#delimg" data-img2="' . $ss->img_name  .'" data-img_name="' .$ss->img_name .'" data-id="' . $ss->id . '" data-url="' . $ss->url . '" class="btn btn-danger"><i class="fas fa-trash-alt"></i> ลบ</a>
                                     </td></tr>';
        }
        ?>
    </tbody>
</table>

</div>

<!-- Modal add-->
  <div class="modal fade" id="addsl" role="dialog">
      <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">เพิ่มสไลด์</h4>
              </div>
              <form action="{{action('SlideController@savePH')}}" method="post" enctype="multipart/form-data">
                  {{csrf_field()}}
                  <div class="modal-body">
                    <div class="form-group">
                      <label for="orders">ลำดับสไลด์:</label>
                      <input type="text" class="form-control" placeholder="ลำดับสไลด์" id="orders" name="orders" required/>
                    </div>
                    <div class="form-group">
                      <label for="url">ลิ้งค์:</label>
                      <input type="hidden" name="des" value="1">
                      <input type="text" class="form-control" placeholder="ลิ้งค์" id="url" name="url" required/>
                    </div>
                    <div class="form-group">
                      <label for="image">อัพโหลดรูปภาพ:</label>
                        <input accept="image/*" id="fileupload" class="btn btn-default" id="file"accept=".gif,.jpg,.png,.svg"  type="file" name="img_name[]" multiple required/>
                    </div>
                    <div id="dvPreview">

                    </div>
                    <div class="form-group">
                      <label for="g_name_en">ผู้สร้าง: {{ Auth::user()->name }}</label>
                      <input type="hidden"  value="{{ Auth::user()->name }}" placeholder="create_user" id="create_user" name="create_user" required/>
                    </div>
                    <div class="form-group">
                      <label for="g_name_en">วันที่สร้าง: {{date("Y-m-d h:m:s")}}</label>
                      <input type="hidden"  value="{{date("Y-m-d h:m:s")}}" placeholder="create_date" id="create_date" name="create_date" required/>
                    </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                      <button type="submit" class="btn btn-primary"  value="Create">บันทึก</button>
                  </div>
              </form>
          </div>

      </div>
  </div>
  <!-- Modal edit-->
  <div class="modal fade" id="edContent" role="dialog">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header ">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">แก้ไขสไลด์</h4>
              </div>
              <div class="modal-body">
                <center><img id="img_name" class="zoom" style="height:150px; width:250px; border-radius: 10px; " /></td></center>
                  <form action="{{ action('SlideController@update')}}" method="post">
                      {{csrf_field()}}
                      <div class="form-group">
                        <label for="orders">ลำดับสไลด์:</label>
                        <input type="text" class="form-control" placeholder="ลำดับสไลด์" id="orders" name="orders" required/>
                      </div>
                      <div class="form-group">
                        <label for="url">ลิ้งค์:</label>
                        <input type="hidden" id="id" name="id">
                        <input type="hidden" name="des" value="1">
                        <input type="text" class="form-control" placeholder="ลิ้งค์" id="url" name="url" required/>
                      </div>
                      <div class="form-group">
                        <label for="g_name_en">ผู้สร้าง: {{ Auth::user()->name }}</label>
                        <input type="hidden"  value="{{ Auth::user()->name }}" placeholder="create_user" id="create_user" name="create_user" required/>
                      </div>
                      <div class="form-group">
                        <label for="g_name_en">วันที่สร้าง: {{date("Y-m-d h:m:s")}}</label>
                        <input type="hidden"  value="{{date("Y-m-d h:m:s")}}" placeholder="create_date" id="create_date" name="create_date" required/>
                      </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                  <button type="submit" value="Update"  class="btn btn-primary">บันทึก</button>
              </div>
              </form>
          </div>

      </div>
  </div>
  <div class="modal fade" id="delimg" role="dialog" data-keyboard="false" data-backdrop="static">
          <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                  <div class="modal-header">
                          <h2 class="modal-title text-center ">ต้องการลบสไลด์</h2>
                  </div>
                  <div class="modal-body text-center ">
                      <div class="text-center" style="font-size:6em; ">
                              <img id="img2" class="zoom" style="height:90px; width:190px; border-radius: 10px; " />
                              <i style="color:darkgray;" class="fas fa-arrow-right "></i>
                          <i style="color:crimson;" class="fas fa-trash-alt faa-shake animated"></i>

                      </div>
                      <div class="form-group text-left">
                          <br><label for="gid">ชื่อสไลด์</label>
                          <input type="text" id="img_name"  class="form-control" disabled/>
                      </div>
                      <div class="form-group text-left">
                          <label for="name_th">ลิ้งค์</label>
                          <input type="text" class="form-control" id="url"  disabled />
                      </div>

                      <a id="delx" style="font-size:18px;" href=" "class="btn btn-success btn-lg" ><i class="fas fa-check-circle"></i> ตกลง</a>
                      <button type="button" style="font-size:18px;" class="btn btn-warning btn-lg" data-dismiss="modal"><i class="fas fa-times-circle"></i> ยกเลิก</button>
                      <hr>
                  </div>
              </div>
          </div>
      </div>

  <?php

  if($message!="0"){
      if($message == "errorDB"){
          $dialog->customMessageDefault("deleteMessage","เกิดข้อผิดพลาด","fas fa-exclamation-triangle","red","จากการลบข้อมูลในฐานข้อมูล",url('slideshow'));
      }
      else if($message == "deleteError"){
          $dialog->customMessageDefault("deleteMessage","เกิดข้อผิดพลาด","fas fa-exclamation-triangle","red","จากการลบไฟล์ในโฮส",url('slideshow'));
      }
      else if($message == "deleteOK"){
          $dialog->customMessageDefault("deleteMessage","ลบข้อมูลสำเร็จ","fas fa-check-circle","#66FF33","",url('slideshow'));
      }
      else if($message == "updateSlideshowOK"){
          $dialog->customMessageDefault("updateMessage","อัพเดทข้อมูลสำเร็จ","fas fa-check-circle","#66FF33","",url('slideshow'));
      }
      else if($message == "updateSlideshowError"){
          $dialog->customMessageDefault("updateMessage","เกิดข้อผิดพลาด","fas fa-exclamation-triangle","red","จากการอัพเดทข้อมูลลงฐานข้อมูล",url('slideshow'));
      }
      else if($message == "addSlideshowOK"){
          $dialog->customMessageDefault("createMessage","เพิ่มสไลด์สำเร็จ","fas fa-check-circle","#66FF33","จากการอัพเดทข้อมูลลงฐานข้อมูล",url('slideshow'));
      }
      else if($message == "addSlideshowError"){
          $dialog->customMessageDefault("createMessage","เกิดข้อผิดพลาดในการเพิ่มสไลด์","fa-exclamation-triangle","red","จากการอัพเดทข้อมูลลงฐานข้อมูล",url('slideshow'));
      }
  }
  ?>
  <script language="javascript" type="text/javascript">

      $('#delimg').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var sent1 = button.data('url') // Extract info from data-* attributes
          var sent2 = button.data('id')
          var sent3 = button.data('img2')
          var sent4 = button.data('img_name')
          var modal = $(this)
          var path = "<?php echo asset('/Slides')?>"
          var delink = "<?php echo action('SlideController@delete'); ?>?id="
          var scr = document.getElementById('img2')
          var deletew = document.getElementById('delx')
          scr.src = path+"/"+sent3
          deletew.href = delink+sent2+"&name="+sent4
          modal.find('.modal-body #img_name').val(sent4)
          modal.find('.modal-body #url').val(sent1)
      })

      window.onload = function () {
          var fileUpload = document.getElementById("fileupload");
          fileUpload.onchange = function () {
              if (typeof (FileReader) != "undefined") {
                  var dvPreview = document.getElementById("dvPreview");
                  dvPreview.innerHTML = "";
                  var regex = /^([%()a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;

                  for (var i = 0; i < fileUpload.files.length; i++) {
                      var file = fileUpload.files[i];
                      if (regex.test(file.name.toLowerCase())) {
                          var reader = new FileReader();
                          reader.onload = function (e) {
                              var img = document.createElement("IMG");
                              img.height = "200";
                              img.width = "400";
                              img.className = "zoom";
                              img.src = e.target.result;
                              dvPreview.appendChild(img);
                          }
                          reader.readAsDataURL(file);
                      } else {
                          alert(file.name + "ต้องเป็นไฟล์ .png .jpg .bmp .gif เท่านั้น");
                          dvPreview.innerHTML = "";
                          $("#fileupload").val('');
                          return false;
                      }
                  }
              } else {
                  alert("บราวเซอร์ของคุณไม่รองรับการใช้งาน");
              }
          }
      };

          $('#edContent').on('show.bs.modal', function (event) {
              var button = $(event.relatedTarget) // Button that triggered the modal
              var sent1 = button.data('url') // Extract info from data-* attributes
              var sent2 = button.data('id')
              var sent3 = button.data('img_name')
              var sent4 = button.data('order')
              var modal = $(this)
              var scr = document.getElementById('img_name');
              var path = "<?php echo asset('/Slides')?>";
              scr.src = path+"/"+sent3;
              modal.find('.modal-body #orders').val(sent4)
              modal.find('.modal-body #img_name').val(sent3)
              modal.find('.modal-body #url').val(sent1)
              modal.find('.modal-body #id').val(sent2)
          })

      </script>
    </div>
@endsection
