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
 $act="HOME_SECTION-5";
 $lact="home";
 include("head.php");
 $msg="";
 if(isset($_POST['update'])){
     
     if(isset($_FILES['image'])&&$_FILES['image']['error']==0){
         $file_name=$_FILES['image']['name'];
         $file_tmp=$_FILES['image']['tmp_name'];
         move_uploaded_file($file_tmp,"../assets/".$file_name);
         $image=$file_name;
        $head1=$_POST['heading1'];
        $head2=$_POST['heading2'];
         $id=$_POST['update'];
         $usql="UPDATE `section5.2` SET `image`='$image',`heading1`='$head1',`heading2`='$head2' WHERE id =$id";
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
         $id=$_POST['update'];
         $usql="UPDATE `section5.2` SET `heading1`='$head1',`heading2`='$head2' WHERE id =$id";
         $uresult=mysqli_query($conn,$usql);
         if($uresult){
             $msg="update successful";
         }
         else{
             $msg="update failed";
         }
       }
    
 }
 if(isset($_POST['delete'])){
    $id=$_POST['delete'];
    $dsql="DELETE FROM `section5.2` WHERE `id` = $id";
    $dresult=mysqli_query($conn,$dsql);
    if($dresult){
      $msg="delete successfull";
    }
  }
  if(isset($_POST['addrecords'])){
    
    if(isset($_FILES['image'])&&$_FILES['image']['error']==0){
        $file_name=$_FILES['image']['name'];
        $file_tmp=$_FILES['image']['tmp_name'];
        move_uploaded_file($file_tmp,"../assets/".$file_name);
        $image=$file_name;
       $head1=$_POST['heading1'];
       $head2=$_POST['heading2']; 
        $addsql="INSERT INTO `section5.2`(`image`, `heading1`, `heading2`) VALUES ('$image','$head1','$head2')";
        $addresult=mysqli_query($conn,$addsql);
        if($addresult){
            $msg="add successfull";
        }
        else{
            $msg="add failed";
        }
      }
      else{
            
        $head1=$_POST['heading1'];
        $head2=$_POST['heading2']; 
         $addsql="INSERT INTO `section5.2`(`heading1`, `heading2`) VALUES ('$head1','$head2')";
         $addresult=mysqli_query($conn,$addsql);
        if($addresult){
            $msg="add successfull";
        }
        else{
            $msg="add failed";
        }
      }
   
  }
  if(isset($_POST['submit'])){
   $head=$_POST['heading'];
   $headsub=$_POST['subheading'];
   $id=$_POST['submit'];
   $headsql="UPDATE `section5` SET `heading`='$head',`sub_heading`='$headsub' WHERE id=$id ";
   $headresult=mysqli_query($conn,$headsql);
   if($headresult){
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
                <h1 style="color:black;"><b>SECTION-5</b></h1>
            </div>
            <div class="col-12">
                <div class="row justify-content-end ">
                    <div class="col-6">
                        <div class="text-center"><button class="btn btn-dark" data-toggle="modal"
                                data-target="#chghead">Change Headings</button>
                        </div>
                    </div>
                    <!-- change headings modal -->
                    <div class="modal fade" id="chghead" tabindex="-1" aria-labelledby="chgheadLabel"
                        aria-hidden="true">
                        <div class="modal-dialog  modal-xl">
                            <div class="modal-content">
                                <div class="modal-header bg-dark">
                                    <h5 class="modal-title" id="chgheadLabel">CHANGE HEADINGS FORM</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <?php
      $fsql="SELECT * FROM `section5`";
      $fresult=mysqli_query($conn,$fsql);
      $frow=mysqli_fetch_assoc($fresult);
      
      ?>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <form method="post" enctype="multipart/form-data">
                                                <div class="form-group row ">
                                                    <div class="col-2 pt-2 text-dark ">
                                                        <label for="f1">
                                                            <h6><b>Main-Heading</b></h6>
                                                        </label>
                                                    </div>
                                                    <div class="col-10 ">
                                                        <textarea class="form-control" id="f1" name="heading"
                                                            rows="2"><?= $frow['heading']; ?></textarea>
                                                    </div>

                                                </div>
                                                <div class="form-group row ">
                                                    <div class="col-2 pt-2 text-dark ">
                                                        <label for="f2">
                                                            <h6><b>Sub-Heading</b></h6>
                                                        </label>
                                                    </div>
                                                    <div class="col-10 ">
                                                        <textarea class="form-control" id="f2" name="subheading"
                                                            rows="2"><?= $frow['sub_heading']; ?></textarea>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <div class="text-center"><button type="submit" id="upd"
                                                            name="submit" value=" <?= $frow['id']; ?>"
                                                            class="btn btn-primary ">Update</button></div>
                                                    <button type="button" class="btn btn-danger"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="col-6">
                        <div class="text-center"><button class="btn btn-primary" data-toggle="modal"
                                data-target="#addrecords">Add Record</button>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="addrecords" tabindex="-1" aria-labelledby="subrecords"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <h3 class="modal-title " id="subrecords"><b>ADD RECORD FORM</b></h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <form method="post" enctype="multipart/form-data">
                                                <div class="form-group row ">
                                                    <div class="col-2 pt-2 text-dark ">
                                                        <label>
                                                            <h6><b>Image</b></h6>
                                                        </label>
                                                    </div>
                                                    <div class="col-7 ">
                                                        <div class="text-center"> <img src="#" class="img-fluid imgc"
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
                                                <div class="form-group row ">
                                                    <div class="col-2 pt-2 text-dark ">
                                                        <label for="f1">
                                                            <h6><b>1st-Heading</b></h6>
                                                        </label>
                                                    </div>
                                                    <div class="col-10 ">
                                                        <input class="form-control" value=" " name="heading1" id="f1"
                                                            type="text">
                                                    </div>

                                                </div>
                                                <div class="form-group row ">
                                                    <div class="col-2 pt-2 text-dark ">
                                                        <label for="f1">
                                                            <h6><b>2nd-Heading</b></h6>
                                                        </label>
                                                    </div>
                                                    <div class="col-10 ">
                                                        <input class="form-control" value=" " name="heading2" id="f1"
                                                            type="text">
                                                    </div>

                                                </div>

                                                <div class="modal-footer">
                                                    <button type="submit" id="upd" name="addrecords"
                                                        class="btn btn-primary">Add record </button>
                                                    <button type="button" class="btn btn-dark"
                                                         data-dismiss="modal">Cancel</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
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
                                <h5><b>Image</b></h5>
                            </th>
                            <th scope="col" class="align-middle">
                                <h5><b>1st-Heading</b></h5>
                            </th>
                            <th scope="col" class="align-middle">
                                <h5><b>2st-Heading</b></h5>
                            </th>
                            <th scope="col" class="align-middle">
                                <h5><b>EDIT</b></h5>
                            </th>
                            <th scope="col" class="align-middle">
                                <h5><b>DELETE</b></h5>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

$shsql="SELECT * FROM `section5.2`";
$shresult=mysqli_query($conn,$shsql);
  $i=0;
  while($shrow=mysqli_fetch_assoc($shresult)){
        $i++;
    echo '<tr class="text-center" style="font-size: 15px;">
<th class="align-middle" scope="row">'.$i.'</th>
<td class="align-middle"><img src="../assets/'.$shrow['image'].'" style="max-width:120px;" alt=""></td>
<td class="align-middle">'.$shrow['heading1'].'</td>
<td class="align-middle">'.$shrow['heading2'].'</td>

<td  class="align-middle"><button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#m'.$shrow['id'].'">EDIT</button></td>
<td  class="align-middle"><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#d'.$shrow['id'].'">DELETE</button></td>

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
                                    <label ><h6><b>Image</b></h6></label>
                                </div>
                                <div class="col-7 ">
                                  <div class="text-center"> <img src="../assets/'.$shrow['image'].'" class="imgc" style="max-width:200px;" alt=""> </div>
                                </div>
                                <div class="col-3 pt-2 text-dark ">
                                <div class="text-center">
                                <label for='.$i.' class="btn  btn-primary"><b style="font-size: 11px;">Select Image</b></label>
                                    <input type="file" name="image" style="display:none;"  class="form-control-file" onchange="imag(this)" id='.$i.' accept="image/*"> </div>
                                </div>
                             
                            </div>
                            <div class="form-group row ">
                        <div class="col-2 pt-2 text-dark ">
                            <label for="f2">
                                <h6><b>1st-Heading</b></h6>
                            </label>
                        </div>
                        <div class="col-10 ">
                            <input class="form-control" value="'.$shrow['heading1'].'" name="heading1" id="f2"
                                type="text">
                        </div>

                    </div>
                    <div class="form-group row ">
                    <div class="col-2 pt-2 text-dark ">
                        <label for="f2">
                            <h6><b>2st-Heading</b></h6>
                        </label>
                    </div>
                    <div class="col-10 ">
                        <input class="form-control" value="'.$shrow['heading2'].'" name="heading2" id="f2"
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
<!-- Modal for delete -->
<div class="modal fade" id="d'.$shrow['id'].'" tabindex="-1" aria-labelledby="exd'.$shrow['id'].'" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body" id="exd'.$shrow['id'].'">
        <div class="row justify-content-center">
        <div class="col-9 text-center">
        <div class="text-center"><img src="../assets/pngwing.com.png" alt="" style="max-width: 120px !important;"></div>
        <h1 class="mt-4" style="color:black;" >Are you sure?</h1>
        <h6>Do you want to delete this record? This process cannot be undone.</h6>
        </div>
        <div class="col-9 mt-2">
        <div class="text-center">
        <form method="post">
        <button type="submit" name="delete" value="'.$shrow['id'].'" class="btn btn-danger mr-2 rounded-0"><h5 class="m-0">Delete</h5></button>
        </form>
        <button type="button" class="btn btn-secondary rounded-0" data-dismiss="modal"><h5 class="m-0">Cancel</h5></button>
       </div>
        
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