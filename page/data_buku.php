<?php
include('../crud.php');

$crud = new Crud;
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
</head>
<body>

<?php
     if(isset($_GET['id']))
     {
        $id = $_GET['id'];

        $update = $crud->read_data('databuku', 'kode_buku', $id);
        foreach ($update as $upd) {
            $kode_buku = $upd['kode_buku'];
            $nama_buku = $upd['nama_buku'];
            $category = $upd['category'];
            $deskripsi = $upd['deskripsi'];
            $gambar = $upd['gambar'];
            $readonly = 'readonly';
            $action = 'update';
        }
     }
     else
     {
        $kode_buku = '';
        $nama_buku = '';
        $category = '';
        $deskripsi = '';
        $gambar = '';
        $readonly = '';
        $action = 'simpan';
     }
?>

<h1>Tambah Barang Penjualan</h1>
    <form action="simpan_databuku.php" method="post">
    <table>
        <tr>
            <td>Kode Buku</td>
            <td> : </td>
            <td> <input type="number" name="kode_buku" value="<?php echo $readonly; ?>"></td>
        </tr>
        <tr>
            <td>Nama Buku</td>
            <td> : </td>
            <td> <input type="text" name="nama_buku"  value="<?php echo $nama_buku; ?>"></td>
        </tr>
        <tr>
            <td>Category</td>
            <td> : </td>
            <td> <input type="text" name="category"  value="<?php echo $category; ?>"></td>
        </tr>
        <tr>
            <td>Deskripsi</td>
            <td> : </td>
            <td> <input type="text" name="deskripsi"  value="<?php echo $deskripsi; ?>"></td>
        </tr>
        <tr>
            <td>Gambar</td>
            <td> : </td>
            <td> <input type="file" name="gambar"  value="<?php echo $gambar; ?>"></td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td>
                <input type="submit" name="simpan" value="Simpan">
                <input type="reset" value="Reset">
                <input type="hidden" name="action" value=" <?php echo $action; ?> ">
            </td>
        </tr>
    </table>
    </form>
    <div id="container">
    <table border="1" cellspacing="0" cellpadding="8">
        <tr>
            <th>No</th>
            <th>Kode Buku</th>
            <th>Nama Buku</th>
            <th>Category</th>
            <th>Deskripsi</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>

        <form action="" method="post">
        <input type="text" name="keyword" size="40" autofocus placeholder="Search..." autocomplete="off" id="keyword">
        <button type="submit" name="cari" id="tombol-cari">Cari!</button>

        <img src="img/loader.gif" class="loader">

    </form>

<form action="" method="get">
	<ul>
		<li>
			<label for="category">Category Buku : </label>
            <input type="text" name="category" id="category">
		</li>
        <li>
			<button type="submit" name="filtercategory">Filter!</button>
		</li>
	</ul>
</form>



        <?php
        
        $databuku = $crud->read_data('databuku',null,null);
        $no = 1;

        foreach ($databuku as $dbs) {
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $dbs['kode_buku']; ?></td>
                <td><?php echo $dbs['nama_buku']; ?></td>
                <td><?php echo $dbs['category']; ?></td>
                <td><?php echo $dbs['deskripsi']; ?></td>
                <td><img src="img/<?= $row["gambar"];?>" width="50"></td>
                <td>
                    <a href="data_buku.php?id=<?php echo $dbs['kode_buku']; ?>">Edit</a>
                    |
                    <a href="hapus_buku.php?id=<?php echo $dbs['kode_buku']; ?>">Hapus</a>
                </td>
            </tr>
        <?php } ?>
        
    </table>
</body>
</html>