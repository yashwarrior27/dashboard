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
$act="service_managment";
include("head.php");
$msg="";
if(isset($_POST['topsubmit'])){

    if(isset($_FILES['image1'])&&$_FILES['image1']['error']==0&&$_FILES['bgimage1']['error']!=0){
        $file_name=$_FILES['image1']['name'];
        $file_tmp=$_FILES['image1']['tmp_name'];
        move_uploaded_file($file_tmp,"../assets/".$file_name);
        $head1=$_POST['heading1'];
    $head2=$_POST['heading2'];
    $id=$_POST['topsubmit'];
        $image=$file_name;
        $usql="UPDATE`service_product` SET `heading1`='$head1',`heading2`='$head2',`image1`='$image' WHERE id = $id";
        $uresult=mysqli_query($conn,$usql);
        if($uresult){
            $msg="update successful";
        }
        else{
            $msg="update failed";
        }
      }

     else if(isset($_FILES['bgimage1'])&&$_FILES['bgimage1']['error']==0&&$_FILES['image1']['error']!=0){
        $file_name=$_FILES['bgimage1']['name'];
        $file_tmp=$_FILES['bgimage1']['tmp_name'];
        move_uploaded_file($file_tmp,"../assets/".$file_name);
        $head1=$_POST['heading1'];
    $head2=$_POST['heading2'];
    $id=$_POST['topsubmit'];
        $bgimage=$file_name;
        $usql="UPDATE `service_product` SET `heading1`='$head1',`heading2`='$head2',`background`='$bgimage' WHERE id = $id";
        $uresult=mysqli_query($conn,$usql);
        if($uresult){
            $msg="update successful";
        }
        else{
            $msg="update failed";
        }
      }
      else if($_FILES['bgimage1']['error']==0&&$_FILES['image1']['error']==0){
        $file_bgname=$_FILES['bgimage1']['name'];
        $file_bgtmp=$_FILES['bgimage1']['tmp_name'];
        move_uploaded_file($file_bgtmp,"../assets/".$file_bgname);
        $file_name=$_FILES['image1']['name'];
        $file_tmp=$_FILES['image1']['tmp_name'];
        move_uploaded_file($file_tmp,"../assets/".$file_name);
        $head1=$_POST['heading1'];
    $head2=$_POST['heading2'];
    $id=$_POST['topsubmit'];
        $bgimage=$file_bgname;
        $image=$file_name;
        $usql="UPDATE `service_product` SET `heading1`='$head1',`heading2`='$head2',`image1`='$image',`background`='$bgimage' WHERE id = $id";
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
    $id=$_POST['topsubmit'];
$usql="UPDATE `service_product` SET `heading1`='$head1',`heading2`='$head2' WHERE id = $id";
$uresult=mysqli_query($conn,$usql);
if($uresult){
            $msg="update successful";

        }
        else{
            $msg="update failed";
        }
    }
   
}
if(isset($_POST['mainsubmit'])){
    
    if(isset($_FILES['imagem'])&&$_FILES['imagem']['error']==0){
        $file_name=$_FILES['imagem']['name'];
        $file_tmp=$_FILES['imagem']['tmp_name'];
        move_uploaded_file($file_tmp,"../assets/".$file_name);
        $image=$file_name;
        $content=$_POST['contente'];
        $id=$_POST['mainsubmit'];
        $usql="UPDATE `service_product` SET `content`='$content',`image2`='$image' WHERE id = $id";
        $uresult=mysqli_query($conn,$usql);
        if($uresult){
            $msg="update successful";
        }
        else{
            $msg="update failed";
        }
      }
      else{
            
        $content=$_POST['contente'];
        $id=$_POST['mainsubmit'];
        $usql="UPDATE `service_product` SET `content`='$content' WHERE id = $id";
        $uresult=mysqli_query($conn,$usql);
        if($uresult){
            $msg="update successful";
        }
        else{
            $msg="update failed";
        }
      }
   
}
if(isset($_POST['bottomsubmit'])){
       
    $title=$_POST['title'];
    $desc=$_POST['desc'];
    $id=$_POST['bottomsubmit'];
    $usql="UPDATE `service_product` SET `heading3`='$title',`heading4`='$desc' WHERE id =$id";
    $uresult=mysqli_query($conn,$usql);
    if($uresult){
        $msg="update successful";
    }
    else{
        $msg="update failed";
    }
  }

?>
<section id="main-content" >
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
                <h1 style="color:black;"><b>SERVICES</b></h1>
            </div>
            <div class="col-12">

                        <div class="text-right"><a href="home_s3.php" class="btn btn-info " role="button" aria-pressed="true">Add/Delete Services</a></div>
            </div>
            <div class="col-12 mt-2">
                <table class="table table-striped">
                    <thead>
                        <tr class="text-center">
                            <th scope="col" class="align-middle">
                                <h5><b>#</b></h5>
                            </th>
                            <th scope="col" class="align-middle">
                                <h5><b>Title</b></h5>
                            </th>
                            <th scope="col" class="align-middle">
                                <h5><b>Top_Section</b></h5>
                            </th>
                            <th scope="col" class="align-middle">
                                <h5><b>Main_Section</b></h5>
                            </th>
                            <th scope="col" class="align-middle">
                                <h5><b>End_Section</b></h5>
                            </th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php

$spsql="SELECT * FROM `service_product`";
$spresult=mysqli_query($conn,$spsql);
  $i=-3;
  $x=-2;
  $z=-1;
  $y=0;  
  for($j=0;$j < mysqli_num_rows($spresult);$j++){
      $sprow=mysqli_fetch_assoc($spresult);
        $i+=3;
        $x+=3;
        $z+=3;
        $y++;
    echo '<tr class="text-center" style="font-size: 15px;">
<th class="align-middle" scope="row">'.$y.'</th>
<td class="align-middle" scope="row">'.$sprow['pagename'].'</td>
<td class="align-middle" scope="row"><button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#m'.$sprow['id'].'">EDIT</button></td>
<td class="align-middle" scope="row"><button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#m2'.$sprow['id'].'">EDIT</button></td>
<td class="align-middle" scope="row"><button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#m3'.$sprow['id'].'">EDIT</button></td>
<!-- Modal for edit1 -->
<div class="modal fade" id="m'.$sprow['id'].'" tabindex="-1" aria-labelledby="ex'.$sprow['id'].'" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="ex'.$sprow['id'].'"><b>EDIT FORM</b></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-12">
          <form method="post" id="myform" enctype="multipart/form-data">
          <div class="form-group row ">
              <div class="col-2 pt-2 text-dark ">
                  <label for="f1"><h6><b>1st-Heading</b></h6></label>
              </div>
              <div class="col-10 ">
                  <input class="form-control" value="'.$sprow['heading1'].'" name="heading1" id="f1" type="text">
              </div>
           
          </div>
          <div class="form-group row ">
              <div class="col-2 pt-2 text-dark ">
                  <label for="f2"><h6><b>2nd-Heading</b></h6></label>
              </div>
              <div class="col-10 ">
                  <input class="form-control" value="'.$sprow['heading2'].'" name="heading2" id="f2" type="text">
              </div>
           
          </div>
        
              <div class="form-group row ">
                                      <div class="col-2 pt-2 text-dark ">
                                          <label>
                                              <h6><b>Background-Image</b></h6>
                                          </label>
                                      </div>
                                      <div class="col-7 ">
                                          <div class="text-center"> <img src="../assets/'.$sprow['background'].'" class="img-fluid imgc"
                                                  alt="" id="addimg"> </div>
                                      </div>
                                      <div class="col-3 pt-2 text-dark ">
                                          <div class="text-center">
                                              <label for='.$i.' class="btn  btn-success"><b
                                                      style="font-size: 11px;">Select Image</b></label>
                                              <input type="file" name="bgimage1" style="display:none;"
                                                  class="form-control-file" onchange="imag (this)" id='.$i.'
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
                                          <div class="text-center"> <img src="../assets/'.$sprow['image1'].'" class="img-fluid imgc"
                                                  alt="" id="addimg"> </div>
                                      </div>
                                      <div class="col-3 pt-2 text-dark ">
                                          <div class="text-center">
                                              <label for='.$x.' class="btn  btn-success"><b
                                                      style="font-size: 11px;">Select Image</b></label>
                                              <input type="file" name="image1" style="display:none;"
                                                  class="form-control-file" onchange="imag (this)" id='.$x.'
                                                  accept="image/*">
                                          </div>
                                      </div>

                                  </div>
                                  
                                  <div class="modal-footer">
                                  <button type="submit" id="upd"   name="topsubmit" value="'.$sprow['id'].'" class="btn btn-primary">Save Changes </button>
                                  <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                                </div>
        </form>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</div>

<!-- Modal for edit2 -->
<div class="modal fade" id="m2'.$sprow['id'].'" tabindex="-1" aria-labelledby="ex2'.$sprow['id'].'" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="ex2'.$sprow['id'].'"><b>EDIT FORM</b></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-12">
          <form method="post" id="myform2" enctype="multipart/form-data">
                           
          <div class="form-group row">
                  <div class="col-2 pt-2 text-dark ">
                      <label for="contente"><h6><b>Content</b></h6></label>
                  </div>
                  <div class="col-10">
                  <textarea class="form-control summernote" name="contente" id="contente" rows="4">'.$sprow['content'].'</textarea>
                  </div>
              
                     </div>
             

                     <div class="form-group row pt-3 ">
                                          <div class="col-2 pt-2 text-dark ">
                                              <label>
                                                  <h6><b>2nd_Image</b></h6>
                                              </label>
                                          </div>
                                          <div class="col-7 ">
                                              <div class="text-center"> <img src="../assets/'.$sprow['image2'].'" class="img-fluid imgc"
                                                      alt="" id="addimg"> </div>
                                          </div>
                                          <div class="col-3 pt-2 text-dark ">
                                              <div class="text-center">
                                                  <label for='.$z.' class="btn  btn-success"><b
                                                          style="font-size: 11px;">Select Image</b></label>
                                                  <input type="file" name="imagem" style="display:none;"
                                                      class="form-control-file" onchange="imag (this)" id='.$z.'
                                                      accept="image/*">
                                              </div>
                                          </div>

                                      </div>
                                  
                                  <div class="modal-footer">
                                  <button type="submit" id="upd"   name="mainsubmit" value="'.$sprow['id'].'" class="btn btn-primary">Save Changes </button>
                                  <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                                </div>
        </form>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</div>
<!-- Modal for edit3 -->
<div class="modal fade" id="m3'.$sprow['id'].'" tabindex="-1" aria-labelledby="ex3'.$sprow['id'].'" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="ex3'.$sprow['id'].'"><b>EDIT FORM</b></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-12">
          <form method="post" id="myform" enctype="multipart/form-data">
                        <div class="form-group row mb-4 ">
                            <div class="col-2 pt-2 text-dark ">
                                <label for="f1"><h6><b>Title</b></h6></label>
                            </div>
                            <div class="col-10 ">
                            <textarea class="form-control" name="title" id="f1" rows="2">'.$sprow['heading3'].'</textarea>
                                
                            </div>
                         
                        </div>
                        <div class="form-group row mb-4 ">
                            <div class="col-2 pt-2 text-dark ">
                                <label for="f2"><h6><b>Description</b></h6></label>
                            </div>
                            <div class="col-10 ">
                            <textarea class="form-control" name="desc" id="f2" rows="2">'.$sprow['heading4'].'</textarea>
                            </div>
                         
                        </div>
                                  
                                  <div class="modal-footer">
                                  <button type="submit" id="upd"   name="bottomsubmit" value="'.$sprow['id'].'" class="btn btn-primary">Save Changes </button>
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
         <script>
          $(document).ready(function() {
  $('.summernote').summernote();
});
      </script>