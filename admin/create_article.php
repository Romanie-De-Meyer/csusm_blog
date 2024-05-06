<?php include ('../config.php'); ?>
<?php include (ROOT_PATH . '/admin/includes/admin_functions.php'); ?>
<?php include (ROOT_PATH . '/admin/includes/article_functions.php'); ?>
<?php include (ROOT_PATH . '/admin/includes/head_section.php'); ?>

<?php
$categories = ['miscArticles', 'academicArticles', 'careerArticles', 'healthwellArticles', 'hobbiesArticles', 'studentArticles'];
?>
<title>Admin | Create Article</title>
</head>

<body>
  <!-- admin navbar -->
  <?php include (ROOT_PATH . '/admin/includes/navbar.php') ?>

  <div class="container content">
    <!-- Left side menu -->
    <?php include (ROOT_PATH . '/admin/includes/menu.php') ?>

    <!-- Middle form - to create and edit  -->
    <div class="action create-article-div">
      <h1 class="page-title">Create/Edit Article</h1>
      <form method="article" enctype="multipart/form-data"
        action="<?php echo BASE_URL . 'admin/create_article.php'; ?>">
        <!-- validation errors for the form -->
        <?php include (ROOT_PATH . '/includes/errors.php') ?>

        <!-- if editing article, the id is required to identify that article -->
        <?php if ($isEditingArticle === true): ?>
          <input type="hidden" name="article_id" value="<?php echo $article_id; ?>">
        <?php endif ?>

        <input type="text" name="title" value="<?php echo $title; ?>" placeholder="Title">
        <label style="float: left; margin: 5px auto 5px;">Featured image</label>
        <input type="file" name="featured_image">
        <textarea name="body" id="body" cols="30" rows="10"><?php echo $body; ?></textarea>

        <select name="category">
          <option value="" selected disabled>Choose category</option>
          <?php foreach ($categories as $key => $category): ?>
            <option value="<?php echo $category; ?>"><?php echo $category; ?></option>
          <?php endforeach ?>
        </select>

        <!-- Only admin users can view publish input field -->
        <?php if ($_SESSION['user']['role'] == "Admin"): ?>
          <!-- display checkbox according to whether article has been published or not -->
          <?php if ($published == true): ?>
            <label for="publish">
              Publish
              <input type="checkbox" value="1" name="publish" checked="checked">&nbsp;
            </label>
          <?php else: ?>
            <label for="publish">
              Publish
              <input type="checkbox" value="1" name="publish">&nbsp;
            </label>
          <?php endif ?>
        <?php endif ?>

        <!-- if editing article, display the update button instead of create button -->
        <?php if ($isEditingArticle === true): ?>
          <button type="submit" class="btn" name="update_article">UPDATE</button>
        <?php else: ?>
          <button type="submit" class="btn" name="create_article">Save Article</button>
        <?php endif ?>

      </form>
    </div>
    <!-- // Middle form - to create and edit -->
  </div>
</body>

</html>

<script>
  CKEDITOR.replace('body');
</script>