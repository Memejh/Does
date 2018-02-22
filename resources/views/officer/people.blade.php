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

    <h2><i class="fas fa-users"></i></i>&nbsp;จัดการบุคลากร
        <div class="btn-group pull-right">
            <a data-toggle="modal" data-target="#addContent"  class="btn btn-primary"><i class="fas fa-plus-square"></i> เพิ่มบุคลากร</a>
        </div>
    </h2>

    <hr>
    <form action="{{url('/gcontent')}}" method="get">
        <div class="input-group">
            <input type="text" name="keyword" class="form-control" placeholder="ค้นหาจาก ชื่อหมวดหมู่">
            <div class="input-group-btn">
                <input type="submit" value="ค้นหา" class="form-control" >
            </div>
        </div>
    </form>
    <table id="example" class="display table table-striped" cellspacing="0" style="font-size:16px; ">
        <thead>
            <tr>
                <th>#</th>
                <th>รูป</th>
                <th>@sortablelink('name','ชื่อ - นามสกุล')</th>
                <th>@sortablelink('growth','ตำแหน่ง')</th>
                <th>@sortablelink('tel','เบอร์โทร')</th>
                <th>@sortablelink('last_date','แก้ไขล่าสุด')</th>
                <th>แก้ไข</th>
                <th>ลบ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            if (isset($_GET['page'])) {
                if ($_GET['page'] > 1) {

                    $i = (10 * $_GET['page']) - 9;
                }
            }

            foreach ($peoples as $people) {
                echo '<tr>
                    <td>'. $i++ .'</td>
                    <td><button   class="btn btn-info disabled" style="border-radius: 0px; ">ไอดีอัลบั้ม: '.$people->id .'</button><br><img class="zoom" style="height:150px; width:130px; border: 3px solid #3cc3d8;   " src="' . img($people->image) . '"/></td>
                    <td>' . $people->name . " ". $people->sname . '</td>
                    <td>' . $people->growth . '</td>
                    <td>' . tel($people->tel). '</td>
                    <td>' .$people->create_date.'</td>
                    <td><a data-toggle="modal" data-target="#edContent" data-id="' . $people->id . '"data-img="' . img($people->image) . '" data-name="' . $people->name . '" data-sname="' . $people->sname . '" class="btn btn-warning"><i class="far fa-edit"></i> แก้ไข</a></td>
                    <td><a data-toggle="modal" data-target="#delete"  data-id="' . $people->id . '" data-name="' . $people->name . '"data-sname="' . $people->sname . '" class="btn btn-danger"><i class="fas fa-trash-alt"></i> ลบ</a>
                         </td>
                    </tr>';
            }
            ?>

        </tbody>
    </table>

</div>
</div>
</div>





<!-- Modal add-->
<div class="modal fade" id="addContent" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header ">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">เพิ่มบุคลากร</h4>
            </div>
            <div class="modal-body">
                    <form action="{{ action('GroupContentController@update')}}" method="post">
                        {{csrf_field()}}
                        <div class='form-group '>
                          <label for='name'>img:</label>
                        </div>
                        <div class="form-group">
                          <label for="gid">ลำดับ: </label>
                          <input id="id" name="id" type="hidden">
                          <input type="text" id="id" name="id" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="g_name">ชื่อ: </label>
                            <input class="form-control" required id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="g_name">นามสกุล: </label>
                            <input class="form-control" required id="sname" name="sname">
                        </div>
                        <div class="form-group">
                            <label for="tel">เบอร์โทรศัพท์: </label>
                            <input class="form-control" required id="tel" name="tel">
                        </div>
                        <div class="form-group">
                            <label for="growth">ตำแหน่ง: </label>
                            <input class="form-control" required id="growth" name="growth">
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
<!-- Modal edit-->
<div class="modal fade" id="edContent" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header ">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">แก้ไขบุคลากร</h4>
            </div>
            <div class="modal-body">

                <form action="{{ action('GroupContentController@update')}}" method="post">
                    {{csrf_field()}}
                    <div class='form-group '>
                        <center><img id="img" class="zoom" style="height:150px; width:250px; border-radius: 10px; " /></td></center>
                    </div>
                    <div class="form-group">
                      <label for="gid">ลำดับ: </label>
                      <input id="id" name="id" type="hidden">
                      <input type="text" id="id" name="id" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="g_name">ชื่อ: </label>
                        <input class="form-control" required id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="g_name">นามสกุล: </label>
                        <input class="form-control" required id="sname" name="sname">
                    </div>
                    <div class="form-group">
                        <label for="tel">เบอร์โทรศัพท์: </label>
                        <input class="form-control" required id="tel" name="tel">
                    </div>
                    <div class="form-group">
                        <label for="growth">ตำแหน่ง: </label>
                        <input class="form-control" required id="growth" name="growth">
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
                        <label for="g_name">ชื่อภาษาไทย:</label>
                        <input type="text" class="form-control" placeholder="ชื่อภาษาไทย" id="g_name" name="g_name" required/>
                    </div>
                    <div class="form-group">
                        <label for="g_sname">ชื่อภาษาอังกฤษ:</label>
                        <input class="form-control" type="text"  value="gallery{{date("Y-m-d h:m:s")}}" placeholder="ชื่อภาษาอังกฤษ" id="g_sname" name="g_sname" required/>
                    </div>
                    <div class="form-group">
                        <label for="g_sname">ผู้สร้าง: {{ Auth::user()->name }}</label>
                        <input type="hidden"  value="{{ Auth::user()->name }}" placeholder="create_user" id="create_user" name="create_user" required/>
                    </div>
                    <div class="form-group">
                        <label for="g_sname">วันที่สร้าง: {{date("Y-m-d h:m:s")}}</label>
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

<div class="modal fade" id="delete" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-center ">ต้องการลบหมวดหมู่</h2>
            </div>
            <div class="modal-body text-center ">
                <div class="text-center" style="font-size:6em; ">
                    <i style="color:crimson;" class="fas fa-trash-alt faa-shake animated"></i>
                </div>
                <div class="form-group text-left">
                    <label for="name">หัวข้อภาษาไทย</label>
                    <input type="text" id="name"  class="form-control" disabled/>
                </div>
                <div class="form-group text-left">
                    <label for="sname">หัวข้อภาษาอังกฤษ</label>
                    <inpt class="form-control"  id="sname"  disabled>
                </div>

                <a id="delx" style="font-size:18px;" class="btn btn-success btn-lg" ><i class="fas fa-check-circle"></i> ตกลง</a>
                <button type="button" style="font-size:18px;" class="btn btn-warning btn-lg" data-dismiss="modal"><i class="fas fa-times-circle"></i> ยกเลิก</button>
                <hr>
            </div>
        </div>
    </div>
</div>
<?php
function img($img){
  $var = ( explode( '(ld)', $img ) );
  return $var[1];
}
function tel($tel){
  if($tel!=""){
    return $tel;
  } else {
    return "-";
  }
}
if($message!="0"){
    if($message == "errorDB"){
        $dialog->customMessageDefault("deleteMessage","เกิดข้อผิดพลาด","fas fa-exclamation-triangle","red","จากการลบข้อมูลในฐานข้อมูล",url('content'));
    }
    else if($message == "errorFile"){
        $dialog->customMessageDefault("deleteMessage","เกิดข้อผิดพลาด","fas fa-exclamation-triangle","red","จากการลบไฟล์ในโฮส",url('content'));
    }
    else if($message == "deleteGContentOK"){
        $dialog->customMessageDefault("deleteMessage","ลบข้อมูลสำเร็จ","fas fa-check-circle","#66FF33","",url('gcontent'));
    }
    else if($message == "updateGContentOK"){
        $dialog->customMessageDefault("ui","อัพเดทข้อมูลสำเร็จ","fas fa-check-circle","#66FF33","",url('gcontent'));
    }
    else if($message == "updateGContentError"){
        $dialog->customMessageDefault("updateMessage","เกิดข้อผิดพลาด","fas fa-exclamation-triangle","red","จากการอัพเดทข้อมูลลงฐานข้อมูล",url('gcontent'));
    }
    else if($message == "createGContentOK"){
        $dialog->customMessageDefault("createMessage","เพิ่มหมวดหมู่สำเร็จ","fas fa-check-circle","#66FF33","จากการอัพเดทข้อมูลลงฐานข้อมูล",url('gcontent'));
    }
    else if($message == "createGContentError"){
        $dialog->customMessageDefault("createMessage","เกิดข้อผิดพลาดในการเพิ่มหมวดหมู่","fa-exclamation-triangle","red","จากการอัพเดทข้อมูลลงฐานข้อมูล",url('content'));
    }
}
?>
<script>
    $('#delete').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var sent1 = button.data('name') // Extract info from data-* attributes
      var sent2 = button.data('id')
      var sent3 = button.data('sname')
      var modal = $(this)
      var delink = "<?php echo action('GroupContentController@destroy'); ?>?id="
      var deletew = document.getElementById('delx')
      deletew.href = delink+sent2
      modal.find('.modal-body #name').val(sent1)
      modal.find('.modal-body #id').val(sent2)
      modal.find('.modal-body #sname').val(sent3)
    })

    $('#edContent').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var sent1 = button.data('name') // Extract info from data-* attributes
        var sent2 = button.data('id')
        var sent3 = button.data('img')
        var sent4 = button.data('sname')
        var modal = $(this)
        var scr = document.getElementById('img');
        scr.src = sent3;
        modal.find('.modal-body #name').val(sent1)
        modal.find('.modal-body #sname').val(sent4)
        modal.find('.modal-body #img').val(sent3)
        modal.find('.modal-body #id').val(sent2)
    })
</script>
@endsection
