<?php
    session_start();
?> 

<style>
    <?php
        include_once "./pages/login/login.css"
    ?>
</style>

<form action="./pages/login/login_processing.php" method="POST">
    <div class="user-icon">
        <i class="fa-solid fa-user"></i>
    </div>
    <div class="form-element">
        <div class="username">
            <input
                id="username"
                class="<?php
                    echo isset($_SESSION["usernameError"]) ? "error" : ""
                ?>"
                type="text"
                name="username"
                value="<?php
                    if (isset($_SESSION["username"])) {
                        echo $_SESSION["username"];
                    }
                    else {
                        if (isset($_COOKIE["username"]))
                            echo $_COOKIE["username"];
                    }
                ?>"
                required>
            <label for="username">Username</label>
        </div>
        <p id="username-error" class="error">
            <?php
                if (isset($_SESSION["usernameError"]))
                    echo $_SESSION["usernameError"]
            ?>
        </p>
    </div>
    <div class="form-element">
        <div class="password">
            <input
                id="password"
                class="<?php
                    echo isset($_SESSION["passwordError"]) ? "error" : ""
                ?>"
                type="password"
                name="password"
                value="<?php
                    if (isset($_SESSION["password"])) {
                        echo $_SESSION["password"];
                    }
                    else {
                        if (isset($_COOKIE["password"]))
                            echo $_COOKIE["password"];
                    }
                ?>"
                required>
            <label for="password">Password</label>
        </div>
        <p id="password-error" class="error">
            <?php
                if (isset($_SESSION["passwordError"]))
                    echo $_SESSION["passwordError"]
            ?>
        </p>
    </div>
    <div class="forgot-password-link">
        <a href="">Forgot password?</a>
    </div>
    <div class="submit-btn">
        <input type="submit" name="submit" value="Submit">
    </div>
</form>