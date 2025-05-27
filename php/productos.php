<?php
session_start();
include "conexion.php";
?>

<?php 
$host="sql301.infinityfree.com";
$user="if0_37795084";
$pass="bCzan3P39zRddyB";
$db="if0_37795084_proyectgym";
?>
<!DOCTYPE html>
<html>
<head>
<title>Productos Deportivos</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
<style>
* {
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
    box-sizing: border-box;
}
body {
    background-color: #121212;
    color: #f1f1f1;
    line-height: 1.6;
}
header {
    background-image: linear-gradient(100deg, #000000, #00000090), url('https://www.oregonlive.com/resizer/tLkJqg6sH6fSQukZRXDup9vYzrE=/arc-anglerfish-arc2-prod-advancelocal/public/J7YJX3IUAZFN3KEBHZGF2OVNOQ.jpeg');
    background-size: cover;
    background-position: center;
    height: 300px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}
header h1 {
    font-size: 42px;
    color: #ffca28;
    text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.8);
    letter-spacing: 2px;
    margin-bottom: 20px;
}
.container {
    width: 95%;
    margin: 20px auto;
}
table {
    width: 100%;
    margin-top: 30px;
    background-color: #1e1e1e;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
}
table th, table td {
    padding: 15px;
    text-align: left;
}
table th {
    background-color: #292929;
    color: #ffca28;
    font-weight: 600;
    text-transform: uppercase;
}
table tr:hover {
    background-color: #252525;
}
table td {
    color: #f1f1f1;
}
.back-button {
    position: absolute;
    top: 20px;
    left: 20px;
    font-size: 16px;
    color: #f1f1f1;
    text-decoration: none;
    font-weight: bold;
    display: flex;
    align-items: center;
    gap: 5px;
    padding: 5px 10px;
    border-radius: 4px;
    transition: all 0.3s ease;
}
.back-button:hover {
    color: #ffca28;
    background-color: #292929;
}
.back-button::before {
    content: '←';
    font-size: 18px;
}
.btn {
    padding: 8px 15px;
    font-size: 14px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}
.btn-warning {
    background-color: #ffca28;
    color: #000;
    text-transform: uppercase;
    font-weight: bold;
    margin-top: 10px;
    text-decoration: none;
}
.btn-warning:hover {
    background-color: #ffb000;
}
.btn-primary {
    background-color: #007bff;
    color: #fff;
}
.btn-primary:hover {
    background-color: #0056b3;
}
.btn-info {
    background-color: #17a2b8;
    color: #fff;
    text-decoration: none;
}
.btn-info:hover {
    background-color: #117a8b;
}
input[type="number"] {
    padding: 5px;
    width: 70px;
    border: 1px solid #555;
    border-radius: 4px;
    background-color: #292929;
    color: #fff;
}
input[type="number"]:focus {
    outline: none;
    border-color: #ffca28;
}
</style>
</head>
<body>
<div class="container">
    <a href="../index.html" class="back-button">Go Back</a>
    <header>
        <h1>Sports Products | Clothes</h1>
        <a href="carro.php" class="btn btn-warning">See Cart</a>
    </header>
    <?php
    $producto = $conect->query("select * from producto");
    ?>
    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php while($r = $producto->fetch_object()): ?>
            <tr>
                <td><?php echo $r->nombre; ?></td>
                <td>$<?php echo $r->precio; ?></td>
                <td style="width: 260px;">
                <?php
                $found = false;
                if (isset($_SESSION["carro"])) {
                    foreach ($_SESSION["carro"] as $c) {
                        if ($c["id_producto"] == $r->id) {
                            $found = true;
                            break;
                        }
                    }
                }
                ?>
                <?php if ($found): ?>
                    <a href="carro.php" class="btn btn-info">Add More</a>
                <?php else: ?>
                    <form method="post" action="agregar.php">
                        <input type="hidden" name="id_producto" value="<?php echo $r->id; ?>">
                        <input type="number" name="q" value="1" min="1">
                        <button type="submit" class="btn btn-primary">Add to cart</button>
                    </form>
                <?php endif; ?>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>
