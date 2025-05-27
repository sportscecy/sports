<?php
include("conexion.php");
include("session.php");

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "INSERT INTO usuarioo(usuario, password) VALUES('$username', '$password')";
if (mysqli_query($mysqli, $sql)) {
     echo '
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
       $(document).ready(function() {
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Successful register!",
                showConfirmButton: false,
                timer: 1500
            }).then(() => {
                window.location = "../html/login.html"; 
            });
       });
    </script>
    ';
} else {
     echo '<script>
        alert("Duplicate user!");
        window.location="registration.php";
    </script>';
}
?>
