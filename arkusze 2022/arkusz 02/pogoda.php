<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Prognoza pogody Wrocław</title>
</head>
<body>
    
<header>
<section id="lewy"><img src="logo.png" alt="meteo"></section>
<section id="srodkowy"><h1>Prognoza dla Wrocławia</h1></section>
<section id="prawy"><p>maj, 2019 r.</p></section>
</header>

<main>

<table>

<tr>
<th>DATA</th>
<th>TEMPERATURA W NOWY</th>
<th>TEMPERATURA W DZIEŃ</th>
<th>OPADY [mm/h]</th>
<th>CIŚNIENIE [hPa]</th>

</tr>


<?php
$polaczenie = mysqli_connect("localhost","root","","02styczen2022");
$kw1 = "SELECT * FROM pogoda WHERE miasta_id = 1 ORDER BY data_prognozy ASC";
$zapytanie1 = mysqli_query($polaczenie, $kw1);


while($r = mysqli_fetch_assoc($zapytanie1)){

    echo "<tr>";
    echo "<td>".$r['data_prognozy']."</td>";
    echo "<td>".$r['temperatura_noc']."</td>";
    echo "<td>".$r['temperatura_dzien']."</td>";
    echo "<td>".$r['opady']."</td>";
    echo "<td>".$r['cisnienie']."</td>";
    echo "</tr>";

}


mysqli_close($polaczenie);
?>

</table>


</main>



<section id="kontener">
<section id="left"><img src="obraz.jpg" alt="Polska, Wrocław"></section>
<section id="right"><a href="kwerendy.txt">Pobierz kwerendy</a></section>
</section>

<footer><p>Stronę wykonał: Paweł Jankowicz</p></footer>

</body>
</html>