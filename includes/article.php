<?php require "db.php"; ?>
<?php

// INSERT
function createArticle($userID, $content, $title, $image)
{
    global $connection;
    $content = mysqli_real_escape_string($connection, $content);
    $title = mysqli_real_escape_string($connection, $title);
    $image = mysqli_real_escape_string($connection, $image);
    $query = "INSERT INTO Articles (UserID, Content, Title, Image) VALUES ($userID, '$content', '$title', '$image')";
    mysqli_query($connection, $query);
}

// SELECT
function getArticles()
{
    global $connection;
    $query = "SELECT * FROM Articles";
    $result = mysqli_query($connection, $query);
    $articles = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $articles[] = $row;
    }
    return $articles;
}

// UPDATE
function updateArticle($articleID, $content, $title)
{
    global $connection;
    $content = mysqli_real_escape_string($connection, $content);
    $title = mysqli_real_escape_string($connection, $title);
    $query = "UPDATE Articles SET Content='$content', Title='$title' WHERE ArticleID=$articleID";
    mysqli_query($connection, $query);
}

// DELETE
function deleteArticle($articleID)
{
    global $connection;
    $query = "DELETE FROM Articles WHERE ArticleID=$articleID";
    mysqli_query($connection, $query);
}
