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
$act="DASHBOARD";
include("head.php");
?>
<style>
    .dash{
    background:black !important;
     border:2px solid white !important;
     transform: scale(1);
     transition: all;
     transition-duration: .1s;
}
.dash:hover{
    transform: scale(1.1);
}
</style>
<section id="main-content" >
<section class="wrapper">
<div class="row justify-content-center mt-5">
            <div class="col-9 text-center">
                <h1 style="color:black;"><b>DASHBOARD</b></h1>
            </div>
</div>
<?php
$s1sql="SELECT * FROM `section3`";
$s1res=mysqli_query($conn,$s1sql);
$s1=mysqli_num_rows($s1res);

?>
<div class="row mt-5 justify-content-center">
    <div class="col-3 mx-2 rounded ">
        <a href="service_mang.php">
      <div class="text-center rounded-lg shadow dash"> <img src="../assets/hd-handshake-white-icon-symbol-transparent-background-116396039299nld88vzvy-removebg-preview.png" alt="" style="max-width:175px; height:175px;"> </div>
      <h4 class="mt-2 text-center text-dark" ><b>Number of Services</b></h4>
      <h3 class="text-center" style="color: rgb(38,154,92);"><b><?= $s1; ?></b></h3>
</a>
    </div>
    <?php
$s2sql="SELECT * FROM `product_section1.2`";
$s2res=mysqli_query($conn,$s2sql);
$s2=mysqli_num_rows($s2res);

?>
    <div class="col-3 mx-2 rounded ">
        <a href="product_s2.php">
      <div class="text-center rounded-lg shadow dash"> <img src="../assets/ClipartKey_1713874.png" alt="" style="max-width:175px;height:175px;"> </div>
      <h4 class="mt-2 text-center text-dark" ><b>Number of Products</b></h4>
      <h3 class="text-center" style="color: rgb(38,154,92);"><b><?= $s2; ?></b></h3>
</a>
    </div>
    
    <div class="col-3 mx-2 rounded ">
        <a href="seo_form.php">
      <div class="text-center rounded-lg shadow dash"> <img src="../assets/pngaaa.com-21690.png" alt="" style="max-width:175px;height:175px;"> </div>
      <h4 class="mt-2 text-center text-dark" ><b>Number of Pages</b></h4>
      <h3 class="text-center" style="color: rgb(38,154,92);"><b>5</b></h3>
</a>
    </div>

</div>
</section>
</section>

<?php include("foot.php"); ?>