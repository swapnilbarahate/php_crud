<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <h1>This is crud application</h1><br>
    <?php
    $conn = mysqli_connect("localhost", "root", "", "testdb");
    if (!$conn) {
        die("connection faile  " . mysqli_connect_error());
    }

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $a = "DELETE FROM student WHERE roll_no=$id";
        $p = mysqli_query($conn, $a);
    }
    $q = "select * from student";
    $result = mysqli_query($conn, $q);
    ?>

    <table>
        <tr>
            <td colspan="5">
                <a href='add.php'><button class='btn add' type='button'>Add More &#10009;</button></a>
            </td>
        </tr>

        <tr>
            <th>id</th>
            <th>name</th>
            <th>age</th>
            <th>city</th>
            <th>Action</th>
        </tr>

        <?php
        $no = 1;
        while ($row = mysqli_fetch_array($result)) {
            echo
            "<tr>
                <td>$no</td>
                <td hidden>$row[0]</td>
                <td>$row[1]</td>
                <td>$row[2]</td>
                <td>$row[3]</td>
                <td>
                <a href='update.php?id= '><button class='btn update' type='button'>Update</button></a>
                <a onClick=\"javascript: return confirm('Please confirm deletion');\" href='display.php?id=$row[0]' ><button class='btn delete'   type='button'>Delete</button></a>
                </td>
            </tr>";
            $no++;
        }
        ?>
    </table>
    <br>
    <br>
    <br>

    <table>
    <h1>User Details</h1>
        <tr>
            <td colspan="5">
                <a href='login.php'><button class='btn update' type='button'>Login </button></a>
            </td>
        </tr>

        <tr>
            <th>id</th>
            <th>loginid</th>
            <th>password</th>
        </tr>
        <?php
        $no = 1;
        $conn = mysqli_connect("localhost", "root", "", "testdb");
        $q2 = "select userid, password from users";
        $result2 = mysqli_query($conn, $q2);
        while ($row2 = mysqli_fetch_array($result2)) {
            echo
            "<tr>
                <td>$no</td>
                <td>$row2[0]</td>
                <td>$row2[1]</td>
            </tr>";
            $no++;
        }
        ?>
    </table>

</body>

</html>