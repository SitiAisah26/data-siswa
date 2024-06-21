<?php 
session_start();
$buttonPrint = null;
$buttonHapus = null;

if(isset($_POST["btn"])) {
    $nama = $_POST["nama"];
    $nis = $_POST["nis"];
    $rayon = $_POST["rayon"];
    $dataAwal = false;


    if(isset($_SESSION["data_siswa"])) {
        foreach($_SESSION["data_siswa"] as $data) {
            if($data["nis"] == $nis) {
                $dataAwal == true;
                break;
            }
        }
    }
    if($dataAwal) {
        echo "<h1>Data sudah ada</h1>";
    }else {
        $_SESSION["data_siswa"] [] = [
            "nama" => $nama,
            "nis" => $nis,
            "rayon" => $rayon
            
        ];
    }
}


if(isset($_SESSION["data_siswa"]) && !empty($_SESSION['data_siswa'])) {
    $buttonPrint = '<a href="print.php">Print Data</a>';
    $buttonHapus = '<a href="hapusall.php">Hapus semuanya</a>';
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Halaman form</title>
</head>
<style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 18px;
            text-align: left;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
<body>


	<form action="" method="post">
		<label for="nama">Nama Siswa</label>
		<input type="text" name="nama" id="nama" required>

		<label for="nis">Nis Siswa</label>
		<input type="number" name="nis" id="nis" required>

		<label for="rayon">Rayon</label>
		<input type="text" name="rayon" id="rayon" required>

		<button type="submit" name="btn" id="btn">Input data</button>
	</form>

	<?=$buttonHapus ?>
	<?=$buttonPrint ?>
	
	<table>
    <tr>
		<th>No</th>
        <th>Nama</th>
        <th>Nis</th>
        <th>Rayon</th>
		<th>Aksi</th>
    </tr>
		<?php $i =1;?>
	<?php if(isset($_SESSION["data_siswa"]) && is_array($_SESSION["data_siswa"]) ):?>
	<?php foreach($_SESSION["data_siswa"] as $key => $item) :?>
    <tr> 
		<td><?= $i++ ;?></td>
        <td><?= htmlspecialchars($item["nama"]);?></td>
        <td><?= htmlspecialchars($item["nis"])?></td>
        <td><?= htmlspecialchars($item["rayon"]);?></td>
		<td><a href="hapus.php?id=<?= $key ;?>">Hapus</a>
			<a href="detail.php?id=<?= $key ;?>">Detail</a>
			<a href="edit.php?id=<?= $key ;?>">Edit</a>
		</td>

    </tr>
	<?php endforeach;?>
	<?php endif;?>
</table>
</body>
</html>