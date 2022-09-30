<?php

include('../crud.php');

$crud = new Crud();

if(isset($_GET['id']))
{
    $id = $_GET['id'];

    $hasil = $crud->delete('databuku', 'kode_buku', $id);
    if($hasil)
    {
        header('Location : data_buku.php');
    }
    else
    {
        echo "Gagal hapus!";
    }
}
?>