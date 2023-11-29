<?php
ob_start();
echo '<h1>Ajout de produit</h1>';
require_once 'config/connexion.php';

echo "<form method='post'>
id<input type='text'  name='id' ><br><br><br>
Libelle<input type='text' name='libelle' ><br><br><br>

 
Prix<input type='text'  name='prix' ><br><br><br>

 
Quantite<input type='text'  name='qte' ><br><br><br>
 Description<input type='text'  name='description' ><br><br><br>

 
image<input type='text'  name='image' ><br><br><br>

En Promo<input type='text'  name='promo'>
<br><br><br>

<input type='submit' value='Ajouter' name='btn'>
</form>";
if(isset($_POST["btn"])){
$id = $_POST['id'];
$lib = $_POST['libelle'];
$prx = $_POST['prix'];
$qte = $_POST['qte'];
$desc = $_POST['description'];
$img = $_POST['image'];
$prm = $_POST['promo'];

$sql = " insert into  produit values  ($id, '$lib', $prx, $qte, '$desc', '$img',$prm)";
$res = $connexion->exec($sql);

    header('location:produits.php?etat=3');

}


$contenu = ob_get_clean();
include 'layout.php';
