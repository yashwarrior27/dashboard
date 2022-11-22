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
$act="HOME_SECTION-1";
$lact="home";
include("head.php");

$msg="";
if(isset($_POST['update'])){
    
    if(isset($_FILES['uimage'])&&$_FILES['uimage']['error']==0){
        $file_name=$_FILES['uimage']['name'];
        $file_tmp=$_FILES['uimage']['tmp_name'];
        move_uploaded_file($file_tmp,"../assets/".$file_name);
        $thead=$_POST['thead'];
        $mhead=$_POST['mhead'];
        $bhead=$_POST['bhead'];
        $desc=$_POST['desc'];
        $image=$file_name;
        $content=$_POST['content'];
        $bname=$_POST['bname'];
        $blink=$_POST['blink'];
        $id=$_POST['update'];
        $usql="UPDATE `slide_header` SET top_heading='$thead',middle_heading='$mhead',bottom_heading='$bhead',head_description='$desc',head_image='$image',content='$content',buttonname='$bname',buttonlink='$blink' WHERE head_id =$id";
        $uresult=mysqli_query($conn,$usql);
        if($uresult){
            $msg="update successful";
        }
        else{
            $msg="update failed";
        }
      }
      else{
            
        $thead=$_POST['thead'];
        $mhead=$_POST['mhead'];
        $bhead=$_POST['bhead'];
        $desc=$_POST['desc'];
        $content=$_POST['content'];
        $bname=$_POST['bname'];
        $blink=$_POST['blink'];
        $id=$_POST['update'];
        $usql="UPDATE `slide_header` SET top_heading='$thead',middle_heading='$mhead',bottom_heading='$bhead',head_description='$desc',content='$content',buttonname='$bname',buttonlink='$blink' WHERE head_id =$id";
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
  $dsql="DELETE FROM `slide_header` WHERE head_id = $id";
  $dresult=mysqli_query($conn,$dsql);
  if($dresult){
    $msg="delete successfull";
  }
}

if(isset($_POST['addrecords'])){
    
  if(isset($_FILES['aimage'])&&$_FILES['aimage']['error']==0){
      $file_name=$_FILES['aimage']['name'];
      $file_tmp=$_FILES['aimage']['tmp_name'];
      move_uploaded_file($file_tmp,"../assets/".$file_name);
      $thead=$_POST['thead'];
      $mhead=$_POST['mhead'];
      $bhead=$_POST['bhead'];
      $desc=$_POST['desc'];
      $image=$file_name;
      $content=$_POST['content'];
      $bname=$_POST['bname'];
      $blink=$_POST['blink'];
      $addsql="INSERT INTO `slide_header`(`top_heading`, `middle_heading`, `bottom_heading`, `head_description`, `head_image`,`content`, `buttonname`, `buttonlink`) VALUES ('$thead','$mhead','$bhead','$desc','$image','$content','$bname','$blink')";
      $addresult=mysqli_query($conn,$addsql);
      if($addresult){
          $msg="add successfull";
      }
      else{
          $msg="add failed";
      }
    }
    else{
          
      $thead=$_POST['thead'];
      $mhead=$_POST['mhead'];
      $bhead=$_POST['bhead'];
      $desc=$_POST['desc'];
      $content=$_POST['content'];
      $bname=$_POST['bname'];
      $blink=$_POST['blink'];
      $addsql="INSERT INTO `slide_header`(`top_heading`, `middle_heading`, `bottom_heading`, `head_description`,`content`,`buttonname`, `buttonlink`) VALUES ('$thead','$mhead','$bhead','$desc','$content','$bname','$blink')";
      $addresult=mysqli_query($conn,$addsql);
      if($addresult){
          $msg="add successfull";
      }
      else{
          $msg="add failed";
      }
    }
 
}
if(isset($_POST['background'])){

    if(isset($_FILES['bgimage'])&&$_FILES['bgimage']['error']==0){
        $file_name=$_FILES['bgimage']['name'];
        $file_tmp=$_FILES['bgimage']['tmp_name'];
        move_uploaded_file($file_tmp,"../assets/".$file_name);
        $image=$file_name;
        $backimgsql="UPDATE `slider_headbackground` SET `image`='$image' WHERE id=1";
        $backimgresult=mysqli_query($conn,$backimgsql);
        if( $backimgresult){
            $msg="background change successfull";
        }
        else{
            $msg="change failed";
        }
}
}
?>

<style>
.bg-green {
    background-color: rgba(38, 154, 92, .8);
}
</style>


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
        <div id="msgchgimg" class="d-none" style="position:absolute; right:10%; top:15%;">
            <div class="alert text-white bg-dark" role="alert">
                BACKGROUND IMAGE CHANGED
            </div>
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-9 text-center">
                <h1 style="color:black;"><b>SECTION-1</b></h1>
            </div>
            <div class="col-9">
                <div class="row justify-content-end">
                <div class="col-6">
                        <div class="text-left"><button class="btn btn-dark" data-toggle="modal"
                                data-target="#chgbackground">Change Background</button>
<!-- change background Modal -->
<div class="modal fade" id="chgbackground" tabindex="-1" aria-labelledby="chgbackgroundLabel" aria-hidden="true">
  <div class="modal-dialog  modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        <h5 class="modal-title" id="chgbackgroundLabel">CHANGE BACKGROUND FORM</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php
      $backimgsql="SELECT * FROM `slider_headbackground`";
      $backimgresult=mysqli_query($conn,$backimgsql);
      $backimgrow=mysqli_fetch_assoc($backimgresult);
      ?>
      <div class="modal-body">
      <div class="row">
                                        <div class="col-12">
                                            <form method="post" enctype="multipart/form-data">
                                                <div class="form-group row ">
                                                    <div class="col-3 col-sm-2 pt-2" style="color: black;">
                                                        <label>
                                                            <h6><b>Background-Image</b></h6>
                                                        </label>
                                                    </div>
                                                    <div class="col-6 col-sm-8 ">
                                                        <div class="text-center"> <img src="../assets/<?= $backimgrow['image'];?>" class="img-fluid imgc"
                                                                alt="" id="addimg"> </div>
                                                    </div>
                                                    <div class="col-3 col-sm-2 pt-2 text-dark ">
                                                        <div class="text-center">
                                                            <label for=0 class="btn  btn-success"><b
                                                                    style="font-size: 11px;">Select Image</b></label>
                                                            <input type="file" name="bgimage" style="display:none;"
                                                                class="form-control-file" onchange="imag (this)" id=0
                                                                accept="image/*">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
          <button type="submit" name="background" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
                    <div class="col-6">
                        <div class="text-right"><button class="btn btn-primary" data-toggle="modal"
                                data-target="#addrecords">Add Records</button></div>
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
                                                    <div class="col-3 col-sm-2 pt-2 text-dark  ">
                                                        <label for="f1">
                                                            <h6><b>Top Heading</b></h6>
                                                        </label>
                                                    </div>
                                                    <div class="col-9 col-sm-10 ">
                                                        <textarea class="form-control" id="f1" name="thead"
                                                            rows="2"></textarea>

                                                    </div>

                                                </div>
                                                <div class="form-group row ">
                                                    <div class="col-3 col-sm-2 pt-2 text-dark ">
                                                        <label for="f2">
                                                            <h6><b>Middle Heading</b></h6>
                                                        </label>
                                                    </div>
                                                    <div class="col-9 col-sm-10 ">
                                                        <textarea class="form-control" id="f2" name="mhead"
                                                            rows="2"></textarea>
                                                    </div>

                                                </div>
                                                <div class="form-group row ">
                                                    <div class="col-3 col-sm-2 pt-2 text-dark ">
                                                        <label for="f3">
                                                            <h6><b>Bottom Heading</b></h6>
                                                        </label>
                                                    </div>
                                                    <div class="col-9 col-sm-10">
                                                        <textarea class="form-control" id="f3" name="bhead"
                                                            rows="2"></textarea>
                                                    </div>

                                                </div>
                                                <div class="form-group row ">
                                                    <div class="col-3 col-sm-2 pt-2 text-dark  ">
                                                        <label for="f4">
                                                            <h6><b>Description</b></h6>
                                                        </label>
                                                    </div>
                                                    <div class="col-9 col-sm-10 ">
                                                        <textarea class="form-control" id="f4" name="desc"
                                                            rows="2"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                            <div class="col-3 col-sm-2 pt-2 text-dark ">
                                <label for="content"><h6><b>Slider-List</b></h6></label>
                            </div>
                            <div class="col-9 col-sm-10">
                            <textarea class="form-control summernote" name="content" id="content" rows="4"></textarea>
                            </div>
                               </div>
                                                <div class="form-group row ">
                                                    <div class="col-3 col-sm-2 pt-2 text-dark ">
                                                        <label for="f5">
                                                            <h6><b>Button Name</b></h6>
                                                        </label>
                                                    </div>
                                                    <div class="col-9 col-sm-10 ">
                                                        <textarea class="form-control" id="f5" name="bname"
                                                            rows="2"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row ">
                                                    <div class="col-3 col-sm-2 pt-2 text-dark ">
                                                        <label for="f6">
                                                            <h6><b>Button Link</b></h6>
                                                        </label>
                                                    </div>
                                                    <div class="col-9 col-sm-10 ">
                                                        <textarea class="form-control" id="f6" name="blink"
                                                            rows="2"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row ">
                                                    <div class="col-3 col-sm-2 pt-2 text-dark ">
                                                        <label>
                                                            <h6><b>Image</b></h6>
                                                        </label>
                                                    </div>
                                                    <div class="col-6 col-sm-7 ">
                                                        <div class="text-center"> <img src="#" class="img-fluid imgc"
                                                                alt="" id="addimg"> </div>
                                                    </div>
                                                    <div class="col-3 pt-2 text-dark ">
                                                        <div class="text-center">
                                                            <label for=1 class="btn  btn-success"><b
                                                                    style="font-size: 11px;">Select Image</b></label>
                                                            <input type="file" name="aimage" style="display:none;"
                                                                class="form-control-file" onchange="imag (this)" id=1
                                                                accept="image/*">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" id="upd" name="addrecords"
                                                        class="btn btn-primary">Add records </button>
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
            <div class="col-12 mt-2">
                <table class="table table-striped">
                    <thead>
                        <tr class="text-center">
                            <th scope="col" class="align-middle">
                                <h5><b>#</b></h5>
                            </th>
                            <th scope="col" class="align-middle">
                                <h5><b>Top Heading</b></h5>
                            </th>
                            <th scope="col" class="align-middle">
                                <h5><b>Middle Heading</b></h5>
                            </th>
                            <th scope="col" class="align-middle">
                                <h5><b>Bottom Heading</b></h5>
                            </th>
                            <th scope="col" class="align-middle">
                                <h5><b>Description</b></h5>
                            </th>
                            <th scope="col" class="align-middle">
                                <h5><b>Button Name</b></h5>
                            </th>
                            <th scope="col" class="align-middle">
                                <h5><b>Button Link</b></h5>
                            </th>
                            <th scope="col" class="align-middle">
                                <h5><b>Image</b></h5>
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

$shsql="SELECT * FROM `slide_header`";
$shresult=mysqli_query($conn,$shsql);
$shrow=mysqli_fetch_assoc($shresult);
echo '<tr class="text-center" style="font-size: 15px;">
<th class="align-middle" scope="row">1</th>
<td class="align-middle">'.$shrow['top_heading'].'</td>
<td class="align-middle">'.$shrow['middle_heading'].'</td>
<td class="align-middle">'.$shrow['bottom_heading'].'</td>
<td class="align-middle">'.$shrow['head_description'].'</td>
<td class="align-middle">'.$shrow['buttonname'].'</td>
<td class="align-middle">'.$shrow['buttonlink'].'</td>
<td class="align-middle"><img src="../assets/'.$shrow['head_image'].'"  style="max-width:120px;" alt=""></td>
<td  class="align-middle"><button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#m'.$shrow['head_id'].'">EDIT</button></td>
<td></td>

<!--Edit Modal -->
<div class="modal fade" id="m'.$shrow['head_id'].'" tabindex="-1" aria-labelledby="ex'.$shrow['head_id'].'" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="ex'.$shrow['head_id'].'"><b>EDIT FORM</b></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-12">
          <form method="post"  enctype="multipart/form-data">
                        <div class="form-group row ">
                            <div class="col-3 col-sm-2 pt-2 text-dark  ">
                                <label for="f1"><h6><b>Top Heading</b></h6></label>
                            </div>
                            <div class="col-9 col-sm-10 ">
                            <textarea class="form-control" id="f1" name="thead" rows="2">'.$shrow['top_heading'].'</textarea>
  
                            </div>
                         
                        </div>
                        <div class="form-group row ">
                            <div class="col-3 col-sm-2 pt-2 text-dark ">
                                <label for="f2"><h6><b>Middle Heading</b></h6></label>
                            </div>
                            <div class="col-9 col-sm-10 ">
                            <textarea class="form-control" id="f2" name="mhead" rows="2">'.$shrow['middle_heading'].'</textarea>
                            </div>
                         
                        </div>
                        <div class="form-group row ">
                            <div class="col-3 col-sm-2 pt-2 text-dark ">
                                <label for="f3"><h6><b>Bottom Heading</b></h6></label>
                            </div>
                            <div class="col-9 col-sm-10 ">
                            <textarea class="form-control" id="f3" name="bhead" rows="2">'.$shrow['bottom_heading'].'</textarea>
                            </div>
                         
                        </div>
                        <div class="form-group row ">
                            <div class="col-3 col-sm-2 pt-2 text-dark  ">
                                <label for="f4"><h6><b>Description</b></h6></label>
                            </div>
                            <div class="col-9 col-sm-10 ">
                            <textarea class="form-control" id="f4" name="desc" rows="2">'.$shrow['head_description'].'</textarea>
                            </div>
                            </div>
                            <div class="form-group row">
                            <div class="col-3 col-sm-2 pt-2 text-dark ">
                                <label for="content"><h6><b>Slider-List</b></h6></label>
                            </div>
                            <div class="col-9 col-sm-10">
                            <textarea class="form-control summernote" name="content" id="content" rows="4">'.$shrow['content'].'</textarea>
                            </div>
                               </div>
                            <div class="form-group row ">
                            <div class="col-3 col-sm-2 pt-2 text-dark ">
                                <label for="f5"><h6><b>Button Name</b></h6></label>
                            </div>
                            <div class="col-9 col-sm-10 ">
                            <textarea class="form-control" id="f5" name="bname" rows="2">'.$shrow['buttonname'].'</textarea>
                            </div>
                            </div>
                            <div class="form-group row ">
                            <div class="col-3 col-sm-2 pt-2 text-dark ">
                                <label for="f6"><h6><b>Button Link</b></h6></label>
                            </div>
                            <div class="col-9 col-sm-10 ">
                            <textarea class="form-control" id="f6" name="blink" rows="2">'.$shrow['buttonlink'].'</textarea>
                            </div>
                            </div>
                            <div class="form-group row ">
                                <div class="col-3 col-sm-2 pt-2 text-dark ">
                                    <label ><h6><b>Image</b></h6></label>
                                </div>
                                <div class="col-6 col-sm-7 ">
                                  <div class="text-center"> <img src="../assets/'.$shrow['head_image'].'" class="img-fluid imgc" alt="" id="idimg'.$shrow['head_id'].'"> </div>
                                </div>
                                <div class="col-3 pt-2 text-dark ">
                                <div class="text-center">
                                <label for=2 class="btn  btn-primary"><b style="font-size: 11px;">Select Image</b></label>
                                    <input type="file" name="image" style="display:none;"  class="form-control-file" onchange="imag(this)" id=2 accept="image/*">
                                    </div>
                                </div>
                             
                            </div>
                            <div class="modal-footer">
        <button type="submit" id="upd"   name="update" value="'.$shrow['head_id'].'" class="btn btn-success">Save Changes </button>
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
if(mysqli_num_rows($shresult)>1){
  $i=1;
  $j=2;
  while($shrow=mysqli_fetch_assoc($shresult)){
        $i++;
        $j++;
    echo '<tr class="text-center" style="font-size: 15px;">
<th class="align-middle" scope="row">'.$i.'</th>
<td class="align-middle">'.$shrow['top_heading'].'</td>
<td class="align-middle">'.$shrow['middle_heading'].'</td>
<td class="align-middle">'.$shrow['bottom_heading'].'</td>
<td class="align-middle">'.$shrow['head_description'].'</td>
<td class="align-middle">'.$shrow['buttonname'].'</td>
<td class="align-middle">'.$shrow['buttonlink'].'</td>
<td class="align-middle"><img src="../assets/'.$shrow['head_image'].'" style="max-width:120px;" alt=""></td>
<td  class="align-middle"><button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#m'.$shrow['head_id'].'">EDIT</button></td>
<td  class="align-middle"><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#d'.$shrow['head_id'].'">DELETE</button></td>

<!-- Modal for edit -->
<div class="modal fade" id="m'.$shrow['head_id'].'" tabindex="-1" aria-labelledby="ex'.$shrow['head_id'].'" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="ex'.$shrow['head_id'].'"><b>EDIT FORM</b></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-12">
          <form method="post"  enctype="multipart/form-data">
                        <div class="form-group row ">
                            <div class="col-3 col-sm-2 pt-2 text-dark  ">
                                <label for="f1"><h6><b>Top Heading</b></h6></label>
                            </div>
                            <div class="col-9 col-sm-10 ">
                            <textarea class="form-control" name="thead" id="f1" rows="2">'.$shrow['top_heading'].'</textarea>
  
                            </div>
                         
                        </div>
                        <div class="form-group row ">
                            <div class="col-3 col-sm-2 pt-2 text-dark ">
                                <label for="f2"><h6><b>Middle Heading</b></h6></label>
                            </div>
                            <div class="col-9 col-sm-10 ">
                            <textarea class="form-control" name="mhead" id="f2" rows="2">'.$shrow['middle_heading'].'</textarea>
                            </div>
                         
                        </div>
                        <div class="form-group row ">
                            <div class="col-3 col-sm-2 pt-2 text-dark ">
                                <label for="f3"><h6><b>Bottom Heading</b></h6></label>
                            </div>
                            <div class="col-9 col-sm-10 ">
                            <textarea class="form-control" id="f3" name="bhead" rows="2">'.$shrow['bottom_heading'].'</textarea>
                            </div>
                         
                        </div>
                        <div class="form-group row ">
                            <div class="col-3 col-sm-2 pt-2 text-dark px-1 ">
                                <label for="f4"><h6><b>Description</b></h6></label>
                            </div>
                            <div class="col-9 col-sm-10 ">
                            <textarea class="form-control" id="f4" name="desc" rows="2">'.$shrow['head_description'].'</textarea>
                            </div>
                            </div>
                            <div class="form-group row">
                            <div class="col-3 col-sm-2 pt-2 text-dark ">
                                <label for="content"><h6><b>Slider-List</b></h6></label>
                            </div>
                            <div class="col-9 col-sm-10">
                            <textarea class="form-control summernote" name="content" id="content" rows="4">'.$shrow['content'].'</textarea>
                            </div>
                               </div>
                            <div class="form-group row ">
                            <div class="col-3 col-sm-2 pt-2 text-dark ">
                                <label for="f5"><h6><b>Button Name</b></h6></label>
                            </div>
                            <div class="col-9 col-sm-10 ">
                            <textarea class="form-control" id="f5" name="bname" rows="2">'.$shrow['buttonname'].'</textarea>
                            </div>
                            </div>
                            <div class="form-group row ">
                            <div class="col-3 col-sm-2 pt-2 text-dark ">
                                <label for="f6"><h6><b>Button Link</b></h6></label>
                            </div>
                            <div class="col-9 col-sm-10 ">
                            <textarea class="form-control" id="f6" name="blink" rows="2">'.$shrow['buttonlink'].'</textarea>
                            </div>
                            </div>
                            <div class="form-group row ">
                                <div class="col-3 col-sm-2 pt-2 text-dark ">
                                    <label ><h6><b>Image</b></h6></label>
                                </div>
                                <div class="col-6 col-sm-7 ">
                                  <div class="text-center"> <img src="../assets/'.$shrow['head_image'].'" class="img-fluid imgc" alt="" id="idimg'.$shrow['head_id'].'"> </div>
                                </div>
                                <div class="col-3 pt-2 text-dark ">
                                <div class="text-center">
                                <label for='.$j.' class="btn  btn-primary"><b style="font-size: 11px;">Select Image</b></label>
                                    <input type="file" name="uimage" style="display:none;"  class="form-control-file" onchange="imag(this)" id='.$j.' accept="image/*"> </div>
                                </div>
                             
                            </div>
                            <div class="modal-footer">
        <button type="submit" id="upd"   name="update" value="'.$shrow['head_id'].'" class="btn btn-success">Save Changes </button>
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
<div class="modal fade" id="d'.$shrow['head_id'].'" tabindex="-1" aria-labelledby="exd'.$shrow['head_id'].'" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body" id="exd'.$shrow['head_id'].'">
        <div class="row justify-content-center">
        <div class="col-9 text-center">
        <div class="text-center"><img src="../assets/pngwing.com.png" alt="" style="max-width: 120px !important;"></div>
        <h1 class="mt-4" style="color:black;" >Are you sure?</h1>
        <h6>Do you want to delete this record? This process cannot be undone.</h6>
        </div>
        <div class="col-9 mt-2">
        <div class="text-center">
        <form method="post">
        <button type="submit" name="delete" value="'.$shrow['head_id'].'" class="btn btn-danger mr-2 rounded-0"><h5 class="m-0">Delete</h5></button>
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
if (<?php if($msg=="background change successfull"){
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
<script>
// <?php
// $shbsql="SELECT * FROM `slide_header`";
// $shbresult=mysqli_query($conn,$shbsql);
// while($shbrow=mysqli_fetch_assoc($shbresult)){
//   echo'function imf'.$shbrow['head_id'].'(a){
//     let i=a.files[0]; 
// let img= URL.createObjectURL(i);
// document.getElementById("idimg'.$shbrow['head_id'].'").src=img;
// };';
// }
// ?>
</script>

<?php include("foot.php"); ?>
<!-- <script>
  function addi(x){
    let a =x.files[0];
    let im= URL.createObjectURL(a);
    document.getElementById("addimg").src=im;
  }
</script> -->
<script>
          $(document).ready(function() {
  $('.summernote').summernote();
});
      </script>