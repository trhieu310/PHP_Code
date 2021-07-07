<?php
    require_once('database.php');

    // Get all categories
    $query = 'SELECT * FROM categories
                        ORDER BY categoryID';
    $statement = $db->prepare($query);
    $statement->execute();
    $categories = $statement->fetchAll();
    $statement->closeCursor();

    $category_new = filter_input(INPUT_POST, 'category_new');
    // Add the category to the database
    if ($category_new != false) {
        $query2 = 'INSERT INTO categories(categoryName)
                VALUES (:category_new)';

        $statement2 = $db->prepare($query2);
        $statement2->bindValue(':category_new', $category_new);
        $success2 = $statement2->execute();
        $statement2->closeCursor();
    }

?>
<!DOCTYPE html>
<html>

    <!-- the head section -->
    <head>
        <title>My Guitar Shop</title>
        <link rel="stylesheet" type="text/css" href="main.css" />
    </head>

    <!-- the body section -->
    <body>
        <header><h1>Product Manager</h1></header>
        <main>
            <h1>Category List</h1>
            <table>
                <tr>
                    <th>Name</th>
                    <th>&nbsp;</th>
                </tr>

                <!-- add code for the rest of the table here -->
                <?php foreach ($categories as $category) : ?>
                    <tr>
                        <td>
                            <span name="category_name"><?php echo $category['categoryName']; ?></span>
                        </td>
                        <td>
                        <form action="delete_category.php" method="post">
                            <input type="hidden" name="category_id"
                                value="<?php echo $category['categoryID']; ?>">
                            <input type="submit" value="Delete">
                        </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>

            <h2>Add Category</h2>

            <!-- add code for the form here -->
            <form action="category_list.php" method="post">
                <label>Name:</label>
                <input type="text" name="category_new"/>
                <input type="submit" value="submit"/>
            </form>

            <br><br>
            <p><a href="index.php">List Products</a></p>

        </main>

        <footer>
            <p>&copy; <?php echo date("Y"); ?> My Guitar Shop, Inc.</p>
        </footer>
    </body>
</html>
