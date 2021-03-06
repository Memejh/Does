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

    <h2><i class="fas fa-camera-retro"></i>&nbsp;จัดการอัลบั้มรูปภาพ
        <div class="btn-group pull-right">
            <a data-toggle="modal" data-target="#makeAl"  class="btn btn-primary"><i class="fas fa-plus-square"></i> สร้างอัลบั้ม</a>
        </div>
    </h2>

    <hr>


            <form action="{{url('/galleryM')}}" method="get">
            <div class="input-group">
              <input type="text" name="keyword" class="form-control" placeholder="ค้นหาจาก ชื่ออัลบั้ม,ชื่อผู้แก้ไข,เวลา">
              <div class="input-group-btn">
                    <input type="submit" value="ค้นหา" class="form-control" >
              </div>
            </div>
          </form>
    <table id="example" class="display table table-striped" cellspacing="0" style="font-size:16px; ">
        <thead>
            <tr>
                <th>#</th>
                <th>@sortablelink('gid','ไอดีอัลบั้ม')</th>
                <th>@sortablelink('g_name_th','ชื่ออัลบั้ม')</th>
                <th>@sortablelink('last_user','แก้ไขโดย')</th>
                <th>@sortablelink('create_date','แก้ไขล่าสุด')</th>
                <th>แก้ไข</th>
                <th>รูปภาพ</th>
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

            foreach ($gallery as $gallerys) {
                echo '<tr>

                                    <td>' . $i++ . '</td>
                                    <td><button   class="btn btn-info disabled" style="border-radius: 0px; ">ไอดีอัลบั้ม: '.$gallerys->gid .'</button><br><img class="zoom" style="height:150px; width:250px; border: 3px solid #3cc3d8;   " src="' . $media_manage->viewIndexImageByID($gallerys->gid) . '"/></td>
                                    <td><p >' . $gallerys->g_name_th . '</p></td>
                                    <td>' . $gallerys->last_user . '</td>
                                    <td>' . $db->convertDate($gallerys->create_date) . '</td>
                                    <td><a data-toggle="modal" data-target="#myModal" data-img="' . $media_manage->viewIndexImageByID($gallerys->gid) .'" data-id="' . $gallerys->gid . '" data-name="' . $gallerys->g_name_th . '" class="btn btn-primary"><i class="far fa-edit"></i> แก้ไข</a></td>
                                    <td><a href="' . url('galleryAdd') . '?gid=' . $gallerys->gid . '" class="btn btn-primary"><i class="far fa-images"></i> ดูรูปภาพ</a></td>

                                    <td><a data-toggle="modal" data-target="#add" data-img2="' . $media_manage->viewIndexImageByID($gallerys->gid) .'" data-id="' . $gallerys->gid . '" data-name="' . $gallerys->g_name_th . '" class="btn btn-danger"><i class="fas fa-trash-alt"></i> ลบ</a>
                                         </td>
                                  </tr>';
            }
            ?>

        </tbody>
    </table>
    {!! $gallery->appends(\Request::except('page'))->render() !!}
</div>
</div>
</div>

<?php

if($message!="0"){
    if($message == "errorDB"){
        $dialog->customMessageDefault("deleteMessage","เกิดข้อผิดพลาด","fas fa-exclamation-triangle","red","จากการลบข้อมูลในฐานข้อมูล",url('galleryM'));
    }
    else if($message == "errorFile"){
        $dialog->customMessageDefault("deleteMessage","เกิดข้อผิดพลาด","fas fa-exclamation-triangle","red","จากการลบไฟล์ในโฮส",url('galleryM'));
    }
    else if($message == "fileDelOK"){
        $dialog->customMessageDefault("deleteMessage","ลบข้อมูลสำเร็จ","fas fa-check-circle","#66FF33","",url('galleryM'));
    }
    else if($message == "fileUpdateOK"){
        $dialog->customMessageDefault("updateMessage","อัพเดทข้อมูลสำเร็จ","fas fa-check-circle","#66FF33","",url('galleryM'));
    }
    else if($message == "fileUpdateError"){
        $dialog->customMessageDefault("updateMessage","เกิดข้อผิดพลาด","fas fa-exclamation-triangle","red","จากการอัพเดทข้อมูลลงฐานข้อมูล",url('galleryM'));
    }
    else if($message == "createAlbumOK"){
        $dialog->customMessageWithLink("createMessage","สร้างอัลบั้มสำเร็จ","fas fa-check-circle","#66FF33","จากการอัพเดทข้อมูลลงฐานข้อมูล",url('galleryM'),url('galleryAdd?gid='.$alid),'ไปหน้าอัพโหลดรูป','btn btn-primary');
    }
    else if($message == "createAlbumError"){
        $dialog->customMessageDefault("createMessage","เกิดข้อผิดพลาดในการสร้างอัลบั้ม","fa-exclamation-triangle","red","จากการอัพเดทข้อมูลลงฐานข้อมูล",url('galleryM'));
    }
}
?>




<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header ">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">แก้ไขอัลบั้ม</h4>
            </div>
            <div class="modal-body">

                    <center><img id="img" class="zoom" style="height:150px; width:250px; border-radius: 10px; " /></td></center>
                <form action="{{action('Controller@update')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <br><label for="gid">รหัสอัลบั้ม</label>
                        <input type="hidden" id="gid" name="gid" class="form-control" />
                        <input type="text" id="gid" name="gid" class="form-control" disabled/>
                    </div>
                    <div class="form-group">
                        <label for="g_name_th">ชื่ออัลบั้ม</label>
                        <textarea class="form-control" required id="g_name_th" name="g_name_th">  </textarea>
                    </div>
                    <div class="form-group">
                        <label for="last_user">แก้ไขโดย : {{ Auth::user()->name }}</label>
                        <input type="hidden"  value="{{ Auth::user()->name }}" id="last_user" name="last_user"   />
                    </div>
                    <div class="form-group">
                        <label for="last_date">เวลาแก้ไขล่าสุด : {{date("Y-m-d h:m:s")}}</label>
                        <input type="hidden"  value="{{date("Y-m-d h:m:s")}} " id="last_date" name="last_date"   />
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




<div class="modal fade" id="makeAl" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">เพิ่มอัลบั้ม</h4>
            </div>
            <form action="{{action('Controller@insert_gal')}}" method="post">
                {{csrf_field()}}
                <div class="modal-body">
                  <div class="form-group">
                    <label for="g_name_th">ชื่อภาษาไทย:</label>
                    <input type="text" class="form-control" placeholder="ชื่อภาษาไทย" id="g_name_th" name="g_name_th" required/>
                  </div>
                  <div class="form-group">
                    <label for="g_name_en">ชื่อภาษาอังกฤษ:</label>
                    <input class="form-control" type="text"  value="gallery{{date("Y-m-d h:m:s")}}" placeholder="ชื่อภาษาอังกฤษ" id="g_name_en" name="g_name_en" required/>
                  </div>
                  <div class="form-group">
                    <label for="g_name_en">ผู้สร้าง: {{ Auth::user()->name }}</label>
                    <input type="hidden"  value="{{ Auth::user()->name }}" placeholder="create_user" id="create_user" name="create_user" required/>
                  </div>
                  <div class="form-group">
                    <label for="g_name_en">วันที่สร้าง: {{date("Y-m-d h:m:s")}}</label>
                    <input type="hidden"  value="{{date("Y-m-d h:m:s")}}" placeholder="create_date" id="create_date" name="create_date" required/>
                  </div>

                    <!--    <input type=""  value="gallery{{date("Y-m-d h:m:s")}}" placeholder="ชื่อภาษาอังกฤษ" id="g_name_en" name="g_name_en" required/>

                               <input type="text"  value="{{ Auth::user()->name }}" placeholder="create_user" id="create_user" name="create_user" required/>

                        <input type="text"  value="{{date("Y-m-d h:m:s")}}" placeholder="create_date" id="create_date" name="create_date" required/>

                               <input type="text"  value="{{ Auth::user()->name }}" placeholder="last_user" id="last_user" name="last_user" required/>

                        <input type="text"  value="{{date("Y-m-d h:m:s")}}"  placeholder="last_date" id="last_date" name="last_date" required/>
-->

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                    <button type="submit" class="btn btn-primary"  value="Create">บันทึก</button>
                </div>
            </form>
        </div>

    </div>
</div>

<div class="modal fade" id="add" role="dialog" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                        <h2 class="modal-title text-center ">ต้องการลบอัลบั้ม</h2>
                </div>
                <div class="modal-body text-center ">
                    <div class="text-center" style="font-size:6em; ">
                            <img id="img2" class="zoom" style="height:90px; width:190px; border-radius: 10px; " />
                            <i style="color:darkgray;" class="fas fa-arrow-right "></i>
                        <i style="color:crimson;" class="fas fa-trash-alt faa-shake animated"></i>

                    </div>

                    <div class="form-group text-left">
                        <br><label for="gid">รหัสอัลบั้ม</label>
                        <input type="text" id="gid"  class="form-control" disabled/>
                    </div>
                    <div class="form-group text-left">
                        <label for="g_name_th">ชื่ออัลบั้ม</label>
                        <textarea class="form-control"  id="g_name_th"  disabled>  </textarea>
                    </div>

                    <a id="delx" style="font-size:18px;" href=" "class="btn btn-success btn-lg" ><i class="fas fa-check-circle"></i> ตกลง</a>
                    <button type="button" style="font-size:18px;" class="btn btn-warning btn-lg" data-dismiss="modal"><i class="fas fa-times-circle"></i> ยกเลิก</button>
                    <hr>
                </div>
            </div>
        </div>
    </div>

<script>
        $('#add').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var sent1 = button.data('name') // Extract info from data-* attributes
            var sent2 = button.data('id')
            var sent3 = button.data('img2')
            var modal = $(this)
            var delink = "<?php echo action('Controller@delete_gal'); ?>?gid="
            var scr = document.getElementById('img2')
            var deletew = document.getElementById('delx')
            scr.src = sent3
            deletew.href = delink+sent2
            modal.find('.modal-body #g_name_th').val(sent1)
            modal.find('.modal-body #gid').val(sent2)
        })

    $('#myModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var sent1 = button.data('name') // Extract info from data-* attributes
        var sent2 = button.data('id')
        var sent3 = button.data('img')
        var modal = $(this)
        var scr = document.getElementById('img');
        scr.src = sent3;
        modal.find('.modal-body #g_name_th').val(sent1)
        modal.find('.modal-body #gid').val(sent2)
    })
</script>
@endsection
