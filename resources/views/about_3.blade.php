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
      <style>
      /* Code based on this sample link(ld)http://thecodeplayer.com/walkthrough/css3-family-tree */

      /*Now the CSS*/
      .tree * {margin: 0; padding: 0;}

      .tree ul {
      	padding-top: 20px; position: relative;

      	transition: all 0.5s;
      	-webkit-transition: all 0.5s;
      	-moz-transition: all 0.5s;
      }

      .tree li {
      	float: left; text-align: center;
      	list-style-type: none;
      	position: relative;
      	padding: 20px 5px 0 5px;

      	transition: all 0.5s;
      	-webkit-transition: all 0.5s;
      	-moz-transition: all 0.5s;
      }

      /*We will use ::before and ::after to draw the connectors*/

      .tree li::before, .tree li::after{
      	content: '';
      	position: absolute; top: 0; right: 50%;
      	border-top: 5px solid #ffffff;
      	width: 50%; height: 20px;
      }
      .tree li::after{
      	right: auto; left: 50%;
      	border-left: 5px solid #ffffff;
      }

      /*We need to remove left-right connectors from elements without
      any siblings*/
      .tree li:only-child::after, .tree li:only-child::before {
      	display: none;
      }

      /*Remove space from the top of single children*/
      .tree li:only-child{ padding-top: 0;}

      /*Remove left connector from first child and
      right connector from last child*/
      .tree li:first-child::before, .tree li:last-child::after{
      	border: 0 none;
      }

      /*Adding back the vertical connector to the last nodes*/
      .tree li:last-child::before{
      	border-right: 5px solid #ffffff;
      	border-radius: 0 5px 0 0;
      	-webkit-border-radius: 0 5px 0 0;
      	-moz-border-radius: 0 5px 0 0;
      }
      .tree li:first-child::after{
      	border-radius: 5px 0 0 0;
      	-webkit-border-radius: 5px 0 0 0;
      	-moz-border-radius: 5px 0 0 0;
      }

      /*Time to add downward connectors from parents*/
      .tree ul ul::before{
      	content: '';
      	position: absolute; top: 0; left: 50%;
      	border-left: 5px solid #ffffff;
      	width: 0; height: 20px;
      }

      .tree li a{
      	border: 5px solid #ffffff;
      	padding: 1em 0.75em;
      	text-decoration: none;
      	color: #666767;
      	font-family: arial, verdana, tahoma;
      	font-size: 0.85em;
      	display: inline-block;

        /*
      	border-radius: 5px;
      	-webkit-border-radius: 5px;
      	-moz-border-radius: 5px;
        */

      	transition: all 0.5s;
      	-webkit-transition: all 0.5s;
      	-moz-transition: all 0.5s;
      }

      /* -------------------------------- */
      /* Now starts the vertical elements */
      /* -------------------------------- */

      .tree ul.vertical, ul.vertical ul {
        padding-top: 0px;
        left: 60%;
      }

      /* Remove the downward connectors from parents */
      .tree ul ul.vertical::before {
      	display: none;
      }

      .tree ul.vertical li {
      	float: none;
        text-align: left;
      }

      .tree ul.vertical li::before {
        right: auto;
        border: none;
      }

      .tree ul.vertical li::after{
      	display: none;
      }

      .tree ul.vertical li a{
      	padding: 10px 0.75em;
        margin-left: 16px;
      }

      .tree ul.vertical li::before {
        top: -20px;
        left: 0px;
border-right: 5px solid #ffffff;
      	width: 20px; height: 70px;
      }

      .tree ul.vertical li:first-child::before {
        top: 0px;
        height: 40px;
      }

      /* Lets add some extra styles */

      div.tree > ul > li > ul > li > a {
        width: 11em;
      }

      div.tree > ul > li > a {
        font-size: 1em;
        font-weight: bold;
      }


      /* ------------------------------------------------------------------ */
      /* Time for some hover effects                                        */
      /* We will apply the hover effect the the lineage of the element also */
      /* ------------------------------------------------------------------ */
      .tree li a:hover, .tree li a:hover+ul li a {
      	background: #8dc63f;
        color: white;
        /* border: 1px solid #aaa; */
      }
      /*Connector styles on hover*/
      .tree li a:hover+ul li::after,
      .tree li a:hover+ul li::before,
      .tree li a:hover+ul::before,
      .tree li a:hover+ul ul::before{
      	border-color:  #aaa;
      }

      </style>

           <?php $menu->navbar("black"); ?>
           <?php $blog->blogOnC("cid-qHIXZx80S12   mbr-parallax-background", "header2-b", "0", "18,18,18"); ?>
           <div class="container align-center">
               <div class="row justify-content-md-center">
                   <div class="mbr-white col-md-10"><br><br><br><br>
                       <h1 class="mbr-section-title mbr-bold pb-3 mbr-fonts-style display-2">{{__("structure")}}</h1>

                   </div>
               </div>
           </div>

           <?php $blog->blogOffC(); ?>


           <?php $blog->blogOnC("cid-qHJ9gv4gsu suw","tabs2-r","0","0,0,0");?>
           <div class="container">
                <div class="row">
                        <div class="col-md-12">
                            <ul class="nav nav-tabs" role="tablist">
                                <?php
                                $blog->tabsPanel(__("e"),"tabs2-r_tab0");
                                $blog->tabsPanel(__("f"),"tabs2-r_tab1");
                                $blog->tabsPanel(__("g"),"tabs2-r_tab2");
                                $blog->tabsPanel(__("h"),"tabs2-r_tab3");
                                $blog->tabsPanel(__("i"),"tabs2-r_tab4");
                                $blog->tabsPanel(__("j"),"tabs2-r_tab5");
                                $blog->tabsPanel(__("k"),"tabs2-r_tab6");
                                ?>
                            </ul></div>
                            <div class="col-md-12">
                        <div class="tab-content">

                            <?php
                            $blog->tabsPaneOn("tab1","in active");
                            $blog->tabsPaneBody("link(ld)http://hr.up.ac.th/resources/images/staff_pic/_20150629-084833.jpg","นางวรรณนิสา คำสนาม","หัวหน้างานธุรการ");
                            $blog->tabsPaneBody("link(ld)http://hr.up.ac.th/resources/images/staff_pic/1560100126034.jpg","น.ส.พรรณธิดา จำรัส","บุคลากร");
                            $blog->tabsPaneBody("link(ld)http://hr.up.ac.th/resources/images/staff_pic/1560100135769.jpg","นางจิราภรณ์ ยำอางค์","นักวิชาการเงินและบัญชี");
                            $blog->tabsPaneBody("link(ld)http://hr.up.ac.th/resources/images/staff_pic/_20150112-151616.jpg"," น.ส.เขมิกา งามจิต","นักวิชาการศึกษา");
                            $blog->tabsPaneBody("link(ld)http://hr.up.ac.th/resources/images/staff_pic/_20151020-132643.jpg","นางสุภาวดี ธีบำรุง","เจ้าหน้าที่บริหารงานทั่วไป");
                            $blog->tabsPaneBody("link(ld)http://hr.up.ac.th/resources/images/staff_pic/_20140821-112024.jpg","นายศิริโรจน์ ภูษิต","เจ้าหน้าที่บริหารงานทั่วไป");
                            $blog->tabsPaneBody("link(ld)http://hr.up.ac.th/resources/images/staff_pic/3569900149891.jpg","นางสนธยา บรรเทิง","เจ้าหน้าที่บริหารงานทั่วไป");
                            $blog->tabsPaneBody("link(ld)http://hr.up.ac.th/resources/images/staff_pic/3560100602169.jpg","นางมณีรัตน์ ใหม่ไชยา","คนงาน");
                            $blog->tabsPaneBody("link(ld)http://hr.up.ac.th/resources/images/staff_pic/1510600052722.jpg","นายวชิระ จอมรัตนี","ผู้ปฏิบัติงานบริหาร");
                            $blog->tabsPaneBody("link(ld)http://hr.up.ac.th/resources/images/staff_pic/_20141014-093714.jpg","นายรัตติกร พรหมสุริยา","พนักงานขับรถยนต์");
                            $blog->tabsPaneOff();
                        ?>

                        <?php
                            $blog->tabsPaneOn("tab2","");
                            $blog->tabsPaneBody("link(ld)http://hr.up.ac.th/resources/images/staff_pic/3520800013131.jpg","นางศศิมล คำปินไชย","หัวหน้างานพัฒนาหลักสูตร");
                            $blog->tabsPaneBody("link(ld)http://hr.up.ac.th/resources/images/staff_pic/3560100628079.jpg","น.ส.นงคราญ ใจดี","นักวิชาการศึกษา");
                            $blog->tabsPaneBody("link(ld)http://hr.up.ac.th/resources/images/staff_pic/3569900117417.jpg","นายอัศวิน ดวงปัญญารัตน์","นักวิชาการศึกษา");
                            $blog->tabsPaneBody("link(ld)http://hr.up.ac.th/resources/images/staff_pic/1560100109121.jpg","นางศศิธร เทพรังสาร","นักวิชาการศึกษา");
                            $blog->tabsPaneBody("link(ld)http://hr.up.ac.th/resources/images/staff_pic/_20140821-134005.jpg","นายณัฐพงษ์ พรมวงษ์","นักวิชาการศึกษา");
                            $blog->tabsPaneBody("link(ld)http://hr.up.ac.th/resources/images/staff_pic/1560100140649_20121107-200700.jpg","นายคาวี โพละ","นักวิชาการศึกษา");
                            $blog->tabsPaneBody("link(ld)http://hr.up.ac.th/resources/images/staff_pic/_20171213-145815.jpg","น.ส.กฤตติรัตน์ ทองหล่อ","นักวิชาการศึกษา");
                            $blog->tabsPaneOff();
                        ?>

                        <?php
                        $blog->tabsPaneOn("tab3","");
                        $blog->tabsPaneBody("link(ld)http://hr.up.ac.th/resources/images/staff_pic/3600500409560.jpg","น.ส.กัลวรา ภูมิลา","หัวหน้างานทะเบียนนิสิตและประมวลผล");
                        $blog->tabsPaneBody("link(ld)http://hr.up.ac.th/resources/images/staff_pic/3560700001956.jpg","นางรัตติกาล จันตระกูล","นักวิชาการศึกษา");
                        $blog->tabsPaneBody("link(ld)http://hr.up.ac.th/resources/images/staff_pic/3550400070880.jpg","น.ส.สุดา มินทะขัติ","นักวิชาการศึกษา");
                        $blog->tabsPaneBody("link(ld)http://hr.up.ac.th/resources/images/staff_pic/_20151015-143104.jpg","นายอัฒฑชัย เอื้อหยิ่งศักดิ์","นักวิชาการศึกษา");
                        $blog->tabsPaneBody("link(ld)http://hr.up.ac.th/resources/images/staff_pic/3560100970656.jpg","น.ส.ทิพย์ศิรินทร์ จรัญ","นักวิชาการศึกษา");
                        $blog->tabsPaneBody("link(ld)http://hr.up.ac.th/resources/images/staff_pic/3650600128279.jpg","นางญดา กุลพัฒน์เศรษฐ","นักวิชาการศึกษา");
                        $blog->tabsPaneBody("link(ld)http://hr.up.ac.th/resources/images/staff_pic/3570200072234.jpg","น.ส.ญานิศา ทิพวะลี","นักวิชาการศึกษา");
                        $blog->tabsPaneBody("link(ld)http://hr.up.ac.th/resources/images/staff_pic/3560101046995.jpg","น.ส.กุลิสรา นาแพร่","นักวิชาการศึกษา");
                        $blog->tabsPaneBody("link(ld)http://hr.up.ac.th/resources/images/staff_pic/_20131112-154815.jpg","น.ส.กานดารัตน์ ใจผัด","นักวิชาการศึกษา");
                        $blog->tabsPaneBody("link(ld)http://hr.up.ac.th/resources/images/staff_pic/1560100083459.jpg","น.ส.หรรษกานต์ ปัญญา","นักวิชาการศึกษา");
                        $blog->tabsPaneBody("link(ld)http://hr.up.ac.th/resources/images/staff_pic/3559900137515.jpg","นายณัทธวุฒิ ระวังยศ","นักวิชาการศึกษา");
                        $blog->tabsPaneBody("link(ld)http://hr.up.ac.th/resources/images/staff_pic/3520100293221.jpg","นางศิรินทิพย์ หมั่นงาน","นักวิชาการศึกษา");
                        $blog->tabsPaneBody("link(ld)http://hr.up.ac.th/resources/images/staff_pic/3569900143698.jpg","น.ส.พรรณภา วงษ์หงษ์","นักวิชาการศึกษา");
                        $blog->tabsPaneBody("link(ld)http://hr.up.ac.th/resources/images/staff_pic/_20131112-141130.jpg","น.ส.กัญญาภัทร มหาวงศ์","นักวิชาการศึกษา");
                        $blog->tabsPaneBody("link(ld)http://hr.up.ac.th/resources/images/staff_pic/3569900073371.jpg","น.ส.สุมิตรา อินทะ","นักวิชาการคอมพิวเตอร์");
                        $blog->tabsPaneBody("link(ld)http://hr.up.ac.th/resources/images/staff_pic/1640700072791.jpg","นายวุฒิพงษ์ คำพันธ์","นักวิชาการคอมพิวเตอร์");
                        $blog->tabsPaneBody("link(ld)http://hr.up.ac.th/resources/images/staff_pic/_20171213-150820.jpg","นายปฐมพงศ์ บุญมา","นักวิชาการคอมพิวเตอร์");
                        $blog->tabsPaneOff();
                        ?>

                        <?php
                        $blog->tabsPaneOn("tab4","");
                        $blog->tabsPaneBody("link(ld)http://hr.up.ac.th/resources/images/staff_pic/3509900223705.jpg","น.ส.ปริญาพร สันตะจิตต์","หัวหน้างานสนับสนุนวิชาการ");
                        $blog->tabsPaneBody("link(ld)http://hr.up.ac.th/resources/images/staff_pic/3560101038704.jpg","นางปราณิสา กัลวงษ์ยา","นักวิชาการศึกษา");
                        $blog->tabsPaneBody("link(ld)http://hr.up.ac.th/resources/images/staff_pic/3520200301934.jpg","นางพจนา จิรเบญจวรรณ","นักวิชาการศึกษา");
                        $blog->tabsPaneBody("link(ld)http://hr.up.ac.th/resources/images/staff_pic/_20140821-115459.jpg","นายนพรัตน์ ใจหมั่น","นักวิชาการศึกษา");
                        $blog->tabsPaneBody("link(ld)http://hr.up.ac.th/resources/images/staff_pic/1560100157002.jpg","นายพีระชาติ อูปแก้ว","นักวิชาการศึกษา");
                        $blog->tabsPaneBody("link(ld)http://hr.up.ac.th/resources/images/staff_pic/_20151020-133753.jpg","นายพณัฐ เชื้อประเสริฐศักดิ์","นักวิชาการศึกษา");
                        $blog->tabsPaneOff();
                        ?>

                        <?php
                        $blog->tabsPaneOn("tab5","");
                        $blog->tabsPaneBody("link(ld)http://hr.up.ac.th/resources/images/staff_pic/3579900040422.jpg","นายประกิจพันธ์ พัฒนหิรัญธำรง","หัวหน้างานวิเทศสัมพันธ์");
                        $blog->tabsPaneBody("link(ld)http://hr.up.ac.th/resources/images/staff_pic/3520300356285.jpg","น.ส.วรรณา เสริมสุข","นักวิเทศสัมพันธ์");
                        $blog->tabsPaneBody("link(ld)http://hr.up.ac.th/resources/images/staff_pic/_20130819-112346.jpg","นายพีรพงษ์ กีรติศักดิ์วรกุล","นักวิเทศสัมพันธ์");
                        $blog->tabsPaneOff();
                        ?>

                        <?php
                        $blog->tabsPaneOn("tab6","");
                        $blog->tabsPaneBody("link(ld)http://hr.up.ac.th/resources/images/staff_pic/3659900197266.jpg","นายสุเมธ เรืองเดช","หัวหน้างานส่งเสริมนวัตกรรมและพัฒนาจัดการเรียนการสอน");
                        $blog->tabsPaneBody("link(ld)http://hr.up.ac.th/resources/images/staff_pic/3650600215571.jpg","น.ส.ยุพา คุ้มคำ","นักวิชาการโสตทัศนศึกษา");
                        $blog->tabsPaneBody("link(ld)http://hr.up.ac.th/resources/images/staff_pic/_20170817-111539.jpg","น.ส.เกศณีย์ งามจิตต์","นักวิชาการโสตทัศนศึกษา");
                        $blog->tabsPaneBody("link(ld)http://hr.up.ac.th/resources/images/staff_pic/1659900195127.jpg","นายธนากร ภู่กร","นักวิชาการโสตทัศนศึกษา");
                        $blog->tabsPaneBody("link(ld)http://hr.up.ac.th/resources/images/staff_pic/3649900040120.jpg","นายเพ็ชร พงษ์เฉย","นักวิชาการโสตทัศนศึกษา");
                        $blog->tabsPaneBody("link(ld)http://hr.up.ac.th/resources/images/staff_pic/3100600528263.jpg","นายพชร เจียมเจริญ","นักวิชาการโสตทัศนศึกษา");
                        $blog->tabsPaneBody("link(ld)http://hr.up.ac.th/resources/images/staff_pic/1100500051272.jpg","นายสุรใจ สุพรพัฒนกุล","นักวิชาการโสตทัศนศึกษา");
                        $blog->tabsPaneBody("link(ld)http://hr.up.ac.th/resources/images/staff_pic/1560100094906.jpg","นายเจษฎา ธรรมสาร","นักวิชาการคอมพิวเตอร์");
                        $blog->tabsPaneBody("link(ld)http://hr.up.ac.th/resources/images/staff_pic/_20130418-160145.jpg","นายเอกชัย เทียนเงิน","นักประชาสัมพันธ์");
                        $blog->tabsPaneOff();
                        ?>

                        <?php
                        $blog->tabsPaneOn("tab7","");
                        $blog->tabsPaneBody("link(ld)http://hr.up.ac.th/resources/images/staff_pic/3530700647996.jpg","นายสมทบ เหล็กสิงห์","หัวหน้างานรับเข้าศึกษา");
                        $blog->tabsPaneBody("link(ld)http://hr.up.ac.th/resources/images/staff_pic/5530700016470.jpg","น.ส.วิไลลักษณ์ ครุฑปาน","นักวิชาการศึกษา");
                        $blog->tabsPaneBody("link(ld)http://hr.up.ac.th/resources/images/staff_pic/1560100095015.jpg","น.ส.ชลล์สิฌาณ์ พรหมเสน","นักวิชาการศึกษา");
                        $blog->tabsPaneBody("link(ld)http://hr.up.ac.th/resources/images/staff_pic/1560700005602.jpg","น.ส.วันนิสา พูนรัตนทรัพย์","นักวิชาการศึกษา");
                        $blog->tabsPaneBody("link(ld)http://hr.up.ac.th/resources/images/staff_pic/1101400487711.jpg","น.ส.พิชญาภา โสรัตน์","นักวิชาการศึกษา");
                        $blog->tabsPaneBody("link(ld)http://hr.up.ac.th/resources/images/staff_pic/_20130605-142950.jpg","นายธนกร เสนจุ้ม","นักวิชาการศึกษา");
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

           function user($img,$h1,$h2){
echo '<div class="container-fluid"  style=" border-radius: 20px;   box-shadow:0 3px 36px 0 rgba(0, 0, 0, 0.6); background-color:white; 	border: 5px solid #ffffff;  ">
  <div class="row">
    <div class="col-sm-4"><img style="margin-left:14%!important;  height:150px; border-radius: 10px; "   src="'.$img.'" alt=""></div>
    <div class="col-sm-8"  ><br>

      <h1 class="mbr-fonts-style  display-5" style="text-align:center; font-size:22px!important;">'.$h1.'</h1><br><hr><br>
      <h2 class="br-fonts-style  display-7" style="text-align:center;" >'.$h2.'</h2></div>
  </div>
</div>';
           }
        ?>
    </body>
    </html>
