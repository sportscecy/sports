<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card Payment</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../css/tarjeta.css" />
</head>
<body>

<header>
    <a href="../html/login.html">←Go Back</a>
</header>

<br><br>

<form action="procesar_pago.php" method="POST">
    <div class="container1">
        <center>
            <h3>Mailing address</h3>
            <h5>Name: <input type="text" name="nombre" required maxlength="15"> Last Name: <input type="text" name="apellido" required maxlength="20"></h5>
            <h5>Telephone: <input type="text" name="telefono" required maxlength="13" pattern="\d+"> Direction: <input type="text" name="dire" required maxlength="30"></h5>
            <h5>Zip Code: <input type="text" name="cp" required maxlength="6" pattern="\d+"> Country: <input type="text" name="pa" value="México" required></h5>
        </center>
        <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State/Province: <input type="text" name="edo" required maxlength="30"></h5>
        <h3>Payment information</h3>
        <div class="inputBox">
            <span>Accepted cards:</span>
            <img src="../img/payment.png" alt="Métodos de Pago">
        </div>
        <h5>Card Number: <input type="text" name="card_number" maxlength="16" pattern="\d{16}" required></h5>
        <h5>Expiration date:
            <select name="mes" required>
                <option value="" disabled selected>Month</option>
                <option value="Enero">January</option>
                <option value="Febrero">February</option>
                <option value="Marzo">March</option>
                <option value="Abril">April</option>
                <option value="Mayo">May</option>
                <option value="Junio">June</option>
                <option value="Julio">July</option>
                <option value="Agosto">August</option>
                <option value="Septiembre">September</option>
                <option value="Octubre">October</option>
                <option value="Noviembre">November</option>
                <option value="Diciembre">December</option>
            </select>
            Year:
            <select name="yy" required>
                <option value="" disabled selected>Year</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
                <option value="2026">2026</option>
                <option value="2027">2027</option>
                <option value="2028">2028</option>
                <option value="2029">2029</option>
                <option value="2030">2030</option>
            </select>
        </h5>
        <h5>Code: <input type="text" name="code"  pattern="\d{4}" required></h5>
        <button type="submit" class="btn btn-primary" id="btn_actualizar">BUY</button> 
    </div>
</form>

<script>
    $(document).ready(function() {
        $('#btn_actualizar').click(function(event) {
            event.preventDefault();

            let isValid = true;

            $('input[required]').each(function() {
                if (!$(this).val()) {
                    isValid = false;
                    $(this).focus();
                    return false;
                }
            });

            if (isValid) {
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Successful payment, enjoy your purchase!",
                    showConfirmButton: false,
                    timer: 1500
                });
            } else {
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Please fill in all required fields",
                    showConfirmButton: true
                });
            }
        });

         const limitInputLength = (selector, maxLength) => {
            document.querySelector(selector).addEventListener('input', function() {
                if (this.value.length > maxLength) {
                    this.value = this.value.slice(0, maxLength);
                }
            });
        };

        limitInputLength('input[name="card_number"]', 16); 
     });
</script>

</body>
</html>
