<?php
ob_start();
echo "<h1>Edit  de produit</h1>";
require_once "config/connexion.php";
if(isset($_GET['id'])){
    $id=$_GET['id'];
}

$sql = "select * from produit where id=$id ";
$res = $connexion->query($sql);

if ($res) {
    $liste=$res->fetchAll(PDO::FETCH_OBJ);
    foreach ($liste as $enregistrement){
echo"

<form  method='post'>
    <input type='text' name='id'  value='$enregistrement->id'>
    <br><br><br>
    <input type='text' name='libelle' value=' $enregistrement->libelle'>
    <br><br><br>
    <input type='text' name='prix' value=' $enregistrement->prix'>
    <br><br><br>
    <input type='text' name='qte'  value=' $enregistrement->qte'>
    <br><br><br>
    <input type='text' name='promo' value=' $enregistrement->promo'>
    <br><br><br>
    <input type='text' name='description' value=' $enregistrement->description'>
    <br><br><br>
    <input type='text' name='image' value=' $enregistrement->image'>
    <br><br><br>
    <input type='submit' value='EDITER' name='btn'>
</form>";
    }}

if(isset($_POST["btn"])){
    $id = $_POST["id"];
    $lib = $_POST["libelle"];
    $prx = $_POST["prix"];
    $qte = $_POST["qte"];
    $prm = $_POST["promo"];
    $desc = $_POST['description'];
    $img = $_POST['image'];

    $sql = "UPDATE produit SET id=$id , libelle='$lib',  prix=$prx,  qte=$qte, image='$img',description='$desc', promo=$prm WHERE id=$id";
    $res = $connexion->exec($sql);
    if ($res) {
        header("location:produits.php?etat=2");
        exit;
    }


}



$contenu = ob_get_clean();
include "layout.php";
