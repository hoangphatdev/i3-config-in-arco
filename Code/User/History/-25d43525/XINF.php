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

    $admin_email = htmlspecialchars($row["admin_email"]);
    $admin_password = htmlspecialchars($row["admin_password"]);
    $images = htmlspecialchars($row["images"]);
} else {
    $id = $_POST['id'];
    $admin_email = $_POST["email"];
    $admin_password = $_POST["password"];
    $images = $_POST["image"];

    do {
        if (empty($id) || empty($admin_email) || empty($admin_password) || empty($images)) {
            $errorMessage = "All the fields are required";
            break;
        }

        // Prepared statement to prevent SQL injection
        $stmt = $conn->prepare("UPDATE users SET admin_email=?, admin_password=?, images=? WHERE id=?");
        $stmt->bind_param("sssi", $admin_email, $admin_password, $images, $id);

        if (!$stmt->execute()) {
            $errorMessage = "Invalid query: " . htmlspecialchars($stmt->error);
            break;
        }

        $successMessage = "User updated correctly";

        header("location: /ktra/src/index.php");
        exit;
    } while (false);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>My Admin</title>
</head>

<body class="bg-gray-100 p-5">
    <h2 class="text-2xl font-bold mb-4">Update Admin</h2>

    <?php if (!empty($errorMessage)): ?>
        <div class="bg-red-200 text-red-800 p-3 rounded mb-4">
            <strong><?php echo htmlspecialchars($errorMessage); ?></strong>
        </div>
    <?php endif; ?>

    <?php if (!empty($successMessage)): ?>
        <div class="bg-green-200 text-green-800 p-3 rounded mb-4">
            <strong><?php echo htmlspecialchars($successMessage); ?></strong>
        </div>
    <?php endif; ?>

    <form method="post" class="bg-white p-6 rounded shadow-md">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>" />

        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email</label>
            <input type="text" name="email" id="email" value="<?php echo htmlspecialchars($admin_email); ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring focus:ring-red-200" />
        </div>

        <div class="mb-4">
            <label for="password" class="block text-gray-700">Password</label>
            <input type="text" name="password" id="password" value="<?php echo htmlspecialchars($admin_password); ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring focus:ring-red-200" />
        </div>

        <div class="mb-4">
            <label for="image" class="block text-gray-700">Image</label>
            <input type="text" name="image" id="image" value="<?php echo htmlspecialchars($images); ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring focus:ring-red-200" />
        </div>

        <div class="flex justify-between mt-6">
            <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600">Submit</button>
            <a href="/ktra/src/index.php" role="button" class="border border-red-500 text-red-500 py-2 px-4 rounded hover:bg-red-500 hover:text-white">Cancel</a>
        </div>
    </form>
</body>

</html>