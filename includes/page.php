<?php
$postCountQuery = "SELECT * FROM art WHERE available = 1";
$result = $conn->query($postCountQuery);
$perPage = 12;
if(isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
if($page == 1) {
    $queryPage = 0;
    $previousPage = 1;
    $disabledClass1 = 'disabled';
} else {
    $disabledClass1 = '';
    $previousPage = $page-1;
    $queryPage = ($page * $perPage) - $perPage;
}

$count = $result->num_rows;
$count = ceil($count / $perPage); // This gives the number of pages