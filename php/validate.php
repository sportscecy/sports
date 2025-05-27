<?php
include("conexion.php");
session_start();

$username=$_POST['username'];
$password=$_POST['password'];

$username=$mysqli->real_escape_string($username);
$query="SELECT usuario, password FROM usuarioo WHERE usuario='$username' AND password= '$password';"; 

$result=$mysqli->query($query);

if ($result->num_rows == 1)

{
	$_SESSION['user'] = $username;
	header('Location: tarjeta.php');

}else{
	
	 echo "
    <script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
        $(document).ready(function() {
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Invalid username or password',
                showConfirmButton: true
            }).then(() => {
                window.history.back();  
            });
        });
    </script>
    ";
}
?>