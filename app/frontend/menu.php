<?php
class menu{
    function navbar($color){
        if($color == "1" or $color == "black"){$color = "";}
        else {$color = "transparent";}
        echo'<section class="menu cid-qHrv4G4zit" once="menu" id="menu1-0 ">
        <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm bg-color '.$color.'">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
            
            <div class="menu-logo">
                <div class="navbar-brand">
                    <span class="navbar-logo" id="navpc">
                        <a href="'.url("").'">
                             <img src="'.asset('assets/images/logo5.png').'" alt="Mobirise" title="" style="height: 2.8rem !important;">
                        </a>
                    </span>
                    <span class="navbar-logo" id="navmobile">
                    <a href="'.url("").'">
                         <img src="'.asset('assets/images/logom.png').'" alt="Mobirise" title="" style="height: 1.8rem !important;">
                    </a>
                </span>
                    
                </div>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true">
                <!---<li class="nav-item">
                        <a class="nav-link link text-white fonty" href="'.url("").'">
                            <span class="mbri-home mbr-iconfont mbr-iconfont-btn"></span>
                            หน้าหลัก</a>
                    </li> -->
                    <li class="nav-item dropdown open"><a class="nav-link link text-white dropdown-toggle fonty" href="" data-toggle="dropdown-submenu" aria-expanded="true"><span class="mbri-hot-cup mbr-iconfont mbr-iconfont-btn"></span>
                            
                            แนะนำหน่วยงาน</a><div class="dropdown-menu"><a class="text-white dropdown-item fonty" href="'.url("about_home").'">ปรัชญา วิสัยทัศน์ และคำขวัญ</a><a class="text-white dropdown-item fonty" href="'.url("about_history").'" aria-expanded="true">ประวัติหน่วยงาน</a><a class="text-white dropdown-item fonty" href="'.url("about_people").'" aria-expanded="false">โครงสร้างหน่วยงาน</a></div></li>
                            <li class="nav-item"><a class="nav-link link text-white fonty" href="'.url("news").'"><span class="mbri-contact-form mbr-iconfont mbr-iconfont-btn"></span>
                            
                            ข่าวประกาศ</a><div class="dropdown-menu"><a class="text-white dropdown-item fonty" href="">ข่าวประชาสัมพันธ์</a><a class="text-white dropdown-item fonty" href="" aria-expanded="true">ประกาศ ระเบียบ ข้อบังคับ</a><a class="text-white dropdown-item fonty" href="" aria-expanded="false">ปฏิทินกิจกรรม</a><a class="text-white dropdown-item fonty" href="" aria-expanded="false">จดหมายข่าว UP-DOES</a><a class="text-white dropdown-item fonty" href="" aria-expanded="false">ประชาสัมพันธ์งานรับเข้า</a></div></li><li class="nav-item">
                            <a class="nav-link link text-white fonty" href="'.url("student").'"><span class="mbri-user mbr-iconfont mbr-iconfont-btn"></span>
                            
                            นิสิตปริญญาตรี</a></li><li class="nav-item"><a class="nav-link link text-white fonty" href="'.url("graduate").'"><span class="mbri-user2 mbr-iconfont mbr-iconfont-btn"></span>
                            
                            บัณฑิตศึกษา</a></li>
                    <li class="nav-item">
                        <a  class="nav-link link text-white fonty" href="'.url("officer").'"><span class="mbri-users mbr-iconfont mbr-iconfont-btn"></span>
                            
                            คณาจารย์/เจ้าหน้าที่</a>
                    </li>
                    <li class="nav-item">
                    <a  class="nav-link link text-white fonty" href="'.url("gallery").'"><span class="mbri-photo mbr-iconfont mbr-iconfont-btn"></span>
                        
                        รูปภาพ</a>
                </li>
                    </ul>
                
            </div>
        </nav>
    </section>';
    }

    function footer(){
        echo '<section class="footer4 cid-qHrUY4r8hn" id="footer4-7">
        <div class="container">
            <div class="media-container-row content mbr-white">
                <div class="col-md-3 col-sm-4">
                    <div class="mb-3 img-logo">
                        <a href="#">
                            <img style="height: 45px;" src="assets/images/logo-832x274.png">
                        </a>
                    </div>
                    <p class="mb-4 mbr-fonts-style foot-title display-7">
                        กองบริการการศึกษา
                        <br>
                        <b>มหาวิทยาลัยพะเยา</b>
                    </p>
                    <div class="social-list pl-0 mb-0">
                        <div class="soc-item">
                            <a href="https://www.facebook.com/does.up.73" target="_blank">
                                <span class="mbr-iconfont mbr-iconfont-social socicon-facebook socicon"></span>
                            </a>
                        </div>
                    </div>
                </div>
    
                <div class="mb-4 foot-title mbr-fonts-style display-7">
                    <a style="color:white;" href="http://www.up.ac.th/">มหาวิทยาลัยพะเยา</a>
                    <br>
                    <a style="color:white;" href="http://www.reg.up.ac.th/"> ระบบลงทะเบียนออนไลน์ </a>
                    <br>
                    <!--<a style="color:white;" href="http://www.does.up.ac.th/v3/page.php?v=doc"> เอกสารประกอบโครงการ/กิจกรรม</a>-->
                    <br>
                    <!--<a style="color:white;" href="http://www.does.up.ac.th/ge.php">หมวดศึกษาทั่วไป</a>-->
                    <br>
                    <!--<a style="color:white;" href="http://www.does.up.ac.th/v3/page.php?v=coops">สหกิจศึกษา</a>-->
    
                </div>
    
                <div class="col-md-4 offset-md-1 col-sm-12">
                    <a style="color:white;" href="http://www.does.up.ac.th/upload/tri56.pdf">คู่มือนิสิต ระดับปริญญาตรี 2556 </a>
                    <br>
                    <a style="color:white;" href="http://www.does.up.ac.th/upload/to56.pdf"> คู่มือนิสิต ระดับบัณฑิตศึกษา 2556 </a>
                    <br>
                    <a style="color:white;" href="http://www.does.up.ac.th/upload/tri_55.pdf">คู่มือนิสิต ระดับปริญญาตรี 2555 </a>
                    <br>
                    <a style="color:white;" href="http://www.does.up.ac.th/upload/toh_55.pdf"> คู่มือนิสิต ระดับบัณฑิตศึกษา 2555 </a>
                    <br>
                    <a style="color:white;" href="http://www.does.up.ac.th/up_reg_manual.pdf"> คู่มือการรับบริการ งานทะเบียนนิสิตและประมวลผล </a>
                    <br>
                    <a style="color:white;" href="http://www.does.up.ac.th/upload/grd_for_std.pdf"> คู่มือสำหรับนิสิต เพื่อยื่นสำเร็จการศึกษา </a>
                    <br>
                    <a style="color:white;" href="http://www.does.up.ac.th/upload/grd_for_staff.pdf"> คู่มือสำหรับเจ้าหน้าที่ เพื่อรับยื่นสำเร็จการศึกษา</a>
                </div>
            </div>
            <div class="footer-lower">
                <div class="media-container-row">
                    <div class="col-sm-12">
                        <hr>
                    </div>
                </div>
                <div class="media-container-row mbr-white">
                    <div class="col-sm-12 copyright">
                        <p class="mbr-text mbr-fonts-style display-7">
                            © 2018 Division of Educational Services,University of Phayao,THAILAND </p>
                    </div>
                </div>
            </div>
        </div>
    </section>';
    }
}



?>
