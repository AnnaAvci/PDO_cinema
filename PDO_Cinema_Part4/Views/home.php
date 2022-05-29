<?php 

ob_start(); ?>

<h1>Homepage</h1>

<?php

$title = "Homepage";
$content = ob_get_clean();
require "template.php";