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
 $act="PRODUCT_FROM";
 $lact="forms";
 include("head.php");
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
                <h1 style="color:black;"><b>PRODUCT-FORM</b></h1>
            </div>
      
            <div class="col-12 mt-4">
                <table class="table table-striped">
                    <thead>
                        <tr class="text-center">
                            <th scope="col" class="align-middle">
                                <h5><b>#</b></h5>
                            </th>
                            <th scope="col" class="align-middle">
                                <h5><b>First_Name</b></h5>
                            </th>
                            <th scope="col" class="align-middle">
                                <h5><b>Last_Name</b></h5>
                            </th>
        
                            <th scope="col" class="align-middle">
                                <h5><b>Email</b></h5>
                            </th>
                            <th scope="col" class="align-middle">
                                <h5><b>Phone_no</b></h5>
                            </th>
                           
                            <th scope="col" class="align-middle">
                                <h5><b>Company Name</b></h5>
                            </th>
                            <th scope="col" class="align-middle">
                                <h5><b>Product Type</b></h5>
                            </th>
                            <th scope="col" class="align-middle">
                                <h5><b>Message</b></h5>
                            </th>
                          
                        </tr>
                    </thead>
                    <tbody>
                        <?php

$shsql="SELECT * FROM `product_form`";
$shresult=mysqli_query($conn,$shsql);
  $i=0;
  while($shrow=mysqli_fetch_assoc($shresult)){
        $i++;
    echo '<tr class="text-center" style="font-size: 15px;">
<th class="align-middle" scope="row">'.$i.'</th>
<td class="align-middle">'.$shrow['first_name'].'</td>
<td class="align-middle">'.$shrow['last_name'].'</td>
<td class="align-middle">'.$shrow['email'].'</td>
<td class="align-middle">'.$shrow['phone_no'].'</td>
<td class="align-middle">'.$shrow['company_name'].'</td>
<td class="align-middle">'.$shrow['product_type'].'</td>
<td class="align-middle">'.$shrow['message'].'</td>

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
if (<?php if($lact==="forms"){
           echo 1;
       } else{
           echo 0;
       } ?>) {
    document.getElementById("sub-drop6").classList.add("d-block");
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