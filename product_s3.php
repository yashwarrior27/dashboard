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
 $act="PRODUCT_SECTION-3";
 $lact="product";
 include("head.php");

 $msg="";
if(isset($_POST['submitp'])){
    
    if(isset($_FILES['image'])&&$_FILES['image']['error']==0){
        $file_name=$_FILES['image']['name'];
        $file_tmp=$_FILES['image']['tmp_name'];
        move_uploaded_file($file_tmp,"../assets/".$file_name);
        $image=$file_name;
        $content=$_POST['contentp'];
        $id=$_POST['submitp'];
        $usql="UPDATE `product_section` SET `content`='$content',`image`='$image' WHERE id = $id";
        $uresult=mysqli_query($conn,$usql);
        if($uresult){
            $msg="update successful";
        }
        else{
            $msg="update failed";
        }
      }
      else{
            
        $content=$_POST['contentp'];
        $id=$_POST['submitp'];
        $usql="UPDATE `product_section` SET `content`='$content' WHERE id = $id";
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
$fpsql="SELECT * FROM `product_section`";
$fpresult=mysqli_query($conn,$fpsql);
$fprow=mysqli_fetch_assoc($fpresult);


?>
<section id="main-content">
      <section class="wrapper">
           <div id="msg" class="d-none" style="position:absolute; right:10%; top:15%;"><div   class="alert text-white bg-green" role="alert">
           UPDATE SUCCESSFULLY
           </div></div>
              <div class="row justify-content-center mt-5">
                  <div class="col-6 text-center">
                      <h1 style="color:black;"><b>SECTION-3</b></h1>
                  </div>

              </div>
      		<div class="row justify-content-center mt-4 text-center">
                  <div class="col-11">
                    <form method="post" id="myform" enctype="multipart/form-data">
                           
                    <div class="form-group row">
                            <div class="col-2 pt-2 text-dark ">
                                <label for="content"><h6><b>Content</b></h6></label>
                            </div>
                            <div class="col-10">
                            <textarea class="form-control summernote" name="contentp" id="content" rows="4"><?= $fprow['content']; ?></textarea>
                            </div>
                        
                               </div>
                       

                               <div class="form-group row pt-3 ">
                                                    <div class="col-2 pt-2 text-dark ">
                                                        <label>
                                                            <h6><b>SECTION-5_Image</b></h6>
                                                        </label>
                                                    </div>
                                                    <div class="col-7 ">
                                                        <div class="text-center"> <img src="../assets/<?= $fprow['image']; ?>" class="img-fluid imgc"
                                                                alt="" id="addimg"> </div>
                                                    </div>
                                                    <div class="col-3 pt-2 text-dark ">
                                                        <div class="text-center">
                                                            <label for=0 class="btn  btn-success"><b
                                                                    style="font-size: 11px;">Select Image</b></label>
                                                            <input type="file" name="image" style="display:none;"
                                                                class="form-control-file" onchange="imag (this)" id=0
                                                                accept="image/*">
                                                        </div>
                                                    </div>

                                                </div>
                    
                        <button type="submit" id="upd"   name="submitp" value=" <?= $fprow['id']; ?>" class="btn btn-primary">Update</button>
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
<script>
          $(document).ready(function() {
  $('.summernote').summernote();
});
      </script>
      <script>if (<?php if($lact==="product"){
           echo 1;
       } else{
           echo 0;
       } ?>) {
    document.getElementById("sub-drop2").classList.add("d-block");
}</script>