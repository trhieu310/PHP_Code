<!DOCTYPE html>
<html>
<head>
    <title>Product Discount Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
    <?php
        $product_description = $_POST['product_description'];
        $list_price =  $_POST['list_price'];
        $discount_percent = $_POST['discount_percent'];

        // $product_description = filter_input(INPUT_POST, 'product_description');
        // $list_price = filter_input(INPUT_POST, 'list_price');
        // $discount_percent = filter_input(INPUT_POST, 'discount_percent');

        $discount = $discount_percent * .01;
        $discount_amount = $list_price * $discount;
        $price_after_discount = $list_price - $discount_amount;


        $list_price_f = "$".number_format($list_price, 3);
        $discount_percent_f = $discount_percent."%";
        $discount_f = "$".number_format($discount, 3);
        $price_after_discount_f = "$".number_format($price_after_discount, 3)
    ?>
    <main>
        <h1>This page is under construction</h1>

        <label>Product Description:</label>
        <span><?php echo $product_description; ?></span><br>

        <label>List Price:</label>
        <span><?php echo htmlspecialchars($list_price_f); ?></span><br>

        <label>Standard Discount:</label>
        <span><?php echo htmlspecialchars($discount_percent_f); ?></span><br>

        <label>Discount Amount:</label>
        <span><?php echo htmlspecialchars($discount_f); ?></span><br>

        <label>Discount Price:</label>
        <span><?php echo htmlspecialchars($price_after_discount_f); ?></span><br>
    </main>
</body>
</html>
