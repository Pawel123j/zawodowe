<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Portal społecznościowy</title>
</head>
<body>
    
<header>
<section id="lewy"><h2>Nasze osiedle</h2></section>
<section id="prawy">

<?php

$polaczenie = mysqli_connect("localhost","root","","05styczen2022");

$zapytanie2 = mysqli_query($polaczenie, "SELECT COUNT(*) FROM dane");
$wynik = mysqli_fetch_row($zapytanie2);
echo "<h5>Liczba uzytkowników portalu: ".$wynik[0]."</h5>";


?>
</section>
</header>

<main>
<section id="lewy1">

<h3>Logowanie</h3>

<form action="uzytkownicy.php" method="post">

login </br> <input type="text" name="login"></br>
haslo </br> <input type="password" name="password"></br>
<button type="submit">Zaloguj</button>

</form>

</section>
<section id="prawy1">


<h3>Wizytówka</h3>

<?php
 if(!empty($_POST['login']) && !empty($_POST['password'])) {

    $login = $_POST['login'];
    $password = $_POST['password'];

    $kw1 = "SELECT haslo FROM uzytkownicy WHERE login ='$login';";
    $zapytanie1 = mysqli_query($polaczenie,$kw1);
    
   if(mysqli_num_rows($zapytanie1)==0){

    echo "login nie istnieje";
   }
   else {
    $wynik = mysqli_fetch_assoc($zapytanie1);
    $szyfr = sha1($password);

        if($szyfr == $wynik['haslo'] ){

            $kw3 = "SELECT uzytkownicy.login, dane.rok_urodz, dane.przyjaciol, dane.hobby, dane.zdjecie FROM uzytkownicy JOIN dane ON uzytkownicy.id = dane.id WHERE uzytkownicy.login = '$login';";
            $zapytanie3 = mysqli_query($polaczenie, $kw3);
            $data = date('Y');
            while($wizyt = mysqli_fetch_row($zapytanie3)){

                $wiek = $data - $wizyt[1];
                echo '<section class="blokwizytowka">';
                echo "<img src='$wizyt[4]' alt='osoba'>";
                echo "<h4>".$wizyt[0]." (".$wiek.")"."</h4>";
                echo "<p>hobby: $wizyt[3]</p>";
                echo "<h1><img src='icon-on.png'> $wizyt[2]</h1>";
                echo "<a href='dane.html'><button class='przycisk'>Więcej informacji</button></a>";
                echo '</section>';

            }

        }
        else {
            echo "hasło nieprawidłowe";
        }





   }

}

mysqli_close($polaczenie);
?>
</section>
</main>



<footer>Stronę wykonał: Paweł Jankowicz</footer>

</body>
</html>