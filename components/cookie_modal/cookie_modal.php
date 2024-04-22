<style>
    <?php
        include_once "./components/cookie_modal/cookie_modal.css"
    ?>
</style>

<div id="cookie-modal">
    <h1>Cookie modal</h1>
    <button type="button" onclick="AcceptCookies()">Accept</button>
    <button type="button" onclick="DeclineCookies()">Decline</button>
</div>

<script>
    const cookieModal = document.querySelector("#cookie-modal")

    const AcceptCookies = () => {
        cookieModal.style.display = "none"
        const d = new Date()
        d.setTime(d.getTime() + (30 * 24 * 60 * 60 * 1000))
        let expires = "expires="+ d.toUTCString()
        document.cookie = "username = " + "<?php echo $_SESSION["user"]["username"] ?>;" + expires
        document.cookie = "password = " + "<?php echo $_SESSION["user"]["password"] ?>;" + expires
    }

    const DeclineCookies = () => {
        cookieModal.style.display = "none"
        document.cookie = "cookie_choice = decline"
    }
</script>