<?php include ('config.php'); ?>

<?php include ('includes/head_section.php'); ?>

<title>New Article Page</title>
<link rel="stylesheet" href="static/css/new-article.css" />
</head>

<body>
  <!-- Navbar -->
  <?php include (ROOT_PATH . '/includes/navbar.php'); ?>
  <!-- // Navbar -->

  <main style="overflow: hidden">
    <div class="banner">
      <input type="file" accept="image/*" id="banner-upload" hidden />
      <label for="banner-upload" class="banner-upload-btn"><img src="static/images/upload.png"
          alt="upload banner" /></label>
    </div>

    <div class="blog">
      <textarea type="text" class="title cormorant-garamond-semibold" placeholder="Blog title...">

      </textarea>
      <textarea type="text" class="article cormorant-garamond-semibold" placeholder="Start writing here...">

      </textarea>
    </div>

    <div class="blog-options">
      <button class="btn dark cormorant-garamond-medium">publish</button>
      <input type="file" accept="image/*" id="image-upload" hidden />
      <label for="image-upload" class="btn grey cormorant-garamond-medium">Upload Image</label>
    </div>
  </main>

  <!-- // container -->
  <!-- Footer -->
  <?php include (ROOT_PATH . '/includes/footer.php'); ?>
  <!-- // Footer -->