<?php
	require_once '../../classes/houseDAO.class.php';

	$idImovel = $_GET['idImovel'];
    $idEndereco = $_GET['idEndereco'];
    $idLocador = $_GET['idLocador'];
	$idUsuario = $_GET['idUsuario'];

	$house = new houseDAO();
	$house->remove($idImovel, $idEndereco);

	header("Location: ../../pages/locator/locator.php?idLocador=$idLocador&idUsuario=$idUsuario");
?>