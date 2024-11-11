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
    $dbname = "ecomerce-website";
    $conn = new mysqli($servername, $username, $password, $dbname);
    #$connect = mysqli_connect($sername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }


    $sql = "select * from clients";
    $result = $conn->query($sql);
    #$result = mysqli_query($connect, $sql);
    if (!$result) {
        die("Invalid query" . $conn->error);
    }
    if ($result->num_rows > 0) {
        // Lặp qua từng hàng và hiển thị
        while ($row = $result->fetch_assoc()) {
            echo "ID: " . $row["id"] . " - Tên: " . $row["firstname"] . " " . $row["lastname"] . " - Email: " . $row["email"] . " - Ngày đăng ký: " . $row["reg_date"] . "<br>";
        }
    } else {
        echo "Không có kết quả";
    }
    // if (mysqli_num_rows($result) > 0) {
    //     echo "<h3 class='bg-red-500'>Thong tin client</h3>";
    //     echo "<table  >
    //             <thead>
    //             <tr>
    //                 <th>ID</th>
    //                 <th>Client name</th>
    //                 <th>email</th>
    //                 <th>phone</th>
    //             </tr>
    //             </thead>";

    //     while ($row = mysqli_fetch_assoc($result)) {
    //         echo "
    //         <tbody>
    //         <tr>
    //                 <td>" . $row["id"] . "</td>
    //                 <td>
    //                     <a href='thongtincauthu.php?id=" . $row["id"] . "'>" . $row["name"] . "</a>
    //                 </td>
    //                 <td >" . $row["email"] . "</td>
    //                 <td>" . $row["phone"] . "</td>
    //               </tr>
    //              </tbody> ";
    //     }
    //     echo "</table>";
    // }
    ?>
    <a class="border  border-red " href="/ktra/src/create.php" role="button">New client</a>
</body>

</html>