<?php

session_start();
if(isset($_GET["id"])) {
    $id = $_GET["id"];
    $value = null;
    foreach($_SESSION["data_siswa"] as $key => $data){
        if($key == $id);
        {
            $value = $data;
        }
    }

    if($value == null){
        header("Location: index.php");
    }

}
if(isset($_POST["btn"])) {
    $nama = $_POST["nama"];
    $nis = $_POST["nis"];
    $rayon = $_POST["rayon"];

    $_SESSION["data_siswa"][$id] = [
        "nama" => $nama,
        "nis" => $nis,
        "rayon" => $rayon
    ];

    header("Location: index.php");
    exit;

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=h1, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
        <label for="nama">Nama Siswa</label>
        <input type="text" name="nama" id="nama" value="<?= $value["nama"];?>" required>
        <label for="nis">NIS Siswa</label>
        <input type="number" name="nis" id="nis" value="<?= $value["nis"];?>" required>
        <label for="rayon">Rayon</label>
        <input type="text" name="rayon" id="rayon" value="<?= $value["rayon"];?>" required>
        <button type="submit" name="btn" id="btn">Ubah Data</button>
</form>
<a href="index.php">Back</a>
</body>
</html>
 
