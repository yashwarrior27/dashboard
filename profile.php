<?php

include("../db.php");
session_start();
if(!isset($_SESSION['id'])){
    header("location:login.php");
}
if(isset($_POST['logout'])){
    session_unset();
    session_destroy();
    header("location:login.php");
}
$act="PROFILE";
include("head.php");
$msg="";
 
if(isset($_POST['upload'])){
    if(isset($_FILES['image'])&&$_FILES['image']['error']==0){
    $file_name=$_FILES['image']['name'];
    $file_tmp=$_FILES['image']['tmp_name'];
    move_uploaded_file($file_tmp,"../assets/".$file_name);
    $image=$file_name;
    $uplsql="UPDATE `admin` SET `image`='$image' WHERE id = 1";
    $uplres=mysqli_query($conn,$uplsql);
    if($uplres){
        $msg="upload successfull";
    }
    else{
        $msg="upload failed";
    }
}
}

if(isset($_POST['passupdt'])){
   $opass=$_POST['opass'];
   $npass=$_POST['npass'];
   $cpass=$_POST['cpass'];
$checpas="SELECT * FROM `admin` WHERE `password`='$opass'";
$checres=mysqli_query($conn,$checpas);
if(mysqli_num_rows($checres)>0){
if($npass==$cpass){
    $updpass="UPDATE `admin` SET `password`='$npass' WHERE id=1";
    $updres=mysqli_query($conn,$updpass);
    if($updres){
        $msg="update successfull";
    }

}else{

    $msg="pass not match";
}

} 
else{
    $msg="pass invalid";
}

}
?>
<section id="main-content" >
<section class="wrapper">
<div id="msg" class="d-none" style="position:absolute; right:10%; top:15%;">
            <div class="alert text-white bg-green" role="alert">
                UPLOAD SUCCESSFULLY
            </div>
        </div>
        <div id="msgd" class="d-none" style="position:absolute; right:10%; top:15%;">
            <div class="alert text-white bg-danger" role="alert">
               INVALID OLD PASSWORD
            </div>
        </div>
        <div id="msgaddr" class="d-none" style="position:absolute; right:10%; top:15%;">
            <div class="alert text-white bg-primary" role="alert">
                PASSWORD CHANGED
            </div>
        </div>
        <div id="msgchgimg" class="d-none" style="position:absolute; right:10%; top:15%;">
            <div class="alert text-white bg-dark" role="alert">
              CONFIRM PASSWORD NOT MATCHED
            </div>
        </div>
<div class="row justify-content-center mt-5">
            <div class="col-9 text-center">
                <h1 style="color:black;"><b>PROFILE</b></h1>
            </div>

            <?php
            $imsql="SELECT * FROM `admin`";
            $imres=mysqli_query($conn,$imsql);
            $imrow=mysqli_fetch_assoc($imres);
            
            ?>
</div>
<div class="row justify-content-center mt-4 text-center">
                  <div class="col-11">
                    <form method="post" id="myform" enctype="multipart/form-data">
                            <div class="form-group row  ">
                                <div class="col-4  ">
                                  <div class="text-center">  
                                  <img src="../assets/<?= $imrow['image'] ;?>" class="img-fluid rounded-circle" style="width:225px;height:225px;" alt="" id="imgc"> </div>
                                <label for=f6 class="btn mt-2  btn-success"><b
                                                                   >Select Image</b></label>
                                                            <input type="file" name="image" style="display:none;"
                                                                class="form-control-file" onchange=" imagepreview(this)" id=f6
                                                              accept="image/*">
                                                              <button type="submit" id="upload"   name="upload" value="<?= $imrow['id'];?>" class="btn btn-primary"><b>Upload Image</b></button>
                                </div>
                                <div class="col-8">
                                <div class="form-group row ">
                            <div class="col-3 col-sm-2 pt-2 text-dark ">
                                <label for="f2"><h6><b>User Name</b></h6></label>
                            </div>
                            <div class="col-9 col-sm-10 ">
                                <input class="form-control" value="<?= $imrow['username'] ;?>" name="uname" id="f2" type="text" disabled>
                            </div>
                         
                        </div>
                        <div class="form-group row ">
                            <div class="col-3 col-sm-2 pt-2 text-dark ">
                                <label for="f3"><h6><b>Old Password</b></h6></label>
                            </div>
                            <div class="col-9 col-sm-10 ">
                                <input class="form-control" value="" name="opass" id="f3" type="password">
                            </div>
                         
                        </div>
                        <div class="form-group row ">
                            <div class="col-3 col-sm-2 pt-2 text-dark ">
                                <label for="f4"><h6><b>New Password</b></h6></label>
                            </div>
                            <div class="col-9 col-sm-10 ">
                                <input class="form-control" value="" name="npass" id="f4" type="password">
                            </div>
                         
                        </div>
                        <div class="form-group row ">
                            <div class="col-3 col-sm-2 pt-2 text-dark ">
                                <label for="f5"><h6><b>Confirm Password</b></h6></label>
                            </div>
                            <div class="col-9 col-sm-10 ">
                                <input class="form-control" value="" name="cpass" id="f5" type="password">
                            </div>
                         
                        </div>
                        <button type="submit" id="upd"   name="passupdt" value="<?= $imrow['id'] ;?>" class="btn btn-primary">Update</button>
                                </div>
                               
                                 
                            </div>
                          
                        
                       
                      </form>
                  </div>
            </div>

</section>
</section>
<script>
if (<?php if($msg=="upload successfull"){
                    echo 1;
                }
                else{
                  echo 0;
                }
               
               ?>) {
    document.getElementById("msg").classList.remove("d-none");
    setTimeout(function() {
        document.getElementById("msg").classList.add("d-none");
    }, 2000);
}

if (<?php if($msg=="pass invalid"){
                    echo 1;
                }
                else{
                  echo 0;
                }
               ?>) {
    document.getElementById("msgd").classList.remove("d-none");
    setTimeout(function() {
        document.getElementById("msgd").classList.add("d-none");
    }, 2000);
}

if (<?php if($msg=="update successfull"){
                    echo 1;
                }
                else{
                  echo 0;
                }
               ?>) {
    document.getElementById("msgaddr").classList.remove("d-none");
    setTimeout(function() {
        document.getElementById("msgaddr").classList.add("d-none");
    }, 2000);
}
if (<?php if($msg=="pass not match"){
                    echo 1;
                }
                else{
                  echo 0;
                }
               ?>) {
    document.getElementById("msgchgimg").classList.remove("d-none");
    setTimeout(function() {
        document.getElementById("msgchgimg").classList.add("d-none");
    }, 2000);
}
</script>

<?php include("foot.php"); ?>
