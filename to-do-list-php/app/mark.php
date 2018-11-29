<?php
require_once 'init.php';

print_r($_GET);

if(isset($_GET['as'], $_GET['item'])){
    $as   = $_GET['as'];
    $item = $_GET['item'];

    $valor = 0;
    

    switch($as){
        case 'done':
            $valor = 1;
        break;
        case 'undone':
            $valor = 0;
        break;
    }

    $sql ="update tasks
              set done = ".$valor.
        "   where id = :item
              and user = :user";

    $doneQuery = $db->prepare($sql);
    $doneQuery->execute([
        'item' => $item,
        'user' => $_SESSION['user_id'],
    ]);

}


header('Location: ../index.php');

