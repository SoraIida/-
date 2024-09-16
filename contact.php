<?php
session_start();
$error = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $post = filter_input_array(INPUT_POST,$_POST);
    //フォーム送信時にエラーをチェック
    if ($post['name'] === ''){
        $error['name'] = 'blank';
    }
    if ($post['email'] === ''){
        $error['email'] = 'blank';
    } else if (!filter_var($post['email'],FILTER_VALIDATE_EMAIL)){
        $error['email'] = 'email';
    }
    if ($post['outline'] === ''){
        $error['outline'] = 'blank';
    }
    if ($post['subject'] === ''){
        $error['subject'] = 'blank';
    }
    if ($post['message'] === ''){
        $error['message'] = 'blank';
    }

    if (count($error) === 0){
        //エラーなし
        $_SESSION['form'] = $post;
        header('Location: confirm.php');
        exit() ;
    }
} else {
    if(isset($_SESSION['form'])){
        $post = $_SESSION['form'];
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>お問い合わせページ/UNDERTRANING</title>
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
            <p>お問い合わせページ</p>
            <p>お仕事のご依頼やその他質問など気軽に下記フォームよりお問い合わせください。</p>
        </div>
        <div class="page_name"></div>
        <div class="contact_form">
            <p class="title">
                <form action="contact.php" method="post" novalidate>
                    <div class="item">
                        <label class="label">※お名前</label>
                        <input type="text" class="inputs" name="name" value="<?php echo htmlspecialchars($post['name']); ?>" required />
                        <?php if ($error['name'] === 'blank'): ?>
                            <p class="error_msg">※名前を入力してください</p>
                        <?php endif; ?>
                    </div>
                    <div class="item">
                        <label class="label">※メールアドレス</label>
                        <input type="email" class="inputs" name="email" value="<?php echo htmlspecialchars($post['email']); ?>" required/>
                        <?php if ($error['email'] === 'blank'): ?>
                            <p class="error_msg">※メールアドレスを入力してください</p>
                        <?php endif; ?>
                        <?php if ($error['email'] === 'email'): ?>
                            <p class="error_msg">※メールアドレスが適切ではありません。正しくご記入ください</p>
                        <?php endif; ?>
                    </div>

                    <div class="item">
                        <p class="label">※お仕事/その他</p>
                        <div class="inputs">
                            <input type="radio" name="outline" id="work" value="お仕事" checked />
                            <label for="work">お仕事</label>
                            <input type="radio" name="outline" id="others" value="その他"/>
                            <label for="others">その他</label>
                        </div>
                    </div>

                    <div class="item">
                        <label class="label">※件名</label>
                        <input type="email_title" class="inputs" name="subject" value="<?php echo htmlspecialchars($post['subject']); ?>" required/>
                        <?php if ($error['subject'] === 'blank'): ?>
                                <p class="error_msg">※件名を入力してください</p>
                        <?php endif; ?>
                    </div>

                    <div class="item">
                        <label class="label">メッセージ本文</label>
                        <textarea  class ="inputs" placeholder="内容はこちら" name="message"  ><?php echo htmlspecialchars($post['message']); ?></textarea>
                        <?php if ($error['message'] === 'blank'): ?>
                                <p class="error_msg">※本文を入力してください</p>
                        <?php endif; ?>
                    </div>

                    <div class="button-area">
                        <input type="submit" value="メールを送信" />
                        <input type="reset" value="リセット" />
                    </div>
                </form>
            </p>
        </div>
    </body>
</html>
