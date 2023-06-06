<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">

<head>
   <meta charset="utf-8" />
   <title>Login and Registration Form</title>
   <link rel="stylesheet" href="signup1.css" /> 
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<style>
   * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
   }

   .container {
      width: 100%;
      height: 10vh;
      /* background: #3c5077; */
      /* display: flex; */
      align-items: center;
      justify-content: center;
   }

   .btn {
      padding: 12px 69px;
      background: -webkit-linear-gradient(left,
            #4f6995,
            #458e85,
            #376487,
            #36265f);
      border: 0;
      outline: none;
      cursor: pointer;
      font-size: 20px;
      font-weight: 450;
      border-radius: 40px;
   }

   /* 
   .popup {
      width: 350px;
      background: #fff;
      border-radius: 6px;
      position: absolute;
      top: 0;
      left: 50%;
      transform: translate(-50%, -50%) scale(0.1);
      text-align: center;
      padding: 0 30px 30px;
      color: #333;
      visibility: hidden;
      transition: transform 0.4s, top 0.4s;

   }

   .open-popup {
      visibility: visible;
      top: 55%;
      transform: translate(-50%, -50%) scale(1);
   }

   .popup img {
      width: 70px;
      margin-top: -50px;
      border-radius: 50%;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);

   }

   .popup h2 {
      font-size: 38px;
      font-weight: 500;
      margin: 30px 0 10px
   }

   .popup button {
      width: 80%;
      margin-top: 50px;
      padding: 10px 0;
      background: #6fd649;
      color: #fff;
      border: 0;
      outline: none;
      font-size: 18px;
      border-radius: 4px;
      cursor: pointer;
      box-shadow: 0 5px 5px rgba(0, 0, 0, 0.2);
   } */
</style>

<body>
   <div class="wrapper" style="background-color='red';">
      <div class="title-text">
         <div class="title login">Login Form</div>
         <div class="title signup">Signup Form</div>
      </div>
      <div class="form-container">
         <div class="slide-controls">
            <input type="radio" name="slide" id="login" checked />
            <input type="radio" name="slide" id="signup" />
            <label for="login" class="slide login">Login</label>
            <label for="signup" class="slide signup">Signup</label>
            <div class="slider-tab"></div>
         </div>

         <div class="form-inner">
            <form action="signup1.php" class="login" method="POST">
               <div class="field">
                  <input type="email" name="email" placeholder="Email Address" id="email" required />
               </div>
               <div class="field">
                  <input type="password" name="password" placeholder="Password" id="password" required />
               </div>
               <div class="pass-link">
                  <a href="#">Forgot password?</a>
               </div>
               <!-- <div class="field btn">
                     <div class="btn-layer"></div>
                     <input type="submit" value="Login">
                  </div> -->
               <br />
               <div class="container">
                  <button type="submit" id="submit" name="submit" class="btn">
                     SUBMIT
                  </button>
               </div>

               <div class="signup-link">
                  New User ? <a href="signup1.php">Signup now</a>
               </div>

               <br />
               <br />

               
               <!-- LOGIN FORM -->
<?php
#create connection
$con =mysqli_connect('localhost','root','','tourisms');
session_start();
if(isset($_POST['submit']))
      {
         $email=$_POST['email'];
         $password=$_POST['password'];
         // $query="INSERT INTO login(username,password) VALUES ('$email','$password')";
         // $run=mysqli_query($con,$query);

         $sql="select email,password from signup where email='$email' and password='$password'";
         $result=mysqli_query($con,$sql);
         
         if(mysqli_num_rows($result)>0) 
         { $_SESSION['email']=$email; 
            echo "LoginSuccesfully"; 
           echo "<script>window.location.href='homepage/'</script>";
            die; 
            } 
            else { echo "Username or Password is Incorrect"; 
            } 
            }
             ?>


            </form>
            <form action="signup1.php" class="signup" method="POST">
               <div class="field">
                  <input type="text" placeholder="Full Name" name="username" required />
               </div>
               <div class="field">
                  <input type="email" placeholder="Email Address" name="email" required />
               </div>
               <div class="field">
                  <input type="password" placeholder="Password" name="password" required />
               </div>

               <div class="field">
                  <input type="tel" name="mobile" id="phone" placeholder="Mobile Number" required />
               </div>
               <div class="field btn">
                  <div class="btn-layer"></div>
                  <input type="submit" name="sb" value="Signup" />
               </div>

               <div class="signup-link">
                  Already Registered ? <a href="signup1.php">Login</a>
               </div>
            </form>
         </div>
      </div>
   </div>

   <!-- REDIRECT TO LOGIN -->
   <script>
      const loginText = document.querySelector(".title-text .login");
      const loginForm = document.querySelector("form.login");
      const loginBtn = document.querySelector("label.login");
      const signupBtn = document.querySelector("label.signup");
      const signupLink = document.querySelector("form .signup-link a");
      signupBtn.onclick = () => {
         loginForm.style.marginLeft = "-50%";
         loginText.style.marginLeft = "-50%";
      };
      loginBtn.onclick = () => {
         loginForm.style.marginLeft = "0%";
         loginText.style.marginLeft = "0%";
      };
      signupLink.onclick = () => {
         signupBtn.click();
         return false;
      };
   </script>

   <?php

#create connection
      $con =mysqli_connect('localhost','root','','tourisms');



      if(isset($_POST['sb']))
      {
         $username=$_POST['username'];
         $email=$_POST['email'];
         $password=$_POST['password'];
         $mobileno=$_POST['mobile'];

         $sql="select * from signup where email='$email'";
         $run=mysqli_query($con,$sql);
         $data=mysqli_fetch_array($run);
         if(($data)>0){ 
            echo "<script>alert('User already registered! Login please.'); </script>"; 
            echo "<script>window.location.href = '../signup1.php';</script>"; } 
            else{ $query="INSERT INTO signup(username,email,password,mobile) VALUES ('$username','$email','$password','$mobileno')";
    $run=mysqli_query($con,$query); 
    if(($run)>0){ echo "SignUp SuccesFull"; }
    else{ echo "SignUp failed"; 
    } 
    
    }
     } 
     ?>

   <a href="./homepage" style="padding-left: 300px; text-align: bottom">Back to home</a>
</body>

</html>











