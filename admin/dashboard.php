<?php include ('../config.php'); ?>
<?php include (ROOT_PATH . '/admin/includes/admin_functions.php'); ?>
<?php include (ROOT_PATH . '/admin/includes/head_section.php'); ?>
<title>Admin | Dashboard</title>
<link rel="stylesheet" href="static/css/admin/dashboard.css" />
</head>

<body>
  <!-- admin navbar -->
  <?php include (ROOT_PATH . '/admin/includes/navbar.php') ?>

  <div class="container dashboard">
    <h1>Welcome</h1>
    <div style="display: flex; justify-content: space-evenly; align-items: center; margin: 32px;">
      <a style="display: flex; flex-direction: column; border: 1px solid black; padding: 32px; align-items: center; border-radius: 8px; color: grey"
        href="users.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="48px" height="48px" viewBox="0 0 256 256">
          <path fill="currentColor"
            d="M234.38 210a123.36 123.36 0 0 0-60.78-53.23a76 76 0 1 0-91.2 0A123.36 123.36 0 0 0 21.62 210a12 12 0 1 0 20.77 12c18.12-31.32 50.12-50 85.61-50s67.49 18.69 85.61 50a12 12 0 0 0 20.77-12M76 96a52 52 0 1 1 52 52a52.06 52.06 0 0 1-52-52" />
        </svg>
        <span style="font-size: 24px;">Manage users</span>
      </a>
      <a href="posts.php"
        style="display: flex; flex-direction: column; border: 1px solid black; padding: 32px; align-items: center; border-radius: 8px; color: grey">
        <svg xmlns="http://www.w3.org/2000/svg" width="48px" height="48px" viewBox="0 0 24 24">
          <g fill="none" stroke="currentColor" stroke-width="1.5">
            <path
              d="M2.906 17.505L5.337 3.718a2 2 0 0 1 2.317-1.623L19.472 4.18a2 2 0 0 1 1.622 2.317l-2.431 13.787a2 2 0 0 1-2.317 1.623L4.528 19.822a2 2 0 0 1-1.622-2.317Z" />
            <path stroke-linecap="round" d="m8.929 6.382l7.879 1.389m-8.574 2.55l7.879 1.39M7.54 14.26l4.924.869" />
          </g>
        </svg>
        <span style="font-size: 24px;">Manage articles</span>
      </a>
    </div>
  </div>
</body>

</html>