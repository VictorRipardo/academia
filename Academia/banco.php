<?php

    $conexao = new mysqli("localhost","root","","bdacademia");

    if (mysqli_connect_errno()) {
        trigger_error(mysqli_connect_error());
        echo mysqli_connect_error();
    }


?>