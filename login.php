<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<?php
$conn = mysqli_connect("localhost", "root", "", "testdb") or die("Error:" . mysqli_connect_error());

session_start();
$login = 0;
if (isset($_POST['submit'])) {
    $userid = $_POST['userid'];
    $password = $_POST['password'];
    if (!empty($userid) && !empty($password)) {
        $q = "select userid, password from users";
        $result = mysqli_query($conn, $q);
        while ($row = mysqli_fetch_array($result)) {
            if ($userid === $row['userid'] && $password === $row['password']) {
                $login = 1;
                break;
            }
        }
        if ($login === 1) {
            header("Location:http://localhost/crud/display.php");
            exit;
        } else {
            echo "<h3 style='color:red; text-align:center;'>User not found</h3>";
        }
    } else {
        echo "<h3 style='color:red; text-align:center;'>Please check can't be blank</h3>";
    }
}
?>
<br>
<h1>Login Page</h1>
<div class="add_container">
    <form method="post">
        <table>
            <tr>
                <td>User Id:</td>
                <td><input type="email" id="userid" name="userid" placeholder="abc@gmail.com"></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" placeholder="***" name="password" id="password"><input type="button" id="vievbtn" class="btn" onclick="viewpass()" value="&#128065;" /></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button class="btn update" name="submit">Login</button>
                    <a class="psw" href="sign_up.php">SignUp?</a>
                </td>
            </tr>
        </table>
    </form>
</div>
</body>

<script>
    function viewpass() {
        let pass = document.getElementById('password');

        if (pass.type === 'password') {
            pass.type = 'text';
        } else {
            pass.type = 'password';
        }
    }
</script>

</html>