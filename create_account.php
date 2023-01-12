<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    ?>

    <link rel="stylesheet" href="style.css">
    <div class="BoxPopUp" id="loginBox">
    <h1>Create Account</h1>

    <form method="post" action="create_account.php">

    <p>
    Username<br>
    <input required type="text" name="username">
    </p>

    <p>
    Password<br>
    <input required type="password" name="password">
    </p>

    <input type="submit" value="Create Account">

</form>

<?php

}  // Close if
else {
    // POST method

$password_hash = password_hash($_POST['password'],
PASSWORD_BCRYPT);


include 'util.php';
$mysqli = connnectToDataBase();
$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
if($username != $_POST['username']){
    echo "Improper username/password detected. Account not created.";
}
else{
    $sql = "insert into user(username, passhash) values( ?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ss", $username, $password_hash);
    $stmt->execute();

    header("Location: login.php");

}
}
?>
</div>