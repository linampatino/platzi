
<?php
require_once 'init.php';

if(isset($_POST['description'])){
    $description = trim($_POST['description']);

    if(!empty($description)){
        $sql = 'insert into tasks (description, created_at, updated_at, done, user)
                values (:description, NOW(), NOW(), 0, :user)';
        $addQuery = $db->prepare($sql);

        $addQuery->execute([
            'description' => $description,
            'user' => $_SESSION['user_id'],
        ]);
    }
}

header('Location: ../index.php');