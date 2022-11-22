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
$act="HOME_SECTION-2";
$lact="home";
include("head.php");

$msg="";
if(isset($_POST['update'])){
       
        $title=$_POST['title'];
        $desc=$_POST['desc'];
        $id=$_POST['update'];
        $usql="UPDATE `section2` SET `Title`='$title',`Description`='$desc' WHERE S2_id =$id";
        $uresult=mysqli_query($conn,$usql);
        if($uresult){
            $msg="update successful";
        }
        else{
            $msg="update failed";
        }
      }

?>
<style>
    .bg-green{
        background-color: rgba(38,154,92,.8);
    }
</style>
<?php
$usql="SELECT * FROM `section2`";
$uresult=mysqli_query($conn,$usql);
$urow=mysqli_fetch_assoc($uresult);
?>
<section id="main-content">
<section class="wrapper">
           <div id="msg" class="d-none " style="position:absolute; right:10%; top:15%;"><div id="inmsg"   class="alert text-white bg-green " role="alert">
           UPDATE SUCCESSFULLY
           </div></div>
              <div class="row justify-content-center mt-5">
                  <div class="col-6 text-center mt-2">
                      <h1 style="color:black;"><b>SECTION-2</b></h1>
                  </div>

              </div>
      		<div class="row justify-content-center mt-5 text-center">
                  <div class="col-11">
                    <form method="post" id="myform" enctype="multipart/form-data">
                        <div class="form-group row mb-4 ">
                            <div class="col-2 pt-2 text-dark ">
                                <label for="f1"><h6><b>Title</b></h6></label>
                            </div>
                            <div class="col-10 ">
                                <input class="form-control" value="<?= $urow['Title']; ?>" name="title" id="f1" type="text">
                            </div>
                         
                        </div>
                        <div class="form-group row mb-4 ">
                            <div class="col-2 pt-2 text-dark ">
                                <label for="f2"><h6><b>Description</b></h6></label>
                            </div>
                            <div class="col-10 ">
                            <textarea class="form-control" name="desc" id="f2" rows="2"><?= $urow['Description']; ?></textarea>
                            </div>
                         
                        </div>
                        
                        <button type="submit" id="upd"   name="update" value="<?= $urow['S2_id']; ?>" class="btn btn-primary">Update</button>
                      </form>
                  </div>
          </section> 
      </section>

</section>

<script>
if (<?php if($lact==="home"){
           echo 1;
       } else{
           echo 0;
       } ?>) {
    document.getElementById("sub-drop1").classList.add("d-block");
}
</script>
<script>
    if (<?php if($msg=="update successful"){
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
</script>
<?php include("foot.php"); ?>
