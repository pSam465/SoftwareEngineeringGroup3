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
      margin-top: 100px;
    }
  </style>  
  <body>
    <div class="centerForm" style="text-align: center">
      <h1>Reserve A Room Below</h1>
      <form action="roomResData.php">
        <!--This is the section for the form input
          that will be sent to a page called
          roomResData.php--->
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

      </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>