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
$act="HEADER";
include("head.php");
$msg="";
if(isset($_POST['submith'])){
    
    if(isset($_FILES['image'])&&$_FILES['image']['error']==0){
        $file_name=$_FILES['image']['name'];
        $file_tmp=$_FILES['image']['tmp_name'];
        move_uploaded_file($file_tmp,"../assets/".$file_name);
        $flink=$_POST['flink'];
        $ylink=$_POST['ylink'];
        $llink=$_POST['llink'];
        $contact=$_POST['contact'];
        $image=$file_name;
        $blink=$_POST['blink'];
        $blable=$_POST['blable'];
        $id=$_POST['submith'];
        $usql="UPDATE header SET flink='$flink',ylink='$ylink',llink='$llink',contact='$contact',image='$image',blink='$blink',bname='$blable' WHERE id = $id";
        $uresult=mysqli_query($conn,$usql);
        if($uresult){
            $msg="update successful";
        }
        else{
            $msg="update failed";
        }
      }
      else{
            
        $flink=$_POST['flink'];
        $ylink=$_POST['ylink'];
        $llink=$_POST['llink'];
        $contact=$_POST['contact'];
        $blink=$_POST['blink'];
        $blable=$_POST['blable'];
        $id=$_POST['submith'];
        $usql="UPDATE header SET flink='$flink',ylink='$ylink',llink='$llink',contact='$contact',blink='$blink',bname='$blable' WHERE id = $id";
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
<style>
    .bg-green{
        background-color: rgba(38,154,92,.8);
    }
</style>
 <?php
      $hsql="SELECT * FROM header";
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
                      <h1 style="color:black;"><b>HEADER</b></h1>
                  </div>

              </div>
      		<div class="row justify-content-center mt-4 text-center">
                  <div class="col-11">
                    <form method="post" id="myform" enctype="multipart/form-data">
                        <div class="form-group row ">
                            <div class="col-3 col-sm-2 pt-2 text-dark ">
                                <label for="f1"><h6><b>Facebook Link</b></h6></label>
                            </div>
                            <div class="col-9 col-sm-10 ">
                                <input class="form-control" value="<?= $hrow['flink'];?>" name="flink" id="f1" type="text">
                            </div>
                         
                        </div>
                        <div class="form-group row ">
                            <div class="col-3 col-sm-2 pt-2 text-dark ">
                                <label for="f2"><h6><b>Youtube Link</b></h6></label>
                            </div>
                            <div class="col-9 col-sm-10 ">
                                <input class="form-control" value="<?= $hrow['ylink'];?>" name="ylink" id="f2" type="text">
                            </div>
                         
                        </div>
                        <div class="form-group row ">
                            <div class="col-3 col-sm-2 pt-2 text-dark ">
                                <label for="f3"><h6><b>Linkedin Link</b></h6></label>
                            </div>
                            <div class="col-9 col-sm-10 ">
                                <input class="form-control" value="<?= $hrow['llink'];?>" name="llink" id="f3" type="text">
                            </div>
                         
                        </div>
                        <div class="form-group row ">
                            <div class="col-3 col-sm-2 pt-2 text-dark ">
                                <label for="f4"><h6><b>Contact Number</b></h6></label>
                            </div>
                            <div class="col-9 col-sm-10 ">
                                <input class="form-control" value="<?= $hrow['contact'];?>" name="contact" id="f4" type="text">
                            </div>
                            </div>
                            <div class="form-group row ">
                                <div class="col-3 col-sm-2 pt-2 text-dark ">
                                    <label for="f6"><h6><b>Logo Image</b></h6></label>
                                </div>
                                <div class="col-6 col-sm-7 ">
                                  <div class="text-center"> <img src="../assets/<?= $hrow['image'];?>" class="img-fluid" alt="" id="imgc"> </div>
                                </div>
                                <div class="col-3 pt-2 text-dark ">
                                    <input type="file" name="image"  class="form-control-file" onchange=" imagepreview(this)" id="f6" accept="image/*">
                                </div>
                             
                            </div>
                            <div class="form-group row ">
                            <div class="col-3 col-sm-2 pt-2 text-dark ">
                                <label for="f7"><h6><b>Button Link</b></h6></label>
                            </div>
                            <div class="col-9 col-sm-10 ">
                                <input type="text" class="form-control" value="<?= $hrow['blink'];?> "name="blink" id="f7" >
                            </div>
                         
                        </div>
                        <div class="form-group row ">
                            <div class="col-3 col-sm-2 pt-2 text-dark ">
                                <label for="f8"><h6><b>Button Lable</b></h6></label>
                            </div>
                            <div class="col-9 col-sm-10 ">
                                <input class="form-control"value="<?= $hrow['bname'];?>" name="blable" id="f8" type="text" required>
                            </div>
                         
                        </div>
                        
                        <button type="submit" id="upd"   name="submith" value="<?= $hrow['id'];?>" class="btn btn-primary">Update</button>
                      </form>
                  </div>
            </div>
          </section> 
      </section>
      <!-- <script>
          document.getElementById("upd").addEventListener('click',function(e){
              e.preventDefault();
          });
      </script> -->
    <script>

            // let bname=document.getElementById("f8").value;
            // let result=bname.trim();
            // if(result==""){
            //     document.getElementById("upd").addEventListener('click',function(e){
            //        return e.defaultPrevented();
            //     });
            //     document.getElementById("innermsg").innerHTML="BUTTON LABLE IS REQUIRED";
            //     document.getElementById("msg2").classList.remove("d-none");
            // setTimeout(function(){ document.getElementById("msg2").classList.add("d-none");},2000);
                
            // }
                if(<?php if($msg=="update successful"){
                    echo 1;
                }
               ?>){
                    document.getElementById("msg").classList.remove("d-none");
            setTimeout(function(){ document.getElementById("msg").classList.add("d-none");},2000);
                }
                
    
    </script>
<?php include("foot.php"); ?>