<?php
$email = "";
$password = "";
$image = "";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Admin</title>
</head>

<body>
    <h2>New Admin</h2>
    <form method="post">
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