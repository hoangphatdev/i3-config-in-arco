<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show data</title>
</head>
<body>
    <h1>hello</h1>
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
$servername = "localhost";
$username = "hplat";
$password = "051205";
$dbname = "ecomerce-website";
$connect = mysqli_connect($sername, $username, $password, $dbname);
if(!$connect){
    die("Error connection" . mysqli_connect_error());
}
echo "Completely connection";
#header("location: index.php")
?>    
</body>
</html>


