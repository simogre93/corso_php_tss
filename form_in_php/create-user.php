<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Esercitazione Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <header class="bg-light p-1">
        <h1 class="display-6">Applicazione demo</h1>
    </header>
    <main class="container">

        <section class="row">
            <div class="col-sm-4">
                
            </div>
            <div class="col-sm-4">
                <form class="mt-1 mt-md-5" action="register-user.php" method="post"> 
                    <div class="mb-3">
                        <label for="nome" class="form-label">nome</label>  
                        <input type="nome" class="form-control" name="first_name" id="nome">
                    </div>
                    <div class="mb-3">
                        <label for="cognome" class="form-label">cognome</label>  
                        <input type="cognome" class="form-control" name="last_name" id="cognome">
                    </div>
                    <div class="mb-3">
                        <label for="birthday" class="form-label">data di nascita</label>  
                        <input type="birthday" class="form-control" name="birthday" id="birthday">
                    </div>
                    <div class="mb-3">
                        <label for="birth_place" class="form-label">luogo di nascita</label>  
                        <input type="birth_place" class="form-control" name="birth_place" id="birth_place">
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">sesso</label>  
                        <input type="gender" class="form-control" name="gender" id="gender">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">nome utente</label>  
                        <input type="username" class="form-control" name="username" id="username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">password</label>
                        <input type="password" id="password" name="password" class="form-control">
                    </div>

                    <button class="btn btn-primary btn-sm" type="submit">Registrazione</button>
                </form>
            </div>

            
            
            <div class="col-sm-4">
                
            </div>
        </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>
