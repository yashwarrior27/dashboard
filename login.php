<?php
include("../db.php");
session_start();
$msg=1;
if(isset($_POST['submit'])){
    $user=$_POST['username'];
    $password=$_POST['password'];
    $sql="SELECT * FROM admin WHERE username='$user' AND password = '$password'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    if($num>0){
        $row=mysqli_fetch_assoc($result);
        $_SESSION['id']=1;
        $_SESSION['username']=$row['username'];
        header("location:index.php");
    }
    else{
      $msg=0;
    }
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login-form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    

   
   
</head>
<body style="background-image: url(../assets/46515.jpg);
background-size: cover;
background-repeat: no-repeat;
background-attachment: fixed;
" >

    <div class="container " style="margin-top: 130px;">
        <div class="row justify-content-center ">
            <div class="col-lg-4 col-md-6 shadow  pb-3 mb-5 rounded" style="border: 1px solid white; border-radius: 23px !important; background: rgba(108, 122, 137,.4);">
                <form method="post">
                    <h1 class="text-center text-white">Login</h1>
                    <div class="form-group">
                      <label for="exampleInputEmail1" class="text-white">User Name</label>
                      <input type="text" name="username" class="form-control" id="exampleInputEmail1"  placeholder="User Name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1" class="text-white">Password</label>
                      <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                   
                    <button type="submit" name="submit" class="btn btn-success btn-lg btn-block">Login</button>
                    <p class="pt-3 text-center text-white "><b>Not  remember?</b> <a href="#" style="color:gold;">Forget Password</a></p>
                  </form>
            </div>
        </div>
    </div>
</body>
<script>
    if(<?php if($msg===0){ echo 1;} else{ echo 0;} ?>){
        alert("invalid username or password");
    }
</script>
</html>