<?php
require('conncetion.in.php');
require('function.inc.php');
if(isset($_POST['submit'])){
  $email=get_safe_value($con,$_POST['email']);
   $password=get_safe_value($con,$_POST['password']);


   $sql="select * from admin_users where Email='$email' and Password='$password'";
	$res=mysqli_query($con,$sql);
	$count=mysqli_num_rows($res);
	if($count>0){
		$_SESSION['ADMIN_LOGIN']='yes';
		$_SESSION['ADMIN_EMAIL']=$email;
		header('location:categories.php');
		die();
	}else{
		$msg="Please enter correct login details";	
	}
}

?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Animated Login Form </title>
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>

  <body>


  <div class="container py-5 h-100 ">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <form class="card bg-warning text-black"  method = "post" >
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-4">

              <h2 class="   pb-4 h-font ">Account</h2>
              <p class="text-black-50 pb-4  h-font-p">*Required information</p>

              <div class="form-outline form-white mb-4">
                <input type="email" id="typeEmailX"  name="email" class="form-control form-control-lg" placeholder="Email" Required/>
                <label class="form-label" for="typeEmailX"></label>
              </div>

              <div class="form-outline form-white mb-1">
                <input type="password" id="typePasswordX"  name="password" class="form-control form-control-lg" placeholder="Password" Required/>
                <label class="form-label" for="typePasswordX"></label>
              </div>
              <div class="forget-password mb-4">
              <p class="small mb-5 pb-2 forget-password-left "><a class="text-dark" href="#!">Keep me signed in</a></p>
              <p class="small mb-5 pb-2 forget-password-right"><a class="text-dark" href="#!">Forgot password?</a></p>
              </div>
              
              
              

              <button class="btn btn-outline-light btn-lg btn-block px-5" type="submit" name="submit">Login</button>

              <div class="d-flex justify-content-center text-center mt-4 pt-1">
                <a href="#!" class="text-black"><i class="fab fa-facebook-f fa-lg"></i></a>
                <a href="#!" class="text-black"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                <a href="#!" class="text-black"><i class="fab fa-google fa-lg"></i></a>
              </div>

            </div>

            <div>
              <p class="mb-0 mb-4" >Don't have an account? 
              </p>
              <button class="btn btn-outline-light btn-lg btn-block px-5" type="submit">Create Account</button>
            </div>
            

          </div>
</form>
      </div>
    </div>
  </div>
</section>
<!-- Section: Design Block -->

  </body>
</html>
