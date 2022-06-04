<?php

include "db/db.php";
// Check user loggedin or not
if(!isset($_SESSION['uname'])){
    header('Location: login.php');
}
// logout
if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: login.php');
}

?>
<!doctype html>
<html>
    <head>
      <link rel="stylesheet" href="style/indexstyle.css">
      <link rel="stylesheet" href="style/aboutusstyle.css">
      <script type="text/javascript" src="clock.js"></script>
    </head><!---->
<body>


    <div class="header"> <!--header-->
      <div class="topnav">
        <img src="images/logo.png" alt="pcr logo" id="logo">
        <h2 id="title">PCR BARCODE</h2>
      		<form method='post' >
      				<button type="submit" value="Logout" class="button"  name="but_logout">Log out</button>
      				<button type="submit" value="Refresh"class="button" >Refresh</button>
              <a  class="button" href="#popup1">About us</a>
      		</form>
      </div>


      <div id="popup1" class="overlay"> <!--start of about us popup-->
      	<div class="popup">
      		<a class="close" href="#">&times;</a>
      		<div class="content">

            <img src="images/uniLOGO.jpeg" alt="univercity logo" class="logo">
            <p id="course">SCSV 2223 Web Programming</p>
                    <div class="aboutproject">
                    <label>PCR BARCODE SYSTEM</label><br />
                    <p><b>PCR barcode </b>is an application that is used to help laboratories to save the results of PCR tests inside a barcode and send it to the patients.
                      This application is simple and comprehensive of ideas and topics. So laboratories can easily add,
                      delete and update all the information required and search among it.</p>
                    <p><b>PCR test:</b> collect mucus from the nose or throat using a specialized swab in order to check the possibility of infection with the Covid virus.</p>
                    <p><b>Blood test:</b> take a blood sample via a finger prick or a blood draw from a vein in the arm in order to check the possibility of infection with the Covid virus.</p>
                    </div><br />

                    <div class="information">

                    <div class="info" id="one">
                    <label>Zahraa Mohammed & Hla Abdul Hakeem</label><br />
                              QU191SCSJ020 - QU191SCSJ002
                    </div>

                    <div class="info" id="two">
                      <label>Zhir Aras   &  Hevi Ahmed </label><br />
                            QU182SCSJ082 -  QU182SCSJ027
                    </div>

                  </div>
      		</div>
      	</div>
      </div> <!--end of about us popup-->

    </div> <!-- end of header -->



    <div class="body"> <!--start of the body-->
    <div class="text">
         <h2> welcome to pcr barcode system </h2>
      <form  action="blood/bloodpatients.php" method="post" >
          <button type="submit" class="button"  name="blood" id="list1_btn">BLOOD TEST</button>
      </form>

      <form  action="pcr/pcrpatients.php" method="post">
          <button type="submit" class="button"  name="pcr" id="list2_btn">PCR TEST</button>
      </form>
    </div>
  </div> <!-- end of body -->

    <div class="footer"> <!--footer-->
    <p style="display:inline-block; float:left;">Made by Qaiwan International University (UTM Franchise) students | Contact us by using:
      <A href=mailto:haqiu190013@uniq.edu.iq?subject="subject text">This mail</A>
    </p>
    <p  style=" float:right;" id = "clock" onload="currentTime()"></p>
    </div> <!-- end of footer -->

    <!--this function will display the current time-->
  <script>
  function currentTime() {
    let date = new Date();
    let hh = date.getHours();
    let mm = date.getMinutes();
    let ss = date.getSeconds();
    let session = "AM";

    if(hh == 0){
        hh = 12;
    }
    if(hh > 12){
        hh = hh - 12;
        session = "PM";
     }

     hh = (hh < 10) ? "0" + hh : hh;
     mm = (mm < 10) ? "0" + mm : mm;
     ss = (ss < 10) ? "0" + ss : ss;

     let time = hh + ":" + mm + ":" + ss + " " + session;

    document.getElementById("clock").innerText = time;
    let t = setTimeout(function(){ currentTime() }, 1000);
  }
  currentTime();

  </script>
    </body>
</html>
