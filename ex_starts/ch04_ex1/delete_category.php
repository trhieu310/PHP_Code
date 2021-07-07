<?php
    require_once('database.php');

    $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
    // Delete the category from the database
    if ($category_id != false) {
        $query1 =  'DELETE categories, products
                    FROM categories
                    INNER JOIN products ON categories.categoryID = products.categoryID
                    WHERE categories.categoryID = :category_id';

        $statement1 = $db->prepare($query1);
        $statement1->bindValue(':category_id', $category_id);
        $success1 = $statement1->execute();
        $statement1->closeCursor();
    }

    include('category_list.php');
?>
