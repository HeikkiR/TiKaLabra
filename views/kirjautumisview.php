<html>
<body>
    

<h1>Muistilista kirjautuminen</h1>
<br>
<?php
    if(isset($_GET['virhe'])) {
     if(($_GET['virhe']) === 'salasana') {
                echo 'tunnus tai salasana virheellinen';             
    } }
           ?>

<form action="index.php" method="post">
    <p>Käyttäjätunnus: </p>
    <input type="text" name="ktunnus">
    
    <p>Salasana: </p>
    <input type="text" name="salasana"><br><br>
    
    <input type="submit" name="submit" value="Kirjaudu"> 
<BR>
<BR>
<A HREF="http://hzrantal.users.cs.helsinki.fi/tika/rekiste.php"> Rekisteröidy tästä </A> 
</form>

</body>
</html> 