
<?php require_once ('config.php') ?>
<?php include ('includes/article.php'); ?>
<?php include ('includes/head_section.php'); ?>

<title>Home Page</title>
<link rel="stylesheet" href="static/css/home.css" />
<link rel="stylesheet" href="static/css/article.css">

</head>

<?php
// Database connection
$servername = "localhost";
$username = "team_2";
$password = "8xkm98eb";
$database = "team_2";
$conn = mysqli_connect($servername, $username, $password, $database);
?>

<body>
<!-- navbar -->
<?php include (ROOT_PATH . '/includes/navbar.php') ?>
<!-- // navbar -->



<main>
    <div class="content">
        <h2 class="content-title">Article</h2>
        <hr>

        <?php
        $article_id = $_GET['id'];
        $sql = "SELECT * FROM articles WHERE id = $article_id";
        $result = mysqli_query($conn, $sql);
        $article = mysqli_fetch_assoc($result);
        $category = $article['category']; //?? 'No blogs in this category yet!';
        $user_id = $article['user_id'];
        $title = $article['title'];
        $slug = $article['slug'];
        $views = $article['views'];
        $likes = $article['likes'];
        $image = isset($article['image']) ? $article['image'] : 'https://cdn.icon-icons.com/icons2/2566/PNG/512/error_icon_153602.png';
        $body = $article['body']; //?? 'No blogs in this body yet!';
        $published = $article['published'];
        $created_at = $article['created_at'];
        $updated_at = $article['updated_at'];



        echo "<div class=\"article\">";
        echo "<img src=\"{$image}\" alt=\"Article Image\">";
        echo "<h1>{$article['title']}</h1>";
        echo "<div class=\"meta\">Published on {$article['created_at']} by User ID {$article['user_id']}</div>";
        echo "<div class=\"body\">";
        echo "<p>{$article['body']}</p>";
        echo "</div>";
        echo "</div>";
        ?>

