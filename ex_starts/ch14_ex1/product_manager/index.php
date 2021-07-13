<?php
require('../model/database.php');
require('../model/category.php');
require('../model/category_db.php');
require('../model/product.php');
require('../model/product_db.php');

$categoryDB = new CategoryDB();
$productDB = new ProductDB();

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_products';
    }
}

if ($action == 'list_products') {
    $category_id = filter_input(INPUT_GET, 'category_id',
            FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE) {
        $category_id = 1;
    }

    // Get product and category data
    // $current_category = CategoryDB::getCategory($category_id);
    // $categories = CategoryDB::getCategories();
    // $products = ProductDB::getProductsByCategory($category_id);
    $current_category = $categoryDB -> getCategory($category_id);
    $categories = $categoryDB -> getCategories();
    $products = $productDB -> getProductsByCategory($category_id);

    // Display the product list
    include('product_list.php');
} else if ($action == 'delete_product') {
    // Get the IDs
    $product_id = filter_input(INPUT_POST, 'product_id',
            FILTER_VALIDATE_INT);
    $category_id = filter_input(INPUT_POST, 'category_id',
            FILTER_VALIDATE_INT);

    // Delete the product
    // ProductDB::deleteProduct($product_id);
    $productDB->deleteProduct($product_id);

    // Display the Product List page for the current category
    header("Location: .?category_id=$category_id");
} else if ($action == 'show_add_form') {
    // $categories = CategoryDB::getCategories();
    $categories = $categoryDB -> getCategories();
    include('product_add.php');
} else if ($action == 'add_product') {
    $category_id = filter_input(INPUT_POST, 'category_id',
            FILTER_VALIDATE_INT);
    $code = filter_input(INPUT_POST, 'code');
    $name = filter_input(INPUT_POST, 'name');
    $price = filter_input(INPUT_POST, 'price');
    if ($category_id == NULL || $category_id == FALSE || $code == NULL ||
            $name == NULL || $price == NULL || $price == FALSE) {
        $error = "Invalid product data. Check all fields and try again.";
        include('../errors/error.php');
    } else {
        // $current_category = CategoryDB::getCategory($category_id);
        $current_category = $categoryDB -> getCategory($category_id);
        // $product = new Product($current_category, $code, $name, $price);
        $product = new Product();
        $product -> setCategory($current_category);
        $product -> setCode($code);
        $product -> setName($name);
        $product -> setPrice($price);

        // ProductDB::addProduct($product);
        $productDB -> addProduct($product);

        // Display the Product List page for the current category
        header("Location: .?category_id=$category_id");
    }
} else if ($action == 'list_categories') {
    $categories = $categoryDB -> getCategories();
    include('category_list.php');
} else if ($action == 'add_category') {
    $category_name = filter_input(INPUT_POST, 'category_name');

    // Validate inputs
    if ($category_name == NULL) {
        $error = "Invalid category name. Check name and try again.";
        include('view/error.php');
    } else {
        $categoryDB -> addCategory($category_name);
        header('Location: .?action=list_categories');
    }
} else if ($action == 'delete_category') {
    $category_id = filter_input(INPUT_POST, 'category_id',
            FILTER_VALIDATE_INT);
    $categoryDB -> delete_category($category_id);
    header('Location: .?action=list_categories');
}
?>
