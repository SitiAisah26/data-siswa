<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <table>
        <tr>
        <button type="button" name="btn" id="btn">Print</button>
    <tr>
        <th>Nama</th>
        <th>Nis</th>
        <th>Rayon</th>
		<th>Aksi</th>
    </tr>
	    <?php if(isset($_SESSION["data_siswa"]) && is_array($_SESSION["data_siswa"]) ):?>
	    <?php foreach($_SESSION["data_siswa"] as $key => $item) :?>
    <tr> 
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
    <script>
        document.getElementById('btn').addEventListener('click', function(){
            window.print();
        })
    </script>
      <a href="index.php">Back</a>
</body>
</html>