<?php
session_start();
include "conexion.php";
?>
<!DOCTYPE html>
<html>
<head>
<title>Shopping Cart</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">


         <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
header a {
    margin-top: 15px;
    padding: 10px 20px;
    font-size: 18px;
    text-transform: uppercase;
    background-color: #ffca28;
    color: #000;
    font-weight: bold;
    text-decoration: none;
    border-radius: 5px;
    transition: all 0.3s ease;
}
header a:hover {
    background-color: #ffb000;
}
.container {
    width: 90%;
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
table td {
    color: #f1f1f1;
}
table tr:nth-child(even) {
    background-color: #252525;
}
table tr:hover {
    background-color: #333333;
}
.btn-danger {
       padding: 8px 15px;
    font-size: 14px;
    font-weight: bold;
    color: #fff;
    background-color: #ff4d4d;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
}
.btn-danger:hover {
    background-color: #e63e3e;
    transform: scale(1.05);
}
input[type="email"] {
    padding: 10px;
    width: 50%;
    margin: 20px auto;
    border: 1px solid #555;
    border-radius: 4px;
    background-color: #292929;
    color: #fff;
    font-size: 16px;
    display: block;
    text-align: center;
}
input[type="email"]:focus {
    outline: none;
    border-color: #ffca28;
}
button {
    padding: 10px 20px;
    background-color: #3939b3; /* Color más claro */
    color: #fff;
    font-size: 18px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}
button:hover {
    background-color: #5050c7;
}
.back-button {
    position: absolute;
    top: 20px;
    left: 20px;
    font-size: 18px;
    color: #fff;
    text-decoration: none;
    font-weight: bold;
    display: flex;
    align-items: center;
    gap: 5px;
    transition: color 0.3s ease, transform 0.2s ease;
}
.back-button:hover {
    color: #ffca28;
    transform: translateX(-3px);
}
.back-button::before {
    content: '←';
    font-size: 20px;
}
.alert-warning {
    padding: 15px;
    background-color: #292929;
    color: #ffca28;
    border-radius: 5px;
    text-align: center;
}
</style>
</head>
<body>
<div class="container">
    <a href="../index.html" class="back-button">Go Back</a>
    <header>
        <h1>Sports Products | Cart</h1>
        <a href="productos.php">See products</a>
    </header>
    <?php
    $producto = $conect->query("select * from producto");
    $total = 0;
    if (isset($_SESSION["carro"]) && !empty($_SESSION["carro"])) :
    ?>
    <table>
        <thead>
            <tr>
                <th>Quantity</th>
                <th>Product</th>
                <th>Price</th>
                <th>Total</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($_SESSION["carro"] as $c) :
                $producto = $conect->query("select * from producto where id=$c[id_producto]");
                $r = $producto->fetch_object();
            ?>
            <tr>
                <td><?php echo $c["q"]; ?></td>
                <td><?php echo $r->nombre; ?></td>
                <td>$<?php echo $r->precio; ?></td>
                <td>$<?php echo $c["q"] * $r->precio; ?></td>
                <td>
                    <a href="borrar.php?id=<?php echo $c["id_producto"]; ?>" class="btn-danger">Delete</a>
                </td>
            </tr>
            <?php $total += $c['q'] * $r->precio; endforeach; ?>
        </tbody>
    </table>
    <form method="post" action="proceso.php">
        <div style="margin-top: 20px; text-align: center;">
            <label for="customerEmail"><h2>Customer Email:</h2></label>
            <input type="email" name="email" required placeholder="Write Your Email">
        </div>
        <div style="margin-top: 20px; text-align: center;">
            <h2>Total: $<?php echo number_format($total, 2); ?></h2>
            <button type="submit">Buy</button>
        </div>
    </form>
    <?php else : ?>
    <div class="alert-warning">The cart is empty.</div>
    <?php endif; ?>
</div>
        <div style="margin-top: 20px; text-align: center;">
            <button ><a href="print4.php">Imprimir</a></button>
</body>
</html>
