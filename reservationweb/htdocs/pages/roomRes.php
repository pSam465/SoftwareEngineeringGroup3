<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Room Reservation</title>
  </head>

  <style>
    .centerForm
    {
      text-align: center;
      margin: auto;
    }

    body
    {
      background-color: #1C4F9C;
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
      height: 550px;
      text-align: center;
    }
    .redFont
    {
      color:red;
    }
  </style>  
  <?php
    include_once('default.php');
    defaultHeader();
    $roomSelected = "";
    $location = "";
    $numOfLocation = "";
  ?>
  <body>
    <div class="centerForm" style="text-align: center;">
      <div class="containOutput">
        <div class="centerContainedOutput">
          <h1>Reserve A Room Below</h1>
          <form action="roomResData.php">
            <!--This is the section for the form input
              that will be sent to a page called
              roomResData.php--->
            <?php
              if(isset($_GET['roomSelection']))
              {
                $roomSelected = $_GET['roomType'];
                $location  = $_GET['building'];
                $numOfLocation = $_GET['roomNum'];
              }
            echo "<label for=\"roomSel\" class = \"redFont\">Room Selected: $roomSelected $location $numOfLocation</label>";
            ?>
            <br>
            <label for="fName">First Name:</label>
            <input type="text" id="fname" name="firstName" style="width: 310px;"><br><br>
            <label for="lastName">Last Name:</label>
            <input type="text" name="lastName" style="width: 310px;"><br><br>
            <label for="email">Email:</label>
            <input type="text" name="emailAddress" style="width: 340px;"><br><br>
            <!--This is the section for the drop down input
                  that will be sent to a page called
                  roomResData.php--->
            <label for="TimeSlot">Choose a time:</label>
            <select name = "time" id="times">
              <option value="8:00AM-9:00AM">8:00AM-9:00AM</option>
              <option value="9:00AM-10:00AM">9:00AM-10:00AM</option>
              <option value="10:00AM-11:00AM">10:00AM-11:00AM</option>
              <option value="11:00AM-12:00PM">11:00AM-12:00PM</option>
              <option value="1:00PM-2:00PM">12:00PM-1:00PM</option>
              <option value="1:00PM-2:00PM">1:00PM-2:00PM</option>
              <option value="2:00PM-3:00PM">2:00PM-3:00PM</option>
              <option value="3:00PM-4:00PM">3:00PM-4:00PM</option>
              <option value="5:00PM-6:00PM">5:00PM-6:00PM</option>
              <option value="6:00PM-7:00PM">6:00PM-7:00PM</option>
              <option value="7:00PM-8:00PM">7:00PM-8:00PM</option>
              <option value="8:00PM-9:00PM">8:00PM-9:00PM</option>
              <option value="9:00PM-10:00PM">9:00PM-10:00PM</option>
              <option value="10:00PM-11:00PM">10:00PM-11:00PM</option>
              <option value="11:00PM-12:00PM">11:00PM-12:00PM</option>
            </select><br><br>
            <input type="submit" name="submit" value="Submit"><br><br>
            <?php
              echo "
              <form action=\"roomResData.php\">
                <input type=\"hidden\" name=\"loc\" value=\"$roomSelected\">
              </form>";
            ?>
          </form>
        <form action="roomDisplay.php">
            <input type="submit" name="chooseAgain" value="Choose Another Room">
        </form>
        </div>
      </div>
    </div>
  </body>
</html>