<?php

//spegenre errori a livello di server e anche runtime(durante esecuzione) 
//error_reporting(E_ALL); li vede tutti
//error_reporting(0); li spegne tutti
require "./class/validator/Validable.php";
require "./class/validator/ValidateRequired.php";

print_r($_SERVER['REQUEST_METHOD']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "dati inviati, controlla facendo validazione";

    $validatorName = new ValidateRequired();
    $validatedName = $validatorName->isValid($_POST['first_name']);
    //operatore ternario ? e : per scrivere if veloci e assegnazioni
    $isValidNameClass = $validatorName->isValid($_POST['first_name']) ? '' : 'is-invalid';

    $validatorLastName = new ValidateRequired();
    $validatedLastName = $validatorLastName->isValid($_POST['last_name']);
    $isValidLastNameClass = $validatorLastName->isValid($_POST['last_name']) ? '' : 'is-invalid';

    /*$validatorBirthday = new ValidateRequired();
    $validatorBirthday = $validatorBirthday->isValid($_POST['birthday']);
    $isValidBirthday = $validatorBirthday->isValid($_POST['birthday']) ? '' : 'is-invalid';*/
   
   
   
    /* per i radio button dei gender
    $validatorGender = new ValidateRequired();
    var_dump(isset($_POST['gender']));
    $_gender = !isset($_POST['gender']) ? '' : $_POST['gender']);
    $validatorGender->isValid($_gender);*/
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
                        <input type="text" class="form-control <?php echo $isValidNameClass ?>" name="first_name" id="first_name">
                        <!-- mettere is-invalid -->
                        <?php
                        //GET isset($validatedName) prova a usare una variabile e se non esiste(false) non da warning
                        //POST isset($validatedName) in questo caso da true, nel nostro caso
                        if (isset($validatedName) && !$validatedName) { ?>
                            <div class="invalid-feedback">
                                il nome è obbligatorio
                            </div>
                        <?php
                        }
                        ?>


                    </div>
                    <div class="mb-3">
                        <label for="last_name" class="form-label">cognome</label>
                        <input type="text" class="form-control <?php echo $isValidLastNameClass ?>" name="last_name" id="last_name">
                        <?php
                        if (isset($validatedLastName) && !$validatedLastName) { ?>
                            <div class="invalid-feedback">
                                il cognome è obbligatorio
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="mb-3">
                        <label for="birthday" class="form-label">data di nascita</label>
                        <input type="date" class="form-control <?php echo $isValidNameClass ?>" name="birthday" id="birthday">
                        <?php
                        if (isset($validatedName) && !$validatedName) { ?>
                            <div class="invalid-feedback">
                                la data è obbligatoria
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="mb-3">
                        <label for="birth_place" class="form-label">luogo di nascita</label>
                        <input type="text" class="form-control <?php echo $isValidNameClass ?>" name="birth_place" id="birth_place">
                        <?php
                        if (isset($validatedName) && !$validatedName) { ?>
                            <div class="invalid-feedback">
                                il luogo di nascita è obbligatorio
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">genere</label>
                        <select name="gender" class="form-select <?php echo $isValidNameClass ?>" id="gender">
                            <option value=""></option>
                            <option value="M">M</option>
                            <option value="F">F</option>
                        </select>
                        <?php
                        if (isset($validatedName) && !$validatedName) : ?>
                            <div class="invalid-feedback">
                                il genere è obbligatorio
                            </div>
                        <?php
                        endif//if() : endif sintassi alternativa if 
                        ?>
                        
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">nome utente</label>
                        <input type="text" class="form-control <?php echo $isValidNameClass ?>" name="username" id="username">
                        <?php
                        if (isset($validatedName) && !$validatedName) { ?>
                            <div class="invalid-feedback">
                                il nome utente è obbligatorio
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">password</label>
                        <input type="text" id="password" name="password" class="form-control <?php echo $isValidNameClass ?>">
                        <?php
                        if (isset($validatedName) && !$validatedName) { ?>
                            <div class="invalid-feedback">
                                la password è obbligatoria
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