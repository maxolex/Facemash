<?php

// START 2
require_once('init.php');

if (isset($_POST['done']))
{
    $folder = 'photos/';
    $ext = '.jpg';
    $name = $mysqli->real_escape_string($_POST['name']);
    $mysqli->query('
    INSERT INTO photos
    SET token = "' . md5($name . 'FacemashMaxolex') . '",
        name = "' . $name . '",
        path = "' . $folder . strtolower($name) . $ext . '"');

    header ('Location: add.php');
    exit;
}
?>

<form action="" method="post">
    <input type="text" name="name" placeholder="Nom de l'image" />
    <button type="submit" name="done">Add</button>
</form>
<!-- END 2 -->