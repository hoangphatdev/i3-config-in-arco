<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Data</title>
    <link href="../style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 p-5">
    <h1 class="w-full text-center font-bold mb-10 text-3xl">User Management</h1>
    <?php
    $servername = "localhost:3306";
    $username = "hplat";
    $password = "051205";
    $dbname = "QLNhanSu";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch users from the database
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);

    if (!$result) {
        die("Invalid query: " . $conn->error);
    }

    echo "
    <div class='overflow-x-auto'>
        <table class='min-w-full bg-white border border-gray-300'>
            <thead class='bg-red-500 text-white'>
                <tr>
                    <th class='py-2 px-4 border'>ID</th>
                    <th class='py-2 px-4 border'>Email</th>
                    <th class='py-2 px-4 border'>Password</th>
                    <th class='py-2 px-4 border'>Image</th>
                    <th class='py-2 px-4 border'>Actions</th>
                </tr>
            </thead>
            <tbody>
    ";

    // Loop through each row and display data
    while ($row = $result->fetch_assoc()) {
        echo "
            <tr class='hover:bg-gray-100'>
                <td class='py-2 px-4 border'>" . htmlspecialchars($row['id']) . "</td>
                <td class='py-2 px-4 border'>" . htmlspecialchars($row['admin_email']) . "</td>
                <td class='py-2 px-4 border'>" . htmlspecialchars($row['admin_password']) . "</td>
                <td class='py-2 px-4 border'>
                    <img src='" . htmlspecialchars($row['images']) . "' alt='User Image' class='w-16 h-auto rounded'>
                </td>
                <td class='py-2 px-4 border'>
                    <a class='inline-block w-[100px] rounded-full h-[30px] bg-red-500 text-white text-center' href='/ktra/src/edit.php?id=" . htmlspecialchars($row['id']) . "'>Edit</a>
                    <a class='inline-block w-[100px] rounded-full h-[30px] bg-red-500 text-white text-center' href='/ktra/src/delete.php?id=" . htmlspecialchars($row['id']) . "'>Delete</a>
                </td>
            </tr> 
        ";
    }

    echo "
            </tbody>
        </table>
    </div>
    ";

    // Close the database connection
    $conn->close();
    ?>

    <div class="mt-5">
        <a class="border border-red rounded-lg py-2 px-4 bg-red-500 text-white" href="/ktra/src/create.php" role="button">New Client</a>
    </div>
</body>

</html>