<!-- The first include should be config.php -->
<?php require_once ('config.php') ?>

<?php require_once (ROOT_PATH . '/includes/head_section.php') ?>
<title>Home Page</title>
<link rel="stylesheet" href="static/css/home.css" />
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


  <!-- banner -->
  <?php include (ROOT_PATH . '/includes/banner.php') ?>
  <!-- // banner -->

  <main>
    <div class="content">
      <h2 class="content-title">Recent Articles</h2>
      <hr>
	
      <?php
      $sql = "SELECT id, title, created_at, image FROM articles WHERE category = 1 ORDER BY id DESC LIMIT 1";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      $article_id = $row["id"] ?? 'null';
      $article_title = $row["title"] ?? 'No blogs in this category yet!';
      $article_time = $row["created_at"] ?? '';
      $image_url = $row["image"] ?? 'https://cdn.icon-icons.com/icons2/2566/PNG/512/error_icon_153602.png';

      echo '<div class="post" id="post1">
	      <div>
              <img src="' . $image_url . '" class="post_image" alt="">
	        <a href="article.php?category=1&id=' . $article_id . '">
                  <div class="post_info">
                    <h3>' . $article_title . '</h3>
		    <div class="info">
                      <p>' . $article_time . '</p>
                      <span class="read_more">Read more...</span>
                    </div>
                  </div>
                </a>
              </div>
            </div>'; 
       $sql = "SELECT id, title, created_at, image FROM articles WHERE category = 2 ORDER BY id DESC LIMIT 1";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      $article_id = $row["id"] ?? 'null';
      $article_title = $row["title"] ?? 'No blogs in this category yet!';
      $article_time = $row["created_at"] ?? '';
      $image_url = $row["image"] ?? 'https://cdn.icon-icons.com/icons2/2566/PNG/512/error_icon_153602.png';

      echo '<div class="post" id="post2">
	      <div>
              <img src="' . $image_url . '" class="post_image" alt="">
	        <a href="article.php?category=2&id=' . $article_id . '">
                  <div class="post_info">
                    <h3>' . $article_title . '</h3>
		    <div class="info">
                      <p>' . $article_time . '</p>
                      <span class="read_more">Read more...</span>
                    </div>
                  </div>
                </a>
              </div>
            </div>';
       $sql = "SELECT id, title, created_at, image FROM articles WHERE category = 3 ORDER BY id DESC LIMIT 1";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      $article_id = $row["id"] ?? 'null';
      $article_title = $row["title"] ?? 'No blogs in this category yet!';
      $article_time = $row["created_at"] ?? '';
      $image_url = $row["image"] ?? 'https://cdn.icon-icons.com/icons2/2566/PNG/512/error_icon_153602.png';

      echo '<div class="post" id="post3">
	      <div>
              <img src="' . $image_url . '" class="post_image" alt="">
	        <a href="article.php?category=3&id=' . $article_id . '">
                  <div class="post_info">
                    <h3>' . $article_title . '</h3>
		    <div class="info">
                      <p>' . $article_time . '</p>
                      <span class="read_more">Read more...</span>
                    </div>
                  </div>
                </a>
              </div>
            </div>';
      $sql = "SELECT id, title, created_at, image FROM articles WHERE category = 4 ORDER BY id DESC LIMIT 1";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      $article_id = $row["id"] ?? 'null';
      $article_title = $row["title"] ?? 'No blogs in this category yet!';
      $article_time = $row["created_at"] ?? '';
      $image_url = $row["image"] ?? 'https://cdn.icon-icons.com/icons2/2566/PNG/512/error_icon_153602.png';

      echo '<div class="post" id="post4">
	      <div>
              <img src="' . $image_url . '" class="post_image" alt="">
	        <a href="article.php?category=4&id=' . $article_id . '">
                  <div class="post_info">
                    <h3>' . $article_title . '</h3>
		    <div class="info">
                      <p>' . $article_time . '</p>
                      <span class="read_more">Read more...</span>
                    </div>
                  </div>
                </a>
              </div>
            </div>';
       $sql = "SELECT id, title, created_at, image FROM articles WHERE category = 5 ORDER BY id DESC LIMIT 1";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      $article_id = $row["id"] ?? 'null';
      $article_title = $row["title"] ?? 'No blogs in this category yet!';
      $article_time = $row["created_at"] ?? '';
      $image_url = $row["image"] ?? 'https://cdn.icon-icons.com/icons2/2566/PNG/512/error_icon_153602.png';

      echo '<div class="post" id="post5">
	      <div>
              <img src="' . $image_url . '" class="post_image" alt="">
	        <a href="article.php?category=5&id=' . $article_id . '">
                  <div class="post_info">
                    <h3>' . $article_title . '</h3>
		    <div class="info">
                      <p>' . $article_time . '</p>
                      <span class="read_more">Read more...</span>
                    </div>
                  </div>
                </a>
              </div>
            </div>';
      $sql = "SELECT id, title, created_at, image FROM articles WHERE category = 6 ORDER BY id DESC LIMIT 1";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      $article_id = $row["id"] ?? 'null';
      $article_title = $row["title"] ?? 'No blogs in this category yet!';
      $article_time = $row["created_at"] ?? '';
      $image_url = $row["image"] ?? 'https://cdn.icon-icons.com/icons2/2566/PNG/512/error_icon_153602.png';

      echo '<div class="post" id="post6">
	      <div>
              <img src="' . $image_url . '" class="post_image" alt="">
	        <a href="article.php?category=6&id=' . $article_id . '">
                  <div class="post_info">
                    <h3>' . $article_title . '</h3>
		    <div class="info">
                      <p>' . $article_time . '</p>
                      <span class="read_more">Read more...</span>
                    </div>
                  </div>
                </a>
              </div>
            </div>';
	?>
	</div>

  </main>

  <!-- footer -->
  <?php include (ROOT_PATH . '/includes/footer.php') ?>
  <!-- // footer -->