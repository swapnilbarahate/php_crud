<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataAdd</title>
    <link rel="stylesheet" href="style.css">
</head>
<?php
$conn = mysqli_connect("localhost", "root", "", "testdb");
if (!$conn) {
    die("connection Fail" . mysqli_connect_error());
} else {

    if (isset($_GET['submit'])) {
        $name = $_GET['uname'];
        $age = $_GET['age'];
        $city = $_GET['city'];
        if ((!empty($name)) && (!empty($age)) && (!empty($city))) {
            $q = "insert into student (name,age,city) values ('$name','$age','$city')";
            // $q ="insert into student (name,age) values('keshav', 25),('dipak',26);"
            if ($result = mysqli_query($conn, $q)) {
                header("Location:http://localhost/crud/display.php");
                exit;
            }
        } else {

            echo "<h3 style='color:red; text-align:center;'>Please check can't be blank</h3>";
        }
    } elseif (isset($_GET['back'])) {
        header("Location:http://localhost/crud/display.php");
    }
}


?>

<body>
    <div class="add_container">
        <h1>Add user details here...</h1>
        <form method="get">
            <table>
                <tr>
                    <td>User Name:</td>
                    <td><input type="text" name="uname" placeholder="fname lname"></td>
                </tr>
                <tr>
                    <td>Age:</td>
                    <td><input type="text" name="age" placeholder="23"></td>
                </tr>
                <tr>
                    <td>City:</td>
                    <td><input type="text" name="city" placeholder="pune"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" class="btn update" name="back">&lt; back</button>
                        <button type="submit" class="btn add" name="submit">Submit &gt;</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>