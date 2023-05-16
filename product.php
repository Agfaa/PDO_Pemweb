<?php
    include('conn.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Pemrograman Database Object</title>
</head>
<body>
    <nav>
        <a>Agfanadita Rezkia Chaurina - 21081010138</a>
    </nav>

    <div>
        <div>
            <nav>
                <div>
                    <ul>
                        
                            <a href="index.php">Data Customers</a>
                        
                            <a href="product.php">Data Product</a>
                        
                            <a href="formCS.php">Tambah Data Customers</a>
                        
                            <a href="formProduct.php">Tambah Data Product</a>

                            <a href="index.php"> kembali </a>
                        
                    </ul>
                </div>
            </nav>
            <main role="main">
                <?php
                    if(@$_GET['status'] !== null) {
                        $status = $_GET ['status'];
                        if ($status == 'ok') {
                            echo '<br><br><div role = "alert"> Sukses </div>';
                        } else if ($status == 'error') {
                            echo '<br><br><div role = "alert"> Gagal </div>';
                        }
                    }
                ?>
                <h2 style="margin: 30px 0 30px; font-size: 35px;  text-align: center;">Product</h2>
                <div>
                    <table border="1">
                        <thead>
                            <tr>
                                <th>Product Code</th>
                                <th>Product Name</th>
                                <th>Product Line</th>
                                <th>Product Scale</th>
                                <th>Product Vendor</th>
                                <th>Product Description</th>
                                <th>Quantity in Stock</th>
                                <th>Buy Price</th>
                                <th>MSRP</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query = "SELECT * FROM products";
                                $result = $conn->query($query);
                            ?>
                            <?php while($data = $result->fetch(PDO::FETCH_ASSOC) ): ?>
                            <tr>
                                <td><?php echo $data['productCode'];  ?></td>
                                <td><?php echo $data['productName'];  ?></td>
                                <td><?php echo $data['productLine'];  ?></td>
                                <td><?php echo $data['productScale']; ?></td>
                                <td><?php echo $data['productVendor']; ?></td>
                                <td><?php echo $data['productDescription']; ?></td>
                                <td><?php echo $data['quantityInStock']; ?></td>
                                <td><?php echo $data['buyPrice']; ?></td>
                                <td><?php echo $data['MSRP']; ?></td>
                                <td>
                                    <a  style="color:navy;" href="<?php echo "updateProduct.php?id=".$data['productCode']; ?>"> Update</a>
                                    &nbsp;&nbsp;
                                    <a style="color: red;" href="<?php echo "deleteProduct.php?id=".$data['productCode']; ?>"> Delete</a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
</body>
</html>