<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once $_SERVER["DOCUMENT_ROOT"] . "/php/db.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php";

$paragraphs = [
    [
        "name" => "Hello, Welcome to my personal website!",
        "articleName" => "greeting",
    ],
    [
        "name" => "Admitting that PHP is bad.",
        "articleName" => "php-bad",
    ]
];

$statusMessage = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $message = trim($_POST["message"] ?? "");
    $accessToken = $_POST["FORM_ACCESSTOKEN"] ?? null;

    if (!hash_equals($_SESSION["csrf_token"] ?? "", (string)$accessToken)) {
        die("Invalid FORM_ACCESSTOKEN. If you see this please report it to naco.");
    }

    if (empty($message)) {
        die("Invalid message.");
    }

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = $settings["emailFrom"];
        $mail->Password   = $settings["password"];
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;
        $mail->CharSet    = 'UTF-8';

        $mail->setFrom($settings["emailFrom"], 'Nacosito Anonymous Question');
        $mail->addAddress($settings["emailTo"], 'Naco');

        $mail->isHTML(false);
        $mail->Subject = 'New Anonymous Question from nacosito.com';
        $mail->Body = "You received a new question:\n\n" . $message;

        $mail->send();
        $statusMessage = "Your question has been sent!";
    } catch (Exception $e) {
        $statusMessage = "Message could not be sent. Error: {$mail->ErrorInfo}";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require_once $_SERVER["DOCUMENT_ROOT"] . "/components/head.php"; ?>
    </head>
    <body>
        <?php require_once $_SERVER["DOCUMENT_ROOT"] . "/components/navbar.php"; ?>
        <div class="container">
            <div class="text-center">
                <h2>THIS IS ME MY PROFILE IS FINN FROM DANDYS WORLD YES</h2>
                <img src="/media/nacosito.gif" alt="ITS ME NACOSITO" title="ITS ME NACOSITO">
                <div class="margin-3">
                    <h2 class="margin-2">Hello! My name is Naco and im a geek</h2>
                    <p class="margin-2">I like coding its really fun yk what im saying</p>
                    <p class="margin-2">I also like ULTRAKILL, Phighting, Deltarune & Undertale</p>
                </div>
                <div class="margin-3">
                    <h2>Shoutout to these people:</h2>
                    <p class="text-snow margin-2">Snow</p>
                    <p class="text-carry margin-2">Carry</p>
                    <a class="text-yuhoz margin-2" href="https://www.roblox.com/games/123393809365547/Final-Stop" style="color:white" target="_blank">Yuh0z</a>
                    <p class="text-fil margin-2">Fil/Filemon</p>
                </div>
                <p class="margin-3">Im also <span class="text-pan-part1">Pan</span><span class="text-pan-part2">sex</span><span class="text-pan-part3">ual</span>, you should love people for who they are ngl &#9825;</p>
                <p>I've been on the queer spectrum since 2024.</p>
                <div class="margin-3">
                    <h2>Paragraphs</h2>
                    <div class="paragraphs">
                    <?php foreach ($paragraphs as $para): ?>
                        <div class="paragraph">
                            <a href="https://www.nacosito.com/articles/<?= $para["articleName"] ?>"><?= $para["name"] ?></a>
                        </div>
                    <?php endforeach; ?>
                    </div>
                </div>
                <div class="ask-me-anything">
                    <h2>Ask me anything!</h2>
                    <?php if (isset($statusMessage)): ?>
                    <p><?= $statusMessage ?></p>
                    <?php endif; ?>
                    <form method="post">
                        <input name="FORM_ACCESSTOKEN" type="hidden" value="<?= $_SESSION["csrf_token"] ?>">
                        <input name="message" placeholder="Type any question." required>
                        <button type="submit">Post as Anonymous</button>
                    </form>
                    <p class="margin-3">I answer these usually on my <a href="https://x.com/nacosito">Twitter</a></p>
                </div>
            </div>
        </div>
        <?php require_once $_SERVER["DOCUMENT_ROOT"] . "/components/footer.php"; ?>
    </body>
</html>