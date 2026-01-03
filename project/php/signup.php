<!DOCTYpe html>
<html>
    <head>
        <title>Sign up</title>
    </head>
    <body>
        <form action="login.php" method ="post">
            <label for="name">Name:</label>
            <input type="text" name ="name" value="<?php echo htmlspecialchars($name); ?>">required>

            <label for="age">age:</label>
            <input type="number" name ="age" value="<?php echo htmlspecialchars($age); ?>">required>

            <label for="email">email:</label>
            <input type="email" name ="email" value="<?php echo htmlspecialchars($email); ?>">required>
        </form>
    </body>
</html>