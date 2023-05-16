<?php
  include ('conn.php');

  $status = '';
  $result = '';
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['id'])) {
          //query SQL
          $productCode_update = $_GET['id'];
          $query = "SELECT * FROM products WHERE productCode = '$productCode_update'";

          //eksekusi query
          $result = $conn->query($query);
      }
  }

  //melakukan pengecekan apakah ada form yang dipost
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
      //query SQL
      $sql = "UPDATE products SET productName='$productName', productLine='$productLine', productScale='$productScale',productVendor='$productVendor',productDescription='$productDescription',quantityInStock='$quantityInStock', buyPrice='$buyPrice',MSRP='$MSRP' WHERE productCode='$productCode'";

      //eksekusi query
      if ($conn->query($sql)) {
        $status = 'ok';
      }
      else{
        $status = 'error';
      }

      //redirect ke halaman lain
      header('Location: product.php?status='.$status);
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
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
                        
                            <a href="index.php">Data Customers</a>
                       
                            <a href="product.php">Data Product</a>
                       
                            <a href="formCS.php">Tambah Data Customers</a>
                        
                            <a href="formProduct.php">Tambah Data Product</a>

                            <a href="index.php"> kembali </a>
                        
                    </ul>
                </div>
            </nav>
            <main role="main">
                <h2 style="margin: 30px 0 30px;">Update Data Product</h2>
                <form action="updateProduct.php" method="post">
                    <?php while($data = $result->fetch(PDO::FETCH_ASSOC) ): ?>
                    <div>
                    <label>Product Code</label>
                    <input type="text" placeholder="> 497" value="<?= $data['productCode'] ?>" name="productCode" readonly>
                    </div>
                    <div>
                    <label>Product Name</label>
                    <input type="text" placeholder="Name..." value="<?= $data['productName'] ?>" name="productName" required="required">
                    </div>
                    <?php 
                        $queryLine = "SELECT productLine FROM productlines";
                        $resultLine = $conn->query($queryLine);
                    ?>
                    <div>
                    <label>Product Line</label>
                    <input type="text" placeholder="Last Name..." value="<?= $data['productLine'] ?>" name="productLine" required="required">
                    </div>
                    <div>
                    <label>Product Scale</label>
                    <select name="productLine" required="required">
                        <option value="">select one</option>
                        <?php while($dataLine = $resultLine->fetch(PDO::FETCH_ASSOC) ): ?>
                            <option value="<?= $dataLine['productLine'] ?>"<?= $dataLine['productLine'] == $data['ProductLine'] ? "selected" : "" ?>><?= $dataLine['productLine'] ?></option>
                        <?php endwhile; ?>
                    </select>
                    </div>
                    <div>
                    <label>Product Vendor</label>
                    <input type="text"  value="<?= $data['productVendor'] ?>" name="productVendor" required="required">
                    </div>
                    <div>
                    <label>Product Description</label>
                    <input type="text"  value="<?= $data['productDescription'] ?>" name="productDescription" required="required">
                    </div>
                    <div>
                    <label>Quantity in Stock</label>
                    <input type="text" " value="<?= $data['quantityInStock'] ?>" name="quantityInSTock" >
                    </div>
                    <div>
                    <label>Buy Price</label>
                    <input type="text" value="<?= $data['buyPrice'] ?>" name="buyPrice" required="required">
                    </div>
                    <div>
                    <label>MSRP</label>
                    <input type="text"  value="<?= $data['MSRP'] ?>" name="MSRP">
                    </div>
                    <?php endwhile; ?>
                    <button type="submit">Save Changes</button>
                </form>
            </main>
        </div>
    </div>
</body>
</html>