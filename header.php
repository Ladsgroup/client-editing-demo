<!DOCTYPE html>
<head>

    <title>Wikidata client editing demo</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Description" content="Tool to monitor edits in Wikidata in a proper way">

    <link rel="stylesheet" type="text/css" href="//tools.wmflabs.org/dexbot/tools/semantic/dist/semantic.min.css">
    <script src="//tools.wmflabs.org/dexbot/tools/jquery.min.js"></script>
    <script src="//tools.wmflabs.org/dexbot/tools/semantic/tablesort.min.js"></script>
    <script src="//tools.wmflabs.org/dexbot/tools/semantic/dist/semantic.min.js"></script>
</head>
<body>
<div class="main nav">
    <div class="ui inverted main menu">
        <div class="container">
            <div class="left menu">
                <div class="title item">
                    <b>Wikidata client editing demo</b>
                </div><a href="/" class="launch item">Home</a>
                <a href="//tools.wmflabs.org/" class="launch item">Labs</a>
            </div>

            <div class="right menu">
                <a href="https://github.com/Ladsgroup/Vandalism-dashboard" class="item">Source code</a>
            </div>
        </div>
    </div>
</div>
<?php

function Error($mssg="") {
?>
<div style="padding:1em;width:50em;">
    <div class="ui negative message">
        <div class="header">
            That's bad!
        </div>
        <p>
            <?php
            echo $mssg;
            ?>
        </p>
    </div>
</div>
<?php
die('ValueError');
}


