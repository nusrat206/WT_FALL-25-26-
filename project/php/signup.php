<!DOCTYpe html>
<html>
    <head>
        <title>Sign up</title>
    </head>
    <body>
        <form action="login.php" method ="post">
            <label for="name">Name:</label>
            <input type="text" name ="name" value="<?php echo htmlspecialchars($name); ?>">required>
        </form>
    </body>
</html>