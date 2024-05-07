<?php
// Article variables
$article_id = 0;
$isEditingArticle = false;
$published = 0;
$title = "";
$article_slug = "";
$body = "";
$featured_image = "";

/* - - - - - - - - - -
-  Article functions
- - - - - - - - - - -*/
// get all articles from DB
function getAllArticles()
{
  global $conn;

  // Admin can view all articles
  // Author can only view their articles
  if ($_SESSION['user']['role'] == "Admin") {
    $sql = "SELECT * FROM articles";
  } elseif ($_SESSION['user']['role'] == "Author") {
    $user_id = $_SESSION['user']['id'];
    $sql = "SELECT * FROM articles WHERE user_id=$user_id";
  }
  $result = mysqli_query($conn, $sql);
  $articles = mysqli_fetch_all($result, MYSQLI_ASSOC);

  $final_articles = array();
  foreach ($articles as $article) {
    $article['author'] = getArticleAuthorById($article['user_id']);
    array_push($final_articles, $article);
  }
  return $final_articles;
}
// get the author/username of a article
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


/* - - - - - - - - - -
-  Article actions
- - - - - - - - - - -*/
// if user clicks the create article button
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

/* - - - - - - - - - -
-  Article functions
- - - - - - - - - - -*/
function createArticle($request_values)
{
  global $conn, $user_id, $errors, $title, $featured_image, $category, $body, $published;
  $title = esc($request_values['title']);
  $body = htmlentities(esc($request_values['body']));
  if (isset($request_values['category'])) {
    $category = esc($request_values['category']);
  }
  if (isset($request_values['publish'])) {
    $published = esc($request_values['publish']);
  }
  // create slug: if title is "The Storm Is Over", return "the-storm-is-over" as slug
  $article_slug = makeSlug($title);
  // validate form
  if (empty($title)) {
    array_push($errors, "Article title is required");
  }
  if (empty($body)) {
    array_push($errors, "Article body is required");
  }
  if (empty($category)) {
    array_push($errors, "Article category is required");
  }
  // Get image name
  $featured_image = $_FILES['featured_image']['name'];
  if (empty($featured_image)) {
    array_push($errors, "Featured image is required");
  }
  // image file directory
  $target = ROOT_PATH . "/static/images/" . $featured_image;

  var_dump($target);
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
    $query = "INSERT INTO articles (category, user_id, title, slug, likes, image, body, published, created_at, updated_at) VALUES('$category', '$user_id', '$title', '$article_slug', 0, '$featured_image', '$body', $published, now(), now())";
    if (mysqli_query($conn, $query)) {
      $_SESSION['message'] = "Article created successfully";
      header('location: articles.php');
      exit(0);
    }
  }
}

/* * * * * * * * * * * * * * * * * * * * *
 * - Takes article id as parameter
 * - Fetches the article from database
 * - sets article fields on form for editing
 * * * * * * * * * * * * * * * * * * * * * */
function editArticle($article_id)
{
  global $conn, $title, $category, $article_slug, $body, $published, $isEditingArticle, $article_id;
  $sql = "SELECT * FROM articles WHERE id=$article_id LIMIT 1";
  $result = mysqli_query($conn, $sql);
  $article = mysqli_fetch_assoc($result);
  // set form values on the form to be updated
  $title = $article['title'];
  $body = $article['body'];
  $category = $article['category'];
  $published = $article['published'];
}

function updateArticle($request_values)
{
  global $conn, $errors, $article_id, $title, $featured_image, $category, $body, $published;

  $title = esc($request_values['title']);
  $body = esc($request_values['body']);
  $article_id = esc($request_values['article_id']);
  $category = esc($request_values['category']);
  var_dump($category);
  $published = esc($request_values['publish']);
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
    $target = ROOT_PATH . "/static/images/" . $featured_image;

    if (!move_uploaded_file($_FILES['featured_image']['tmp_name'], $target)) {
      array_push($errors, "Failed to upload image. Please check file settings for your server");
    }
  }

  if (count($errors) == 0) {
    $query = "UPDATE articles SET category='$category', title='$title', slug='$article_slug', views=0, image='$featured_image', body='$body', published=$published, updated_at=now() WHERE id=$article_id";
    if (mysqli_query($conn, $query)) { // if article created successfully
      $_SESSION['message'] = "Article updated successfully";
      header('location: articles.php');
      exit(0);
    }
  }
}
// delete blog article
function deleteArticle($article_id)
{
  global $conn;
  $sql = "DELETE FROM articles WHERE id=$article_id";
  if (mysqli_query($conn, $sql)) {
    $_SESSION['message'] = "Article successfully deleted";
    header("location: articles.php");
    exit(0);
  }
}

// if user clicks the publish article button
if (isset($_GET['publish']) || isset($_GET['unpublish'])) {
  $message = "";
  if (isset($_GET['publish'])) {
    $message = "Article published successfully";
    $article_id = $_GET['publish'];
  } else if (isset($_GET['unpublish'])) {
    $message = "Article successfully unpublished";
    $article_id = $_GET['unpublish'];
  }
  togglePublishArticle($article_id, $message);
}
// delete blog article
function togglePublishArticle($article_id, $message)
{
  global $conn;
  $sql = "UPDATE articles SET published=!published WHERE id=$article_id";

  if (mysqli_query($conn, $sql)) {
    $_SESSION['message'] = $message;
    header("location: articles.php");
    exit(0);
  }
}