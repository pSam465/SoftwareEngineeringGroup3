<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/default.css">
    <title>Room's Available to Reserve</title>
  </head>
<style>
body
{
  background-color: #1C4F9C;
}
tr
{
  border:2px solid #1C5438;

}
</style>
  
  <?php
    include_once('../php/default.php');
    defaultHeader();
  ?>

  <body>
    <div class="centerForm" style="text-align: center;">
      <div class="containOutput">
        <div class="centerContainedOutput">
        <?php
          include_once('../php/connect.php');
          
          $connect = connectDB();
          $query = "SELECT * FROM `room`";
          $result = $connect->query($query);
          
          if(!$result)
          {
            echo "query is incorrect";
            die("fatal error");
            echo "<br>";
          }

              $RoomID = array();
              $roomID = array();
              $building = array();
              $roomNum = array();
              $available = array();

              $numRowsQuery = $connect->query("SELECT COUNT(*) FROM roomreservation");
              $numRowsArr = $numRowsQuery->fetch_assoc();

              

              $numRows =$numRowsArr['COUNT(*)'];
              for ($i=0; $i < $numRows; $i++)
              {
                $row = $result->fetch_assoc(); 
                array_push($roomID, $row["roomID"]);
                array_push($roomType, $row["roomType"]);
                array_push($building,$row["building"]);
                array_push($roomNum,$row["roomNum"]);
                array_push($available,$row["roomAvailability"]);
              }

              echo "
              <table style=\"width:100%;\" >
                      <tr>
                        <th>Room Type</th>
                        <th>Building</th>
                        <th>Room Number</th>
                        <th>Availability</th>
                        <th>Select</th>
                      </tr>";
              for($i = 0; $i <sizeof($roomID);$i++)
              {
                  echo"
                      <tr>
                        <form action=\"roomRes.php\">

                          <td>$roomType[$i]</td>

                          <td>$building[$i]</td>

                          <td>$roomNum[$i]</td>

                          <td>$available[$i]</td>

                          <td><input type=\"submit\" name=\"roomSelection\" value=\"Select\"></td>

                          <input type=\"hidden\" id=\"roomNum\" name=\"roomIdent\"value =\"$roomID[$i]\">

                          <input type=\"hidden\" id=\"roomNum\" name=\"roomNum\"value =\"$roomNum[$i]\">

                          <input type=\"hidden\" id=\"roomType\" name=\"roomType\"value =\"$roomType[$i]\">

                          <input type=\"hidden\" id=\"building\" name=\"building\"value =\"$building[$i]\">
                        </form>
                      </tr>";
              }
              echo "</table>";
              $result->free();
    ?>
    </div>
  </div>
</div>
  </body>
</html>