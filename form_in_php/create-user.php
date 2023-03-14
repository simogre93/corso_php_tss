<?php

//spegenre errori a livello di server e anche runtime(durante esecuzione) 
//error_reporting(E_ALL); li vede tutti
//error_reporting(0); li spegne tutti

use Registry\it\Provincia;
use Registry\it\Regione;
use validator\ValidateDate;
use validator\ValidateMail;
use validator\ValidateRequired;

require "../config.php";
require "./autoload.php";


$validatorName = new ValidateRequired('', 'il nome è obbligatorio');
$validatorLastName = new ValidateRequired('', 'il cognome è obbligatorio');
$validatorBirthday  = new ValidateDate('', 'La data di nascità non è valida');
$validatorCitta = new ValidateRequired('', 'la città è obbligatoria');
$validatorRegione = new ValidateRequired('', 'la regione è obbligatoria');
$validatorProvincia = new ValidateRequired('', 'la provincia è obbligatoria');
$validatorGender = new ValidateRequired('', 'il genere è obbligatorio');
$validatorMail = new ValidateMail('', 'la mail è obbligatoria');
$validatorPassword = new ValidateRequired('', 'la password è obbligatoria');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "dati inviati, controlla facendo validazione";

    $validatorName->isValid($_POST['first_name']);
    $validatorLastName->isValid($_POST['last_name']);
    $validatorBirthday->isValid($_POST['birthday']);
    $validatorCitta->isValid($_POST['birth_city']);
    $validatorRegione->isValid($_POST['birth_region']);
    $validatorProvincia->isValid($_POST['birth_province']);
    $validatorGender->isValid($_POST['gender']);
    $validatorMail->isValid($_POST['username']);
    $validatorPassword->isValid($_POST['password']);
}

/** questo script viene eseguito quanod visualizzo per la prima volta il form */
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    //$validatedName = false; per non far scattare il warning oppure usare isset
    $isValidNameClass = '';
}



?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Esercitazione Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <header class="bg-light p-1">
        <h1 class="display-6">Applicazione demo</h1>
    </header>
    <main class="container">

        <section class="row">
            <div class="col-sm-3">

            </div>
            <div class="col-sm-6">
                <form class="mt-1 mt-md-5" action="create-user.php" method="post">
                    <div class="mb-3">
                        <label for="first_name" class="form-label">nome</label>
                        <input type="text" value="<?= $validatorName->getValue() ?>" class="form-control <?php echo !$validatorName->getValid() ? 'is-invalid' : '' ?>" name="first_name" id="first_name">
                        <!-- mettere is-invalid -->
                        <?php
                        //GET isset($validatedName) prova a usare una variabile e se non esiste(false) non da warning
                        //POST isset($validatedName) in questo caso da true, nel nostro caso
                        if (!$validatorName->getValid()) { ?>
                            <div class="invalid-feedback">
                                <?= $validatorName->getMessage() ?>
                            </div>
                        <?php
                        }
                        ?>


                    </div>
                    <div class="mb-3">
                        <label for="last_name" class="form-label">cognome</label>
                        <input type="text" value="<?= $validatorLastName->getValue() ?>" class="form-control <?php echo !$validatorLastName->getValid() ? 'is-invalid' : '' ?>" name="last_name" id="last_name">
                        <?php
                        if (!$validatorLastName->getValid()) { ?>
                            <div class="invalid-feedback">
                                <?= $validatorLastName->getMessage() ?>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="mb-3">
                        <label for="birthday" class="form-label">data di nascita</label>
                        <input type="date" value="<?= $validatorBirthday->getValue() ?>" class="form-control <?php echo !$validatorBirthday->getValid() ? 'is-invalid' : '' ?>" name="birthday" id="birthday">
                        <?php
                        if (!$validatorBirthday->getValid()) { ?>
                            <div class="invalid-feedback">
                                <?= $validatorBirthday->getMessage() ?>
                            </div>
                        <?php
                        }
                        ?>
                    </div>

                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <label for="birth_city" class="form-label">Città</label>
                                <input type="text" value="<?= $validatorCitta->getValue() ?>" class="form-control <?php echo !$validatorCitta->getValid() ? 'is-invalid' : '' ?>" name="birth_city" id="birth_city">
                                <?php
                                if (!$validatorCitta->getValid()) { ?>
                                    <div class="invalid-feedback">
                                        <?= $validatorCitta->getMessage() ?>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="col">
                                <label for="birth_region" class="form-label">Regione</label>
                                <select id="birth_region" value="<?= $validatorRegione->getValue() ?>" class="form-select <?php echo !$validatorRegione->getValid() ? 'is-invalid' : '' ?>" name="birth_region">
                                    <option value=""></option>
                                    <?php foreach (Regione::all() as $regione) : ?>
                                        <option value="<?= $regione->regione_id ?>"><?= $regione->nome ?></option>
                                    <?php endforeach; ?>
                                    <?= $validatorRegione->getValue() == $regione->nome ? 'selected' : '' ?>  
                                </select>
                                <?php
                                if (!$validatorRegione->getValid()) : ?>
                                    <div class="invalid-feedback">
                                        <?= $validatorRegione->getMessage() ?>
                                    </div>
                                <?php
                                endif;
                                ?>
                            </div>
                            <div class="col">
                                <label for="birth_province" class="form-label">Provincia</label>
                                <select id="birth_province" value="<?= $validatorProvincia->getValue() ?>" class="form-select <?php echo !$validatorRegione->getValid() ? 'is-invalid' : '' ?>" name="birth_province">
                                    <option value=""></option>
                                    <?php foreach (Provincia::all() as $provincia) : ?>
                                        <option value="<?= $provincia->province_id ?>"><?= $provincia->nome ?></option>
                                    <?php endforeach; ?>
                                    
                                </select>
                                <?php
                                if (!$validatorProvincia->getValid()) : ?>
                                    <div class="invalid-feedback">
                                        <?= $validatorProvincia->getMessage() ?>
                                    </div>
                                <?php
                                endif;
                                ?>
                            </div>

                        </div>


                        <div class="mb-3">
                            <label for="gender" class="form-label">genere</label>
                            <select name="gender" value="<?= $validatorGender->getValue() ?>" class="form-select <?php echo !$validatorGender->getValid() ? 'is-invalid' : '' ?>" id="gender">
                                <option value=""></option>
                                <option value="M" <?= $validatorGender->getValue() == 'M' ? 'selected' : '' ?>>M</option>
                                <option value="F" <?= $validatorGender->getValue() == 'F' ? 'selected' : '' ?>>F</option>
                            </select>
                            <?php
                            if (!$validatorGender->getValid()) : ?>
                                <div class="invalid-feedback">
                                    <?= $validatorGender->getMessage() ?>
                                </div>
                            <?php
                            endif //if() : endif sintassi alternativa if 
                            ?>

                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">email</label>
                            <input type="text" value="<?= $validatorMail->getValue() ?>" class="form-control <?php echo !$validatorMail->getValid() ? 'is-invalid' : '' ?>" name="username" id="username">
                            <?php
                            if (!$validatorMail->getValid()) { ?>
                                <div class="invalid-feedback">
                                    <?= $validatorMail->getMessage() ?>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">password</label>
                            <input type="password" value="<?= $validatorPassword->getValue() ?>" class=" form-control <?php echo !$validatorPassword->getValid() ? 'is-invalid' : '' ?>" id="password" name="password" >
                            <?php
                            if (!$validatorPassword) { ?>
                                <div class="invalid-feedback">
                                    <?= $validatorPassword->getMessage() ?>
                                </div>
                            <?php
                            }
                            ?>
                        </div>

                        <button class="btn btn-primary btn-sm" type="submit">Registrati</button>
                </form>
            </div>



            <div class="col-sm-3">

            </div>
        </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>