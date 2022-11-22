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
 $act="ABOUT_US_SECTION-2";
 $lact="about";
 include("head.php");
 $msg="";
 if(isset($_POST['submits'])){

         $content=$_POST['contents'];
         $head1=$_POST['heading1'];
         $head2=$_POST['heading2'];
        $blable1=$_POST['blable1'];
        $blable2=$_POST['blable2'];
        $blink=$_POST['blink'];
         $id=$_POST['submits'];
         $usql="UPDATE `about_section` SET `content`='$content',`heading1`='$head1',`heading2`='$head2',`btnname1`='$blable1',`btnname2`='$blable2',`btnlink`='$blink' WHERE id = $id";
         $uresult=mysqli_query($conn,$usql);
         if($uresult){
             $msg="update successful";
         }
         else{
             $msg="update failed";
         }
    
 }
 
 ?>
 <?php
 $fssql="SELECT * FROM `about_section`";
 $fsresult=mysqli_query($conn,$fssql);
 $fsrow=mysqli_fetch_assoc($fsresult);
 
 
 ?>
 <section id="main-content">
       <section class="wrapper">
            <div id="msg" class="d-none" style="position:absolute; right:10%; top:15%;"><div   class="alert text-white bg-green" role="alert">
            UPDATE SUCCESSFULLY
            </div></div>
               <div class="row justify-content-center mt-5">
                   <div class="col-6 text-center">
                       <h1 style="color:black;"><b>SECTION-2 </b></h1>
                   </div>
 
               </div>
               <div class="row justify-content-center mt-4 text-center">
                   <div class="col-11">
                     <form method="post" id="myform" enctype="multipart/form-data">
                            
                     <div class="form-group row">
                             <div class="col-2 pt-2 text-dark ">
                                 <label for="contents"><h6><b>Content</b></h6></label>
                             </div>
                             <div class="col-10">
                             <textarea class="form-control summernote" name="contents" id="contents" rows="4"><?= $fsrow['content']; ?></textarea>
                             </div>
                         
                                </div>
                                <div class="form-group row ">
                        <div class="col-2 pt-2 text-dark ">
                            <label for="f1">
                                <h6><b>1st-Heading</b></h6>
                            </label>
                        </div>
                        <div class="col-10 ">
                        <textarea class="form-control" name="heading1" id="f1" rows="2"><?= $fsrow['heading1']; ?></textarea>
                
                        </div>

                    </div>
                
                    <div class="form-group row ">
                        <div class="col-2 pt-2 text-dark ">
                            <label for="f3">
                                <h6><b>2nd-Heading</b></h6>
                            </label>
                        </div>
                        <div class="col-10 ">
                        <textarea class="form-control" name="heading2" id="f3" rows="2"><?= $fsrow['heading2']; ?></textarea>
                
                        </div>

                    </div>
                    <div class="form-group row ">
                            <div class="col-2 pt-2 text-dark ">
                                <label for="f4"><h6><b>Button Lable-1</b></h6></label>
                            </div>
                            <div class="col-10 ">
                                <input class="form-control"value="<?= $fsrow['btnname1'];?>" name="blable1" id="f4" type="text" >
                            </div>
                         
                        </div>
                        <div class="form-group row ">
                            <div class="col-2 pt-2 text-dark ">
                                <label for="f5"><h6><b>Button Lable-2</b></h6></label>
                            </div>
                            <div class="col-10 ">
                                <input class="form-control"value="<?= $fsrow['btnname2'];?>" name="blable2" id="f5" type="text" >
                            </div>
                         
                        </div>
                        <div class="form-group row ">
                            <div class="col-2 pt-2 text-dark ">
                                <label for="f6"><h6><b>Button Link</b></h6></label>
                            </div>
                            <div class="col-10 ">
                                <input class="form-control"value="<?= $fsrow['btnlink'];?>" name="blink" id="f6" type="text" >
                            </div>
                         
                        </div>
                   
                         <button type="submit" id="upd"   name="submits" value=" <?= $fsrow['id']; ?>" class="btn btn-primary">Update</button>
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
       <script>if (<?php if($lact==="about"){
            echo 1;
        } else{
            echo 0;
        } ?>) {
     document.getElementById("sub-drop4").classList.add("d-block");
 }</script>