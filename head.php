<!DOCTYPE html>


<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="icon" type="image/x-icon" href="../assets/admin-panel-8-904837.png">
    <title>Admin Panel</title>

    <!-- Bootstrap core CSS -->
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">    
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
  </head>
<style>
    .note-editor{
        height: 100% !important;
    }
    .bg-green{
        background-color: rgba(38,154,92,.8);
    }

</style>
  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="#" class="logo"><b><?php echo $act; ?></b></a>
            <!--logo end-->
            <?php
            $iconimgc="SELECT * FROM `admin`";
            $iconimres=mysqli_query($conn,$iconimgc);
            $iconiqrow=mysqli_fetch_assoc($iconimres);
            
            ?>

            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li class="pt-2">
                        <a href="profile.php" style="border:none !important;">
                        <img src="../assets/<?= $iconiqrow['image'];?>" class="rounded-circle" style="width:40px; height:40px;"></a>
                    </li>
                    <li><form method="post"
                    ><button class="btn btn-danger mt-2" type="submit" name="logout">Logout</button> </form>
                        </li>
            	</ul>
            </div>
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <!-- <p class="centered"><a href="profile.html"><img src="assets/img/header-logo.png" class="img-circle" width="60"></a></p> -->
              	  <h5 class="centered mb-4"><span class="p-1 rounded-left"  style="color: rgb(38,154,92); background:white;">Nutra</span><span  class="p-1 rounded-right" style="background-color: rgb(38,154,92);">Supps</span></h5>
              	  	
                  <li >
                      <a class="<?php if($act=="DASHBOARD"){
                          echo 'active';
                      } ?> rounded-left" href="index.php" >
                          <i class="fas fa-tachometer-alt"></i>
                          <span style=" font-size: 14px;"> DASHBOARD</span>
                      </a>
                  </li>
                  <li>
                    <a class=" <?php if($act=="seo_form"){
                          echo 'active';
                      } ?> rounded-left"  href="seo_form.php">
                  <i class="fal fa-file-search"></i>
                        <span style=" font-size: 14px;">SEO_FORM</span>
                    </a>
                </li>
                  <li>
                    <a class=" <?php if($act=="HEADER"){
                          echo 'active';
                      } ?> rounded-left"  href="header.php">
                    <i class="fal fa-arrow-alt-to-top"></i>
                        <span style=" font-size: 14px;">HEADER</span>
                    </a>
                </li>
                <li >
                    <a class=" <?php if($act=="FOOTER"){
                          echo 'active';
                      } ?> rounded-left" href="footer.php">
                    <i class="fal fa-arrow-alt-to-bottom"></i>
                        <span style=" font-size: 14px;">FOOTER</span>
                    </a>
                </li>
                  <li class="sub-menu">
                    <a class="rounded-left " id="drop1"  href="#" >
                    <i class="far fa-home <?php if($lact==="home"){
                       echo 'logoact';
                    } ?> "></i>
                        <span style=" font-size: 14px;">HOME PAGE</span>
                    </a>
                    <ul class="d-none "  id="sub-drop1" >
                        <li class="mt-2" ><a class="rounded-left <?php if($act=="HOME_SECTION-1"){
                          echo 'active';
                      } ?> " href="home_s1.php">Section-1</a></li>
                        <li><a class="rounded-left <?php if($act=="HOME_SECTION-2"){
                          echo 'active';
                      } ?> " href="home_s2.php">Section-2</a></li>
                        <li><a class="rounded-left <?php if($act=="HOME_SECTION-3"){
                          echo 'active';
                      } ?> " href="home_s3.php">Section-3</a></li>
                        <li><a class="rounded-left <?php if($act=="HOME_SECTION-4"){
                          echo 'active';
                      } ?> " href="home_s4.php">Section-4</a></li>
                        <li><a class="rounded-left <?php if($act=="HOME_SECTION-5"){
                          echo 'active';
                      } ?>" href="home_s5.php">Section-5</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="#" class="rounded-left " id="drop2" >
                    <i class="fal fa-game-board-alt <?php if($lact==="product"){
                       echo 'logoact';
                    } ?>"></i>
                        <span style=" font-size: 14px;">PRODUCT PAGE</span>
                    </a>
                    <ul class="d-none " id="sub-drop2">
                    <li class="mt-2" ><a class="rounded-left <?php if($act=="PRODUCT_SECTION-1"){
                          echo 'active';
                      } ?> " href="product_s1.php">Section-1</a></li>
                        <li><a class="rounded-left <?php if($act=="PRODUCT_SECTION-2"){
                          echo 'active';
                      } ?> " href="product_s2.php">Section-2</a></li>
                        <li><a class="rounded-left <?php if($act=="PRODUCT_SECTION-3"){
                          echo 'active';
                      } ?> " href="product_s3.php">Section-3</a></li>
                        <li><a class="rounded-left <?php if($act=="PRODUCT_SECTION-4"){
                          echo 'active';
                      } ?> " href="product_s4.php">Section-4</a></li>
                       
                    </ul>
                </li>
                <li>
                    <a class=" <?php if($act=="service_managment"){
                          echo 'active';
                      } ?> rounded-left"  href="service_mang.php">
                   <i class="fal fa-hand-receiving"></i>
                        <span style=" font-size: 14px;">SERVICE MANAGEMENT</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="#"class="rounded-left drop"  id="drop3" >
                    <i class="fal fa-people-carry <?php if($lact==="service"){
                       echo 'logoact';
                    } ?>"></i>
                        <span style=" font-size: 14px;">SERVICE PAGE</span>
                    </a>
                    <ul class="d-none " id="sub-drop3">
                    <li class="mt-2" ><a class="rounded-left <?php if($act=="SERVICE_SECTION-1"){
                          echo 'active';
                      } ?> " href="service_s1.php">Section-1</a></li>
                        <li><a class="rounded-left <?php if($act=="SERVICE_SECTION-2"){
                          echo 'active';
                      } ?> " href="service_s2.php">Section-2</a></li>
                       
                    </ul>
                </li>
               
                <li class="sub-menu">
                <a href="#"class="rounded-left drop"  id="drop4" >
                    <i class="fal fa-address-card <?php if($lact==="about"){
                       echo 'logoact';
                    } ?>"></i>
                        <span style=" font-size: 14px;">ABOUT US PAGE</span>
                    </a>
                    <ul class="d-none " id="sub-drop4">
                    <li class="mt-2" ><a class="rounded-left <?php if($act=="ABOUT_US_SECTION-1"){
                          echo 'active';
                      } ?> " href="about_s1.php">Section-1</a></li>
                        <li><a class="rounded-left <?php if($act=="ABOUT_US_SECTION-2"){
                          echo 'active';
                      } ?>  " href="about_s2.php">Section-2</a></li>
                        <li><a class="rounded-left <?php if($act=="ABOUT_US_SECTION-3"){
                          echo 'active';
                      } ?>  " href="about_s3.php">Section-3</a></li>
                        
                    </ul>
                </li>
                <li class="sub-menu">
                <a href="#"class="rounded-left drop"  id="drop5" >
                    <i class="fal fa-user-headset <?php if($lact==="contact"){
                       echo 'logoact';
                    } ?>"></i>
                        <span style=" font-size: 14px;">CONTACT US PAGE</span>
                    </a>
                    <ul class="d-none " id="sub-drop5">
                    <li class="mt-2" ><a class="rounded-left <?php if($act=="CONTACT_US_SECTION-1"){
                          echo 'active';
                      } ?> " href="contact_s1.php">Section-1</a></li>
                    
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="#"class="rounded-left drop"  id="drop6" >
                    <i class="fal fa-pager  <?php if($lact==="forms"){
                       echo 'logoact';
                    } ?>"></i>
                    
                        <span style=" font-size: 14px;">FORMS</span>
                    </a>
                    <ul class="d-none " id="sub-drop6">
                    <li class="mt-2" ><a class="rounded-left <?php if($act=="CONTACT_FORM"){
                          echo 'active';
                      } ?> " href="contact_form.php">CONTACT-FROM</a></li>
                        <li><a class="rounded-left <?php if($act=="PRODUCT_FROM"){
                          echo 'active';
                      } ?> " href="product_form.php">PRODUCT-FORM</a></li>
                       
                    </ul>
                </li>

                  <!-- <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-book"></i>
                          <span>Extra Pages</span>
                      </a>
                      <ul class="sub">
                          <li><button onclick="aj()">Blank Page</button></li>
                          <li><a  href="login.html">Login</a></li>
                          <li><a  href="lock_screen.html">Lock Screen</a></li>
                      </ul>
                  </li> -->
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
     <script>
         document.getElementById("drop1").addEventListener('click',function(){
             document.getElementById("sub-drop1").classList.toggle("d-block");
         })
         document.getElementById("drop2").addEventListener('click',function(){
             document.getElementById("sub-drop2").classList.toggle("d-block");
         })   
         document.getElementById("drop3").addEventListener('click',function(){
             document.getElementById("sub-drop3").classList.toggle("d-block");
         })  
         document.getElementById("drop4").addEventListener('click',function(){
             document.getElementById("sub-drop4").classList.toggle("d-block");
         })  
         document.getElementById("drop5").addEventListener('click',function(){
             document.getElementById("sub-drop5").classList.toggle("d-block");
         }) 
         document.getElementById("drop6").addEventListener('click',function(){
             document.getElementById("sub-drop6").classList.toggle("d-block");
         }) 
         
     </script>

    
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->