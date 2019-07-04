<!-- COPYRIGHT BY CAGLA SIMSEK www.github.com/caglasim-->
<!DOCTYPE html>
<html lang="de">
  <head>
    <title>Akronym Generator</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300, 400,700" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">
<body>
<h1>Akronym-Generator</h1>
<header>
      <h2>Was verrät dein Name über deine wahre Persönlichkeit?</h2>
</header>

            <div class="wrap">
            <p>Tippe deinen Namen ein und klicke anschließend auf den "Senden"-Button. Erfahre welche Eigenschaften sich hinter deinem Namen verbergen.</p>
              <form method="POST" action="#">
                <div class="form-group">
                  <input type="text" name="name" class="form-control" placeholder="Trage deinen Namen ein und klicke auf Senden">
                  <input type="submit" name="submit" class="form-control">
                </div>
              </form>

<?php 
        include("config.php");

        //eine neue Tabelle erzeugen
        //mit create new table mit 3 Spalten id, buchstabe und wort

        $sql_newTable = "CREATE TABLE newAkronym (
            id INT(2) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            buchstabe VARCHAR(1) NOT NULL,
            wort VARCHAR(30) NOT NULL
            )";

        if ($mysqli->query($sql_newTable) === TRUE) {
            ////in der nächsten Zeile kann // entfernt werden, um die Verbindung zu testen
            // echo "Table newAkronym created successfully";
        } else {
            ////in der nächsten Zeile kann // entfernt werden, um die Verbindung zu testen
            // echo "Error creating table: " . $mysqli->error;
        }
        $mysqli->close();


        $mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
        //hier den Datensatz einpflegen
        
        $sql_data = "INSERT INTO demo.newAkronym (id, buchstabe, wort) VALUES
            ('1', 'A', 'argumentativ'),
            ('2', 'B', 'belesen'),
            ('3', 'C', 'charmant'),
            ('4', 'D', 'direkt'),
            ('5', 'E', 'elegant'),
            ('6', 'F', 'fabelhaft'),
            ('7', 'G', 'gutmütig'),
            ('8', 'H', 'herzlich'),
            ('9', 'I', 'impulsiv'),
            ('10', 'J', 'jung'),
            ('11', 'K', 'kreativ'),
            ('12', 'L', 'liebenswert'),
            ('13', 'M', 'modern'),
            ('14', 'N', 'nachtragend'),
            ('15', 'O', 'organisiert'),
            ('16', 'P', 'perfekt'),
            ('17', 'Q', 'qualifiziert'),
            ('18', 'R', 'redegewandt'),
            ('19', 'S', 'sensibel'),
            ('20', 'T', 'theatralisch'),
            ('21', 'U', 'ultrahübsch'),
            ('22', 'V', 'vielfältig'),
            ('23', 'W', 'witzig'),
            ('24', 'X', 'x-beliebig'),
            ('25', 'Y', 'y-förmig'),
            ('26', 'Z', 'zart')";

if ($mysqli->query($sql_data) === TRUE) {
    ////in der nächsten Zeile kann // entfernt werden, um die Verbindung zu testen
    // echo "New record created successfully";
} else {
    ////in der nächsten Zeile kann // entfernt werden, um die Verbindung zu testen
    // echo "Error: " . $mysqli->error;
}

$mysqli->close();

        
        if(isset($_POST["submit"]))
        {
        $name = $_POST["name"];
        echo "<p>".$name."</p>";
        }

        //Den Namen in Buchstaben ersetzen:        
        //Jeden Buchstaben in ein Index einschreiben
        $arr= str_split($name,1);
        $mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
        for($i=0; $i < count($arr); $i++) {

            $buchstabe=print_r($arr[$i],true);
            //Hier die Abfrage
            $abfrage = "SELECT wort FROM demo.newAkronym WHERE buchstabe='".$arr[$i]."';";

            $result = mysqli_query($mysqli, $abfrage);
            $resultChek = mysqli_num_rows($result);
            if($resultChek>0){
                while($row = mysqli_fetch_assoc($result)){
                    echo $row['wort'].', ';
                }
            }

            else{
                echo "Keine Daten gefunden";
            }

          
        }

    ?>
</body>   
</html>