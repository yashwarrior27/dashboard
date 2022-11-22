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
 $act="SERVICE_SECTION-2";
 $lact="service";
 include("head.php");
 $msg="";
 if(isset($_POST['submits'])){

         $content=$_POST['contents'];
         $head1=$_POST['heading1'];
         $subhead1=$_POST['subheading1'];
         $head2=$_POST['heading2'];
         $subhead2=$_POST['subheading2'];
         $id=$_POST['submits'];
         $usql="UPDATE `service_section` SET `content`='$content',`heading1`='$head1',`description1`='$subhead1',`heading`='$head2',`description`='$subhead2' WHERE id = $id";
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
 $fssql="SELECT * FROM `service_section`";
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
                            <label for="f2">
                                <h6><b>1st-Sub_Heading</b></h6>
                            </label>
                        </div>
                        <div class="col-10 ">
                        <textarea class="form-control" name="subheading1" id="f2" rows="2"><?= $fsrow['description1']; ?></textarea>
                
                        </div>

                    </div>
                    <div class="form-group row ">
                        <div class="col-2 pt-2 text-dark ">
                            <label for="f3">
                                <h6><b>2nd-Heading</b></h6>
                            </label>
                        </div>
                        <div class="col-10 ">
                        <textarea class="form-control" name="heading2" id="f3" rows="2"><?= $fsrow['heading']; ?></textarea>
                
                        </div>

                    </div>
                    <div class="form-group row ">
                        <div class="col-2 pt-2 text-dark ">
                            <label for="f4">
                                <h6><b>2nd-Sub_Heading</b></h6>
                            </label>
                        </div>
                        <div class="col-10 ">
                        <textarea class="form-control" name="subheading2" id="f4" rows="2"><?= $fsrow['description']; ?></textarea>
                
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
       <script>if (<?php if($lact==="service"){
            echo 1;
        } else{
            echo 0;
        } ?>) {
     document.getElementById("sub-drop3").classList.add("d-block");
 }</script>