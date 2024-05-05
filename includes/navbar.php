<header>
  <nav class="navbar">
    <p class="logo cormorant-garamond-bold">
      Csusm<span class="cormorant-garamond-regular">Blog</span>
    </p>
    <ul class="links-container">
      <li class="link cormorant-garamond-regular">
        <a href="index.php" class="link">home</a>
      </li>
      <li class="link cormorant-garamond-regular">
        <a href="categories.php" class="link">category</a>
      </li>
    </ul>
    <?php if (isset($_SESSION['user']['username'])): ?>
      <div style="display: flex; gap: 8px; align-items: center;">
        <div class="logged_in_info">
          <span>Welcome <?php echo $_SESSION['user']['username'] ?></span>
          |
          <span><a href="logout.php">logout</a></span>
        </div>
        <div style="height: 48px; width: 48px; cursor: pointer;">
          <a href="<?php echo BASE_URL . 'profile.php' ?>">
            <img height="48px" width="48px"
              src="https://images.pexels.com/photos/415829/pexels-photo-415829.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" />
          </a>
        </div>
      </div>
    <?php else: ?>
      <div class="button">
        <a href="login.php">Login</a>
      </div>
    <?php endif; ?>
  </nav>
</header>