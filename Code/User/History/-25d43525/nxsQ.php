<?php
$conn = new mysqli('localhost', 'hplat', '051205', 'QLNhanSu');

$id = "";
$admin_email = "";
$admin_password  = "";
$images = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (!isset($_GET["id"])) {
        header("location:/ktra/src/index.php");
        exit;
    }
    $id = $_GET["id"];

    $sql = "SELECT * FROM users WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location:/ktra/src/index.php");
        exit;
    }

    $admin_email = $row("admin_email");
    $admin_password = $row("admin_password");
    $images = $row("images");
} else {
    $id = $_POST['id'];
    $admin_email = $_POST("admin_email");
    $admin_password = $_POST("admin_password");
    $images = $_POST("images");

    do {
        if (empty($id) || empty($admin_email) || empty($admin_password) || empty($images)) {

            $errorMessage = "All the fields are required";
            break;
        }
        $sql = "UPDATE users" .
            "SET admin_email='$admin_email', admin_password='$admin_password', images='$images'" .
            "WHERE id = $id";
    } while (false);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> -->
    <title>My Admin</title>
</head>

<body>
    <h2>New Admin</h2>

    <?php
    if (!empty($errorMessage)) {
        echo "
        <div>
                <strong>$errorMessage</strong>
            </div>
        ";
    }
    ?>
    <form method="post">
        <input type="hidden" value="<?php echo $id; ?>" />
        <div>
            <label for="">Email</label>
            <div>
                <input type="text" name="email" value="<?php echo $admin_email; ?>" />
            </div>
        </div>

        <div>
            <label for="">Password</label>
            <div>
                <input type="text" name="password" value="<?php echo $admin_password; ?>" />
            </div>
        </div>
        <div>
            <label for="">Image</label>
            <div>
                <input type="text" name="image" value="<?php echo $images; ?>" />
            </div>
        </div>

        <?php
        if (!empty($successMessage)) {
            echo "
                <div>
                    $successMessage
                </div>
            
            ";
        }
        ?>

        <div>
            <div>
                <button type="submit">Submit</button>
            </div>
            <div>
                <a href="/ktra/src/index.php" role="button">Cancel</a>
            </div>
        </div>
    </form>
</body>

</html>