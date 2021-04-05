<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/default.css">
    <title>Equipment's Available to Reserve</title>
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
    require_once('../php/checksession.php');
    defaultHeader();
  ?>

  <body>
    <div class="centerForm" style="text-align: center;">
      <div class="containOutput">
        <div class="centerContainedOutput">
        <?php
          include_once('../php/connect.php');
          
          $connect = connectDB();
          $query = "SELECT * FROM `equipment`";
          $result = $connect->query($query);
          
          if(!$result)
          {
            echo "query is incorrect";
            die("fatal error");
            echo "<br>";
          }

              $equipType = array();
              $equipID = array();
              $equipName = array();
              $quantity = array();
              $available = array();

              $numRowsQuery = $connect->query("SELECT COUNT(*) FROM equipment");
              $numRowsArr = $numRowsQuery->fetch_assoc();

              

              $numRows =$numRowsArr['COUNT(*)'];
              for ($i=0; $i < $numRows; $i++)
              {
                $row = $result->fetch_assoc(); 
                array_push($equipID, $row["equipID"]);
                array_push($equipType, $row["equipType"]);
                array_push($equipName,$row["equipName"]);
                array_push($quantity,$row["equipQuantity"]);
                array_push($available,$row["equipAvailabilty"]);
              }

              echo "
              <table style=\"width:100%;\" >
                      <tr>
                        <th>Equipment Type</th>
                        <th>Equipment Name</th>
                        <th>Quantity</th>
                        <th>Availability</th>
                        <th>Select</th>
                      </tr>";
              for($i = 0; $i <sizeof($equipID);$i++)
              {
                  echo"
                      <tr>
                        <form action=\"equipRes.php\">

                          <td>$equipType[$i]</td>

                          <td>$equipName[$i]</td>

                          <td>$quantity[$i]</td>

                          <td>$available[$i]</td>

                          <td><input type=\"submit\" name=\"equipSelection\" value=\"Select\"></td>

                          <input type=\"hidden\" id=\"equipID\" name=\"equipIdent\"value =\"$equipID[$i]\">

                          <input type=\"hidden\" id=\"equipType\" name=\"equipType\"value =\"$equipType[$i]\">

                          <input type=\"hidden\" id=\"quantity\" name=\"quantity\"value =\"$quantity[$i]\">
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