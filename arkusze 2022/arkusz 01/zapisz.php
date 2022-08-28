<?php
$polaczenie = mysqli_connect("localhost","root","","01styczen2022");





if(!empty($_POST['imie']) && !empty($_POST['nazwisko']) && !empty($_POST['adres'])) {

    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $adres = $_POST['adres'];
    $kw1 = "INSERT INTO karty_wedkarskie (id, imie, nazwisko, adres, data_zezwolenia, punkty) VALUES (NULL, '$imie', '$nazwisko', '$adres', NULL, NULL)";
    $zapytanie1 = mysqli_query($polaczenie, $kw1);
    echo "Dodano rekord do bazy";
}
else {

echo "Wypełnij formularz poprawnie";
}

mysqli_close($polaczenie);
?>