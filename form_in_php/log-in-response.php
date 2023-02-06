<h1>Sono
    la
    risposta
    (RESPONSE)</h1>
    <?php
    echo "<pre>";
    echo "get:";
    print_r($_GET);
    echo "post";
    print_r($_POST);
    echo "<pre>";

    echo "la tua email è <br>";
    echo "<strong>". $_POST["email"] . "</strong>";
    ?>