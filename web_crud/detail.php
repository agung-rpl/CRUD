<?php

include 'db.php';

if(isset($_GET['detail'])){

    $id = $_GET['detail'];

    $query = "SELECT * FROM student WHERE id = $id";

    $result = mysqli_query($conn,$query);

    if(mysqli_num_rows($result) > 0){

        $row = mysqli_fetch_assoc($result);

        $name  = $row['name'];
        $email = $row['email'];
        $phone = $row['phone'];
        $image = $row['image'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Siswa</title>
</head>
<body>

<div class="container">
    <div class="jumbotron text-center">
        <h2>DETAIL SISWA</h2>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4">
            <img src="<?= "images/".$image?>" alt="<?= $name ?>" class="thumbnail" width="100%" height="auto">
        </div>
        <div class="col-md-8">
            <h3>Nama : <?= $name ?></h3>
            <h3>Email : <?= $email ?></h3>
            <h3>No. Telepon : <?= $phone ?></h3>
        </div>
    </div>
    <br>
    <p>
        <a href="index.php" class="btn btn-primary"><i class='fas fa-arrow-left'></i> Kembali ke Daftar Siswa</a>
    </p>
</div>

</body>
</html>

<?php

    } else {
        echo "Data tidak ditemukan.";
    }

}

?>
