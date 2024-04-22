<style>
    <?php
        include "./components/navigation/navigation.css"
    ?>
</style>

<header>
    <nav>
        <ul>
            <li
                class="
                    nav-item +
                    <?php if (isset($_GET['page'])) echo ucfirst($_GET['page']) === "Home" ? "active" : "" ?>
                "
            >
                <a class="nav-link" href="http://localhost/index.php?page=home">Home</a>
            </li>
            <li
                class="
                    nav-item +
                    <?php if (isset($_GET['page'])) echo ucfirst($_GET['page']) === "Products" ? "active" : "" ?>
                "
            >
                <a class="nav-link" href="http://localhost/index.php?page=products">Products</a>
            </li>
            <li
                class="
                    nav-item +
                    <?php if (isset($_GET['page'])) echo ucfirst($_GET['page']) === "Login" ? "active" : "" ?> +
                    <?php if (isset($_COOKIE["is-logged-in"])) echo $_COOKIE["is-logged-in"] ? "logged-in" : "" ?>
                "
            >
                <a class="nav-link" href="http://localhost/index.php?page=login">Login</a>
            </li>
            <li
                class="
                    nav-item +
                    <?php if (isset($_GET['page'])) echo ucfirst($_GET['page']) === "Register" ? "active" : "" ?> +
                    <?php if (isset($_COOKIE["is-logged-in"])) echo $_COOKIE["is-logged-in"] ? "logged-in" : "" ?>
                "
            >
                <a class="nav-link" href="http://localhost/index.php?page=register">Register</a>
            </li>
        </ul>
    </nav>
</header>