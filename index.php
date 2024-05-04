<!-- Include Head -->
<?php require "./components/head.php"; ?>

<title>Home Page</title>

<!-- Custom CSS -->
<link rel="stylesheet" href="public/css/home.css" />

</head>

<body>
  <!-- Include Header -->
  <?php include "./components/header.php" ?>

  <main>
    <section class="home-container">
      <?php if ($loggedin): ?>
        <h2 class="title">Welcome to the CSUSM Blog, <?= $_SESSION["username"]; ?></h2>
      <?php else: ?>
        <h2 class="title">Welcome to the CSUSM Blog</h2>
      <?php endif; ?>
      <!-- <h2 class="title">Welcome to the CSUSM Blog</h2> -->
      <p class="description">
        Discover various articles from your fellow students at CSUSM
      </p>
      <section class="post-section">
        <h3 class="post-title">Title Here</h3>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed suscipit
          arcu eget turpis varius, eget commodo neque vulputate. Duis eu massa
          sed nulla lacinia consequat.
        </p>
        <p>
          Donec finibus ex a arcu pharetra, nec suscipit tortor feugiat. Vivamus
          commodo ligula nec nisi dignissim, ac dapibus orci fermentum. Integer
          malesuada urna id diam suscipit lacinia.
        </p>
        <!-- change the href when we will have the articleId -->
        <a href="#" class="read-more">Read More</a>
      </section>
      <section class="post-section">
        <h3 class="post-title">Title Here</h3>
        <p>
          Nullam non placerat arcu, vel malesuada ligula. Proin nec purus a
          magna varius accumsan et in turpis. Fusce vitae lacus eget ligula
          posuere bibendum.
        </p>
        <p>
          Nam ullamcorper, justo a interdum dictum, ligula dui placerat urna, et
          maximus arcu ligula nec libero. Phasellus non enim nec ex congue
          consequat. Pellentesque et tristique urna.
        </p>
        <!-- change the href when we will have the articleId -->
        <a href="#" class="read-more">Read More</a>
      </section>
    </section>
  </main>

  <!-- Footer -->
  <?php include "./components/footer.php" ?>
</body>

</html>