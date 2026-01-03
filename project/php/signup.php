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
        </form>
    </body>
</html>