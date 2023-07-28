<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="style.css">
</head>
<?php
$conn = mysqli_connect('localhost', 'root', '', 'testdb');
if (!$conn) {
    echo "not connectd";
} else {
    $id = $_GET['id'];
    $q ="select * from student where roll_no='$id'";
    $value= mysqli_fetch_assoc(mysqli_query($conn, $q));
    $name = $value['name'];
    $age= $value['age'];
    $city= $value['city'];
    if (isset($_POST['submit'])) {
        $name = $_POST['uname'];
        $age = $_POST['age'];
        $city = $_POST['city'];
        if ((!empty($name)) && (!empty($age)) && (!empty($city))) {
            $q = "UPDATE student set `name`='$name', `age`='$age',`city`='$city' WHERE roll_no='$id'";
            if ($result = mysqli_query($conn, $q)) {
                header("Location:http://localhost/crud/display.php");
                exit;
            }
        } else {
            echo "<h3 style='color:red; text-align:center;'>Please check can't be blank</h3>";
        }
    } else if (isset($_POST['back'])) {
        header("Location:http://localhost/crud/display.php");
    }
}
?>

<body>
    <div class="add_container">
        <h1>Update user details here...</h1>
        <form method="post">
            <table>
                <tr>
                    <td>User Name:</td>
                    <input hidden text="text" name="id" value="<?php echo $_POST['id']; ?>">
                    <td><input type="text" name="uname" value="<?php echo$name; ?>" placeholder="fname lname"></td>
                </tr>
                <tr>
                    <td>Age:</td>
                    <td><input type="text" name="age" value="<?php echo$age; ?>" placeholder="23"></td>
                </tr>
                <tr>
                    <td>City:</td>
                    <td><input type="text" name="city" value="<?php echo$city; ?>" placeholder="pune"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" class="btn update" name="back">&lt; back</button>
                        <button type="submit" class="btn add" name="submit">Update &gt;</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>

</body>

</html>