<?php
$paragraphs = [
    [
        "name" => "Hello, Welcome to my personal website!",
        "articleName" => "greeting",
    ],
]
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require_once $_SERVER["DOCUMENT_ROOT"] . "/components/head.php"; ?>
    </head>
    <body>
        <div class="container">
            <div class="text-center middle-centered">
                <h1 class="mega-big">404</h1>
                <h2>Looks like you've hit a dead end mate :(</h2>
                <a href="javascript:history.back()"><h2>Go Back</h2></a>
            </div>
        </div>
    </body>
</html>