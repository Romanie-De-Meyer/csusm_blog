<?php include ('config.php'); ?>

<?php include ('includes/head_section.php'); ?>

<title>Profile Page</title>
</head>

<body>
  <!-- navbar -->
  <?php include (ROOT_PATH . '/includes/navbar.php'); ?>
  <!-- // navbar -->

  <main style="overflow: hidden">
    <div style="display: flex; justify-content: space-between">
      <div style="width: fit-content; position: static">
        <img
          src="https://images.pexels.com/photos/415829/pexels-photo-415829.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
          width="300px" alt="profile" />
        <div style="display: flex; flex-direction: column; gap: 16px">
          <p style="font-size: 28px; font-weight: 700">Romanie De Meyer</p>
          <div style="
                display: flex;
                flex-direction: column;
                gap: 8px;
                width: fit-content;
              ">
            <div style="display: flex; gap: 16px; align-items: center">
              <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                <path fill="currentColor"
                  d="M22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2zm-2 0l-8 5l-8-5zm0 12H4V8l8 5l8-5z" />
              </svg>
              <p>romanie0403@gmail.com</p>
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
        <div style="
              overflow: scroll;
              height: inherit;
              padding-top: 24px;
              padding-bottom: 24px;
            ">
          <article style="
                display: flex;
                border: 0.5px solid black;
                padding: 16px;
                gap: 32px;
                max-width: 800px;
              ">
            <img
              src="https://images.pexels.com/photos/415829/pexels-photo-415829.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
              width="200px" alt="article" />
            <div>
              <h2 style="padding-bottom: 8px">Titre de l'article</h2>
              <p style="margin-bottom: 24px; text-overflow: ellipsis">
                Lorem Ipsum is simply dummy text of the printing and
                typesetting industry. Lorem Ipsum has been the industry's
                standard dummy text ever since the 1500s, when an unknown
                printer took a galley of type and scrambled it to make a type
                specimen book. It has survived not only five centuries, but
                also the leap into electronic typesetting, remaining
                essentially unchanged. It was popularised in the 1960s with
                the release of Letraset sheets containing Lorem Ipsum
                passages, and more recently with desktop publishing software
                like Aldus PageMaker including versions of Lorem Ipsum.
              </p>
              <div style="
                    display: flex;
                    justify-content: space-between;
                    width: 100%;
                    align-items: end;
                  ">
                <p style="font-style: italic">
                  18 janvier 2024 -
                  <span style="font-weight: 700">by Romanie</span>
                </p>
                <div class="button">
                  <!-- // change href -->
                  <a href="#">See more</a>
                </div>
              </div>
            </div>
          </article>
        </div>
      </div>
    </div>
  </main>

  <!-- // Page content -->

  <!-- footer -->
  <?php include (ROOT_PATH . '/includes/footer.php'); ?>
  <!-- // footer -->