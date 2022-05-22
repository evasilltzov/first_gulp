<?php

include_once('includes/db.php');

$db = new DataBase('localhost', 'root', '', 'font_agent');
//var_dump($db);

if( isset($_POST['name']) && isset($_POST['phone'])) {
    $db->insertDataInDB ( $_POST['name'], $_POST['phone'] );
}

$data_table = $db->get_list_emails() ?? [];

echo "<pre>";
print_r( $data_table );
echo "</pre>";

if( isset($_GET['send']) && !empty($_GET['send']) ) {

    $to_email = $_GET['send'];
    $message = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos eaque excepturi veritatis. Ab animi beatae earum fugiat harum illum in itaque labore magni maiores molestiae molestias nam non officia, quis?';
    $from_email = 'admin@task.ccrv.pw';
    $subject = 'Subject';

    if ( mail($to_email, $subject, $message ) ) {
        echo 'sended';
    } else {
        echo 'nonono';
    }
}

