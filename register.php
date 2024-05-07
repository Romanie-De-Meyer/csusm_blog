<?php include ('config.php'); ?>
<?php include ('includes/registration_login.php'); ?>
<?php include ('includes/head_section.php'); ?>

<title>Register Page</title>
<link rel="stylesheet" href="static/css/register.css" />
</head>

<body>

  <!-- Navbar -->
  <?php include (ROOT_PATH . '/includes/navbar.php'); ?>
  <!-- // Navbar -->
  <main>
    <div class="container_auth">
      <h2>CSUSM Blog - Register</h2>
      <form id="registerForm" method="post" action="register.php">
        <?php include (ROOT_PATH . '/includes/errors.php') ?>
        <input type="text" name="username" value="<?php echo $username; ?>" placeholder="Username">
        <input type="email" name="email" value="<?php echo $email ?>" placeholder="Email">
        <input type="password" name="password_1" id="password_1" placeholder="Password">
        <input type="password" name="password_2" id="password_2" placeholder="Password confirmation">
        <button type="submit" class="submit_button" name="reg_user">Register</button>
        <p>
          Already a member? <a href="login.php">Sign in</a>
        </p>
      </form>
    </div>
  </main>

  <!-- Footer -->
  <?php include (ROOT_PATH . '/includes/footer.php'); ?>
  <!-- // Footer -->