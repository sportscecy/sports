<?php
include("session.php");

if (isset($_POST['search'])) {
    $valueToSearch = $_POST['valueToSearch'];
    $query = "SELECT * FROM producto WHERE id LIKE '%" . $valueToSearch . "%'";
    $result = filterRecord($query);
} else {
    $query = "SELECT * FROM producto";
    $result = filterRecord($query);
}

function filterRecord($query) {
    include("conexion.php");
    $filter_result = mysqli_query($mysqli, $query);
    return $filter_result;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product management</title>
             <link rel="stylesheet" href="../css/users.css" />

    
</head>

<body>

    <header id="main-header">
        <a href="../html/admin.html" class="header-link">Go Back</a>
    </header>

    <div class="container">
        <?php
        echo "<table>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>";

        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['nombre']) . "</td>";
            echo "<td>" . htmlspecialchars($row['precio']) . "</td>";
            echo "<td><a href='ediit.php?id=" . urlencode($row['nombre']) . "'><img src='../img/edita.png' alt='Edit' class='action-icon edit-icon'></a></td>";
            echo "<td><a href='deletee.php?id=" . urlencode($row['nombre']) . "'><img src='../img/eliminar.png' alt='Delete' class='action-icon delete-icon'></a></td>";
            echo "</tr>";
        }
        echo "</table>";
        ?>
    </div>

</body>
</html>
