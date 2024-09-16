<?php
session_start();

//入力画面の遷移でなければ、入力画面へ遷移
if(!isset($_SESSION['form'])){
    header('Location: contact.php');
    exit();
} else {
    $post = $_SESSION['form'];
}

if ($_SERVER['REQUEST_METHOD']==='POST'){
    //メールを送信
    $to = '	iidat7111@gmail.com';
    $from = $post['email'];
    $subject = "【フォームから】【".$post['outline']."】".$post['subject'];
    $body = <<<EOT
    名前：{$post['name']}
    メールアドレス：{$post['email']}
    内容：
    {$post['message']}
    EOT;

    // var_dump($to);
    // var_dump($from);
    // var_dump($subject);
    // var_dump($body);
    // exit();

    // mb_send_mail($to,$subject,$body,"From: {$from}");

    header('Location: comp.php');
    exit();
}
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
            <p>お問い合わせ内容の確認</p>
        </div>
        <div class="page_name"></div>
        <div class="contact_form">
            <p class="title">
                <form action="" method="post">
                    <div class="item">
                        <label class="label">※お名前</label>
                        <p class="input_item"><?php echo htmlspecialchars($post['name']); ?></p>
                    </div>
                    <div class="item">
                        <label class="label">※メールアドレス</label>
                        <p class="input_item"><?php echo htmlspecialchars($post['email']); ?></p>
                    </div>

                    <div class="item">
                        <p class="label">※お仕事/その他</p>
                        <p class="input_item"><?php echo htmlspecialchars($post['outline']); ?></p>
                    </div>

                    <div class="item">
                        <label class="label">※件名</label>
                        <p class="input_item"><?php echo nl2br(htmlspecialchars($post['subject'])); ?></p>

                    </div>

                    <div class="item">
                        <label class="label">メッセージ本文</label>
                        <p class="input_item"><?php echo nl2br(htmlspecialchars($post['message'])); ?></p>
                    </div>

                    <div class="button-area">
                        <input type="submit" value="メールを送信" />
                        <a class="return" href="contact.php">戻る</a>
                    </div>
                </form>
            </p>
        </div>
    </body>
</html>
