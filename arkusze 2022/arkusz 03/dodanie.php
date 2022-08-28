<?php
    $polaczenie = mysqli_connect("localhost","root","","03styczen2022");


    if(!empty($_POST['karetkanr']) && !empty($_POST['rat1']) && !empty($_POST['rat2']) && !empty($_POST['rat3'])) {

        $numer = $_POST['karetkanr'];
        $rat1 = $_POST['rat1'];
        $rat2 = $_POST['rat2'];
        $rat3 = $_POST['rat3'];

        $kw1 = "INSERT INTO ratownicy (id, nrKaretki, ratownik1, ratownik2, ratownik3) VALUES (NULL, '$numer', '$rat1', '$rat2', '$rat3')";
        $zapytanie1 = mysqli_query($polaczenie, $kw1);
        echo "Do bazy zostało wysłane zapytanie: ".$kw1;

    }



mysqli_close($polaczenie);
?>