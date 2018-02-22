<?php $__env->startSection('content'); ?>
<div class="main-content">
<h2>จัดการบุคลากร</h2>
<hr>
<?php
  $officer_cat_show = DB::table('officer_cat')->get();
  $newOrder=0;
if(isset($_GET['os'])){
  $id = $_GET['os'];
  $officer_cat = DB::table('officer_cat')->orderBy('o_sort', 'desc')->where('oid',$id)->get();
  $name = $officer_cat[0]->o_name_th;
}else{
  $name = "หมวดหมูทั้งหมด";
}

?>

<table class="table table-condensed">
  <thead>
    <tr>
      <th>ไอดี</th>
      <th>ลำดับ</th>
      <th>ชื่อหน่วยงานภาษาไทย</th>
      <th>ชื่ชื่อหน่วยงานภาษาอังกฤษ</th>
      <th>แก้ไข</th>
      <th>ลบ</th>
      <th>ดูข้อมูล</th>
    </tr>
  </thead>
  <tbody>

      <?php $__currentLoopData = $officer_cat_show; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $officer_cats): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $tmp = $officer_cats->o_sort;
          $oid = $officer_cats->oid;
         ?>
    <tr>
      <form action="<?php echo e(url('editOfficer_cat')); ?>" method="post"  name="officer_cat<?php echo e($officer_cats->oid); ?>">
        <?php echo e(csrf_field()); ?>

        <input type="hidden" name="oid" value="<?php echo e($officer_cats->oid); ?>">
      <td><input  id="oid<?php echo e($officer_cats->oid); ?>"     type="text"   name="oids"       value="<?php echo e($officer_cats->oid); ?>" disabled></td>
      <td><input id="osort<?php echo e($officer_cats->oid); ?>"   type="text"   name="o_sort"      value="<?php echo e($officer_cats->o_sort); ?>" disabled></td>
      <td><input id="oname<?php echo e($officer_cats->oid); ?>"   type="text"   name="o_name_th"   value="<?php echo e($officer_cats->o_name_th); ?>" disabled></td>
      <td><input id="onameen<?php echo e($officer_cats->oid); ?>" type="text"   name="o_name_en"   value="<?php echo e($officer_cats->o_name_en); ?>" disabled></td>
      <td>
        <button id="osubmit<?php echo e($officer_cats->oid); ?>" type="submit" class="btn btn-success" style=" display: none;">
          <i class="fas fa-check-circle"></i>
        </button>
        <button onclick="return false;"  id="close<?php echo e($officer_cats->oid); ?>" data-id="<?php echo e($officer_cats->oid); ?>" class="btn btn-warning closedbutton" style=" display: none;"><i class="fas fa-times-circle"></i></button>
        <button onclick="return false;"  style="display: inline;" id="edit<?php echo e($officer_cats->oid); ?>"  data-id="<?php echo e($officer_cats->oid); ?>" class="btn btn-info rbutton"><i class="fas fa-pen-square"></i></button></td>
        <td>  <a href="#">ลบ</a>&nbsp;</td>
    <td> <a href="<?php echo url('officerPeople?oid='.$oid); ?> ">ดูข้อมูล</a></td>
  </form>
    </tr>

      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php $newOrder=$tmp+1; ?>
      <tr id="add"  style="display: none;">
        <form action="<?php echo e(url('editOfficer_cat')); ?>" method="post"  name="officer_cat">
          <?php echo e(csrf_field()); ?>

        <td>เพิ่มข้อมูล</td>
        <td><input   type="text"   name="o_sort" value="<?php echo e($newOrder); ?>"    ></td>
        <td><input  type="text"   name="o_name_th"  placeholder="ชื่อหน่วยงานภาษาไทย"   ></td>
        <td><input i type="text"   name="o_name_en"  placeholder="ชื่อหน่วยงานภาษาอังกฤษ"   ></td>
        <td><input type="submit" class="btn btn-success" name="" value="เพิ่ม"></form></td>
          <td></td>
          <td></td>
      </tr>
      <tr>
        <td></td><td></td><td></td><td></td><td></td><td></td>
        <td><button class="btn btn-success addX">เพิ่ม</button></td>
      </tr>
  </tbody>
</table>
</div>

<script type="text/javascript">
$('.closedbutton').on('click',function() {
    var sent3 =$( this ).data('id');

    document.getElementById("oid"+sent3).disabled  = true;
    document.getElementById("osort"+sent3).disabled  = true ;
    document.getElementById("oname"+sent3).disabled  = true;
    document.getElementById("onameen"+sent3).disabled  = true;
    document.getElementById("osubmit"+sent3).style.display = "none";
    document.getElementById("close"+sent3).style.display = "none";
    document.getElementById("edit"+sent3).style.display = "inline";
});
$('.rbutton').on('click',function() {
    var sent3 =$( this ).data('id');
    document.getElementById("oid"+sent3).disabled  = true;
    document.getElementById("osort"+sent3).disabled  = false ;
    document.getElementById("oname"+sent3).disabled  = false;
    document.getElementById("onameen"+sent3).disabled  = false;
    document.getElementById("osubmit"+sent3).style.display = "inline";
    document.getElementById("close"+sent3).style.display = "inline";
    document.getElementById("edit"+sent3).style.display = "none";

});

$('.addX').on('click',function() {
    var x = document.getElementById("add");
    if (x.style.display === "none") {
        x.style.display = "";
    } else {
        x.style.display = "none";
    }
});
</script>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>