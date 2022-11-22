<?php
include("../db.php");
$input= file_get_contents('php://input');
$data= json_decode($input,true);
$flink=$data['flink'];
$ylink=$data['ylink'];
$usql="UPDATE header SET flink='$flink',ylink='$ylink' WHERE id = 1";
       $uresult=mysqli_query($conn,$usql);
       if($uresult){
         echo 1;
       }
       else{
         echo 0;
       }
// if(isset($_POST['submit'])){
    
//     if(isset($_FILES['image'])&&$_FILES['image']['error']==0){
//         $file_name=$_FILES['image']['name'];
//         $file_tmp=$_FILES['image']['tmp_name'];
//         move_uploaded_file($file_tmp,"../assets/".$file_name);
//         $flink=$_POST['flink'];
//         $ylink=$_POST['ylink'];
//         $llink=$_POST['llink'];
//         $contact=$_POST['contact'];
//         $image=$file_name;
//         $blink=$_POST['blink'];
//         $blable=$_POST['blable'];
//         $id=$_POST['submit'];
//         $usql="UPDATE header SET flink='$flink',ylink='$ylink',llink='$llink',contact='$contact',image='$image',blink='$blink',bname='$blable' WHERE id = $id";
//         $uresult=mysqli_query($conn,$usql);
//       }
//       else{
            
//         $flink=$_POST['flink'];
//         $ylink=$_POST['ylink'];
//         $llink=$_POST['llink'];
//         $contact=$_POST['contact'];
//         $blink=$_POST['blink'];
//         $blable=$_POST['blable'];
//         $id=$_POST['submit'];
//         $usql="UPDATE header SET flink='$flink',ylink='$ylink',llink='$llink',contact='$contact',blink='$blink',bname='$blable' WHERE id = $id";
//         $uresult=mysqli_query($conn,$usql);
//       }
   
// }

?>
