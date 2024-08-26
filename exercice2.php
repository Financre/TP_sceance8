
<!-- Exercice 2 : Calculateur de Paires Uniques
 Créez un script PHP qui récupère une série de nombres via un formulaire
 et affiche toutes les paires uniques de nombres dont la somme est égale
 à un nombre donné.
 Créez un formulaire permettant à l'utilisateur de saisir plusieurs nombres
 sous forme de tableau.
 Récupérez ces nombres et demandez à l'utilisateur de saisir un nombre
 cible.
 Affichez toutes les paires de nombres dont la somme est égale au
 nombre cible. Assurez-vous qu'aucune paire ne soit répétée -->




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculateur de paire Unique</title>
</head>
<body>
<form method="post" action="">
        <label for="numbers">Entrez des nombres séparés par des virgules :</label><br>
        <input type="text" name="numbers" id="numbers" required><br>
        <label for="target">Entrez le nombre cible :</label><br>
        <input type="number" name="target" id="target" required><br>
        <input type="submit" value="soumettre">
    </form>
</body>
</html>

<?php
//initialisons les variables
$numbers=[];
$target='';
$error='';
$result= '';

if($_SERVER["REQUEST_METHOD"]== "POST"){
    //récupérons les variables
    $numbers=explode(',',$_POST['numbers']);
    $target=$_POST['target'];
    //vérifions si les entrées sont justes et validons si c'est le cas
    foreach($numbers as $number){
        if(!is_numeric($number)){
            $error= "Veuillez vous assurer que ce champ ne contienne que des nombres";
            break;
        }
    }
    if(empty($error)){
        $pairs= [];
        $numbers=array_map('trim',$numbers);
        $numbers=array_unique($numbers);
        $numbers=array_map('intval',$numbers);//intvall permet de convertir les nombres récupérer en entier
        $nbre_count=count($numbers);
        if($nbre_count>=3){
            for($i=0;$i< $nbre_count;$i++){
                for($j=$i+1;$j< $nbre_count;$j++){
                    if($numbers[$i] + $numbers[$j] == $target){
                        $pairs[]=[$numbers[$i],$numbers[$j]];
                    }
                }
            }


        }else{
            echo 'veuillez entrer au minimum 3 nombres';
        }
       
    }
    if(!empty($pairs)){
        foreach($pairs as $pair){
             echo 'Les nombres pairs de'.$target. 'Sont:'.$pair[0]. 'et'.$pair[1];

        }
       
    }else{
        echo "Aucun pair n'a été trouvé";
    }
}
    


?>
