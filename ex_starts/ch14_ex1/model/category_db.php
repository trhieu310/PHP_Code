<?php
class CategoryDB {
    public function getCategories() {
        $db = Database::getDB();
        $query = 'SELECT * FROM categories
                  ORDER BY categoryID';
        // $statement = $db->prepare($query);
        // $statement->execute();
        $result = $db -> query($query);
        $categories = array();
        foreach ($result as $row) {
            $category = new Category();
            $category -> setID($row['categoryID']);
            $category -> setName($row['categoryName']);
            $categories[] = $category;
        }
        return $categories;
    }

    public function getCategory($category_id) {
        $db = Database::getDB();
        $query = "SELECT * FROM categories
                  WHERE categoryID = '$category_id'";
        // $statement = $db->prepare($query);
        // $statement->bindValue(':category_id', $category_id);
        // $statement->execute();
        $result = $db -> query($query);
        $row = $result->fetch();
        // $statement->closeCursor();
        $category = new Category();
        $category -> setID($row['categoryID']);
        $category -> setName($row['categoryName']);
        return $category;
    }

    function delete_category($category_id) {
        $db = Database::getDB();
        $check_product = "SELECT
                          FROM products
                          WHERE categoryID = '$category_id";
        $check_product_result = $db->exec($check_product);
        if ($check_product_result == NULL){
            $query = "DELETE FROM categories
                  WHERE categoryID = '$category_id'";
        }
        else {
            $query = "DELETE categories, products
                      FROM categories
                      INNER JOIN products ON categories.categoryID = products.categoryID
                      WHERE categories.categoryID = '$category_id'";
        }
        $row_count = $db->exec($query);

        return $row_count;
    }

    public function addCategory($category_name) {
        $db = Database::getDB();

        $query = "INSERT INTO categories (categoryName)
                  VALUES
                     ('$category_name')";
        $row_count = $db -> exec($query);
        return $row_count;
    }
}
?>
