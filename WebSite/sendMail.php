<?php
    session_start();
    
?>
<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <title>Recupera Password</title>
    <link href="css/reset.css" type="text/css">
    <link href="css/style2.css" type="text/css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <!-- cdn for modernizr, if you haven't included it already -->
    <script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
    <!-- polyfiller file to detect and load polyfills -->
    <script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
</head>

<body>
    <main>
        <section>
            <form action="sendMail.php" method="post">
                <input type="text" class="form-control" id="user" placeholder="Enter Email or Username">
                <button type="submit" class="btn btn-primary">Reinvia Mail</button>
            </form>
        </section>
        <section>
            torna alla homepage cliccando <a href="index.php">qui</a>
        </section>
    </main>
</body>

</html>