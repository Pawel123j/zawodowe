<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Forum o psach</title>
    <link rel="stylesheet" href="styl4.css">
</head>

<body>
    <div id='baner'>
        <h1>Forum wielbicieli psów</h1>
    </div>
    <div id='lewy'>
        <img src="obraz.jpg" alt="foksterier">
    </div>
    <div class='prawy'>
        <h2>Zapisz się</h2>
        <form method='post'>
            login:&nbsp;<input name='login'>
            <br>
            hasło:&nbsp;<input type="password" name='haslo'>
            <br>
            powtórz hasło:&nbsp;<input type='password' name='powtorzhaslo'>
            <br>
            <button type='submit'>Zapisz</button>
        </form>
        <?php

        $conn = mysqli_connect('localhost', 'root', '', '05styczen2022');
        if (!$conn) {
            die("Brak połączenia z bazą");
        }
        if (!empty($_POST['login']) && !empty($_POST['haslo']) && !empty($_POST['powtorzhaslo'])) {
            $login = $_POST['login'];
            $haslo = $_POST['haslo'];
            $powtorzhaslo = $_POST['powtorzhaslo'];
            //flaga sprawdzająca czy dodawać do bazy
            $blad = 0;
            //sprawdzenie loginu
            $zap = 'SELECT login FROM uzytkownicy';
            $wynik = mysqli_query($conn, $zap);
            while ($wiersz = mysqli_fetch_array($wynik)) {
                if ($wiersz['login'] == $login) {
                    echo "<p>login występuje w bazie danych, konto nie zostało dodane</p>";
                    $blad = 1;
                    break;
                }
            }
            //sprawdzenie hasla
            if ($haslo != $powtorzhaslo) {
                echo "<p>hasła nie są takie same, konto nie zostało dodane</p>";
                $blad = 1;
            }



            
            if ($blad == 0) {
                $hash = sha1($haslo);
                $zap = "INSERT INTO uzytkownicy (login, haslo) VALUES ('" . $login . "','" . $hash . "')";
                if (mysqli_query($conn, $zap) === TRUE) {
                    echo "<p>Konto zostało dodane</p>";
                }
            }
        } else {
            echo "<p>wypełnij wszystkie pola</p>";
        }
        mysqli_close($conn);
        ?>
    </div>
    <div class='prawy'>
        <h2>Zapraszamy wszystkich</h2>
        <ol>
            <li>właścicieli psów</li>
            <li>weterynarzy</li>
            <li>tych, co chcą kupić psa</li>
            <li>tych, co lubią psy</li>
        </ol>
        <a href="regulamin.html">Przeczytaj regulamin forum</a>
    </div>
    <div id='stopka'>Stronę wykonał: Paweł Jankowicz</div>
</body>

</html>
