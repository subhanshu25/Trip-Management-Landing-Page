
<?php
/*There are basically two types of way is used to connect with database
1. mysqli extensions: means we can use mysqli functions eg: mysqli_connect(servername, username, password, databsename) it is a procedural oriented programming method
2.PDO(PHP data object): we can use this method also to connect our database to php it is 
a object oriented programming method*/

if(isset($_POST['name'])){



 $server = "localhost";
 $username = "root";
 $password = "";
 
 $con = mysqli_connect($server, $username, $password);

 if(!$con){
   die ("Connection to this database is failed due to " . mysqli_connect_error());
 }


 //here we excute the sql query to insert data in the database

 $name = $_POST['name'];
 $age = $_POST['age'];
 $gender = $_POST['gender'];
 $email = $_POST['email'];
 $phone = $_POST['phone'];
 $desc = $_POST['desc'];

 $sql = "INSERT INTO `trip`. `trip`(`name`, `age`, `gender`, `email`, `phone`, `others`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";

//  echo "$sql";

 //here we used a way to execute this data in our database

 /*-> this a object operator after that query() this a function that contain the variable where data is inserted if that variable == true. Then it means data has been successfully inserted in the database 
 if data is not inserted successfully then run the else case where we print the error which occur in the con*/

 if($con->query($sql) == true){
  echo "successfully inserted";
 }

 else{
   echo "error: $sql <br> $con->error";
 }

 $con->close();

} //ifset braces close

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="bg.jpg" alt="IIT Kharagpur">
    <div class="container">
        <h1>Welcome to BBAU Dehradun Trip form</h3>
       <p class "submitMsg">Thanks for submiting your form. we are happy to see you joining us for trip</p>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button> 
        </form>
    </div>
    <script src="index.js"></script>

    
    
</body>
</html>