<?php
    include ('conn.php');

    $status = '';
    $status = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $productCode = $_POST['productCode'];
        $productName = $_POST['productName'];
        $productLine = $_POST['productLine'];
        $productScale = $_POST['productScale'];
        $productVendor = $_POST['productVendor'];
        $productDescription = $_POST['productDescription'];
        $quantityInStock = $_POST['quantityInStock'];
        $buyPrice = $_POST['buyPrice'];
        $MSRP = $_POST['MSRP'];

        $query = "INSERT INTO products VALUES('$productCode','$productName','$productLine','$productScale','$productVendor','$productDescription','$quantityInStock','$buyPrice','$MSRP')"; 

        if ($conn->query($query)) {
            $status = 'ok';
        }
        else{
            $status = 'error';
        }
    }   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
</head>
<body>
    <nav>
    <a href="#">Agfanadita Rezkia Chaurina - 21081010138</a>
    </nav>

    <div>
        <div>
            <nav>
                <div>
                    <ul>
                        
                            <a href="index.php">Data Customer</a>
                        
                            <a href="product.php">Data product</a>
                        
                            <a href="formCS.php">Tambah Data Customer</a>
                        
                            <a href="formProduct.php">Tambah Data Product</a>

                            <a href="index.php"> kembali </a>
                    </ul>
                </div>
            </nav>
            <main role="main">
                <?php
                    if ($status=='ok') {
                        echo '<br><br><div class="alert alert-success" role="alert">Data Customer berhasil disimpan</div>';
                      }
                      elseif($status=='error'){
                        echo '<br><br><div class="alert alert-danger" role="alert">Data Customers gagal disimpan</div>';
                      }
                ?>
                <h2 style="margin: 30px 0 30px;">Form Product</h2>
                <form action="formProduct.php" method="post">
                    <div>
                        <label>Product Code</label>
                        <input type="text" name="productCode" required="required" >
                    </div>
                    <div>
                        <label>Product Name</label>
                        <input type="text" name="productName" required="required">
                    </div>
                    <?php 
                        $query = "SELECT productLine FROM productlines";
                        $result = $conn->query($query);
                        ?>
                    <div class="form-group">
                        <label>Product Line</label>
                        <select class="custom-select" name="productLine" required="required">
                            <option value="">Select one</option>
                            <?php while($data = $result->fetch(PDO::FETCH_ASSOC) ): ?>
                                <option value="<?= $data['productLine'] ?>"><?= $data['productLine'] ?></option>
                            <?php endwhile;?>
                        </select>
                    </div>
                    <div>
                        <label>Product Scale</label>
                        <input type="text"  name="productScale" required="required">
                    </div>
                    <div>
                        <label>Product Vendor</label>
                        <input type="text" name="productVendor" required="required">
                    </div>
                    <div>
                        <label>Product Description</label>
                        <input type="text"  name="productDescription" required="required">
                    </div>
                    <div>
                        <label>Quantity In Stock</label>
                        <input type="text"  name="quantityInStock" required="required">
                    </div>
                    <div>
                        <label>Buy Price</label>
                        <input type="text"  name="buyPrice" required="required">
                    </div>
                    <div>
                        <label>MSRP</label>
                        <input type="text"  name="MSRP" required="required">
                    </div>
                    <button type="submit">Save Changes</button>
                </form>
            </main>
        </div>
    </div>
</body>
</html>