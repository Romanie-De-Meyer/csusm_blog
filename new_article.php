<?php include ('includes/article.php'); ?>
<?php include ('includes/head_section.php'); ?>

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

<title>New Article Page</title>
<link rel="stylesheet" href="static/css/new-article.css" />
</head>

<body>
  <!-- Navbar -->
  <?php include (ROOT_PATH . '/includes/navbar.php'); ?>
  <!-- // Navbar -->

  <main style="height:fit-content;">
    <form method="post" enctype="multipart/form-data" action="new_article.php">
      <div class="banner_article">
        <input type="file" name="featured_image">
      </div>

      <?php if ($isEditingArticle === true): ?>
        <input type="hidden" name="article_id" value="<?php echo $article_id; ?>">
      <?php endif ?>

      <select name="category">
        <option value="" selected disabled>Choose category</option>
        <?php foreach ($categories as $number => $category): ?>
          <option value="<?php echo $number; ?>"><?php echo $category; ?></option>
        <?php endforeach ?>
      </select>

      <div class="blog">
        <textarea type="text" name="title" id="title" class="title cormorant-garamond-semibold"
          placeholder="Blog title..."><?php echo $title; ?></textarea>
        <textarea name="body" id="body" cols="30" rows="10" class="article cormorant-garamond-semibold"
          placeholder="Start writing here..."><?php echo $body; ?></textarea>
      </div>

      <div class="blog-options">
        <?php if ($isEditingArticle === true): ?>
          <button class="cormorant-garamond-medium" type="submit" class="button" name="update_article">UPDATE</button>
        <?php else: ?>
          <button class="cormorant-garamond-medium" type="submit" class="button" name="create_article">Save
            Article</button>
        <?php endif ?>
      </div>
    </form>
  </main>

  <!-- // container -->
  <!-- Footer -->
  <?php include (ROOT_PATH . '/includes/footer.php'); ?>
  <!-- // Footer -->