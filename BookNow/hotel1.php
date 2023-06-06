<?php
    if(isset($_POST['submit']))
    {
      $name=$_POST['fullname'];
      $email=$_POST['email'];
      $pass=$_POST['password'];
      $phone=$_POST['phoneNumber'];
      $gender=$_POST['gender'];
      $address=$_POST['address'];
      $hotelb=$_POST['hotelb'];
      $room=$_POST['room_book_number'];
      $seat=$_POST['seat_book_number'];
      $adate=$_POST['a_date'];
      $ddate=$_POST['d_date'];
    }
      

    
    $servername='localhost';
    $username='root';
    $password='';
    $database='tourisms';


    
    $conn =mysqli_connect('localhost','root','','tourisms');
   // $conn=mysqli_connect($servername,$username,$password,$database);

    if(!$conn){
        die ("sorry" . mysqli_connect_error());
    }
    else{
     $sql="INSERT INTO `hotelregister` (`fullname`, `email`, `password`, `phoneNumber`, `gender`, `address`, `hotelb`, `room_book_number`, `seat_book_number`, `a_date`, `d_date`) VALUES ('$name', '$email', '$pass', '$phone', '$gender', '$address', '$hotelb', '$room', '$seat', '$adate', '$ddate')";
     $result=mysqli_query($conn,$sql);
    }

    if($result){
        echo 'submitted successfully';
        echo "<script>window.location.href='../homepage'</script>";
        die; 
    }
    else{
        echo 'not submitted';}
?>


