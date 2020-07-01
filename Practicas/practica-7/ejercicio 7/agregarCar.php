<?php
session_start();
extract($_REQUEST);
$carrito = mysqli_connect("localhost","root",'') or die("No pueden realizarse solicitudes en este momento");
mysqli_select_db($carrito,$compras);
if(!isset($cantidad)){$cantidad=1;} 
$qry=mysqli_query($link,"select * from catalogo where id='".$id."'");
$row=mysqli_fetch_array($qry); 

if(isset($_SESSION['carro']))
$carro=$_SESSION['carro']; 

$carro[md5($id)]=array('identificador'=>md5($id),'cantidad'=>$cantidad,'producto'=>$row['producto'],'precio'=>$row['precio'],'id'=>$id);
$_SESSION['carro']=$carro; 
header("Location:catalogo.php?".SID);
