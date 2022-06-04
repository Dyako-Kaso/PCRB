<?php
require_once('db/db.php');
if(isset($_POST['but_submit'])){
    $uname = mysqli_real_escape_string($con,$_POST['txt_uname']);
    $password = mysqli_real_escape_string($con,$_POST['txt_pwd']);

    if ($uname != "" && $password != ""){

        $sql_query = "select count(*) as cntUser from user where username='".$uname."' and password='".$password."'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);
        $count = $row['cntUser'];

        if($count > 0){
          // Store the data in the session
            $_SESSION['uname'] = $uname;
            header('Location: index.php');
        }else{
            echo '<script >alert("Invalid username and password")</script>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style/loginstyle.css">

  </head>
  <body>
<!-- this function will enable the password to be visible-->
<script>
function myFunction() {
  var x = document.getElementById("pwd");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

    <img src="images/pic2.png" alt="login png"  id="head1">

    <div class="container"> <!--start of the container-->
        <form method="post" action=""> <!-- login form-->
            <div id="div_login">
                <h1>Login</h1>
                <div>
                    <input type="text" class="textbox" id="txt_uname" name="txt_uname" placeholder="Username" />
                </div>
                <div>
                    <input type="password" class="textbox" id="pwd" name="txt_pwd" placeholder="Password"/>
               </div>

                <input type="checkbox" onclick="myFunction()">Show Password
                <div>
                    <input type="submit" value="Submit" name="but_submit" id="but_submit" />
                </div>
            </div>
        </form>
    </div> <!-- end of the container-->


  </body>
</html>
