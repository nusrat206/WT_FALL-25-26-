<!DOCTYPE html>
<html>
<head><title>PHP Code</title></head>
<body>
<h1> Welcome to Registration</h1>
 
<?php
$name= "";
$nameerror= "";
if (empty ($_POST["name"]))
{
$nameerror="Name is req"; // value empty
}
else{
$name= test_input($_POST["name"]); //clean out input
if (!preg_match("/^[a-zA-Z ]*$/",$name))  // only letter and middle space
{
    $nameerr ="Only letters and white space allowed";
}
}
function test_input($data)
{
$data = trim($data); // trim amr previous data remove kore dai
return $data;
}
?>
 
<form method="post" action="">
Name: <input type="text" name="name" value="<?php echo $name;?>">
<?php echo $nameerror; ?>
<input type="submit" name="submit" value="Submit">
 
<?php
if($_SERVER["REQUEST_METHOD"]== "POST" && empty($nameerror))
{
echo "<h3> Your Input: </h3>";
echo "Name: ".$name. "<br>";
}
?>
 
 
</body>
</form>
</html>