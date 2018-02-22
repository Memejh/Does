<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <link href='https://fonts.googleapis.com/css?family=Dosis|Candal' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="<?php echo e(asset('assets/icon/animate_icon.css')); ?> ">
        <link href="<?php echo e(asset('assets/fonts/style.css')); ?>"  rel="stylesheet">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo e(config('app.name')); ?></title>
<style>
    html,body,h1,h2,h3,h4,h5,p,div,a,li,ul,button{
        font-family: 'CSChatThaiUI';
    }
</style>
        <!-- Styles
        <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet"> -->
        <link href="<?php echo e(asset('css/editor.css')); ?>" rel="stylesheet">

        <link href="<?php echo e(asset('css/navbar.css')); ?>" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-global navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo e(URL::to('home')); ?>"><?php echo e(config('app.name2')); ?></a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-user navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                <span class="glyphicon glyphicon-user"></span> <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                        <?php echo e(csrf_field()); ?>

                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>
        <nav class="navbar-primary">
            <a href="#" class="btn-expand-collapse"><span class="glyphicon glyphicon-menu-left"></span></a>
            <ul class="navbar-primary-menu">
              <li class="<?php echo e(Request::is('user') ? 'class="active"' : ''); ?>">
                  <a href="<?php echo e(URL::to('user')); ?>"><span class="glyphicon glyphicon-user"></span><span class="nav-label">จัดการผู้ใช้</span></a>
                 </li>
                   <li class="<?php echo e(Request::is('gcontent') ? 'class="active"' : ''); ?>">
                       <a href="<?php echo e(URL::to('gcontent')); ?>"><i class="fas fa-list-ul"></i><span class="nav-label"> จัดการหมวดหมู่</span></a>
                      </li>
                      <li class="<?php echo e(Request::is('content') ? 'class="active"' : ''); ?>">
                          <a href="<?php echo e(URL::to('content')); ?>"><span class="glyphicon glyphicon-list-alt"></span><span class="nav-label">จัดการข่าวสาร</span></a>
                         </li>
                         <li class="<?php echo e(Request::is('slideshow') ? 'class="active"' : ''); ?>">
                             <a href="<?php echo e(URL::to('slideshow')); ?>"><span class="glyphicon glyphicon-film"></span><span class="nav-label">จัดการสไลด์</span></a>
                            </li>
                            <li class="<?php echo e(Request::is('officerM') ? 'class="active"' : ''); ?>">
                              <a href="<?php echo e(URL::to('officerM')); ?>"><i class="fas fa-users"></i><span class="nav-label"> จัดการบุคลากร</span></a>
                            </li>
                      <li class="<?php echo e(Request::is('galleryM') ? 'class="active"' : ''); ?>">
                          <a href="<?php echo e(URL::to('galleryM')); ?>"><span class="glyphicon glyphicon-picture"></span><span class="nav-label">จัดการรูปภาพ</span></a>
                         </li>

                            <!--  <li class="<?php echo e(Request::is('upload') ? 'class="active"' : ''); ?>">
                                <a href="<?php echo e(URL::to('upload')); ?>"><span class="glyphicon glyphicon-open-file"></span><span class="nav-label">จัดการไฟล์อัพโหลด</span></a>
                              </li> -->
                          </ul>
                         </nav>
                         <style>
                                .zoom {
                                    -webkit-transition: all 0.35s ease-in-out;
                                    -moz-transition: all 0.35s ease-in-out;
                                    transition: all 0.35s ease-in-out;
                                    cursor: -webkit-zoom-in;
                                    cursor: -moz-zoom-in;
                                    cursor: zoom-in;
                                    }

                                    .zoom:hover,
                                    .zoom:active,
                                    .zoom:focus {
                                    /**adjust scale to desired size,
                                    add browser prefixes**/
                                    -ms-transform: scale(2.5);
                                    -moz-transform: scale(2.5);
                                    -webkit-transform: scale(2.5);
                                    -o-transform: scale(2.5);
                                    transform: scale(2.5);
                                    position:relative;
                                    z-index:100;
                                    }

                        </style>
                         <?php echo $__env->yieldContent('content'); ?>


                         <!-- Scripts
                         <script src="<?php echo e(asset('js/app.js')); ?>"></script> -->
                         <script src="<?php echo e(asset('js/navbar.js')); ?>"></script>
                         <script src="<?php echo e(asset('js/editor.js')); ?>"></script>
