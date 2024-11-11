<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show data</title>
    <link href="../style.css" rel="stylesheet">

</head>

<body>
    <?php
    #var_dump($_SERVER["REQUEST_METHOD"]);
    #echo htmlspecialchars($_POST["name"]);
    //echo $_GET["$name"];
    // function in(){
    //     $GLOBALS['y'] = $GLOBALS['x'];
    //     echo $GLOBALS['x'];
    // };
    // in();
    // echo $GLOBALS['y'];
    $servername = "localhost:3306";
    $username = "hplat";
    $password = "051205";
    $dbname = "QLNhanSu";
    $conn = new mysqli($servername, $username, $password, $dbname);
    #$connect = mysqli_connect($sername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    $sql = "select * from users";
    $result = $conn->query($sql);
    if (!$result) {
        die("Invalid query" . $conn->error);
    }

    echo "
    <div class='>
    <table '>
        <thead class='bg-red-500'>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Password</th>
                 <th>Image</th>
            </tr>
        </thead>
    ";

    // Lặp qua từng hàng và hiển thị
    while ($row = $result->fetch_assoc()) {
        echo "
            <tr>
                <td>$row[id]</td>
                <td>$row[admin_email]</td>
                <td>$row[admin_password]</td>
                <td>$row[images]</td>
                <td>
                    <a class='w-[500px] rounded-[50px] h-[50px] bg-red-500' href='/ktra/src/edit.php?id=$row[id]'>Edit</a>
                </td>
                <td>
                    <a href='/ktra/src/delete.php?id=$row[id]'>Delete</a>
                </td>
            </tr> 
        ";
    }


    echo "</table>
    </div>
    ";


    ?>
    <a class="border  border-red " href="/ktra/src/create.php" role="button">New client</a>
</body>

</html>