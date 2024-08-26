
<!-- Exercice 1 : Formulaire de Gestion des Notes
 Créez un formulaire où un professeur peut saisir les notes d'un étudiant.
 Le formulaire doit permettre d'entrer le nom de l'étudiant et ses notes
 (minimum 3).
 Après soumission, stockez les notes dans un tableau PHP.
 Calculer et afficher la moyenne, la note maximale et la note minimale le
 présentant sous forme d’un bulletin de notes.
 NB: Vous ne devez faire recours à une fonction PHP tels que min() max()
 ….pour calculer la note minimale, maximale ou la moyenne -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Formulaire HTML -->
<form method="POST" action="">
    <label for="name">Nom :</label>
    <input type="text" id="name" name="name"  >
    <br><br>
    
    <label for="note">Notes:</label>
    <input type="text" id="note" name="Notes"  >
    <br><br>
    
    
    <button type="submit">Envoyer</button>
</form>
</body>
</html>

<?php
// initialisation des variables
$name = '';
//$Noteboards = [];
$error = '';
$somme = 0;
$nbre_de_note = 0;
$moyenne = 0;
$note_max = null;
$note_min = null;
$result1= '';
$result2= '';
$verify= 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // récupérons les données du formulaire
    $name = $_POST['name'];
    $numbers= $_POST['Notes'];
    $Noteboards=array_map('intval', explode(',', $numbers));

    if (empty($name) || empty($numbers)) {
        $verify=1;
        $error = "Veuillez entrer tous les champs";
        echo "$error";
    } else {
        
        // En cas de succès
        $nbre_de_note = count($Noteboards);
        foreach ($Noteboards as $Noteboard) {
            if(is_numeric($Noteboard)){
                
                $somme += $Noteboard;
                
                //echo 
            }else{
                $verify=2;
                $error= "Veuillez vous assurer que tous les notes sont des nombres";
                echo "$error";
            }
        }
        
        if($verify== 0){ 

            if ($nbre_de_note > 0) {
                $moyenne = $somme / $nbre_de_note;

                // Initialisation max et min
                $note_max = $Noteboards[0];
                $note_min = $Noteboards[0];

                foreach ($Noteboards as $Noteboard) {
                    if ($Noteboard >= $note_max) {
                        $note_max = $Noteboard;
                        $result1 = $note_max;
                    }
                    if ($Noteboard <= $note_min) {
                        $note_min = $Noteboard;
                        $result2 = $note_min;
                    }
                } 
            
            } 
        
            echo "La moyenne des notes entrées est:" .$moyenne. '<br>' , "La note maximale est:".$result1. '<br>' , "La note minimale est:" .$result2; 
        }
    }

}
?>