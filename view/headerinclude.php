<!-- Our Icons come from fontawesome.com the js file is include in the js folder. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../images/Functional/tfFavicon.png">

    <title>
        <?php echo $title; ?>
    </title>

    <!-- JavaScript -->
    <!-- JQuery -->
    <script src="../js/jquery-3.1.1.js"></script>
    <!-- Custom JS -->
    <script src="../js/techfloorsite.js"></script>
    <!-- fontawesome icons and fonts -->
    <script src="../js/fontawesome-all.js"></script>

    <!-- Bootstrap core CSS  and  our custom CSS-->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/custom.css">

</head>

<body>

<div class="container-fluid "><!--allows for a smoother resizing-->

    <nav>
        <?php
        include '../view/navbar.php';
        ?>
    </nav>