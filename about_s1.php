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
 $act="ABOUT_US_SECTION-1";
 $lact="about";
 include("head.php");
 $msg="";
if(isset($_POST['submitq'])){

    if(isset($_FILES['image'])&&$_FILES['image']['error']==0&&$_FILES['bgimage']['error']!=0){
        $file_name=$_FILES['image']['name'];
        $file_tmp=$_FILES['image']['tmp_name'];
        move_uploaded_file($file_tmp,"../assets/".$file_name);
        $head1=$_POST['heading1'];
    $head2=$_POST['heading2'];
    $id=$_POST['submitq'];
        $image=$file_name;
        $usql="UPDATE `about_head` SET `heading1`='$head1',`heading2`='$head2',`image`='$image' WHERE id = $id";
        $uresult=mysqli_query($conn,$usql);
        if($uresult){
            $msg="update successful";
        }
        else{
            $msg="update failed";
        }
      }

     else if(isset($_FILES['bgimage'])&&$_FILES['bgimage']['error']==0&&$_FILES['image']['error']!=0){
        $file_name=$_FILES['bgimage']['name'];
        $file_tmp=$_FILES['bgimage']['tmp_name'];
        move_uploaded_file($file_tmp,"../assets/".$file_name);
        $head1=$_POST['heading1'];
    $head2=$_POST['heading2'];
    $id=$_POST['submitq'];
        $bgimage=$file_name;
        $usql="UPDATE `about_head` SET `heading1`='$head1',`heading2`='$head2',`background`='$bgimage' WHERE id = $id";
        $uresult=mysqli_query($conn,$usql);
        if($uresult){
            $msg="update successful";
        }
        else{
            $msg="update failed";
        }
      }
      else if($_FILES['bgimage']['error']==0&&$_FILES['image']['error']==0){
        $file_bgname=$_FILES['bgimage']['name'];
        $file_bgtmp=$_FILES['bgimage']['tmp_name'];
        move_uploaded_file($file_bgtmp,"../assets/".$file_bgname);
        $file_name=$_FILES['image']['name'];
        $file_tmp=$_FILES['image']['tmp_name'];
        move_uploaded_file($file_tmp,"../assets/".$file_name);
        $head1=$_POST['heading1'];
    $head2=$_POST['heading2'];
    $id=$_POST['submitq'];
        $bgimage=$file_bgname;
        $image=$file_name;
        $usql="UPDATE `about_head` SET `heading1`='$head1',`heading2`='$head2',`image`='$image',`background`='$bgimage' WHERE id = $id";
        $uresult=mysqli_query($conn,$usql);
        if($uresult){
            $msg="update successful";
        }
        else{
            $msg="update failed";
        }
      }


      else{
            
       $head1=$_POST['heading1'];
    $head2=$_POST['heading2'];
    $id=$_POST['submitq'];
$usql="UPDATE `about_head` SET `heading1`='$head1',`heading2`='$head2' WHERE id = $id";
$uresult=mysqli_query($conn,$usql);
if($uresult){
            $msg="update successful";
                 
        
        }
        else{
            $msg="update failed";
        }
    }
   
}

?>
<?php
      $hsql="SELECT * FROM `about_head`";
      $hresult=mysqli_query($conn,$hsql);
      $hrow=mysqli_fetch_assoc($hresult);
      ?>
      <section id="main-content">
      <section class="wrapper">
           <div id="msg" class="d-none " style="position:absolute; right:10%; top:15%;"><div id="inmsg"   class="alert text-white bg-green " role="alert">
           UPDATE SUCCESSFULLY
           </div></div>
              <div class="row justify-content-center mt-5">
                  <div class="col-6 text-center">
                      <h1 style="color:black;"><b>SECTION-1</b></h1>
                  </div>

              </div>
      		<div class="row justify-content-center mt-4 text-center">
                  <div class="col-11">
                    <form method="post" id="myform" enctype="multipart/form-data">
                        <div class="form-group row ">
                            <div class="col-2 pt-2 text-dark ">
                                <label for="f1"><h6><b>1st-Heading</b></h6></label>
                            </div>
                            <div class="col-10 ">
                            <textarea class="form-control"  name= "heading1" id="f1" rows="2"><?= $hrow['heading1'];?></textarea>
                              
                            </div>
                         
                        </div>
                        <div class="form-group row ">
                            <div class="col-2 pt-2 text-dark ">
                                <label for="f2"><h6><b>2nd-Heading</b></h6></label>
                            </div>
                            <div class="col-10 ">
                            <textarea class="form-control"  name="heading2" id="f2" rows="2"><?= $hrow['heading2'];?></textarea>
    
                            </div>
                         
                        </div>
                      
                            <div class="form-group row ">
                                                    <div class="col-2 pt-2 text-dark ">
                                                        <label>
                                                            <h6><b>Background-Image</b></h6>
                                                        </label>
                                                    </div>
                                                    <div class="col-7 ">
                                                        <div class="text-center"> <img src="../assets/<?= $hrow['background']; ?>" class="img-fluid imgc"
                                                                alt="" id="addimg"> </div>
                                                    </div>
                                                    <div class="col-3 pt-2 text-dark ">
                                                        <div class="text-center">
                                                            <label for=0 class="btn  btn-success"><b
                                                                    style="font-size: 11px;">Select Image</b></label>
                                                            <input type="file" name="bgimage" style="display:none;"
                                                                class="form-control-file" onchange="imag (this)" id=0
                                                                accept="image/*">
                                                        </div>
                                                    </div>

                                                </div>
                            <div class="form-group row  ">
                                                    <div class="col-2 pt-2 text-dark ">
                                                        <label>
                                                            <h6><b>Image</b></h6>
                                                        </label>
                                                    </div>
                                                    <div class="col-7 ">
                                                        <div class="text-center"> <img src="../assets/<?= $hrow['image']; ?>" class="img-fluid imgc"
                                                                alt="" id="addimg"> </div>
                                                    </div>
                                                    <div class="col-3 pt-2 text-dark ">
                                                        <div class="text-center">
                                                            <label for=1 class="btn  btn-success"><b
                                                                    style="font-size: 11px;">Select Image</b></label>
                                                            <input type="file" name="image" style="display:none;"
                                                                class="form-control-file" onchange="imag (this)" id=1
                                                                accept="image/*">
                                                        </div>
                                                    </div>

                                                </div>
                                                
                        <button type="submit" id="upd"   name="submitq" value="<?= $hrow['id'];?>" class="btn btn-primary">Update</button>
                      </form>
                  </div>
          </section> 
      </section>
      <script>
         if(<?php if($msg=="update successful"){
                    echo 1;
                }
               ?>){
                    document.getElementById("msg").classList.remove("d-none");
            setTimeout(function(){ document.getElementById("msg").classList.add("d-none");},2000);
                }
                
      </script>
         
         <?php include("foot.php"); ?>


<script>if (<?php if($lact==="about"){
           echo 1;
       } else{
           echo 0;
       } ?>) {
    document.getElementById("sub-drop4").classList.add("d-block");
}</script>