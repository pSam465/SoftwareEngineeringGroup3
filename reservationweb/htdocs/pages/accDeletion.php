<?php
require_once("../php/connect.php");

//include_once('../php/checksession.php');					//currently commented out due to not having access to checksession

function IsChecked($chkname,$value)
    {
        if(!empty($_POST[$chkname]))
        {
            foreach($_POST[$chkname] as $chkval)
            {
                if($chkval == $value)
                {
                    return true;
                }
            }
        }
        return false;
    }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Account Management</title>
</head>
<style>
    .buttonWidth
    {
        width:250px;
    }
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
      padding: 10px;
      background-color: white;
      width: 550px;
      height: auto;
      text-align: center;
    }
    .buttonArea
    {
        vertical-align: bottom;
    }
    .delButton
    {
        text-align: bottom;
        /*onclick: ;*/

    }
</style>
<body>
    
    
    <div class="centerForm">
        <div class="containOutput">
            <div class="centerContainedOutput">
                <?php
                //echo" got here";
                if(isset($_POST["formSubmit"])) 
                    {
                        $aDoor = $_POST['idInput'];
                        //echo "formSubmit not empty ";
                        
                        
                        if(empty($aDoor)) 
                        {
                            echo("<p>You didn't select any accounts to delete.</p>");
                        } 
                        else 
                        {
                            $N = count($aDoor);
                            include_once("../php/connect.php");
                            $conn = connectDB();
                            echo("<p>You have deleted $N account(s): <br>");
                            for($i=0; $i < $N; $i++)
                            {

                                $sql = "DELETE FROM equipreservation WHERE userID=" . $aDoor[$i];
                                mysqli_query($conn, $sql);
                                
                                $sql = "DELETE FROM roomreservation WHERE userID=" . $aDoor[$i];
                                mysqli_query($conn, $sql);
                                
                                $sql = "DELETE FROM user WHERE userID=" . $aDoor[$i];
                                if (mysqli_query($conn, $sql)) 
                                {
                                    echo "User ". $aDoor[$i]. " deleted successfully <br>";
                                } else 
                                {
                                    echo "Error deleting record: " . mysqli_error($conn);
                                }
                            }
                            
                        }
                    }
                    else
                    {
                        echo" formSubmit is empty";
                    }
                    ?>
            </div>
        </div>
    </div>
</body>
</html>
