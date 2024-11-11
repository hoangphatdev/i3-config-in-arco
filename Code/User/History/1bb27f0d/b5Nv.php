<?php
$conn = new mysqli('localhost', 'hplat', '051205', 'QLNhanSu');

$admin_email = "";
$admin_password  = "";
$images = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $admin_email = $_POST["email"];
    $admin_password = $_POST["password"];
    $images = $_POST["image"];

    do {
        if (empty($admin_email) || empty($admin_password) || empty($images)) {
            $errorMessage = "All the fields are required";
            break;
        }

        // Add new client to database
        $sql = "INSERT INTO users(admin_email, admin_password, images) VALUES ('$admin_email', '$admin_password', '$images')";
        $result = $conn->query($sql);
        if (!$result) {
            $errorMessage = "Invalid query: " . $conn->error;
            break;
        }

        // Clear input fields
        $admin_email = "";
        $admin_password = "";
        $images = "";

        $successMessage = "Client added correctly";

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
    <style>
        .image-preview {
            max-width: 200px;
            /* Adjust as needed */
            max-height: 200px;
            /* Adjust as needed */
            margin-top: 10px;
            border-radius: 8px;
            border: 1px solid #ccc;
            display: none;
            /* Hide by default */
        }
    </style>
</head>

<body class="bg-gray-100 p-5">
    <h2 class="text-2xl font-bold mb-4">New Admin</h2>

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
        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email</label>
            <input type="text" name="email" id="email" value="<?php echo htmlspecialchars($admin_email); ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring focus:ring-red-200" />
        </div>

        <div class="mb-4">
            <label for="password" class="block text-gray-700">Password</label>
            <input type="text" name="password" id="password" value="<?php echo htmlspecialchars($admin_password); ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring focus:ring-red-200" />
        </div>

        <div class="mb-4">
            <label for="image" class="block text-gray-700">Image Link</label>
            <input type="text" name="image" id="image" value="<?php echo htmlspecialchars($images); ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring focus:ring-red-200" />

            <!-- File input for image upload -->
            <input type="file" id="fileInput" accept="image/*" class="mt-2 block w-full border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring focus:ring-red-200" />

            <!-- Image preview -->
            <img id="imagePreview" src="#" alt="Image Preview" class="image-preview" />
        </div>

        <div class="flex justify-between mt-6">
            <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600">Submit</button>
            <a href="/ktra/src/index.php" role="button" class="border border-red-500 text-red-500 py-2 px-4 rounded hover:bg-red-500 hover:text-white">Cancel</a>
        </div>
    </form>

    <script>
        const fileInput = document.getElementById('fileInput');
        const imagePreview = document.getElementById('imagePreview');

        fileInput.addEventListener('change', function() {
            const file = this.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function(event) {
                    imagePreview.src = event.target.result; // Set the src of the image preview
                    imagePreview.style.display = 'block'; // Show the image preview
                    document.getElementById('image').value = event.target.result; // Set the value of the input to the data URL
                }

                reader.readAsDataURL(file); // Read the file as a data URL
            } else {
                imagePreview.style.display = 'none'; // Hide the preview if no file is selected
                document.getElementById('image').value = ''; // Clear the input value
            }
        });
    </script>
</body>

</html>