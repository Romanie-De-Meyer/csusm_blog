<?php include ('includes/article.php'); ?>
<?php include ('includes/head_section.php'); ?>

<?php $articles = getUserArticles(); ?>

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

<title>Profile Page</title>
<link rel="stylesheet" href="static/css/profile.css" />
</head>

<body>
  <!-- navbar -->
  <?php include (ROOT_PATH . '/includes/navbar.php'); ?>
  <!-- // navbar -->

  <main>
    <div style="display: flex; justify-content: space-between">
      <div style="width: fit-content; position: static">
        <img
          src="https://images.pexels.com/photos/415829/pexels-photo-415829.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
          width="300px" alt="profile" />
        <div style="display: flex; flex-direction: column; gap: 16px">
          <p style="font-size: 28px; font-weight: 700"><?php echo $_SESSION['user']['username'] ?></p>
          <div class="profile_container">
            <div style="display: flex; gap: 16px; align-items: center">
              <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                <path fill="currentColor"
                  d="M22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2zm-2 0l-8 5l-8-5zm0 12H4V8l8 5l8-5z" />
              </svg>
              <p><?php echo $_SESSION['user']['email'] ?></p>
            </div>
          </div>
        </div>
      </div>
      <div style="height: calc(100vh - 70px - 80px - 40px)">
        <div style="display: flex; width: 100%; justify-content: end">
          <div class="button">
            <a href="new_article.php">New Article</a>
          </div>
        </div>
        <div class="articles_container">
          <?php foreach ($articles as $article): ?>
            <article>
              <img src="<?php echo BASE_URL . 'static/images/' . $article['image']; ?>" width="200px" alt="article" />
              <p class="category-btn">
                <?php echo $categories[$article['category']]; ?>
              </p>
              <div style="width: 100%;">
                <div style="display: flex; width: 100%; justify-content: space-between">
                  <h2 style="padding-bottom: 8px"><?php echo $article['title'] ?></h2>
                  <div>
                    <a style="margin-right: 8px;" href="new_article.php?edit-article=<?php echo $article['id'] ?>">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                        <path fill="black"
                          d="m14.06 9.02l.92.92L5.92 19H5v-.92zM17.66 3c-.25 0-.51.1-.7.29l-1.83 1.83l3.75 3.75l1.83-1.83a.996.996 0 0 0 0-1.41l-2.34-2.34c-.2-.2-.45-.29-.71-.29m-3.6 3.19L3 17.25V21h3.75L17.81 9.94z" />
                      </svg>
                    </a>
                    <a href="new_article.php?delete-article=<?php echo $article['id'] ?>">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 256 256">
                        <path fill="red"
                          d="M216 48h-40v-8a24 24 0 0 0-24-24h-48a24 24 0 0 0-24 24v8H40a8 8 0 0 0 0 16h8v144a16 16 0 0 0 16 16h128a16 16 0 0 0 16-16V64h8a8 8 0 0 0 0-16M96 40a8 8 0 0 1 8-8h48a8 8 0 0 1 8 8v8H96Zm96 168H64V64h128Zm-80-104v64a8 8 0 0 1-16 0v-64a8 8 0 0 1 16 0m48 0v64a8 8 0 0 1-16 0v-64a8 8 0 0 1 16 0" />
                      </svg>
                    </a>
                  </div>
                </div>
                <p style="margin-bottom: 24px; text-overflow: ellipsis">
                  <?php echo $article['body'] ?>
                </p>
                <div class="text_container">
                  <p style="font-style: italic">
                    <?php echo date("F j, Y ", strtotime($article["created_at"])); ?> -
                    <span style="font-weight: 700"><?php echo $article['author'] ?></span>
                  </p>
                  <div class="button-outlined">
                    <!-- // change href -->
                    <a href="#">See more</a>
                  </div>
                </div>
              </div>
            </article>
          <?php endforeach ?>
        </div>
      </div>
    </div>
  </main>

  <!-- // Page content -->

  <!-- footer -->
  <?php include (ROOT_PATH . '/includes/footer.php'); ?>
  <!-- // footer -->