<?php
include "../db/db.php";

$name=$age=$email=$email=$address=$password=$confirm_password="";
$message="";
$messageType="";

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $name=trim($POST["name"]??"");
    $age=trim($POST["age"]??"");
    $email=trim($POST["email"]??"");
    $address=trim($POST["address"]??"");
    $password=$POST["password"]??"";
    $confirm_password=$POST["confirm_password"]??"";

    if(empty($name))
    {
        $message ="Name cannot be empty.";
        $messageType="error";
    }
    elseif(empty($age))
    {
        $message ="Age cannot be empty.";
        $messageType="error";
    }
    elseif(!is_numberic($age)||$age <18 ||$age>100)
    {
        $message ="Age must be 18 to 100.";
        $messageType="error";
    }
    elseif(empty($email))
    {
        $message ="Email cannot be empty.";
        $messageType="error";
    }
    elseif(!filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        $message ="Invalid email format";
        $messageType="error";
    }
    elseif(empty($address))
    {
        $message ="Address cannot be empty.";
        $messageType="error";
    }
    elseif(empty($password))
    {
        $message ="Password cannot be empty.";
        $messageType="error";
    }
    elseif(strlen($password)<6)
    {
        $message ="Password must be at least 6 characters.";
        $messageType="error";
    }
}
<!DOCTYpe html>
<html>
    <head>
        <title>Sign up</title>
    </head>
    <body>
        <form action="login.php" method ="post">
            <label for="name">Name:</label>
            <input type="text" name ="name" value="<?php echo htmlspecialchars($name); ?>"required>

            <label for="age">age:</label>
            <input type="number" name ="age" value="<?php echo htmlspecialchars($age); ?>"required>

            <label for="email">email:</label>
            <input type="email" name ="email" value="<?php echo htmlspecialchars($email); ?>"required>

            <label for="address">Address:</label>
            <textarea name="address" required><?php echo htmlspecialchars($address); ?></textarea>

            <label for="password">Password:</label>
            <input type="password" name ="password" required>

            <label for="">Confirm Password:</label>
            <input type="password" name ="confirm_password" required>

            <input type="submit" value"Sign Up">
        </form>
        <script scr="../js/sign.js"></script>
    </body>
</html>