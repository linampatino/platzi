<?php
require_once 'app/init.php';

$sql = " select * from tasks where user = :user";
$itemsQuery = $db->prepare($sql);
$itemsQuery ->execute([
    'user' => $_SESSION['user_id'],
]);

$items = $itemsQuery->rowCount() ? $itemsQuery : [];

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400i|Shadows+Into+Light" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light" rel="stylesheet">
        <link rel="stylesheet" href="css/main.css">

        <title>To Do</title>
    </head>

    <body>

        <div class="list">
            <h1 class="header">To do</h1>

            <?php if(!empty($items))  : ?>
                <ul class="items">
                    <?php foreach($items as $item): ?>
                        <li>
                            <span class="item <?php echo $item['done'] ? ' done' : '' ?>"><?php echo $item['description'] ?></span>
                            <?php if (!$item['done']) :?>
                                <a href="app/mark.php/?as=done&item=<?php echo $item['id']; ?>" class="done-button">Mark as done</a>
                            <?php endif;?>
                        </li>
                    <?php endforeach;?>
                </ul>
            <?php else: ?>
                <p>You haven't added any items yet.</p>
            <?php endif;?>

            <form class="item-add" action="app/add.php" method="post">
                <input class="input" type="text" name="description" id="description" placeholder="Type anew item here" required>
                <input class="submit" type="submit" value="Add">
            </form>
        </div>
        
    </body>
</html>