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
            <label for="">Name</label>
            <div>
                <input type="text" name="name" value="<?php echo $name; ?>" />
            </div>
        </div>

        <div>
            <label for="">Email</label>
            <div>
                <input type="text" name="email" value="<?php echo $email; ?>" />
            </div>
        </div>
        <div>
            <label for="">Phone</label>
            <div>
                <input type="text" name="phone" value="<?php echo $phone; ?>" />
            </div>
        </div>
        <div>
            <label for="">Address</label>
            <div>
                <input type="text" name="address" value="<?php echo $address; ?>" />
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