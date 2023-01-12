<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (!isset($_COOKIE['PHPSESSID']) || !isset($_SESSION['username'])){
    header("Location: login.php");
}
?>
  <head>
    <title>Caleb's Message Board</title>
    <script defer src="addMessageForm.js" type="text/javascript"></script>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
  <?php if (isset($_COOKIE['PHPSESSID'])){
  echo "<div id=logoutdiv><a id=logout href=logout.php>Logout</a></div>";
  }
  else{
    echo "<div id=logoutdiv><a id=logout href=login.php>Login</a></div>";
  }
  ?>
    <div id="addmessagebox">
    <h1 id=title>Caleb's Message Board</h1>
    <button id=addbutton>Add</button>
    </div>
    <div class="BoxPopUp" id=addMessageForm>
        <h2 >Add Message</h2>
            <form action="addMessage.php" method="POST">
            <?php echo "<input type=hidden name=username value=$_SESSION[username]>" ?>
            <div>
                 <p>Message:</p>
                 <textarea id=messageBoxMessageInput maxlength=99 name="message" required></textarea>
            </div>
            <input class=formbuttons type="submit" value="Submit">
            <input class=formbuttons type="button" value="Cancel" id="cancelForm">
            </form>
     </div>
    <?php
      error_reporting(E_ERROR | E_PARSE);
      include 'util.php';
      $mysqli = connnectToDataBase();
      $allMessages = displayAllMessages($mysqli);
      while ($row = $allMessages->fetch_assoc()) {
          echo "<div id=grid-container>";
          echo "<div id=message>$row[text]</div>";
          echo "<div id=attributes>$row[username] - $row[posted]</div>";
          echo "<div id=delete>";
          if($_SESSION['username'] == $row['username']){
              echo "<a id=deletebutton href=deleteMessage.php?id=$row[id]></a>";
          }
          else{
              echo "<a id=deletenobutton></a>";
          }
          echo "</div>";
          echo "</div><br>";
      }
     ?>
 </body>
</html>
