<?php
    session_start();
    // setcookie("username", "", time() - 3600);
    // setcookie("password", "", time() - 3600);
?>

<style>
    <?php
        include_once "./pages/home/home.css"
    ?>
</style>

<div id="home">
    <h1>This is Home page</h1>
    <img src="" alt="avatar">
    <h2>
        <?php
            if (isset($_SESSION["user"]))
                echo $_SESSION["user"]["name"]
        ?>
    </h2>
    <button type="submit" onclick="LogOut()">Log out</button>
</div>

<?php
    if (isset($_SESSION["user"])) {
        if (!isset($_COOKIE["username"]) || $_COOKIE["username"] !== $_SESSION["user"]["username"]) {
            include_once "./components/cookie_modal/cookie_modal.php";
        }
    }
?>

<script>
    const LogOut = () => {
        window.location.href="./pages/home/logout.php"
    }
</script>