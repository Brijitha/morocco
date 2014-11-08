<?php





require('system.global.php');

require('system/sys-core/lang/arb.admin.lang.php');

?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml" dir="rtl">

<head>

    <meta charset="utf-8" />

    <title><?=_sys_name;?> :: System</title>

    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

    <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.1.2/css/bootstrap-rtl.min.css">

    <link rel="stylesheet" href="//cdn.datatables.net/1.10.0/css/jquery.dataTables.css">

    <link rel="stylesheet" href="//cdn.jsdelivr.net/bootstrap.wysihtml5/0.0.2/bootstrap-wysihtml5-0.0.2.css">

    

    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

    <script src="//cdn.datatables.net/1.10.0/js/jquery.dataTables.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/wysihtml5/0.3.0/wysihtml5.min.js"></script>

    <script src="//cdn.jsdelivr.net/bootstrap.wysihtml5/0.0.2/bootstrap-wysihtml5-0.0.2.js"></script>

    <script src="http://cdn.mymorocco.ae/tinymce/tinymce.min.js"></script>

    <script src="http://cdn.mymorocco.ae/tinymce/jquery.tinymce.min.js"></script>

    <link rel="stylesheet" type="text/css" href="system/sys-references/js/bootstrap-wysihtml5.css">

    

    <script src="system/sys-references/js/wysihtml5-0.3.0.js"></script>

    <script src="system/sys-references/js/bootstrap-wysihtml5.js"></script>

    <link rel="stylesheet" type="text/css" href="css?x=admin">

     <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">

    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

    <script src="js?x=adminLangArb"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.2.0/bootbox.min.js"></script>

</head>

<body>

    <?php 

    /// Adminstation Login area.

    if(!isset($_SESSION['userEditor'])){

    ?>

    

        <script src="js?x=editorLogin"></script>

        <div id="loginForm">

        

            <div class="infoMessage"></div>

            <div class="logo"></div>

            <div class="alert alert-danger" style="display:none;"></div>

            <form role="form">

              <div class="form-group">

                <label for="exampleInputEmail1">عنوان البريد</label>

                <input type="email" class="form-control" id="username" placeholder="">

              </div>

              <div class="form-group">

                <label for="exampleInputPassword1">كلمة المرور</label>

                <input type="password" class="form-control" id="password" placeholder="">

              </div>

              <p style="text-align:center;">

              <button type="button" class="btn btn-warning" id="loginBTN">تسجيل دخول</button>

              </p>

            </form>

            <!--<div style="text-align:center; padding-top:10px;"><?php_sys_name;?></div>-->
            <div align="center">
            <!--<p>Powered by: <a href="http://www.damantk.com" target="_blank">Damantech Co</a></p>
            <a href="http://www.damantk.com" target="_blank"><img src="system/sys-references/images/daman_logo_eng.png" width="70" height="20"></a>-->
            </div>


        </div>

    <?php

    }else{

    ?>

          <script src="js?x=editorMain"></script>

        <div class="modal fade" id="changePasswordForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

        <h4 class="modal-title" id="myModalLabel">تغير كلمة المرور</h4>

      </div>

      <div class="modal-body">

            <form role="form">

              <div class="form-group">

                <label for="exampleInputEmail1">كملة المرور القديمة</label>

                <input type="password"  class="form-control" id="oldPassword" placeholder="كلمة المرور القديمة">

              </div>

              <div class="form-group">

                <label for="exampleInputPassword1">كلمة المرور الجديده</label>

                <input type="password" class="form-control" id="newPassword" placeholder="كلمة المرور الجديده">

              </div>

              <div class="form-group">

                <label for="exampleInputFile">أعد كتابة كلمة المرور</label>

                <input type="password" class="form-control" id="repNewPassword" placeholder="أعد كتابة كلمة المرور">

              </div>

             

          

            </form>

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-default" data-dismiss="modal">إلغاء</button>

        <button type="button" class="btn btn-primary" id="saveNewPasswordBTN">حفظ</button>

      </div>

    </div>

  </div>

</div>

        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">

        

          <div class="container">

            <a class="navbar-brand" href="../"><img src="system/sys-references/images/loader_logo_02.jpg" style="height:40px; width:120px; margin-top:-10px;"/></a>

            <ul class="nav navbar-nav" >

            </ul>

            

            <ul class="nav navbar-nav navbar-left">

                <li class="dropdown">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                    

                    <?=$_SESSION['userEditor']['fullname'];?>

                    <img class="media-object pull-left" data-src="holder.js/64x64" alt="64x64" src="http://www.mymorocco.ae/<?=$_SESSION['userEditor']['image'];?>" style="width: 30px; height: 30px; border-radius:5px;">

                    <b class="caret"></b></a>

                    

                    <ul class="dropdown-menu">

                        <li ><a href="#" id="changePasswordBTN"><i class="fa fa-cog"></i> تغير كلمة المرور</a></li>

                        <li class="divider"></li>

                        <li><a href="" id="logoutBTN"><i class="fa fa-power-off"></i> <?=_lang_logout;?></a></li>

                        

                    </ul>

               </li>

           </ul>

          </div>

        </nav>

        

        

 

        

        

        <div class="modal fade" id="topicsFormModule" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"  data-backdrop="static">

        <div class="modal-dialog">

            <div class="modal-content">

              <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                <h4 class="modal-title" id="myModalLabelT">موضوع</h4>

              </div>

              <div class="modal-body">

                    

                     <div id="topicFrom" role="form">

                        <div class="form-group">

                            <label for="">عنوان الموضوع</label>

                            <input type="text" class="form-control" id="title" placeholder="إدخل عنوان الموضوع">

                        </div>

                        

                        <div class="form-group">

                            <label for="">محتوى الموضوع</label>

                            <textarea class="form-control" id="content" placeholder="اكتب محتوى الموضوع" style="height:200px;"></textarea>

                        </div>

                        

                        <div class="form-group">

                            <label for="">قسم</label>

                            <select id="section" class="form-control">

                                <?php

                                $do = $conn->selectQuery('SELECT `id`, `name` FROM `magazine_sections` LIMIT 50');

                                while($row= mysql_fetch_assoc($do)){   

                                ?>

                                <option value="<?=$row['id'];?>"><?=$row['name'];?></option>

                                <?php }?>

                            </select>

                        </div>

                         <div class="form-group">

                            <label for="">حالة النشر</label>

                            <select id="status" class="form-control">

                                <option value="1">مفعل</option>

                                <option value="0">غير مفعل</option>

                            </select>

                        </div>

                        <input type="hidden" value="" id="imageFile"/>

                        <form id="fileinfo" enctype="multipart/form-data" method="post" name="fileinfo">

                        <div class="form-group">

                            <label for="">إضافة صوره</label>

                            <input name="file" type="file" id="images">

                            <p class="help-block">يمكنك إدراج صوره مع الموضوع</p>

                            </div>

                            

                        </form>

                       <div class="progress">

                            <div id="imageProgress" class="progress-bar progress-bar-success" style="width: 0%">

                                <span class="sr-only"></span>

                              </div>

                        </div>

                   

                    </div>

              

              

              </div>

              <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal">إلغاء</button>

                <button type="button" class="btn btn-primary" id="saveTopicBTN" data-id="">حفظ</button>

              </div>

            </div>

          </div>

        </div>

        

        <div class="container">

        

        <div class="page-header" style="margin-top:80px;">

          <h1>المواضيع <small></small></h1>

          

        </div>

        

        <button id="addNewTopic" type="button" class="btn btn-primary">إضافة موضوع جديد</button>

        



        

        <table id="topicsData" class="table">

            <thead>

                <tr>

                    <th>رقم</th>

                    <th>عنوان</th>

                    <th>محتوى</th> 

                    <th>قسم</th>

                    <th>تاريخ النشر</th>

                    <th>حالة النشر</th>

                    <th>صوره</th>

                    <th>عدد المشاهدات</th>

                    <th></th>  

                </tr>

            </thead>

            <tbody>

       

            </tbody>

  

        </table>

              

        </div>

        <div id="loadmoreajaxloader" class="container" style="text-align:center; padding:20px;">  تحميل البيانات  <i class="fa fa-refresh fa-spin"></i></div>

    <?php

    }

    ?>

</body>

</html>


