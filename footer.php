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
$act="FOOTER";
include("head.php");
$msg="";
if(isset($_POST['submitf'])){
    
    if(isset($_FILES['image'])&&$_FILES['image']['error']==0){
        $file_name=$_FILES['image']['name'];
        $file_tmp=$_FILES['image']['tmp_name'];
        move_uploaded_file($file_tmp,"../assets/".$file_name);
        $faqslink=$_POST['faqslink'];
        $tclink=$_POST['tclink'];
        $pplink=$_POST['pplink'];
        $copyright=$_POST['copyright'];
        $image=$file_name;
        $content=$_POST['content'];
        $id=$_POST['submitf'];
        $usql="UPDATE footer SET content='$content',faqlink='$faqslink',tclink='$tclink',pplink='$pplink',image='$image',cr='$copyright' WHERE id =$id";
        $uresult=mysqli_query($conn,$usql);
        if($uresult){
            $msg="update successful";
        }
        else{
            $msg="update failed";
        }
      }
      else{
            
        $faqslink=$_POST['faqslink'];
        $tclink=$_POST['tclink'];
        $pplink=$_POST['pplink'];
        $copyright=$_POST['copyright'];
        $content=$_POST['content'];
        $id=$_POST['submitf'];
        $usql="UPDATE footer SET content='$content',faqlink='$faqslink',tclink='$tclink',pplink='$pplink',cr='$copyright' WHERE id =$id";
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
$fsql="SELECT * FROM footer";
$fresult=mysqli_query($conn,$fsql);
$frow=mysqli_fetch_assoc($fresult);


?>
<style>
    .bg-green{
        background-color: rgba(38,154,92,.8);
    }
</style>
 <section id="main-content">
      <section class="wrapper">
           <div id="msg" class="d-none" style="position:absolute; right:10%; top:15%;"><div   class="alert text-white bg-green" role="alert">
           UPDATE SUCCESSFULLY
           </div></div>
              <div class="row justify-content-center mt-5">
                  <div class="col-6 text-center">
                      <h1 style="color:black;"><b>FOOTER</b></h1>
                  </div>

              </div>
      		<div class="row justify-content-center mt-4 text-center">
                  <div class="col-11">
                    <form method="post" id="myform" enctype="multipart/form-data">
                        <div class="form-group row ">
                            <div class="col-3 col-sm-2 pt-2 text-dark ">
                                <label for="f1"><h6><b>FAQS Link</b></h6></label>
                            </div>
                            <div class="col-9 col-sm-10 ">
                                <input class="form-control" value="<?= $frow['faqlink']; ?> " name="faqslink" id="f1" type="text">
                            </div>
                         
                        </div>
                        <div class="form-group row ">
                            <div class="col-3 col-sm-2 pt-2 text-dark ">
                                <label for="f2"><h6><b>Terms & Conditions Link</b></h6></label>
                            </div>
                            <div class="col-9 col-sm-10 ">
                                <input class="form-control" value="<?= $frow['tclink']; ?> " name="tclink" id="f2" type="text">
                            </div>
                         
                        </div>
                        <div class="form-group row ">
                            <div class="col-3 col-sm-2 pt-2 text-dark ">
                                <label for="f3"><h6><b>Privacy Policy Link</b></h6></label>
                            </div>
                            <div class="col-9 col-sm-10 ">
                                <input class="form-control" value="<?= $frow['pplink']; ?> " name="pplink" id="f3" type="text">
                            </div>
                         
                        </div>
                        <div class="form-group row ">
                            <div class="col-3 col-sm-2 pt-2 text-dark ">
                                <label for="f4"><h6><b>Copyright</b></h6></label>
                            </div>
                            <div class="col-9 col-sm-10 ">
                                <input class="form-control" value="<?= $frow['cr']; ?> " name="copyright" id="f4" type="text">
                            </div>
                            </div>
                            <div class="form-group row ">
                                <div class="col-3 col-sm-2 pt-2 text-dark ">
                                    <label for="f6"><h6><b>Footer Image</b></h6></label>
                                </div>
                                <div class="col-5 col-sm-7 ">
                                  <div class="text-center"> <img src="../assets/<?= $frow['image']; ?> " class="img-fluid" alt="" id="imgc"> </div>
                                </div>
                                <div class="col-4 col-sm-3 pt-2 text-dark ">
                                    <input type="file" name="image"  class="form-control-file" onchange=" imagepreview(this)" id="f6" accept="image/*">
                                </div>
                             
                            </div>
                            <div class="form-group row">
                            <div class="col-3 col-sm-2 pt-2 text-dark ">
                                <label for="content"><h6><b>Content</b></h6></label>
                            </div>
                            <div class="col-9 col-sm-10">
                            <textarea class="form-control summernote" name="content" id="content" rows="4"><?= $frow['content']; ?></textarea>
                            </div>
                        
                               </div>
                       
                        
                        <button type="submit" id="upd"   name="submitf" value=" <?= $frow['id']; ?>" class="btn btn-primary">Update</button>
                      </form>
                  </div>
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