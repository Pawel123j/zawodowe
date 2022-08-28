<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Forum o psach</title>
</head>
<body>
    

<header><h1>Forum wielbicieli psów</h1></header>

<section id="lewy">
        
    <img src="obraz.jpg" alt="foksterier">

</section>



<section id="kontenerprawy">

        <section id="prawy">

            <h2>Zapisz się</h2>
            <form action="logowanie.php" method="post">

            login: <input type="text" name="login"> </br>
            hasło: <input type="password" name="password" ></br>
            powtórz hasło: <input type="password" name="repeat"></br>
            <button type="submit">Zapisz</button>

            </form>
            <?php

            $polaczenie = mysqli_connect("localhost","root","","04styczen2022");

            if(!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['repeat'])){

                        $login = $_POST['login'];
                        $password = $_POST['password'];
                        $repeat = $_POST['repeat'];

                        $kw3 = "SELECT login FROM uzytkownicy";
                        $zapytanie1 = mysqli_query($polaczenie, $kw3);
                        $blad = 0;
                while($r = mysqli_fetch_assoc($zapytanie1)){

                    if($r['login'] == $login){

                        echo "<p>Login występuje w bazie, konto nie zostało dodane</p>";
                        $blad = 1;
                        break;
                    }


                }

                if($password != $repeat) {

                    echo "<p>hasła nie są takie same, konto nie zostało dodane</p>";
                    $blad = 1;
                }


                if($blad == 0) {

                    $szyfr = sha1($password);
                    $kw2 = "INSERT INTO uzytkownicy (id, login, haslo) VALUES (NULL, '$login', '$szyfr')";

                    if(mysqli_query($polaczenie, $kw2) == TRUE ) {

                        echo "<p>Konto zostało dodane</p>";
                    }
                }


            }

            else {

                echo "<p>Wypełnij wszystkie pola</p>";
            }


            mysqli_close($polaczenie);
            ?>
        </section>


        <section id="prawy2">

            <h2>Zapraszamy wszystkich</h2>
            <ol>

            <li>właścicieli psów</li>
            <li>weterynarzy</li>
            <li>tych, co chcą kupić psa</li>
            <li>tych, co lubią psy</li>
            </ol>

            <a href="regulamin.html">Przeczytaj regulamin forum</a>
        </section>

</section>



<footer>Stronę wykonał: Paweł Jankowicz</footer>


</body>
</html>