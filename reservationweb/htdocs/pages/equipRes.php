<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/default.css">
    <title>Equipment Reservation</title>
  </head>

  <style>
    body
    {
      background-color: #1C4F9C;
    }
    .redFont
    {
      color:red;
    }
  </style>  
  <?php
    include_once('../php/default.php');
    require_once('../php/checksession.php');
    defaultHeader();
    $equipSelected = "";
    $equipName = "";
    $numOfEquip = "";
  ?>
  <body>
    <div class="centerForm" style="text-align: center;">
      <div class="containOutput">
        <div class="centerContainedOutput">
          <h1>Reserve Equipment Below</h1>
          <form action="equipResData.php">
            <!--This is the section for the form input
              that will be sent to a page called
              roomResData.php--->
            <?php
              if(isset($_GET['equipSelection']))
              {
                $equipSelected = $_GET['equipType'];
                $equipName  = $_GET['equipName'];
                $equipIdent = $_GET['equipID'];
              }
              echo "<label for=\"equipSel\" class = \"redFont\">Equipment Selected: $equipSelected $equipName </label>";
            ?>
            <br>
            <label for="fName">First Name:</label>
            <input type="text" id="fname" name="firstName" style="width: 310px;"><br><br>
            <label for="lastName">Last Name:</label>
            <input type="text" name="lastName" style="width: 310px;"><br><br>
            <label for="email">Email:</label>
            <input type="text" name="emailAddress" style="width: 340px;"><br>
            <!--This is the section for the drop down input
                  that will be sent to a page called
                  roomResData.php--->
            <?php
              date_default_timezone_set('EST');
              $displayDate = date('m-d-Y');
              $dbDate = date('Y-m-d');
              echo "
                <label for=\"Date\";>Date: $displayDate</label> 
                <br>
                <input type=\"hidden\" name=\"date\" value=\"$displayDate\">";
            ?>
            <label for="TimeSlot">Choose a time:</label>
            <select name = "time" id="times">
              <option value="08:00:00-09:00:00">8:00AM-9:00AM</option>
              <option value="09:00:00-10:00:00">9:00AM-10:00AM</option>
              <option value="10:00:00-11:00:00">10:00AM-11:00AM</option>
              <option value="11:00:00-12:00:00">11:00AM-12:00PM</option>
              <option value="12:00:00-13:00:00">12:00PM-1:00PM</option>
              <option value="13:00:00-14:00:00">1:00PM-2:00PM</option>
              <option value="14:00:00-15:00:00">2:00PM-3:00PM</option>
              <option value="15:00:00-16:00:00">3:00PM-4:00PM</option>
              <option value="16:00:00-17:00:00">4:00PM-5:00PM</option>
              <option value="17:00:00-18:00:00">5:00PM-6:00PM</option>
              <option value="18:00:00-19:00:00">6:00PM-7:00PM</option>
              <option value="19:00:00-20:00:00">7:00PM-8:00PM</option>
              <option value="20:00:00-21:00:00">8:00PM-9:00PM</option>
              <option value="21:00:00-22:00:00">9:00PM-10:00PM</option>
              <option value="22:00:00-23:00:00">10:00PM-11:00AM</option>
            </select><br><br>
            <input type="submit" name="submit" value="Submit"><br><br>
            
            <?php
              echo "<br>";
              echo "
              <form action=\"equipResData.php\">
                <input type=\"hidden\" name=\"equip\" value=\"$equipSelected\">
                <input type = \"hidden\" name = \"dataEquipNum\" value = \"$equipIdent\">
                 <input type = \"hidden\" name = \"hiddenDate\" value = \"$dbDate\">
              </form>";
            ?>
          </form>
        <form action="equipDisplay.php">
            <input type="submit" name="chooseAgain" value="Choose Another Equipment">
        </form>
        </div>
      </div>
    </div>
  </body>
</html>+