<?php include 'data.php';
    $flowers = isset($_SESSION['flowers']) ? $_SESSION['flowers'] : [];
    session_start();
    ?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Quản trị danh sách hoa</title>
 </head>
 <style>
     * {
         margin: 0;
         padding: 0;
         box-sizing: border-box;
     }

     body {
         font-family: Arial, sans-serif;
         background-color: #f4f4f9;
         padding: 20px;
     }

     .btn {
         display: inline-block;
         padding: 12px 20px;
         font-size: 16px;
         background-color: #4CAF50;
         color: white;
         text-decoration: none;
         border-radius: 5px;
         margin-bottom: 20px;
         text-align: center;
         cursor: pointer;
     }

     .btn:hover {
         background-color: #45a049;
     }

     table {
         width: 100%;
         border-collapse: collapse;
         margin-top: 20px;
     }

     th,
     td {
         padding: 12px;
         text-align: center;
         border: 1px solid #ddd;
     }

     th {
         background-color: #4CAF50;
         color: white;
     }

     td {
         background-color: #f9f9f9;
     }

     img {
         max-width: 80px;
         height: auto;
     }

     a {
         text-decoration: none;
         color: #4CAF50;
         margin: 0 10px;
     }

     a:hover {
         text-decoration: underline;
     }
 </style>

 <body>
     <button type="submit"><a href="add.php">Thêm loại hoa mới</a></button>
     <table>
         <thead>
             <tr>
                 <th>Tên hoa</th>
                 <th>Mô tả</th>
                 <th>Hình ảnh</th>
                 <th>Hành động</th>
             </tr>
         </thead>
         <tbody>
             <?php foreach ($flowers as $index => $flower): ?>
                 <tr>
                     <td><?php echo htmlspecialchars($flower['name']); ?></td>
                     <td><?php echo htmlspecialchars($flower['description']); ?></td>
                     <td><img src="<?php echo htmlspecialchars($flower['image']); ?>"
                             alt="<?php echo htmlspecialchars($flower['name']); ?>"></td>
                     <td>
                         <a href="edit.php?index=<?php echo $index; ?>">Sửa</a>
                         <a href="delete.php?index=<?php echo $index; ?>"
                             onclick="return confirm ('Bạn có chắc muốn xóa không?')">Xóa</a>
                     </td>
                 </tr>
             <?php endforeach; ?>
         </tbody>
     </table>
 </body>

 </html>