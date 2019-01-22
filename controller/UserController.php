<?php
    require_once("model/Users.php");
    $users = new Users();

    $data = $users->getUsers();

    require_once("views/UserView.php")

?>