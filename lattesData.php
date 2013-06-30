<?php
	require_once('lattesUtil.php');
	$link_lattes="http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=";

	error_reporting(E_ALL | E_ERROR );
	ini_set('default_charset','UTF-8');
if(isset($_POST['data'])){
	$link_lattes=$link_lattes.$_POST['data'];
	$html=lattesUtil::carregaLattes($link_lattes);
	$txtInf = lattesUtil::textoInformadoAutor($html);
	$nivel=explode('- ', $txtInf);
	$nivel=$nivel[1];

	//echo $link_lattes.','.$txtInf.','.$nivel;
}

if(isset($_POST['idData'])){
	$links_lattes=$_POST['idData'];
	$links_lattes=explode(',', $links_lattes);
	foreach ($links_lattes as  $id) {
		$link=$link_lattes.$id;
		$html=lattesUtil::carregaLattes($link);
		$txtInf = lattesUtil::textoInformadoAutor($html);
		$nivel=explode('- ', $txtInf);
		$nivel=$nivel[1];

		echo $link_lattes.''.$id.','.$txtInf.','.$nivel."#";
	}
} 
?>