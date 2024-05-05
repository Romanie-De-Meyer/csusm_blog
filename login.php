<?php include ('config.php'); ?>
<?php include ('includes/registration_login.php'); ?>
<?php include ('includes/head_section.php'); ?>

<title>Login Page</title>
<link rel="stylesheet" href="static/css/login.css" />
</head>

<body>
  <!-- Navbar -->
  <?php include (ROOT_PATH . '/includes/navbar.php'); ?>
  <!-- // Navbar -->

  <main>
    <div class="container_auth">
      <h2>CSUSM Blog - Login</h2>
      <form id="loginForm" method="post" action="login.php">
        <?php include (ROOT_PATH . '/includes/errors.php') ?>
        <input type="text" name="username" value="<?php echo $username; ?>" value="" placeholder="Username">
        <input type="password" name="password" id="password" placeholder="Password">
        <button type="submit" class="submit_button" name="login_btn">Login</button>
        <p>
          Not yet a member? <a href="register.php">Sign up</a>
        </p>
      </form>
    </div>
  </main>

  <!-- Footer -->
  <?php include (ROOT_PATH . '/includes/footer.php'); ?>
  <!-- // Footer -->