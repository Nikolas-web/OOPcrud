<?php  

include('../crud.php');

$crud = new Crud();
if($_POST['action'] == 'simpan') {
    $arrData = array('kode_buku'=>$_POST['kode_buku'],
    'nama_buku'=>$_POST['nama_buku'],
    'category'=>$_POST['category'],
    'deskripsi'=>$_POST['deskripsi'],
    'gambar'=>$_POST['gambar']);
$hasil = $crud->simpan('databuku', $arrData);
}
else
{
    $arrData = array("nama_buku='" .$_POST['nama_buku']. "'",
                     "category='" .$_POST['category']. "'",
                     "deskripsi='" .$_POST['deskripsi']. "'",
                     "gambar='" .$_POST['gambar']. "'",);
    $idvalue = $_POST['kode_buku'];
$hasil = $crud->update('databuku', $arrData, 'kode_buku', $idvalue);
}

if($hasil)
{
	header('Location : data_buku.php');
}
else
{
	echo "Gagal Simpan!";
}

?>