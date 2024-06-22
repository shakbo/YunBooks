<?php
if (isset($_SESSION['SES']['username'])) {
    echo "  <script>
                var jsUsername = '" . $_SESSION['SES']['username'] . "';
                var message = '請透過導覽列查找並使用功能。';
            </script>";
} else {
    echo "  <script>
                var jsUsername = '神秘的訪客';
                var message = '登入後即可使用所有功能。'
            </script>";
}
?>

<div id="typewriter-container" class="text-light text-center w-100 h1 d-flex justify-content-center align-items-center "></div>

<?php
if (isset($_SESSION['SES']['username'])) {
    echo ("<div class='w-100 d-flex justify-content-end fixed-bottom-right-div w3-animate-right'><button type='button' class='btn btn-light infoupdate w3-animate-right' data-bs-toggle='modal' data-bs-target='#infoUpdateModal'>編輯個人資訊</button></div>");
}
?>

<script src="app/libraries/typewriter/typing.js"></script>
<script>
    const typewriter = new Typewriter('#typewriter-container', {
        strings: [
            `你好, ${jsUsername} !`,
            `${message}`
        ],
        autoStart: true,
        loop: true
    });

    typewriter.start();
</script>