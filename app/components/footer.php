<link rel="stylesheet" href="public/assets/css/component/footer.css">

<div class="footer-container bg-body-tertiary px-5 pb-3 ">
    <div class="text-center bg-body-tertiary fs-5" id="clock"></div>
    <footer class="d-flex flex-wrap justify-content-between align-items-center mt-0 border-top ">
        <p class="col-md-4 mb-0 text-body-secondary">Copyright © 2024 耘書, C111193224 宋仁風</p>
        <a href="index.php?controller=general&page=home" class="col-md-4 d-flex align-items-center justify-content-center mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
            <img src="public/assets/images/logo.png" alt="logo" height="36px">
        </a>
        <ul class="nav col-md-4 justify-content-end">
            <li class="nav-item"><a href="index.php?controller=about&page=website" class="nav-link px-2 text-body-secondary">關於</a></li>
        </ul>
    </footer>
</div>

<script>
    function startTime() {
        const today = new Date();
        let h = today.getHours();
        let m = today.getMinutes();
        let s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById('clock').innerHTML = h + ":" + m + ":" + s;
        setTimeout(startTime, 1000);
    }

    function checkTime(i) {
        if (i < 10) {
            i = "0" + i
        };
        return i;
    }
</script>