<header>
  <nav class="navbar">
    <p class="logo cormorant-garamond-bold">
      Csusm<span class="cormorant-garamond-regular">Blog</span>
    </p>
    <ul class="links-container">
      <li class="link cormorant-garamond-regular">
        <a href="/csusm_blog" class="link">home</a>
      </li>
      <li class="link cormorant-garamond-regular">
        <a href="/csusm_blog/categories.html" class="link">category</a>
      </li>
    </ul>
    <?php if ($loggedin): ?>
      <div style="height: 16px; width: 16px">
        <img
          src="https://images.pexels.com/photos/415829/pexels-photo-415829.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" />
      </div>
    <?php else: ?>
      <div class="button">
        <a href="/csusm_blog/login.php">Login</a>
      </div>
    <?php endif; ?>
  </nav>
</header>