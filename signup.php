<?php
#create connection
      // $con =mysqli_connect('localhost','root','','tourism');
      $con =mysqli_connect('localhost','root','','tourism');


      if(isset($_POST['sb']))
      {
         $username=$_POST['username'];
         $email=$_POST['email'];
         $password=$_POST['password'];
         $mobileno=$_POST['mobile'];
         $query="INSERT INTO signup(username,email,password,mobileno) VALUES ('$username','$email','$password','$mobileno')";
         $run=mysqli_query($con,$query);

         //$sql="select username,password from login where username='$email' and password='$password'";
        //  $result=mysqli_query($con,$sql);
         if(($run)>0)
         {
            echo "SignUp SuccesFul";
         }
         else
         {
            echo "SignUp failed";
         }

      }
      ?>






