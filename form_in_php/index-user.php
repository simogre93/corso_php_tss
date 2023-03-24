<?php
use crud\UserCRUD;

require "../config.php";
require "./autoload.php";

$users = (new UserCRUD())->read();;
//print_r($users);
?>

<?php require "./class/views/head-view.php" ?>

<table class="table">
    <!-- riga tabella -->
    <tr>
        <!-- header tabella -->
        <th>#</th>
        <th>Nome</th>
        <th>Cognome</th>
        <th>Comune</th>
    </tr>
    <tr>
        <!-- dati tabella -->
        <?php foreach ($users as $users) { ?>
            <tr>
                <td><?= $users->user_id ?></td>
                <td><?= $users->first_name ?></td>
                <td><?= $users->last_name ?></td>
                <td><?= $users->birth_city ?></td>
            </tr>
        <?php } ?>
    </tr>
</table>
<?php require "./class/views/footer-view.php" ?>
