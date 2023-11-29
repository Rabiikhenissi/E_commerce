<?php
ob_start();
echo "<h1>Details de produit</h1>";
require_once "config/connexion.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$sql = "select * from produit where id=$id ";
$res = $connexion->query($sql);
if ($res) {
    $liste=$res->fetchAll(PDO::FETCH_OBJ);
    foreach ($liste as $enregistrement){
    echo "<table class='table'>
        <tr class='table-success'>
            <th>Identifiant</th>
            <th>Libellé</th>
            <th>Prix (DT)</th>
            <th>Quantité </th>
            <th>En Promo</th></tr>";
            echo "<tr>";
echo  "<td>". $enregistrement->id  ."</td>";
echo  "<td>". $enregistrement->libelle  ."</td>";
    echo  "<td>". $enregistrement->prix  ."</td>";
     echo  "<td>". $enregistrement->qte ."</td>";
echo  "<td>". $enregistrement->promo     ."</td>";
    
echo "</tr></table>";
echo "<h2>Description</h2>";
echo  $enregistrement->description;
echo "<h2>Image</h2>";
echo "<img src='".$enregistrement->image ."'>" ;

}}



$contenu = ob_get_clean();
include "layout.php";
