<?php

///-----------------------------------------------------+

/// Project: My Morocco                                 |

/// Devloped By: Ahmed.M.Yassin                         |

/// ----------------------------------------------------+

require('system.global.php');

?>

<!DOCTYPE html>



<!--<html lang="eng" xmlns="http://www.w3.org/1999/xhtml">-->
<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:og="http://ogp.me/ns#"
      xmlns:fb="http://ogp.me/ns/fb#"
     >


<head>

    <title><?=_sys_name;?></title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <?php
	//if(isset($_GET['image']))
	//{
		//$title = $_GET['image'];
	//}
	?>
   

    

    <link rel="icon" type="image/png" href="icon.ico" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
		$image_id = $_GET['id'];
		$result = mysql_query("SELECT content ,title,images FROM magazine_topics WHERE id = $image_id");
		$row = mysql_fetch_array($result);
		$desc = strip_tags(unsanitizeText($row['content']));
		$title = $row['title'];
		$image = $row['images'];
		$imagelink= $_SERVER['HTTP_HOST']."/morocco/system/sys-references/images/topics/".$image;
		
		function unsanitizeText($text) {
    $text = stripcslashes($text);
    $text = str_replace(array("&lt;","&gt;","&quot;","&#039;"), array("<",">","\"","'"), $text);
    return $text;
  } // unsanitizeText
		?>
        
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"> </script>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"><script async  src="system/sys-core/javascript/home.main.javascript.js"></script>
		
        
    <meta property="og:title" content="<?php echo $title;?>" />
<meta property="og:type" content="article" />
<meta property="og:image" content="http://<?php echo $imagelink;?>" />
<meta property="og:url" content="mymorocco.ae" />
<meta property="og:description" content="<?php echo $desc;?>" />

<script src="system/sys-references/modernizr.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js">
	</script><link href="system/sys-references/css/style.css" rel="stylesheet" type="text/css">
	<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Raleway:400,500&amp;subset=latin,latin-ext&amp;v=.css" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Poiret+One&amp;v=.css" rel="stylesheet" type="text/css">
	<link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.1.2/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css">
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	<link href="css?x=mainHome&amp;v=.css" rel="stylesheet" type="text/css"><script src="js?x=sticky&amp;v=.js"></script>
	<script src="js?x=localscroll&amp;v=.js"></script><script src="js?x=scrollTo&amp;v=.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-timeago/0.11.4/jquery.timeago.js"></script>
	<script src="js?x=touchSwipe&amp;v=.js"></script><script src="js?x=parallax&amp;v=.js"></script>
	<script src="js?x=appear&amp;v=.js"></script><script src="js?x=prettyPhoto&amp;v=.js"></script>
	<script src="js?x=isotope&amp;v=.js"></script><script src="js?x=bxslider&amp;v=.js"></script>
	<script src="js?x=cycleAll&amp;v=.js"></script><script src="js?x=maximage&amp;v=.js"></script>
	<script src="js?x=sscr&amp;v=.js"></script><script src="js?x=skrollr&amp;v=.js"></script>
	<script src="js?x=jigowatt&amp;v=.js"></script><script src="js?x=scripts&amp;v.js"></script>
	<link href="css?x=navigationStyle1&amp;v=.css" rel="stylesheet" type="text/css">
	<link href="css?x=navigationStyle2&amp;v=.css" rel="stylesheet" type="text/css">
	<link href="css?x=navigationStyle3&amp;v=.css" rel="stylesheet" type="text/css">
	<link href="css?x=navigationStyle4&amp;v=.css" rel="stylesheet" type="text/css">
	<link href="css?x=prettyPhoto&amp;v=.css" rel="stylesheet" type="text/css">
	<link href="css?x=style&amp;v=.css" rel="stylesheet" type="text/css">
	<link href="css?x=bxslider&amp;v=.css" rel="stylesheet" type="text/css">

    <script src="https://connect.facebook.net/en_US/all.js"></script>
    <script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
<script>
function loadall()
{

dataload();
sysBoot.init(); 
}
function dataload()
{
$(document).ready(function(){
var ids=<?php echo $image_id;?>;


 $.ajax({
                url: 'ajax?x=magazineTopics',

                data: { oper: 'getTopic', id: ids },

                dataType: 'json',

                type: 'post',

                success: function (r) {

                    //$('#topicReadMore').find('.modal-content ul').html(null);
					$('#topicReadMore').find('#relTitle').html(null);
					
                    $.each(r.related, function (i, item) {
					$('#topicReadMore').find('#relTitle').html('مواضيع ذات صله');
				var li = '<li data-id="' + r.related[i].id + '" id="'+ r.related[i].id + '" style="background-image:url(system/sys-references/images/topics/' + r.related[i].images + ')"><a href="system.home.topics.php?id='+ r.related[i].id+'"><div class="mask2" style="width:180px; height:140px;"></div></a></li>';
							
							 $('#topicReadMore').find('ul').append(li);
				        // li.appendTo($('#topicReadMore').find('ul'));

                    });
					
					$.each(r.data, function (i, item) {
					    $('#topicReadMore').find('.modal-content #hasImage').attr({ 'src':'system/sys-references/images/topics/' + r.data[i].images });
                        $('#topicReadMore').find('.modal-content .containerM').html( r.data[i].content);
                        $('#topicReadMore').find('.modal-content .modal-header h4').html(r.data[i].title);
                        $('#topicReadMore').find('.modal-content .label-info').html(r.data[i].writtenBy);
                        $('#topicReadMore').find('.modal-content .label-default').html(r.data[i].createDate);
						$.ajax({
                            url: 'ajax?x=magazineTopics',
                            data: { oper: 'addView', id: ids },
                            dataType: 'json',
                            type: 'post',
                            success: function (r) {
                                if ($('#data'+ids).length!= null) {
                                    var _count = $('#data'+ids).find('.counter').html();
                                    _count = Math.abs(eval(_count) + 1);
                                    $('#data'+ids).find('.counter').html(_count);
                                }
                            }
                        });
						var _image =  r.data[i].images;
						_imageFile = _image;
                      //  $('#linksshare').html(null);
                       // $('#topicReadMore').modal('show');
                        $('#counter').html(r.data[i].counter);
                        $('#linksshare').html('<a onClick="window.open(\'http://www.facebook.com/sharer.php?s=100&amp;p[title]=' + r.data[i].title + '&amp;p[summary]=summary&amp;p[url]=http%3A%2F%2Fmymorocco.ae%2F%23topics%2F' + ids + '&amp;&p[images][0]=' + _image + '\', \'sharer\', \'toolbar=0,status=0,width=548,height=325\');" target="_parent" href="javascript: void(0)" style="position:relative; top:20px; left:-65px;"><img src="system/sys-references/images/fb_image.jpg" width="57" height="22"></a><br><a href="https://twitter.com/share" class="twitter-share-button"  data-size="small" data-count="none" data-url="http://mymorocco.ae/#topics/' + ids + '" style="margin-buttom:10px; margin-top:10px;">twitter</a>');
						var _height= "100px";
                        if($('#topicReadMore').width()<300){
                         _height="250px";
                        }else{
                        _height = "100px";
                        }
						$('#linksshare').html('<iframe src="http://mymorocco.ae/system/sys-core/SDK/smsdk.php?id='+ids+'&img='+_imageFile+'&desc='+ r.data[i].title +'" style="display:block; left:50px; position:relative; margin-left:100px; width:303px; min-width:520px; height:'+_height+'; border:0px; overflow:hidden;"></iframe>');
                        var regExp = '(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu.be\/)([^"&?\/ ]{11})';
                        var url = r.data[i].content;
                        var match = url.match(regExp);
                        if (match[1] != null || match[1] != '') {
                            $('#topicReadMore').find('.modal-content .containerM').append('<iframe width="100%" height="315" style="margin-top:40px;" src="http://www.youtube.com/embed/' + match[1] + '" frameborder="0" allowfullscreen></iframe>');
                        }
                        
					});
					}
					});
});
}
</script>
    
</head>
    

 



<body onload=" loadall();" data-spy="scroll" data-target=".navbar" data-offset="75">





<div id="subpageDisplayer">

   <div class="container" style="background:#fff;">

        <div class="closeBTN"><img src="system/sys-references/images/close.png"/></div>

        <div class="section-title">

           <h1></h1>

        </div>				

        

       <div class="row" style=" padding-bottom:10px;">

            <div class="col-md-4" style="text-align:center; padding:0px;"><img class="img" data-src="holder.js/64x64"  src="" style="width: 260px; height: 260px; margin:0px;"></div>

            <div class="col-md-8">

              <div class="about">

                    <h4 class="media-heading">نبذه تعريفية</h4>

                    <p></p>

              </div>

            </div>

      </div>

    </div>

    

   

    

    

    

   </div>

  

</div>





    

<!-- Home Section -->

    

	<div id="home" class="parallax-slider " >



			<!-- Slider -->

            <ul class="fullwidth-slider" >

                

                <!-- Slide 1 -->

                <li class="slide" style="background-image: url(system/sys-references/images/slider2.jpg);" data-anchor-target="section" data-70-top="background-position: center 400px;" data-start="background-position: center 0px;">

                    

                </li>

                <!--/.Slide 1 -->

                

                <!-- Slide 2 -->

                <li class="slide" style="background-image: url(system/sys-references/images/slider2.jpg);" data-anchor-target="section" data-70-top="background-position: center 400px;" data-start="background-position: center 0px;">



                    

                </li>

                <!--/.Slide 2 -->

                

                <!-- Slide 3 -->

                <li class="slide" style="background-image: url(system/sys-references/images/slider3.jpg)" data-anchor-target="section" data-70-top="background-position: center 400px;" data-start="background-position: center 0px;">



                </li>

                <!--/.Slide 3 -->

                

                

            </ul>

			<!--/.Slider -->

				

       	

        

	</div>	

	<!-- End Home Section -->

    

    <div id="newsBar">

        <div class="container" style="padding:0px; margin:0px; position: relative; margin:auto;" >

        <marquee behavior="scroll" direction="right">

            <ul class="news">

                <li>عنوان الموضوع</li>

            </ul>

        </marquee>

        </div>

    </div>

	

    <!-- Navigation -->

    <div id="navigation" class="navbar  navbar-fixed-top">

		<div class="navbar-inner ">

        	<div class="container no-padding" style="background:rgba(0,0,0,.7);">

                <div class="navbar-header">

                  <div class="topLogo visible-xs">

                    <a class="colapse-menu1 " href="mymorocco.ae"><img src="system/sys-references/images/top_logo.png"/></a>

                    

                  </div>

                  <button type="button" class="navbar-toggle navbar-inverse" data-toggle="collapse" data-target="#bs-example-navbar-collapse-9" style="margin-left:30px;">

                    <span class="sr-only">Toggle navigation</span>

                    <span class="icon-bar" stlye="background:#fff;"></span>

                    <i class="fa fa-bars"></i>

                  </button>

                  

                </div>

                

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-9">

                  <ul class="nav navbar-nav">

                    <li class="menu-1 hidden-xs"><a class="colapse-menu1" href="mymorocco.ae"><img src="system/sys-references/images/top_logo.png"/></a></li>

                    <li class="menu-2" style="margin-right:10px;"><a class="colapse-menu1 " href="#homePage" style="font-family: 'Droid Arabic Kufi';font-size: 14px;">الرئيسية</a></li>

					<li class="menu-2" style="margin-right:10px;"><a class="colapse-menu1 " href="#we-are-newave" style="font-family: 'Droid Arabic Kufi';font-size: 14px;">المواضيع</a></li>

					<li class="menu-3"  style="margin-right:10px; display:none;"><a class="colapse-menu1 " href="#our-team" style="font-family: 'Droid Arabic Kufi';font-size: 14px;">محررين المجلة</a></li>

					<li class="menu-4"  style="margin-right:10px;"><a class="colapse-menu1 " href="#clients" style="font-family: 'Droid Arabic Kufi';font-size: 14px;">عن المجلة</a></li>

					<li class="menu-6" style="margin-right:10px;"><a class="colapse-menu1 " href="#contact-parallax" style="font-family: 'Droid Arabic Kufi';font-size: 14px;">اتصل بنا</a></li>

                  </ul>

                </div>

			</div>

	    </div>

	</div>

    <!--/Navigation -->

    

    

	<section id="homePage">

		

        <!-- Container -->

		<div class="container" style="margin-top:0px;">
 
            

            <!-- Section Title -->

            <div class="section-title">

                <h1>الرئيسية</h1>

                <span class="border"></span>

                

             </div>		

			<!--/Section Title -->

            

            <div class="row">

                <div class="col-md-4">

                    <h1>أخر الأخبار</h1>

                    <div id="lastTopicsList_one">

                        <ul>

                            <?php

                            $do = $conn->selectQuery("SELECT `id`,`title`, `content`,  DATE_FORMAT(`createDate`,'%d/%m/%Y') as `createDate`,(select `name` from `magazine_publisher`  where `id`=`written_by` limit 1) as `writtenBy`, `images`, `vedio`,`magazine_topicscol` as `counter` FROM `magazine_topics` WHERE `status`=1  ORDER BY `id` DESC  LIMIT  0,15");

                            while($row= mysql_fetch_assoc($do)){

                            ?>

                           <a href="system.home.topics.php?&id=<?php echo $row['id']; ?>"><li data-id="<?=$row['id'];?>" id="data<?=$row['id'];?>" ><img src="system/sys-references/images/topics/<?=$row['images'];?>"/></br><span class="badge counter"><?=$row['counter'];?></span> <span class="title"><?=$row['title'];?> </span> </li></a>

                            <?php

                            }

                            ?>

                        </ul>

                    </div>

                </div>

                <div class="col-md-8">
				
       

                    <h1>&nbsp;</h1>
					<div  id="topicReadMore"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

                  <div id="lastTopicsList_tow1">

        <div class="modal-dialog modal-lg" style="margin:0px;max-width:100%;">   
         
    <div class="modal-content" >

        <div class="modal-header">

              <h4 class="modal-title" id="myLargeModalLabel"></h4>
               <div class="SOMsharese1"></div>

        </div>		
<p>

            <div class="SOMsharese" id="linksshare"></div>

        </p>
       <img id="hasImage" src="" style="width:100%; height: auto;"/>
  
         <p class="p30" style="padding-bottom:10px;">

        <span class="label label-info"></span> | <span class="label label-default"></span> |  <span id="counter" class="label label-success"></span><br>

        </p>

      

        <p class="containerM">
<h1 id="relTitle" style="text-align:center;"></h1>
<ul id="relatedlis">
 
</ul>
        </p>

    </div>

                    </div>

                </div>

            </div>
			</div>
		</div>	

           

            <div class="row">

                <div class="col-md-12"  >

                    <h1>أخر الفيديوهات</h1>

                    <ul id="lastTopicsVedios">

                         <?php

                            $do = $conn->selectQuery("SELECT `id` , `images`, `vedio` FROM `magazine_topics` WHERE `status`=1 and `vedio`<>'' ORDER BY `id` DESC  LIMIT  0,15");

                            while($row= mysql_fetch_assoc($do)){

                            ?>

                            <a href="system.home.topics.php?&id=<?php echo $row['id']; ?>"><li data-id="<?=$row['id'];?>" id="data<?=$row['id'];?>"  style="background-image:url('system/sys-references/images/topics/<?=$row['images'];?>');">

                                <div class="mask"></div>

                            </li></a>

                            <?php

                            }

                            ?>

                    </ul>

                </div>

            </div>

            

            <br/><br/><br/>

            

            <div class="row">

                <div class="col-md-4">

                    <h1>اكثر المواضيع قراءةً</h1>

                    <div id="lastTopicsList_one">

                        <ul>

                            <?php

                            $do = $conn->selectQuery("SELECT `id`,`title`, `content`,  DATE_FORMAT(`createDate`,'%d/%m/%Y') as `createDate`,(select `name` from `magazine_publisher`  where `id`=`written_by` limit 1) as `writtenBy`, `images`, `vedio`,`magazine_topicscol` as `counter` FROM `magazine_topics` WHERE `status`=1 ORDER BY `magazine_topicscol` DESC  LIMIT  0,15");

                            while($row= mysql_fetch_assoc($do)){

                            ?>

                            <a href="system.home.topics.php?&id=<?php echo $row['id']; ?>"><li data-id="<?=$row['id'];?>" id="data<?=$row['id'];?>" ><img src="system/sys-references/images/topics/<?=$row['images'];?>"/></br><span class="badge counter"><?=$row['counter'];?></span> <span class="title"><?=$row['title'];?> </span> </li></a>

                            <?php

                            }

                            ?>

                        </ul>

                    </div>

                </div>

                <div class="col-md-8">

                    <h1>اخترنا لكم</h1>

                    <div id="lastTopicsList_one">

                        <ul>

                            <?php

                            $do = $conn->selectQuery("SELECT `id`,`title`, `content`,  DATE_FORMAT(`createDate`,'%d/%m/%Y') as `createDate`,(select `name` from `magazine_publisher`  where `id`=`written_by` limit 1) as `writtenBy`, `images`, `vedio`,`magazine_topicscol` as `counter` FROM `magazine_topics` WHERE `status`=1 ORDER BY RAND() DESC  LIMIT  0,15");

                            while($row= mysql_fetch_assoc($do)){

                            ?>

                            <a href="system.home.topics.php?&id=<?php echo $row['id']; ?>"><li data-id="<?=$row['id'];?>" id="data<?=$row['id'];?>" ><img src="system/sys-references/images/topics/<?=$row['images'];?>"/></br><span class="badge counter"><?=$row['counter'];?></span> <span class="title"><?=$row['title'];?> </span> </li></a>

                            <?php

                            }

                            ?>

                        </ul>

                    </div>

                </div>

       

            </div>

		</div>

        <!--/Container -->

        

	</section>	

	<!--/We Are Newave -->

	<!-- We Are Newave -->

	<section id="we-are-newave" style="background:url('system/sys-references/images/pattern_04.jpg')">

		

        <!-- Container -->

		<div class="container" style="margin-top:0px;">

            

            <!-- Section Title -->

            <div class="section-title">

                <h1 style="color:#fff;">مواضيع المجلة</h1>

                <span class="border" style="backgorund-color:#fff;"></span>

                

             </div>		

			<!--/Section Title -->

         

            <!-- Clients Slider -->

            <div id="bx-pager" >

                 <?php

                 $magazineSections_query = $conn->selectQuery('SELECT `id`, `name`, `image` FROM `magazine_sections` where `parent`=0 limit 30');

                 while($row = mysql_fetch_assoc($magazineSections_query)){

                 ?>

                <a data-slide-index="0" href="#" id="magazineSectionsBTN" data-id="<?=$row['id'];?>" >

                <div id="sectionItem" class="effect4">

                <ul id="lastSectionNews">

                    <?php

                        $sectionTopics = $conn->selectQuery("SELECT `title`,(select `name` from `magazine_publisher`  where `id`=`written_by` limit 1) as `writtenBy`, `images`, `vedio`,`magazine_topicscol` as `counter` FROM `magazine_topics` WHERE `status`=1  and `section`=".$row['id']." ORDER BY `createDate` DESC  LIMIT  0,6");

                        while($subRows = mysql_fetch_assoc($sectionTopics)){

                    ?>

                    <li>

                        <div class="img" style="background-image:url('system/sys-references/images/topics/<?=$subRows['images'];?>');"></div>

                    </li>

                    <?php } ?>

                </ul>

                </div>

                <h3><?=$row['name'];?></h3></a>

                 <?}?>

            </div>

		</div>

        <!--/Container -->

        

	</section>	

	<!--/We Are Newave -->

   

    <!-- Magasize Section Topics -->

	<section id="magazineSectionTopics" >

		

        <!-- Container -->

		<div class="container">

            

            <!-- Section Title -->

            <div class="section-title">

                <h1></h1>

                <span class="border"></span>

                <p></p>

            </div>				

			<!--/Section Title -->

			

            	

			<div class="topicsList" data-last="">

            

            </div>				

			

		</div>

        <!--/Container -->

        

	</section>	

	<!--/ Magasize Section Topics -->

    

    <!-- Our Team -->

	<section id="our-team" style="display:none;">

		

        <!-- Container -->

		<div class="container">

            

            <!-- Section Title -->

            <div class="section-title">

                <h1>محررين المجلة</h1>

                <span class="border"></span>

                <p></p>

            </div>				

			<!--/Section Title -->

			

            	

			<ul class="our-team" id="ourTeamListButton">

                  <?php

                 $publisher_query = $conn->selectQuery('SELECT `id`,`name`, `email`, `joinDate`, (SELECT `name` FROM `magazine_sections` WHERE `id`=`section` LIMIT 1) as `section`, `image`, `about` FROM `magazine_publisher` WHERE `accountStatus`=1');

                 while($row = mysql_fetch_assoc($publisher_query)){

                 ?>

            	<li class="team-person element_from_left">                

                	<img src="<?=$row['image'];?>" alt="" style="max-width:260px;"/>                    

                    <div class="team-profile" stlye="min-width:260px; width:260px; display:block;">                    

                    	<h5><?=$row['name'];?></h5>

                    	<p><?=$row['section'];?></p>

                        <p class="about-team" style="display:none;">

                        تاريخ الإنضمام <?=$row['joinDate'];?>

                        </p>

                        <p class="about"  style="display:none;">

                        <?=$row['about'];?>

                        </p>

                	</div> 

      

                </li>

                <?php

                }

                ?>

            </ul>				

			

		</div>

        <!--/Container -->

        

	</section>	

	<!--/We Are Newave -->

    



    

    <!-- Clients-->

	<section id="clients" class="content">

    	

        <!-- Container -->

		<div class="container">

			

            <!-- Section Title -->

            <div class="section-title">

                <h1>عن المجلة</h1>

                <span class="border"></span>

            

            </div>				

			<!--/Section Title -->

            

                          <?php

                 $aboutMagazine = $conn->selectQuery('SELECT `about` FROM `about_magazine` WHERE `id`=1 limit 1;');

                 while($row = mysql_fetch_assoc($aboutMagazine)){

                 ?>

                <p style="text-align:center;">

             بسم ااالله الرحمن الرحيم و الصلاة و السلام على رسول الله 

             <p style="text-align:center;">إلى كل الأحبة و الأوفياء إلى كل عاشق الفن و الجمال و العمل الإبداعى نرحب بكم فى مجلتكم الإلكترونية ماى موروكو </p>

             <p style="text-align:center;">  التى إخترنا لها أهل فكر و أصحاب تميز ليقدموها لكم بصوره تليق بهذا الإسم العزيز إلى قلوبنا جميعا"</p>

                </p>

                <?php }?>



            

    

    	</div>

        <!--/Container -->

        

	</section>	

	<!--/Clients-->





	<!-- Contact Section -->

	<section id="contact-parallax">

		

        <!-- Container -->

		<div class="container small-width">

			

            <!-- Section Title -->

            <div class="section-title">

                <h1>إتصل بنا</h1>

                <span class="border"></span>

                <p>يمكنك الإتصال بنا و مراسلتنا عن طريق البريد الإلكترونى

                <br/>

                info@mymorocco.ae

                </p>

                

                <p>رسالة الى قسم</p>

                

                <div class="btn-group">

                  <button type="button" class="btn btn-primary">استفسار</button>

                  <button type="button" class="btn btn-primary">وضائف</button>

                </div>

            </div>				

			<!--/Section Title -->

            

            

            

			<!-- Contact Formular -->

			<div id="contact-formular">

            

            	<div id="message"></div>

            

                <form method="POST" name="contactform" >

                

                <div class="one_half element_from_left">            

                    <input name="name" type="text" id="name" size="30"  onfocus="if(this.value == 'الإسم') { this.value = ''; }" onblur="if(this.value == '') { this.value = 'الإسم'; }" value="الإسم" >

                    <input name="email" type="text" id="email" size="30" onfocus="if(this.value == 'عنوان البريد الإلكترونى') { this.value = ''; }" onblur="if(this.value == '') { this.value = 'عنوان البريد الإلكترونى'; }" value="عنوان البريد الإلكترونى" >                

                    <input name="phone" type="text" id="phone" size="30" onfocus="if(this.value == 'رقم الهاتف') { this.value = ''; }" onblur="if(this.value == '') { this.value = 'رقم الهاتف'; }" value="رقم الهاتف" >            

                </div>

                

                <div class="one_half last element_from_right">            

                    <textarea name="comments" cols="40" rows="4" id="comments" onfocus="if(this.value == 'محتوى الرسالة') { this.value = ''; }" onblur="if(this.value == '') { this.value = 'محتوى الرسالة'; }" >محتوى الرسالة</textarea>            

                </div>            

                

                <input type="submit" name="submit" class="send_message" id="submit" value="ارسال" />

    

                </form>

                

            </div>

  			<!--/Contact Formular -->

            

        </div> 

        <!--/Container --> 

        

        <?php
                if(isset($_POST['submit']))
                {   
                    $name =  $_POST['name'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $content = $_POST['comments'];
                   
                    
                     
            //$email = $_POST['Email'];
            $subject = "Mymorocco Request";
            $message =  "Name : ".$name."\nPhone Number : ".$phone."\nMessage : ".$content;
           
            $to = "mymorocco.ae@gmail.com";
            $body = "From :  $email\n\n$message";
            mail($to, $subject, $body); 
        
    
                }
            ?>



        

        

        

	</section>

	<!--/Contact Section -->

	

	

    


    

    

    

    

    

    

    <!-- Footer -->

    <footer>

		<div class="container no-padding">

        	

            <a id="back-top"><div id="menu_top"><div id="menu_top_inside"></div></div></a>

            

            <ul class="socials-icons">

                <li><a href="https://www.facebook.com/pages/mymoroccoae/1495364134008669?fref=ts"><img src="system/sys-references/images/fb.png" alt=""  style="width:40px; height:40px;"/></a></li>

                <li><a href="https://twitter.com/MymoroccoAe"><img src="system/sys-references/images/twitter.png" alt=""style="width:40px; height:40px;" /></a></li>

                <li><a href="https://plus.google.com/106048475534002528853/posts"><img src="system/sys-references/images/google.png" alt=""style="width:40px; height:40px;" /></a></li>

                <li><a href="#"><img src="system/sys-references/images/yt.png" alt="" style="width:40px; height:40px;"/></a></li>

            </ul> 

            

			<p class="copyright">2014 &copy; mymorocco.ae online magazine. جميع حقوق النشر محفوظة.</p>

            <!--<p>Powered by: <a href="http://www.damantk.com" target="_blank">Damantech Co</a></p>
            <a href="http://www.damantk.com" target="_blank"><!--<img src="system/sys-references/images/daman_logo_eng.png" width="70" height="20"></a>-->

		</div>

	</footer>

	<!--/Footer -->

    

    

    

    <div style="opacity:0; height:0px!important; position:fixed; ">    

        <img  src="images/projects/3.png" alt="" /> 

        <img  src="images/projects/4.jpg" alt="" /> 

        <img  src="images/projects/5.jpg" alt="" /> 

        <img  src="images/projects/6.png" alt="" /> 

    </div>

    

    

   

<script>

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){

  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),

  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)

  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');



  ga('create', 'UA-51231766-1', 'mymorocco.ae');

  ga('send', 'pageview');



</script>

</body>

</html>