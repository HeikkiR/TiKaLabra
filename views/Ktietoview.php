<!DOCTYPE html>

<font color="red"><?php echo $ilmoitusteksti;?></font> <br> <br>

<?php
echo "Käyttäjänimi: ".$ktunnus.'<br> <br>';
?>
<form action="Kayttajatiedot.php" method="post">
    <p>Vanha salasana: </p>
    <input type="text" name="vanhasalasana">
    
    <p>Uusi salasana: </p>
    <input type="text" name="uusisalasana"><br><br>
    
    <input type="submit" name="submit" value="Muuta salasanaa"> 