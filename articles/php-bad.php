<?php
$paragraphs = [
    [
        "name" => "Hello, Welcome to my personal website!",
        "articleName" => "greeting",
    ],
    [
        "name" => "Admitting that PHP is bad.",
        "articleName" => "php-bad",
    ]
]
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require_once $_SERVER["DOCUMENT_ROOT"] . "/components/head.php"; ?>
    </head>
    <body>
        <?php require_once $_SERVER["DOCUMENT_ROOT"] . "/components/navbar.php"; ?>
        <div class="container" style="width: 800px;">
            <div class="margin-3">
                <h2>Admitting that PHP is an outdated backend programming language.</h2>
                <h3>Created 21/11/2026</h3>
                <p>Hello, Im here to speak about PHP and im admitting to why its bad. </p>
                <p>For all of you who dont know what it is, PHP is a programming language primarily used for backend development. While it can render HTML still its incredibly outdated.</p>
                <br>
                <p>PHP was created back in <span class="text-bend">1993</span> <span class="text-small">(damn thats old)</span> with the intention of it being an easy way to make forms work and such. But now im gonna get to why i think its bad.<br></p>
                <br>
                <p>Now its only bad for when your trying to make actual websites with a large codebase. It's scalability by itself is pretty bad. if you have a bunch of pages it'll be easy for you to get lost and such.</p>
                <br>
                <p>Frameworks like Laravel, Symfony definitely do help but in my opinion they get overwhelming fast. an alternative i like is ASP.NET Core which uses C# <span class="text-small">(if you have experience with that)</span></p>
                <br>
                <p>I used to use PHP for like EVERY single website i made and it became bad quickly when i added a bunch of pages. Never again. The only reason this website even is using the crumbling language is because its quick and easy to whip up. This is just my personal website that i use to put my projects and interests on.</p>
            </div>
        </div>
        <?php require_once $_SERVER["DOCUMENT_ROOT"] . "/components/footer.php"; ?>
    </body>
</html>