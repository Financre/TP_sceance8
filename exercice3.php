
<!-- Exercice 3 : Système de Tri Personnalisé
 Créez un script PHP qui trie une liste d'éléments selon différents critères
 définis par l'utilisateur.
 Créez un formulaire permettant de saisir une liste d'éléments et de
 sélectionner un critère de tri : croissant, décroissant, tri par longueur, etc.
 Après soumission, affichez la liste triée selon le critère choisi.
 NB: Implémentation des Algorithmes de Tri
 Implémentez manuellement un algorithme de tri par sélection, puis
 utilisez-le pour trier les éléments.
 Comparez le tri par sélection à l'algorithme de tri PHP natif (sort()) en
 termes de performance (par exemple, en utilisant microtime() pour
 mesurer le temps d'exécution) -->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Système de Tri Personnalisé</title>
</head>
<body>
    <form method="post" action="">
        <label for="elements">Entrez les éléments (séparés par des virgules) :</label><br>
        <input type="text" id="elements" name="elements" required><br><br>
        <label for="critere">Choisissez un critère de tri :</label><br>
        <select id="critere" name="critere">
            <option value="croissant">Croissant</option>
            <option value="decroissant">Décroissant</option>
            <option value="longueur">Par longueur</option>
        </select><br><br>
        <input type="submit" value="Trier">
    </form>
</body>
</html>

<?php
//initialisation des variables
$error='';
$critere='';

$elements=explode(',', $_POST['elements']);
if($_SERVER["REQUEST_METHOD"] =="POST"){
    if(empty(['elements'] || empty(['critere']))){
        $error= "veuillez remplir tous les champs";
    }else{
        foreach($elements as $element){
            if(is_numeric($element)){
                
            }
        }
       


    }

}










?>