<?php
include("session.php");
include("conexion.php");
$id = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
                     <link rel="stylesheet" href="../css/edit.css" />

    
</head>
<body>

<div class="container">
    <h2>Update Product</h2>
    <form action="updatee.php" method="POST">
        <div class="container1">
            <?php
                $result = mysqli_query($mysqli, "SELECT * FROM producto WHERE nombre ='$id'");
                while ($row = mysqli_fetch_array($result)) {
                    echo "<input type='hidden' name='id' value='{$row['nombre']}' required>";
                    echo "<input type='text' placeholder='Nombre' name='nombre' value='{$row['nombre']}' required>";
                    echo "<input type='text' placeholder='Precio' name='precio' value='{$row['precio']}' required>";
                }
            ?>
            <div class="clearfix">
                <button type="submit" class="signupbtn">Update</button>
                <button type="reset" class="signupbtn" style="background-color: #ccc; color: #333;">Clean</button>
            </div>
        </div>
    </form>
</div>

</body>
</html>
