<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <!-- Thêm Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Thêm icon -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <?php include('header.php'); ?>
    <?php include('main.php'); ?>
    <!-- Main content -->
    <div class="container my-4">
        <button class="btn btn-success mb-4">THÊM</button>

        <table class="table table-bordered text-center">
            <thead class="table-light">
                <tr>
                    <th>SẢN PHẨM</th>
                    <th>GIÁ THÀNH</th>
                    <th>SỬA</th>
                    <th>XÓA</th>
                </tr>
            </thead>
            <tbody>
                <?php
            
            

                foreach ($sanpham as $sp) {
                    echo "
                    <tr>
                        <td>{$sp['name']}</td>
                        <td>{$sp['gia']}</td>
                        <td>
                            <a href='#' class='text-primary btn-edit'><i class='bi bi-pencil-square'></i></a>
                        </td>
                        <td>
                            <a href='#' class='text-danger btn-delete'><i class='bi bi-trash'></i></a>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <?php include('footer.php'); ?>

    <!-- Thêm Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>