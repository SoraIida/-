<?php
session_start();

//入力画面の遷移でなければ、入力画面へ遷移
if(!isset($_SESSION['form'])){
    header('Location: contact.php');
    exit();
} else {
    $post = $_SESSION['form'];
}

unset($_SESSION['form']);
?>


<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>my portfolio</title>
        <link rel="stylesheet" href="style_contact.css">
        <script src="https://kit.fontawesome.com/f9d2dec957.js" crossorigin="anonymous"></script>

    </head>
    <body>
        <!-- contact page -->
        <div class="header">
            <nav style = "z-index:calc(infinity)">
                <div class="wrapper">
                    <img class="logo_img" src="./img/my_img.png">
                    <h2 class="logo">
                        UNDER<span>TRAINING</span>
                    </h2>
                    <ul>
                        <li>
                            <a href="index.html" >
                                <img class="nav_logo" src="./img/home.png">
                                <dir>ホーム</dir>
                            </a>
                        </li>
                        <li>
                            <a href="index.html#portfolio_sec">
                                <img class="nav_logo" src="./img/chest.png">
                                <dir>ポートフォリオ</dir>
                            </a>
                        </li>
                        <li>
                            <a href="contact.php">
                                <img class="nav_logo" src="./img/mail.png">
                                <dir>お問い合わせ</dir>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="maintext">
            <p>送信が完了いたしました。<br>
                お問い合わせ頂いた内容確認後、依頼された方へご連絡させていただきますので<br>
                今しばらくお待ちいただきますようお願いいたします。
            </p>
            <a class="home_button" href="index.html">
                <img class="home_logo" src="./img/home.png">
                <dir class="home_text">ホームへ戻る</dir>
            </a>
        </div>
    </body>
</html>
