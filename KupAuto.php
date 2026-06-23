<?php

$server = "localhost";
$user = "user";
$pass = "user";
$db = "kupauto";

?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Komis aut</title>
</head>
<body>

    <section class="banner"> 
        <h1><i>KupAuto!</i> Internetowy Komis Samochodowy</h1>
    </section>

    <section class="middle">

        <section class="block1">
            <?php 
            if(!($conn = mysqli_connect($server, $user, $pass, $db))){
            echo "<h1>Błąd</h1>";                     
            } else {
        $sql = "SELECT samochody.cena, samochody.model, samochody.rocznik, samochody.przebieg, samochody.paliwo, samochody.cena, samochody.zdjecie FROM samochody WHERE samochody.id = 10";
        $res = mysqli_query($conn, $sql);
        foreach ($res as $item) { 
        echo "<img class='block1img' src='". $item['zdjecie'] ."'>";
        echo "<h4>Oferta Dnia: Toyota ".$item['model']." </h4> ";
        echo "<p>Rocznik: ".$item['rocznik']." przebieg: ".$item['przebieg']." rodjaz paliwa: ".$item['paliwo']."</p>";
        echo "<h4>Cena: ".$item['cena']."</h4>";   

        }

    }
            ?>
       
        </section>

        <section class="block2">
            <h2>Oferty Wyróznione</h2>
            <section class="block2offers">
            <?php
            $sql2 = "SELECT marki.nazwa, samochody.model, samochody.rocznik, samochody.cena, samochody.zdjecie FROM marki INNER JOIN samochody ON marki.id = samochody.id WHERE samochody.wyrozniony = 1"; 
            $res2 = mysqli_query($conn, $sql2);
            foreach ($res2 as $item2) {
            echo "<section class='offer'>";
            echo "<img src='". $item2['zdjecie'] ."'>";
            echo "<h4>" .$item2['nazwa']. " " .$item2['model']. "</h4>";
            echo "<p>Rocznik: ".$item2['rocznik']."</p>";             
            echo "<h4>Cena: ".$item2['cena']."</h4>";
            echo "</section>";
            }
            
            
            
            
            ?>
            </section>
        </section>

        <section class="block3">    
        <form action="kupauto.php" method="post">
             <h2>Wybierz markę</h2>
            <?php 
            
            $sql3 = "SELECT marki.nazwa FROM marki";
            $res3 = mysqli_query($conn, $sql3);
            
            echo "<select id='mark' name='mark'>";
            foreach ($res3 as $item3) {
                    
            echo "<option>".$item3['nazwa']."</option>";

            }
            
            ?>
           
        <input type="submit" value="Wyszukaj" name="submit">

        </form> 

        <section class="block3offers">
            <?php

            If (isset($_POST['submit'])){
            $sql4 = "SELECT marki.nazwa, samochody.model, samochody.cena, 
            samochody.zdjecie 
            FROM samochody 
            INNER JOIN marki ON samochody.marki_id = marki.id 
            WHERE marki.nazwa ='".$_POST['mark']."';";
            $res4 = mysqli_query($conn, $sql4);
            foreach ($res4 as $item4) {
            echo "<section class='offer2'>";
            echo "<img src='". $item4['zdjecie'] ."'>";
            echo "<h4>" .$item4['nazwa']. " " .$item4['model']. "</h4>";            
            echo "<h4>Cena: ".$item4['cena']."</h4>";
            echo "</section>";

            }
            }
            ?>

        </section>

        </section>
        
    </section>
   
    <section class="bottom">
        <p>Stronę wykonał: Oleksii Kursieiev</p>
        <p><a href="http://firmy.pl/komis">Znajdż na także</a></p>
    </section>


</body>
</html>