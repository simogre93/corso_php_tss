<?php
use crud\UserCRUD;

require "./config.php";
require "./autoload.php";

$users = (new UserCRUD())->read();;
//print_r($users);
?>

<?php require "./class/views/head-view.php" ?>
<a href="create-user.php" class="btn btn-primary btn-sm">Aggiungi Utente</a>
<table class="table">
    <!-- riga tabella -->
    <tr>
        <!-- header tabella -->
        <th>#</th>
        <th>Nome</th>
        <th>Cognome</th>
        <th>Comune</th>
        <th>Azioni</th>
    </tr>
    <tr>
        <!-- dati tabella -->
        <?php foreach ($users as $user) { ?>
            <tr>
                <td><?= $user->user_id ?></td>
                <td><?= $user->first_name ?></td>
                <td><?= $user->last_name ?></td>
                <td><?= $user->birth_city ?></td>
                <td>
                    <a href="edit-user.php?user_id=<?=$user->user_id ?>" class="btn btn-primary btn-sm">modifica</a>
                    <a href="delete-user.php?user_id=<?=$user->user_id ?>" class="btn btn-danger btn-sm">elimina</a>
                </td>  
            </tr>
        <?php } ?>
    </tr>
</table>
<?php require "./class/views/footer-view.php" ?>
