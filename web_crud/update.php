<?php
include 'db.php';
?>

<?php 

if(isset($_GET['update'])){
    
    
    $id = $_GET['update'];
    

$query = "SELECT * FROM student WHERE id = $id";

$result = mysqli_query($conn,$query);

if(mysqli_num_rows($result) > 0){
    
    while($row = mysqli_fetch_array($result)){
        
            $name  = $row['name'];
            $phone = $row['phone'];
            $email = $row['email'];
            $image = $row['image'];

        }
    }
}

if(isset($_POST['update'])){
    

    $name         = clean($_POST['name']);
    $phone        = clean($_POST['phone']);
    $email        = clean($_POST['email']);
    $image_name   = $_FILES['image']['name'];
    $image        = $_FILES['image']['tmp_name'];

    $location     = "images/".$image_name;

    move_uploaded_file($image, $location);

    $query  = "UPDATE student SET ";
    $query .= "name = '".escape($name)."', ";
    $query .= "phone = '".escape($phone)."', ";
    $query .= "email = '".escape($email)."', ";
    $query .= "image = '{$image_name}' ";
    $query .= "WHERE id = {$id} ";
    
    $result = mysqli_query($conn,$query);
    
    if($result){
        header('location:index.php');
        
    }
    else
    {
        die('error' . mysqli_error($conn));
    }
    
}

?>
<div class="container">
    <div class="jumbotron text-center">
        <h2>Update</h2>
    </div>
    <br>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" class="form-control" placeholder="Enter Name" value="<?php echo $name ?>">
    </div>
    <div class="form-group">
        <label for="name">Phone:</label>
        <input type="text" name="phone" class="form-control" placeholder="Enter phone" value="<?php echo $phone ?>">
    </div>
    <div class="form-group">
        <label for="name">Email:</label>
        <input type="text" name="email" class="form-control" placeholder="Enter email" value="<?php echo $email ?>">
    </div>
    <div class="form-group">
        <label for="name">Image:</label>
        <img src= "<?= "images/".$image?>" alt="" width="100px" height="100px" class="thumbnail">
        <input type="file" name="image" class="form-control" placeholder="Enter email" value="<?php echo $email ?>">
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-success" value="Update data" name="update">
        <a href="index.php" class="btn btn-secondary">Back</a>
    </div>
</form>

</div>
