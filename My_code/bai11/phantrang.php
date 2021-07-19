<?php
    $conn = mysqli_connect("localhost", "root", "", "rating");

    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }else{
        $page = 1;
    }

    $limit = 5; // 10 title per page
    $start = ($page - 1) * $limit;

    $total_title = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tintuc"));
    $total_page = $total_title/$limit;

    $query = "SELECT * FROM tintuc LIMIT ".$start.", ".$limit;
    $result = mysqli_query($conn, $query);
    echo "<div class=\"title\">";
    while($row = mysqli_fetch_array($result)){
        echo '<a href="#">'.$row['id'].'. '.$row['title'].'</a><br />';
    }
    echo "</div>";
    echo "<div class=\"pagination\">";
    for($i = 1; $i <= $total_page; $i++){
        echo '<a href="phantrang.php?page='.$i.'">'.$i.'</a> | ';
    }
    echo "</div>";
?>
