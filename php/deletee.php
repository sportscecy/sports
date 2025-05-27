<?php
include("conexion.php");
include("session.php");

$id = $_GET['id'];


$sql = "DELETE FROM producto WHERE nombre='$id'";
if(mysqli_query($mysqli, $sql)){
    echo '
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
       $(document).ready(function() {
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Removed Product!",
                showConfirmButton: false,
                timer: 1500
            }).then(() => {
                window.location = "users.php";
            });
       });
    </script>
    ';
} else {
    echo '<script language="javascript">';
    echo 'alert("Error eliminando registro!");';
    echo 'window.location="users.php";';
    echo '</script>';
}
?>