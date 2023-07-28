<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<?php
$conn = mysqli_connect("localhost", "root", "", "testdb");
if (isset($_GET['submit'])) {
    $userid = $_GET['userid'];
    $password = $_GET['password'];
    $flag = 0;
    if (!empty($userid) && !empty($password)) {
        $flag = 0;
        $q = "select * from users";
        $result = mysqli_query($conn, $q);
        while ($row = mysqli_fetch_array($result)) {
            if ($userid === $row['userid']) {
                $flag = 1;
                break;
            }
        }
        if ($flag == 1) {
            echo "<h3 style='color:red; text-align:center;'>This user already exist </h3>";
        } else {
            $q = "insert into users (userid, password) values('$userid','$password')";
            if ($result = mysqli_query($conn, $q)) {
                header("Location:http://localhost/crud/login.php");
                exit;
            } else {
                header("Location:http://localhost/crud/sign_up.php");
                exit;
            }
        }
    } else {
        echo "<h3 style='color:red; text-align:center;'>Please check can't be blank</h3>";
    }
}
?>

<body>
    <br>
    <h1>Sign Up | create your profile</h1>
    <?php


    ?>
    <div class="add_container">

        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="get">

            <table>
                <tr>
                    <td>userid:</td>
                    <td><input type="email" id="userid" name="userid" placeholder="abc@gmail.com"></td>
                </tr>
                <tr>
                    <td>password:</td>
                    <td><input type="password" placeholder="***" name="password" id="password"><input type="button" id="vievbtn" class="btn" onclick="viewpass()" value="&#128065;" /></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button class="btn update" name="submit">SignUP</button>
                        <a class="psw" href="login.php">Login?</a>
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