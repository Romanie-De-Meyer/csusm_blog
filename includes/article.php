<?php include ('config.php'); ?>
<?php

// Article variables
$errors = [];
$article_id = 0;
$isEditingArticle = false;
$published = 0;
$title = "";
$article_slug = "";
$body = "";
$featured_image = "";
$article_topic = "";


if (isset($_POST['create_article'])) {
    createArticle($_POST);
}
// if user clicks the Edit article button
if (isset($_GET['edit-article'])) {
    $isEditingArticle = true;
    $article_id = $_GET['edit-article'];
    editArticle($article_id);
}
// if user clicks the update article button
if (isset($_POST['update_article'])) {
    updateArticle($_POST);
}
// if user clicks the Delete article button
if (isset($_GET['delete-article'])) {
    $article_id = $_GET['delete-article'];
    deleteArticle($article_id);
}

function getUserArticles()
{
    global $conn;

    $user_id = $_SESSION['user']['id'];
    $sql = "SELECT * FROM articles WHERE user_id=$user_id";

    $result = mysqli_query($conn, $sql);
    $articles = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $final_articles = array();
    foreach ($articles as $article) {
        $article['author'] = getArticleAuthorById($article['user_id']);
        array_push($final_articles, $article);
    }
    return $final_articles;
}

function editArticle($article_id)
{
    global $conn, $title, $article_slug, $body, $published, $isEditingArticle, $article_id;
    $sql = "SELECT * FROM articles WHERE id=$article_id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $article = mysqli_fetch_assoc($result);
    // set form values on the form to be updated
    $title = $article['title'];
    $body = $article['body'];
    $published = $article['published'];
}

function getArticleAuthorById($user_id)
{
    global $conn;
    $sql = "SELECT username FROM users WHERE id=$user_id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        // return username
        return mysqli_fetch_assoc($result)['username'];
    } else {
        return null;
    }
}

function createArticle($request_values)
{
    global $conn, $user_id, $errors, $title, $featured_image, $topic_id, $body, $published;
    $title = esc($request_values['title']);
    $body = htmlentities(esc($request_values['body']));
    // if (isset($request_values['topic_id'])) {
    //     $topic_id = esc($request_values['topic_id']);
    // }
    $published = 1;
    // create slug: if title is "The Storm Is Over", return "the-storm-is-over" as slug
    $article_slug = makeSlug($title);

    if (empty($title)) {
        array_push($errors, "Article title is required");
    }
    if (empty($body)) {
        array_push($errors, "Article body is required");
    }
    // if (empty($topic_id)) {
    //     array_push($errors, "Article topic is required");
    // }
    // Get image name
    $featured_image = $_FILES['featured_image']['name'];
    if (empty($featured_image)) {
        array_push($errors, "Featured image is required");
    }
    // image file directory
    $target = ROOT_PATH . "/static/images/" . $featured_image;

    var_dump($_FILES['featured_image']['tmp_name'], $target);
    if (!move_uploaded_file($_FILES['featured_image']['tmp_name'], $target)) {
        array_push($errors, "Failed to upload image. Please check file settings for your server");
    }
    // Ensure that no article is saved twice.
    $article_check_query = "SELECT * FROM articles WHERE slug='$article_slug' LIMIT 1";
    $result = mysqli_query($conn, $article_check_query);

    $user_id = $_SESSION['user']['id'];

    if (mysqli_num_rows($result) > 0) { // if article exists
        array_push($errors, "A article already exists with that title.");
    }
    // create article if there are no errors in the form
    if (count($errors) == 0) {
        $query = "INSERT INTO articles (user_id, title, slug, likes, image, body, published, created_at, updated_at) VALUES('$user_id', '$title', '$article_slug', 0, '$featured_image', '$body', $published, now(), now())";
        if (mysqli_query($conn, $query)) {
            $_SESSION['message'] = "Article created successfully";
            header('location: profile.php');
            exit(0);
        }
    }
}

function updateArticle($request_values)
{
    global $conn, $errors, $article_id, $title, $featured_image, $topic_id, $body, $published;

    $title = esc($request_values['title']);
    $body = esc($request_values['body']);
    $article_id = esc($request_values['article_id']);
    if (isset($request_values['topic_id'])) {
        $topic_id = esc($request_values['topic_id']);
    }
    // create slug: if title is "The Storm Is Over", return "the-storm-is-over" as slug
    $article_slug = makeSlug($title);

    if (empty($title)) {
        array_push($errors, "Article title is required");
    }
    if (empty($body)) {
        array_push($errors, "Article body is required");
    }
    // if new featured image has been provided
    if (isset($_POST['featured_image'])) {
        // Get image name
        $featured_image = $_FILES['featured_image']['name'];
        // image file directory
        $target = "../static/images/" . basename($featured_image);
        if (!move_uploaded_file($_FILES['featured_image']['tmp_name'], $target)) {
            array_push($errors, "Failed to upload image. Please check file settings for your server");
        }
    }

    // register topic if there are no errors in the form
    if (count($errors) == 0) {
        $query = "UPDATE articles SET title='$title', slug='$article_slug', views=0, image='$featured_image', body='$body', published=$published, updated_at=now() WHERE id=$article_id";
        // attach topic to article on article_topic table
        if (mysqli_query($conn, $query)) { // if article created successfully
            if (isset($topic_id)) {
                $inserted_article_id = mysqli_insert_id($conn);
                // create relationship between article and topic
                $sql = "INSERT INTO article_topic (article_id, topic_id) VALUES($inserted_article_id, $topic_id)";
                mysqli_query($conn, $sql);
                $_SESSION['message'] = "Article created successfully";
                header('location: articles.php');
                exit(0);
            }
        }
        $_SESSION['message'] = "Article updated successfully";
        header('location: articles.php');
        exit(0);
    }
}

// SELECT
function getArticles()
{
    global $connection;
    $query = "SELECT * FROM articles";
    $result = mysqli_query($connection, $query);
    $articles = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $articles[] = $row;
    }
    return $articles;
}

function deleteArticle($article_id)
{
    global $conn;
    $sql = "DELETE FROM articles WHERE id=$article_id";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['message'] = "Article successfully deleted";
        header("location: profile.php");
        exit(0);
    }
}

function esc($value)
{
    // bring the global db connect object into function
    global $conn;
    // remove empty space sorrounding string
    $val = trim($value);
    $val = mysqli_real_escape_string($conn, $value);
    return $val;
}

function makeSlug($string)
{
    $string = strtolower($string);
    $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
    return $slug;
}