<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../css/registration.css" />
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</head>
<body>

    <a href="../index.html" class="back-button">Go Back</a>


<div class="container">
    <h2>Register</h2>
    <form action="register.php" method="POST">
        <input type="text" placeholder="Usuario" name="username" required maxlength="15"><br>
        <input type="password" placeholder="Contraseña" name="password" required maxlength="8"><br><br>

        <button type="submit" class="signupbtn">Register</button>
        <button type="reset" class="cancelbtn">Cancel</button>
    </form>
</div>

</body>
</html>
