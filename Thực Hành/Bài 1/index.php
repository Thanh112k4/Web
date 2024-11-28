<?php include 'data.php';
$flowers = isset($_SESSION['flowers']) ? $_SESSION['flowers'] : [];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách các loại hoa</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
        color: #333;
    }

    .flower_container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        max-width: 1200px;
        margin: 20px auto;
        padding: 20px;
        background: white;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .flower_item img {
        width: 100%;
        height: 80%;
        object-fit: cover;
    }
</style>

<body>
    <h1>Danh sách các loại hoa</h1>
    <div class="flower_container">
        <?php foreach ($flowers as $flower): ?>
            <div class="flower_item">
                <h2><?php echo $flower['name']; ?></h2>
                <p><?php echo $flower['description'] ?></p>
                <img src="<?php echo $flower['image']; ?>" alt="<?php echo $flower['name'] ?>">
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>