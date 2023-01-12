<link rel="stylesheet" href="style.css">
<div class="BoxPopUp" id="loginBox">
<h1>Login</h1>

<form method="post" action="login.php">

<p>
Username<br>
<input type="text" name="username">
</p>

<p>
Password<br>
<input type="password" name="password">
</p>

<?php
error_reporting(E_ERROR | E_PARSE);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // POST method

    include 'util.php';
    $mysqli = connnectToDataBase();

    $username = $mysqli->real_escape_string($_POST['username']);

    $sql = "SELECT username, passhash FROM user WHERE username='$username'";
    $result = $mysqli->query($sql) or
        die("Error executing query: ($mysqli->errno) $mysqli->error<br>SQL = $sql");

    $row = $result->fetch_assoc();
    if (password_verify($_POST['password'], $row['passhash']) && $result->num_rows != 0) { //username not empty and password hash matchs database of the user

            session_start();
            $_SESSION["username"] = $username;

            // Redirect to index.php
            header("Location: index.php");
        }
    else {
        echo "<p>Incorrect username/password.</p>";
    }
}
?>

<input type="submit" value="Login" class="formbuttons">
</form>
<div style text-align:center><a id=createaccountbutton href=create_account.php>Create Account</a></div>

</div>