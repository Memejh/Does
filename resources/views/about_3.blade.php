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
           <?php $menu->navbar("black"); ?>

           <?php $blog->blogOnC("testimonials4 cid-qHJ4P69zx0","testimonials4-o","0","0,0,0");?>
           <div class="col-md-10 testimonials-container">
               <?php $blog->bloguser("assets/images/27335923-1785079001523223-1170708036-o-138x150.jpg","ศาสตราจารย์พิเศษ ดร.มณฑล สงวนเสริมศรี","อธิการบดี",""); ?>
               <?php $blog->bloguser("assets/images/t2-122x127.jpg","รองศาสตราจารย์ ดร.สุภกร พงศบางโพธิ์","รองอธิการบดีฝ่ายวิชาการ",""); ?>
               <?php $blog->bloguser("assets/images/t3-104x117.jpg","ดร.ชลธิดา เทพหินลัพ","ผู้ช่วยอธิการบดี",""); ?>
               <?php $blog->bloguser("assets/images/director-1-200x240.jpg","ดร.สมบูรณ์ ฟูเต็มวงศ์","ผู้กำนวยการกองบริการการศึกษา",""); ?>
           </div>
           <?php $blog->blogOffC();?>
           
           <?php $blog->blogOnC("tabs2 cid-qHJ9gv4gsu","tabs2-r","0","0,0,0");?>
           <div class="container">
                <div class="row">
                        <div class="col-md-12">
                            <ul class="nav nav-tabs" role="tablist"> 
                                <?php 
                                $blog->tabsPanel("ธุรการ","tabs2-r_tab0");
                                $blog->tabsPanel("งานพัฒนาหลักสูตร","tabs2-r_tab1");
                                $blog->tabsPanel("งานทะเบียนนิสิตและประมวลผล","tabs2-r_tab2");
                                $blog->tabsPanel("งานสนับสนุนวิชาการ","tabs2-r_tab3");
                                $blog->tabsPanel("งานวิเทศสัมพันธ์","tabs2-r_tab4");
                                $blog->tabsPanel("งานส่งเสริมนวัตกรรมและพัฒนาจัดการเรียนการสอน","tabs2-r_tab5");
                                $blog->tabsPanel("งานรับเข้า","tabs2-r_tab6");
                                ?>
                            </ul></div>
                            <div class="col-md-12">
                        <div class="tab-content">
                        
                            <?php 
                            $blog->tabsPaneOn("tab1","in active");
                            $blog->tabsPaneBody("http://hr.up.ac.th/resources/images/staff_pic/_20150629-084833.jpg","นางวรรณนิสา คำสนาม","นักวิชาการศึกษา");
                            $blog->tabsPaneBody("http://hr.up.ac.th/resources/images/staff_pic/1560100126034.jpg","น.ส.พรรณธิดา จำรัส","บุคลากร");
                            $blog->tabsPaneBody("http://hr.up.ac.th/resources/images/staff_pic/1560100135769.jpg","นางจิราภรณ์ ยำอางค์","นักวิชาการเงินและบัญชี");
                            $blog->tabsPaneBody("http://hr.up.ac.th/resources/images/staff_pic/_20150112-151616.jpg"," น.ส.เขมิกา งามจิต","นักวิชาการศึกษา");
                            $blog->tabsPaneBody("http://hr.up.ac.th/resources/images/staff_pic/_20151020-132643.jpg","นางสุภาวดี ธีบำรุง","เจ้าหน้าที่บริหารงานทั่วไป");
                            $blog->tabsPaneBody("http://hr.up.ac.th/resources/images/staff_pic/_20140821-112024.jpg","นายศิริโรจน์ ภูษิต","เจ้าหน้าที่บริหารงานทั่วไป");
                            $blog->tabsPaneBody("http://hr.up.ac.th/resources/images/staff_pic/3569900149891.jpg","นางสนธยา บรรเทิง","เจ้าหน้าที่บริหารงานทั่วไป");
                            $blog->tabsPaneBody("http://hr.up.ac.th/resources/images/staff_pic/3560100602169.jpg","นางมณีรัตน์ ใหม่ไชยา","คนงาน");
                            $blog->tabsPaneBody("http://hr.up.ac.th/resources/images/staff_pic/1510600052722.jpg","นายวชิระ จอมรัตนี","ผู้ปฏิบัติงานบริหาร");
                            $blog->tabsPaneBody("http://hr.up.ac.th/resources/images/staff_pic/_20141014-093714.jpg","นายรัตติกร พรหมสุริยา","พนักงานขับรถยนต์");
                            $blog->tabsPaneOff();
                        ?>    
                    
                        <?php 
                            $blog->tabsPaneOn("tab2","");
                            $blog->tabsPaneBody("http://hr.up.ac.th/resources/images/staff_pic/3520800013131.jpg","นางศศิมล คำปินไชย","นักวิชาการศึกษา");
                            $blog->tabsPaneBody("http://hr.up.ac.th/resources/images/staff_pic/3560100628079.jpg","น.ส.นงคราญ ใจดี","นักวิชาการศึกษา");
                            $blog->tabsPaneBody("http://hr.up.ac.th/resources/images/staff_pic/3569900117417.jpg","นายอัศวิน ดวงปัญญารัตน์","นักวิชาการศึกษา");
                            $blog->tabsPaneBody("http://hr.up.ac.th/resources/images/staff_pic/1560100109121.jpg","นางศศิธร เทพรังสาร","นักวิชาการศึกษา");
                            $blog->tabsPaneBody("http://hr.up.ac.th/resources/images/staff_pic/_20140821-134005.jpg","นายณัฐพงษ์ พรมวงษ์","นักวิชาการศึกษา");
                            $blog->tabsPaneBody("http://hr.up.ac.th/resources/images/staff_pic/1560100140649_20121107-200700.jpg","นายคาวี โพละ","นักวิชาการศึกษา");
                            $blog->tabsPaneBody("http://hr.up.ac.th/resources/images/staff_pic/_20171213-145815.jpg","น.ส.กฤตติรัตน์ ทองหล่อ","นักวิชาการศึกษา");
                            $blog->tabsPaneOff();
                        ?>

                        <?php 
                        $blog->tabsPaneOn("tab3","");
                        $blog->tabsPaneBody("http://hr.up.ac.th/resources/images/staff_pic/3600500409560.jpg","น.ส.กัลวรา ภูมิลา","นักวิชาการคอมพิวเตอร์");
                        $blog->tabsPaneBody("http://hr.up.ac.th/resources/images/staff_pic/3560700001956.jpg","นางรัตติกาล จันตระกูล","นักวิชาการศึกษา");
                        $blog->tabsPaneBody("http://hr.up.ac.th/resources/images/staff_pic/3550400070880.jpg","น.ส.สุดา มินทะขัติ","นักวิชาการศึกษา");
                        $blog->tabsPaneBody("http://hr.up.ac.th/resources/images/staff_pic/_20151015-143104.jpg","นายอัฒฑชัย เอื้อหยิ่งศักดิ์","นักวิชาการศึกษา");
                        $blog->tabsPaneBody("http://hr.up.ac.th/resources/images/staff_pic/3560100970656.jpg","น.ส.ทิพย์ศิรินทร์ จรัญ","นักวิชาการศึกษา");
                        $blog->tabsPaneBody("http://hr.up.ac.th/resources/images/staff_pic/3650600128279.jpg","นางญดา กุลพัฒน์เศรษฐ","นักวิชาการศึกษา");
                        $blog->tabsPaneBody("http://hr.up.ac.th/resources/images/staff_pic/3570200072234.jpg","น.ส.ญานิศา ทิพวะลี","นักวิชาการศึกษา");
                        $blog->tabsPaneBody("http://hr.up.ac.th/resources/images/staff_pic/3560101046995.jpg","น.ส.กุลิสรา นาแพร่","นักวิชาการศึกษา");
                        $blog->tabsPaneBody("http://hr.up.ac.th/resources/images/staff_pic/_20131112-154815.jpg","น.ส.กานดารัตน์ ใจผัด","นักวิชาการศึกษา");
                        $blog->tabsPaneBody("http://hr.up.ac.th/resources/images/staff_pic/1560100083459.jpg","น.ส.หรรษกานต์ ปัญญา","นักวิชาการศึกษา");
                        $blog->tabsPaneBody("http://hr.up.ac.th/resources/images/staff_pic/3559900137515.jpg","นายณัทธวุฒิ ระวังยศ","นักวิชาการศึกษา");
                        $blog->tabsPaneBody("http://hr.up.ac.th/resources/images/staff_pic/3520100293221.jpg","นางศิรินทิพย์ หมั่นงาน","นักวิชาการศึกษา");
                        $blog->tabsPaneBody("http://hr.up.ac.th/resources/images/staff_pic/3569900143698.jpg","น.ส.พรรณภา วงษ์หงษ์","นักวิชาการศึกษา");
                        $blog->tabsPaneBody("http://hr.up.ac.th/resources/images/staff_pic/_20131112-141130.jpg","น.ส.กัญญาภัทร มหาวงศ์","นักวิชาการศึกษา");
                        $blog->tabsPaneBody("http://hr.up.ac.th/resources/images/staff_pic/3569900073371.jpg","น.ส.สุมิตรา อินทะ","นักวิชาการคอมพิวเตอร์");
                        $blog->tabsPaneBody("http://hr.up.ac.th/resources/images/staff_pic/1640700072791.jpg","นายวุฒิพงษ์ คำพันธ์","นักวิชาการคอมพิวเตอร์");
                        $blog->tabsPaneBody("http://hr.up.ac.th/resources/images/staff_pic/_20171213-150820.jpg","นายปฐมพงศ์ บุญมา","นักวิชาการคอมพิวเตอร์");
                        $blog->tabsPaneOff();
                        ?>

                        <?php 
                        $blog->tabsPaneOn("tab4","");
                        $blog->tabsPaneBody("http://hr.up.ac.th/resources/images/staff_pic/3509900223705.jpg","น.ส.ปริญาพร สันตะจิตต์","นักวิชาการศึกษา");
                        $blog->tabsPaneBody("http://hr.up.ac.th/resources/images/staff_pic/3560101038704.jpg","นางปราณิสา กัลวงษ์ยา","นักวิชาการศึกษา");
                        $blog->tabsPaneBody("http://hr.up.ac.th/resources/images/staff_pic/3520200301934.jpg","นางพจนา จิรเบญจวรรณ","นักวิชาการศึกษา");
                        $blog->tabsPaneBody("http://hr.up.ac.th/resources/images/staff_pic/_20140821-115459.jpg","นายนพรัตน์ ใจหมั่น","นักวิชาการศึกษา");
                        $blog->tabsPaneBody("http://hr.up.ac.th/resources/images/staff_pic/1560100157002.jpg","นายพีระชาติ อูปแก้ว","นักวิชาการศึกษา");
                        $blog->tabsPaneBody("http://hr.up.ac.th/resources/images/staff_pic/_20151020-133753.jpg","นายพณัฐ เชื้อประเสริฐศักดิ์","นักวิชาการศึกษา");
                        $blog->tabsPaneOff();
                        ?>

                        <?php 
                        $blog->tabsPaneOn("tab5","");
                        $blog->tabsPaneBody("http://hr.up.ac.th/resources/images/staff_pic/3579900040422.jpg","นายประกิจพันธ์ พัฒนหิรัญธำรง","นักวิเทศสัมพันธ์");
                        $blog->tabsPaneBody("http://hr.up.ac.th/resources/images/staff_pic/3520300356285.jpg","น.ส.วรรณา เสริมสุข","นักวิเทศสัมพันธ์");
                        $blog->tabsPaneBody("http://hr.up.ac.th/resources/images/staff_pic/_20130819-112346.jpg","นายพีรพงษ์ กีรติศักดิ์วรกุล","นักวิเทศสัมพันธ์");
                        $blog->tabsPaneOff();
                        ?>

                        <?php 
                        $blog->tabsPaneOn("tab6","");
                        $blog->tabsPaneBody("http://hr.up.ac.th/resources/images/staff_pic/3659900197266.jpg","นายสุเมธ เรืองเดช","นักวิชาการคอมพิวเตอร์");
                        $blog->tabsPaneBody("http://hr.up.ac.th/resources/images/staff_pic/3650600215571.jpg","น.ส.ยุพา คุ้มคำ","นักวิชาการโสตทัศนศึกษา");
                        $blog->tabsPaneBody("http://hr.up.ac.th/resources/images/staff_pic/_20170817-111539.jpg","น.ส.เกศณีย์ งามจิตต์","นักวิชาการโสตทัศนศึกษา");
                        $blog->tabsPaneBody("http://hr.up.ac.th/resources/images/staff_pic/1659900195127.jpg","นายธนากร ภู่กร","นักวิชาการโสตทัศนศึกษา");
                        $blog->tabsPaneBody("http://hr.up.ac.th/resources/images/staff_pic/3649900040120.jpg","นายเพ็ชร พงษ์เฉย","นักวิชาการโสตทัศนศึกษา");
                        $blog->tabsPaneBody("http://hr.up.ac.th/resources/images/staff_pic/3100600528263.jpg","นายพชร เจียมเจริญ","นักวิชาการโสตทัศนศึกษา");
                        $blog->tabsPaneBody("http://hr.up.ac.th/resources/images/staff_pic/1100500051272.jpg","นายสุรใจ สุพรพัฒนกุล","นักวิชาการโสตทัศนศึกษา");
                        $blog->tabsPaneBody("http://hr.up.ac.th/resources/images/staff_pic/1560100094906.jpg","นายเจษฎา ธรรมสาร","นักวิชาการคอมพิวเตอร์");
                        $blog->tabsPaneBody("http://hr.up.ac.th/resources/images/staff_pic/_20130418-160145.jpg","นายเอกชัย เทียนเงิน","นักประชาสัมพันธ์");
                        $blog->tabsPaneOff();
                        ?>

                        <?php 
                        $blog->tabsPaneOn("tab7","");
                        $blog->tabsPaneBody("http://hr.up.ac.th/resources/images/staff_pic/3530700647996.jpg","นายสมทบ เหล็กสิงห์","นักวิชาการศึกษา");
                        $blog->tabsPaneBody("http://hr.up.ac.th/resources/images/staff_pic/5530700016470.jpg","น.ส.วิไลลักษณ์ ครุฑปาน","นักวิชาการศึกษา");
                        $blog->tabsPaneBody("http://hr.up.ac.th/resources/images/staff_pic/1560100095015.jpg","น.ส.ชลล์สิฌาณ์ พรหมเสน","นักวิชาการศึกษา");
                        $blog->tabsPaneBody("http://hr.up.ac.th/resources/images/staff_pic/1560700005602.jpg","น.ส.วันนิสา พูนรัตนทรัพย์","นักวิชาการศึกษา");
                        $blog->tabsPaneBody("http://hr.up.ac.th/resources/images/staff_pic/1101400487711.jpg","น.ส.พิชญาภา โสรัตน์","นักวิชาการศึกษา");
                        $blog->tabsPaneBody("http://hr.up.ac.th/resources/images/staff_pic/_20130605-142950.jpg","นายธนกร เสนจุ้ม","นักวิชาการศึกษา");
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