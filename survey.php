<?php
    $show_ok = false;
    $show_error = false;
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'multipagesform';

    $con = mysqli_connect($servername,$username,$password,$database);

    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $name = $_POST['name'];
        $mail = $_POST['mail'];
        $mob = $_POST['mob'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];

        if(isset($_POST['submit']))
        {
            $sql = "INSERT INTO registration(name, mail, mob, gender, dob) VALUES('$name','$mail','$mob','$gender','$dob')";
            $rs = mysqli_query($con,$sql);
            if($rs)
            {
               $show_ok = true;
            }
            else{
                $show_error = true;
            }
        }
    } 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey</title>
</head>
<style>
    .container 
    {
        border: 2px solid black;
        padding:2%;
        border-radius: 10px;
        box-shadow: 0px 0px 20px 1px red;
        margin: 3% 35%; 
         
    }
    .container input
    {
        width: 100%;
        border: none;
        font-size:120%;
        /* border: 0px 0px 2px 0px black; */
    }
    .head
    {
        text-align: center;
        font-size: 200%;
    }
    .btn button
    {
        width: 20%;
        height: 30px;
        background: blue;
        border: 1px solid black;
        border-radius: 5px;
        color:#ffffff;
    }
    .btn button:hover
    {
        background: blue;
        border-radius: 5px;
        box-shadow: 0px 0px 20px 1px yellow;
        transition: all 0.2s ease-in-out;
        color:#ffffff;

    }
    .btn button:active
    {
        background: white;
        border-radius: 5px;
        box-shadow: 0px 0px 20px 1px yellow;
        color:#000;
    }
</style>
<body>
    <form action="survey.php" method = "post">
        <!-- <?php
        if($show_ok)
        {
            echo"<script type= 'text/javascript'> alert('Record Submitted successfully')</script>";
        }
        elseif($show_error)
        {
            echo"<script type= 'text/javascript'> alert('Submission failed !!')</script>";
        }
        else{
            echo"<script type= 'text/javascript'> alert('Jaldi hato yaha se !')</script>";  
        }

        ?> -->

    <div class="head"><p>- : Register yourself : -</p></div>

    <div class="container">
            <!-- One "tab" for each step in the form: -->
        <div class="tab">Name:
            <p><input type="text" name = "name" placeholder="Enter your name" require><hr></p>
        </div>

        <div class="tab">Contact Info:
            <p><input type="email" name = "mail" placeholder="E-mail..." require><hr></p>
            <p><input type="number" name = "mob" placeholder="Phone..." require><hr></p>
        </div>
        <div class="tab">Gender:
            <p><input type="text" name = "gender" placeholder="Gender" require><hr></p>
        </div>
        <div class="tab">Birthday:
            <p><input type="text" name = "dob" placeholder="date of birth" require><hr></p>
        </div>
        <div class="btn">
            <center><button type="submit" name = "submit">submit</button></center>
        </div>
    </div>

    </form>
</body>
</html>