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
      $sql = "SELECT id, title, created_at FROM articles WHERE category = 1 ORDER BY id DESC LIMIT 1";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      $article_id = $row["id"];
      $article_title = $row["title"];
      $article_time = $row["created_at"];

      echo '<div class="post" id="post1">
	      <div>
              <img src="https://t4.ftcdn.net/jpg/01/95/09/85/360_F_195098550_LAlz1RCiheCkVRpXHAi1KwIZEZiYAbyM.jpg" class="post_image" alt="">
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
       $sql = "SELECT id, title, created_at FROM articles WHERE category = 2 ORDER BY id DESC LIMIT 1";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      $article_id = $row["id"];
      $article_title = $row["title"];
      $article_time = $row["created_at"];

      echo '<div class="post" id="post2">
	      <div>
              <img src="https://er.educause.edu/-/media/images/articles/2022/02/er21_1303_headerart_1600x900.jpg?hash=6D536162636B6607EA92AA27B04FA20C076D8DE6" class="post_image" alt="">
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
       $sql = "SELECT id, title, created_at FROM articles WHERE category = 3 ORDER BY id DESC LIMIT 1";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      $article_id = $row["id"];
      $article_title = $row["title"];
      $article_time = $row["created_at"];

      echo '<div class="post" id="post3">
	      <div>
              <img src="https://marvel-b1-cdn.bc0a.com/f00000000299134/www.bentley.edu/sites/default/files/featured_images/2018/08/health-wellness-display-sign-image.png" class="post_image" alt="">
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
      $sql = "SELECT id, title, created_at FROM articles WHERE category = 4 ORDER BY id DESC LIMIT 1";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      $article_id = $row["id"];
      $article_title = $row["title"];
      $article_time = $row["created_at"];

      echo '<div class="post" id="post4">
	      <div>
              <img src="https://samhin.org/wp-content/uploads/people-hobbies.jpg" class="post_image" alt="">
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
       $sql = "SELECT id, title, created_at FROM articles WHERE category = 5 ORDER BY id DESC LIMIT 1";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      $article_id = $row["id"];
      $article_title = $row["title"];
      $article_time = $row["created_at"];

      echo '<div class="post" id="post5">
	      <div>
              <img src="https://imageproxyb.ifunny.co/crop:x-20,resize:640x,quality:90x75/images/e77aed322713b4f8c5699d15b08747824f6bec8d55ad19184e82a3788a5694bd_1.jpg" class="post_image" alt="">
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
      $sql = "SELECT id, title, created_at FROM articles WHERE category = 6 ORDER BY id DESC LIMIT 1";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      $article_id = $row["id"];
      $article_title = $row["title"];
      $article_time = $row["created_at"];

      echo '<div class="post" id="post6">
	      <div>
              <img src="https://www.lingayasvidyapeeth.edu.in/sanmax/wp-content/uploads/2023/07/studentlife.webp" class="post_image" alt="">
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