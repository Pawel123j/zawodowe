<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Wycieczki i urlopy</title>
    <link rel="stylesheet" href="Styl3.css">
</head>
<body>
    <div id="baner">
        <h1>BIÓRO PODRÓŻY</h1>
    </div>
    <div id="lewy">
        <h2>KONTAKT</h2>
        <a href="mailto: biuro@wycieczki.pl">napisz do nas </a>
        <p>telefon: 555666777</p>
    </div>
    <div id="srodkowy">
        <h2>GALERIA</h2>
        <?php
            $polonczenie=mysqli_connect("localhost","root","","egzamin3");
            $zapytanie=mysqli_query($polonczenie,'select nazwaPliku , podpis FROM zdjecia ORDER BY podpis asc');
            while ($r = mysqli_fetch_array($zapytanie))
            {
     
                    echo '<img src="'.$r[0].'"'.'alt"'.$r[1].'">';
                
            }
            mysqli_close($polonczenie);
        ?>
    </div>
    <div id="prawy">
        <h2>PROMOCJE</h2>
        <table border="0">
            <tr>
                <th>Jesień</th>
                <th>Grupa 4+</th>
                <th>Grupa 10+</th>
            </tr>
            <tr>
                <td>5%</td>
                <td>10%</td>
                <td>15%</td>
            </tr>
        </table>
    </div>
    <div id="dane">
        <h2>LISTA WYCIECZEK</h2>
        <?php
            $polonczenie=mysqli_connect("localhost","root","","egzamin3");
            $zapytanie=mysqli_query($polonczenie,'SELECT id , dataWyjazdu , cel , cena FROM wycieczki WHERE dostepna !=0');
            while ($r = mysqli_fetch_array($zapytanie))
            {
                echo $r[0].". ".$r[1].", ".$r[2].", cena: ".$r[3]."<br>";
            }
            mysqli_close($polonczenie);
        ?>
    </div>
    <div id="stopka">
        <p>Stron wykonał: Paweł Jankowicz</p>
    </div>
</body>
</html>