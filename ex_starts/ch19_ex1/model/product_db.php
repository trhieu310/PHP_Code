<?php
function get_products_by_category($category_id) {
    global $db;
    $query = 'SELECT * FROM products
              WHERE categoryID = :category_id
              ORDER BY productID';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':category_id', $category_id);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function get_product($product_id) {
    global $db;
    $query = 'SELECT *
              FROM products
              WHERE productID = :product_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':product_id', $product_id);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function get_product_by_name($product_name) {
    global $db;
    $query = 'SELECT *
              FROM products
              WHERE productName = :product_name';
    try {
        $statement = $db -> prepare($query);
        $statement -> bindValue(':product_name', $product_name);
        $statement -> execute();
        $result = $statement -> fetch();
        $statement -> closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e -> getMessage();
        display_db_error($error_message);
    }
}

function add_product($category_id, $code, $name, $description,
        $price, $discount_percent) {
    global $db;
    $query = 'INSERT INTO products
                 (categoryID, productCode, productName, description,
                  listPrice, discountPercent, dateAdded)
              VALUES
                 (:category_id, :code, :name, :description, :price,
                  :discount_percent, NOW())';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':category_id', $category_id);
        $statement->bindValue(':code', $code);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':discount_percent', $discount_percent);
        $statement->execute();
        $statement->closeCursor();

        // Get the last product ID that was automatically generated
        $product_id = $db->lastInsertId();
        return $product_id;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function update_product($product_id, $code, $name, $description,
                        $price, $discount_percent, $category_id) {
    global $db;
    $query = 'UPDATE Products
              SET productName = :name,
                  productCode = :code,
                  description = :description,
                  listPrice = :price,
                  discountPercent = :discount_percent,
                  categoryID = :category_id
              WHERE productID = :product_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':code', $code);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':discount_percent', $discount_percent);
        $statement->bindValue(':category_id', $category_id);
        $statement->bindValue(':product_id', $product_id);
        $row_count = $statement->execute();
        $statement->closeCursor();
        return $row_count;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function delete_product($product_id) {
    global $db;
    $query = 'DELETE FROM products WHERE productID = :product_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':product_id', $product_id);
        $row_count = $statement->execute();
        $statement->closeCursor();
        return $row_count;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}
?>

<?php
// function get_products_by_category($category_id) {
//     global $db;
//     $category_id_esc = $db->escape_string($category_id);
//     $query = "SELECT * FROM products WHERE categoryID = '$category_id_esc'";
//     $result = $db->query($query);
//     if ($result == false) {
//         display_db_error($db->error);
//     }
//     $products = array();
//     for ($i = 0; $i < $result->num_rows; $i++) {
//         $product = $result->fetch_assoc();
//         $products[] = $product;
//     }
//     $result->free();
//     return $products;
// }

// function get_product($product_id) {
//     global $db;
//     $product_id_esc = $db->escape_string($product_id);
//     $query = "SELECT * FROM products WHERE productID = '$product_id_esc'";
//     $result = $db->query($query);
//     if ($result == false) {
//         display_db_error($db->error);
//     }
//     $product = $result->fetch_assoc();
//     return $product;
// }

// function add_product($category_id, $code, $name, $description,
//         $price, $discount_percent) {
//     global $db;
//     $query = 'INSERT INTO products
//                  (categoryID, productCode, productName, description,
//                   listPrice, discountPercent, dateAdded)
//               VALUES
//                   (?, ?, ?, ?, ?, ?, NOW())';
//     $statement = $db->prepare($query);
//     if ($statement == false) {
//         display_db_error($db->error);
//     }
//     $statement->bind_param("isssdd", $category_id, $code, $name, $description,
//                            $price, $discount_percent);
//     $success = $statement->execute();
//     if ($success) {
//         $product_id = $db->insert_id;
//         $statement->close();
//         return $product_id;
//     } else {
//         display_db_error($db->error);
//     }
// }

// function update_product($product_id, $code, $name, $description,
//                         $price, $discount_percent, $category_id) {
//     global $db;
//     $query = 'UPDATE Products
//           SET categoryID = ?, productCode = ?, productName = ?,
//               description = ?, listPrice = ?, discountPercent = ?
//           WHERE productID = ?';
//     $statement = $db->prepare($query);
//     if ($statement == false) {
//         display_db_error($db->error);
//     }
//     $statement->bind_param("isssddi", $category_id, $code, $name,
//             $description, $price, $discount_percent, $product_id);
//     $success = $statement->execute();
//     if ($success) {
//         $count = $db->affected_rows;
//         $statement->close();
//         return $count;
//     } else {
//         display_db_error($db->error);
//     }
// }

// function delete_product($product_id) {
//     global $db;
//     $query = "DELETE FROM products
//               WHERE productID = ?";
//     $statement = $db->prepare($query);
//     if ($statement == false) {
//         display_db_error($db->error);
//     }
//     $statement->bind_param("i", $product_id);
//     $success = $statement->execute();
//     if ($success) {
//         $count = $db->affected_rows;
//         $statement->close();
//         return $count;
//     } else {
//         display_db_error($db->error);
//     }
// }
?>
