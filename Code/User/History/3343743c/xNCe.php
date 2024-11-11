<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $conn = new mysqli('localhost', 'hplat', '051205', 'QLNhanSu');

    $sql = "DELETE from users WHERE id=$id";
    $conn->query($sql);
}

header("location: /ktra/src/index.php");
exit;
