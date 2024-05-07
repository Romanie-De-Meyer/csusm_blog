<?php include ('../config.php'); ?>
<?php include (ROOT_PATH . '/admin/includes/admin_functions.php'); ?>
<?php include (ROOT_PATH . '/admin/includes/article_functions.php'); ?>
<?php include (ROOT_PATH . '/admin/includes/head_section.php'); ?>

<!-- Get all admin articles from DB -->
<?php $articles = getAllArticles(); ?>

<?php
$categories = array(
  1 => 'academic',
  2 => 'career',
  3 => 'health and wellness',
  4 => 'hobbies',
  5 => 'misc',
  6 => 'student'
);
?>
<title>Admin | Manage Articles</title>
</head>

<body>
  <!-- admin navbar -->
  <?php include (ROOT_PATH . '/admin/includes/navbar.php') ?>

  <div class="container content">
    <!-- Left side menu -->
    <?php include (ROOT_PATH . '/admin/includes/menu.php') ?>

    <!-- Display records from DB-->
    <div class="table-div" style="width: 80%;">

      <?php if (empty($articles)): ?>
        <h1 style="text-align: center; margin-top: 20px;">No articles in the database.</h1>
      <?php else: ?>
        <table class="table">
          <thead>
            <th>No.</th>
            <th>Title</th>
            <th>Author</th>
            <th>Category</th>
            <th>Views</th>
            <!-- Only Admin can publish/unpublish article -->
            <?php if ($_SESSION['user']['role'] == "Admin"): ?>
              <th><small>Publish</small></th>
            <?php endif ?>
            <th><small>Edit</small></th>
            <th><small>Delete</small></th>
          </thead>
          <tbody>
            <?php foreach ($articles as $key => $article): ?>
              <tr>
                <td><?php echo $key + 1; ?></td>
                <td><?php echo $article['title']; ?></td>
                <td>
                  <?php echo $article['author']; ?>
                </td>
                <td>
                  <?php echo $categories[$article['category']]; ?>
                </td>
                <td><?php echo $article['views']; ?></td>

                <!-- Only Admin can publish/unpublish article -->
                <?php if ($_SESSION['user']['role'] == "Admin"): ?>
                  <td>
                    <?php if ($article['published'] == true): ?>
                      <a class="fa fa-check btn unpublish" href="articles.php?unpublish=<?php echo $article['id'] ?>">
                      </a>
                    <?php else: ?>
                      <a class="fa fa-times btn publish" href="articles.php?publish=<?php echo $article['id'] ?>">
                      </a>
                    <?php endif ?>
                  </td>
                <?php endif ?>

                <td>
                  <a class="fa fa-pencil btn edit" href="create_article.php?edit-article=<?php echo $article['id'] ?>">
                  </a>
                </td>
                <td>
                  <a class="fa fa-trash btn delete" href="create_article.php?delete-article=<?php echo $article['id'] ?>">
                  </a>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      <?php endif ?>
    </div>
    <!-- // Display records from DB -->
  </div>
</body>

</html>