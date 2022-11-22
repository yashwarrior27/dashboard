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
$act="seo_form";
include("head.php");
$msg="";
if(isset($_POST['update'])){
       
        $title=$_POST['pagename'];
        $desc=$_POST['desc'];
        $id=$_POST['update'];
        $usql="UPDATE `seo` SET `pagename`='$title',`description`='$desc' WHERE id =$id";
        $uresult=mysqli_query($conn,$usql);
        if($uresult){
            $msg="update successful";
        }
        else{
            $msg="update failed";
        }
      }

?>
<section id="main-content">
    <section class="wrapper">
        <div id="msg" class="d-none" style="position:absolute; right:10%; top:15%;">
            <div class="alert text-white bg-green" role="alert">
                UPDATE SUCCESSFULLY
            </div>
        </div>
        <div id="msgd" class="d-none" style="position:absolute; right:10%; top:15%;">
            <div class="alert text-white bg-danger" role="alert">
                DELETE SUCCESSFULLY
            </div>
        </div>
        <div id="msgaddr" class="d-none" style="position:absolute; right:10%; top:15%;">
            <div class="alert text-white bg-primary" role="alert">
                RECORD ADDED SUCCESSFULLY
            </div>
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-9 text-center">
                <h1 style="color:black;"><b>SEO-FORM</b></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 pt-2 ">
                <table class="table table-striped">
                    <thead>
                        <tr class="text-center">
                            <th scope="col" class="align-middle">
                                <h5><b>#</b></h5>
                            </th>
                            <th scope="col" class="align-middle">
                                <h5><b>Page Name</b></h5>
                            </th>
                            <th scope="col" class="align-middle">
                                <h5><b>Page Description</b></h5>
                            </th>
                            <th scope="col" class="align-middle">
                                <h5><b>EDIT</b></h5>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

$shsql="SELECT * FROM `seo`";
$shresult=mysqli_query($conn,$shsql);
  $i=0;
  while($shrow=mysqli_fetch_assoc($shresult)){
        $i++;
    echo '<tr class="text-center" style="font-size: 15px;">
<th class="align-middle" scope="row">'.$i.'</th>
<td class="align-middle">'.$shrow['pagename'].'</td>
<td class="align-middle">'.$shrow['description'].'</td>

<td  class="align-middle"><button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#m'.$shrow['id'].'">EDIT</button></td>
<!-- Modal for edit -->
<div class="modal fade" id="m'.$shrow['id'].'" tabindex="-1" aria-labelledby="ex'.$shrow['id'].'" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="ex'.$shrow['id'].'"><b>EDIT FORM</b></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-12">
          <form method="post"  enctype="multipart/form-data">
                    
                            <div class="form-group row ">
                        <div class="col-2 pt-2 text-dark ">
                            <label for="f2">
                                <h6><b>Page Name</b></h6>
                            </label>
                        </div>
                        <div class="col-10 ">
                            <input class="form-control" value="'.$shrow['pagename'].'" name="pagename" id="f2"
                                type="text">
                        </div>

                    </div>
                    <div class="form-group row ">
                    <div class="col-2 pt-2 text-dark ">
                        <label for="f2">
                            <h6><b>Page Description</b></h6>
                        </label>
                    </div>
                    <div class="col-10 ">
                        <input class="form-control" value="'.$shrow['description'].'" name="desc" id="f2"
                            type="text">
                    </div>

                </div>
                        
                            <div class="modal-footer">
        <button type="submit" id="upd"   name="update" value="'.$shrow['id'].'" class="btn btn-success">Save Changes </button>
        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
      </div>
                      </form>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</div>
</tr>';
  }
?>

                    </tbody>
                </table>

            </div>

        </div>



    </section>






</section>

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

if (<?php if($msg=="delete successfull"){
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

if (<?php if($msg=="add successfull"){
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
</script>
<?php include("foot.php"); ?>