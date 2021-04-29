<?php
require_once("../php/connect.php");
include_once("../php/default.php");
include_once("../php/checksession.php");
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

  <link rel="stylesheet" href="../css/reserve.css">
  <title>UserInfo</title>
</head>
<style>
    .centerForm
    {
      text-align: center;
      margin: auto;
    }
    .containOutput
    {
      margin: auto;
      width: 30%;
    }
    .centerContainedOutput
    {
      margin: 1vh;
      border: 5px solid #1C5438;
      padding: 1vh;
      background-color: white;
      width: 550px;
      height: 700px;
      text-align: center;
    }
    .redFont
    {
      color:red;
    }
  </style>
<?php
    include_once('../php/default.php');
    defaultHeader();
    $var= "hello";
  ?>
  <body>
  <div class="centerForm" style="text-align: center;">
      <div class="containOutput">
        <div class="centerContainedOutput">
         
          <?php
          $conn = connectDB();
            if(isset($_POST['modSubmit'])) 
            {
              $fname = $_POST['fname'];
              $lname = $_POST['lname'];
              $email = $_POST['email'];
              $password =  $_POST['password'];
              $userId = $_POST['userId'];
              $role = $_POST['role'];
                if(empty($fname))
                {
                  echo"<p > First name has not been changed </p>";
                }
                else
                {
                  $sql = "UPDATE user SET fName = '".$fname."' WHERE userID = ". $userId.";"; 
                  if(mysqli_query($conn, $sql))
                  {
                    echo "<p >First name of user $userId has been changed to $fname</p>";
                  }
                  else
                  {
                    echo "Error deleting record: " . mysqli_error($conn);
                  }
                }

                if(empty($lname))
                {
                  echo"<p >Last name has not been changed </p>";
                }
                else
                {
                  $sql = "UPDATE user SET lName = '".$lname."' WHERE userID = ". $userId.";"; 
                  if(mysqli_query($conn, $sql))
                  {
                    echo "<p >Last name of user $userId has been changed to $lname</p>";
                  }
                  else
                  {
                    echo "Error deleting record: " . mysqli_error($conn);
                  }
                }

                if(empty($email))
                {
                  echo"<p >email has not been changed </p>";
                }
                else
                {
                  $sql = "UPDATE user SET email = '".$email."' WHERE userID = ". $userId.";"; 
                  if(mysqli_query($conn, $sql))
                  {
                    echo "<p >Email of user $userId has been changed to $email</p>";
                  }
                  else
                  {
                    echo "Error deleting record: " . mysqli_error($conn);
                  }
                }
                if(empty($password))
                {
                  echo"<p >password has not been changed </p>";
                }
                else
                {
                  $sql = "UPDATE user SET password = SHA1('{$password}') WHERE userID = ". $userId.";"; 
                  if(mysqli_query($conn, $sql))
                  {
                    echo "<p >Password of user $userId has been changed to $password</p>";
                  }
                  else
                  {
                    echo "Error deleting record: " . mysqli_error($conn);
                  }
                }

                if($role == 'leave')
                {
                  echo"<p >role has not been changed </p>";
                }
                else
                {
                  $sql = "UPDATE user SET position = '".$role."' WHERE userID = ". $userId.";";  
                  if(mysqli_query($conn, $sql))
                  {
                    echo "<p >Role of user $userId has been changed to $role</p>";
                  }
                  else
                  {
                    echo "Error deleting record: " . mysqli_error($conn);
                  }
                }

            }
            else
            {
              echo" <p> something went wrong </p>";
            }

          ?>
        </div>
      </div>
  </div>
</body>
</html>
