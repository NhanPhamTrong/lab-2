<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- CSS Stylesheets -->
    <link rel="stylesheet" href="./main.css">

    <!-- Title -->
    <title>
        <?php
            if (isset($_GET["page"]))
                echo ucfirst($_GET["page"])
        ?>
    </title>

    <!-- Font Awesome script -->
    <script src="https://kit.fontawesome.com/79aeac2b8c.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Header -->
    <?php
        include_once "./components/navigation/navigation.php";
    ?>

    <!-- Main -->
    <main>
        <?php
            if (isset($_GET["page"]))
                include "./pages/" . $_GET["page"] . "/" . $_GET["page"] . ".php"
        ?>
    </main>

    <!-- Footer -->
    <footer></footer>
</body>
</html>