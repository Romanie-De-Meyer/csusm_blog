<!-- The first include should be config.php -->
<?php require_once ('config.php') ?>

<?php require_once (ROOT_PATH . '/includes/head_section.php') ?>
<title>Home Page</title>
<link rel="stylesheet" href="static/css/home.css" />
</head>

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

      <div class="post">
        <img
          src="https://images.pexels.com/photos/415829/pexels-photo-415829.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
          class="post_image" alt="">
        <!-- Added this if statement... -->
        <div>
          <!-- // Add category -->
          <!-- // change href -->
          <a href="#">
            <div class="post_info">
              <h3> <!-- // Add Title --></h3>
              <div class="info">
                <!-- // Add Date -->
                <span class="read_more">Read more...</span>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>

  </main>

  <!-- footer -->
  <?php include (ROOT_PATH . '/includes/footer.php') ?>
  <!-- // footer -->