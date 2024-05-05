<?php include ('config.php'); ?>

<?php include ('includes/head_section.php'); ?>

<title>Category Page</title>
<link rel="stylesheet" href="static/css/categories.css" />
</head>

<body>
  <!-- Navbar -->
  <?php include (ROOT_PATH . '/includes/navbar.php'); ?>
  <!-- // Navbar -->


  <main>
    <div class="Title">
      <h1>Categories</h1>
    </div>
    <div class="introduction">
      <p>These are all of the Categories that we offer:</p>
    </div>

    <div class="category-descriptions">
      <div class="category-description">
        <h3>Academic Success</h3>
        <p>
          Tips for studying, time management, note-taking strategies, dealing
          with exams, etc.
        </p>
      </div>
      <div class="category-description">
        <h3>Health and Wellness</h3>
        <p>
          Topics such as mental health, exercise, nutrition, stress
          management, and coping with the demands of college life.
        </p>
      </div>
      <div class="category-description">
        <h3>Student Life</h3>
        <p>
          Posts about dorm life, campus events, making friends, managing
          finances, and navigating campus resources.
        </p>
      </div>
      <div class="category-description">
        <h3>Hobbies and Interests</h3>
        <p>
          Content related to hobbies, passions, sports, arts, entertainment,
          and leisure activities.
        </p>
      </div>
      <div class="category-description">
        <h3>Career Planning</h3>
        <p>
          Articles on internships, resume writing, job interviews, networking,
          and career exploration.
        </p>
      </div>
      <div class="category-description">
        <h3>Misc</h3>
        <p>Other topics that don't fit into specific categories.</p>
      </div>
    </div>

    <div class="category-buttons">
      <button onclick="populateAcademic()">Academic Success</button>
      <button onclick="populateHealthwell()">Health and Wellness</button>
      <button onclick="populateStudent()">Student Life</button>
      <button onclick="populateHobbies()">Hobbies and Interests</button>
      <button onclick="populateCareer()">Career Planning</button>
      <button onclick="populateMisc()">Misc</button>
    </div>
    <div id="miscArticles"></div>
    <div id="academicArticles"></div>
    <div id="careerArticles"></div>
    <div id="healthwellArticles"></div>
    <div id="hobbiesArticles"></div>
    <div id="studentArticles"></div>

  </main>
  <script src="scripts.js"></script>

  <!-- Footer -->
  <?php include (ROOT_PATH . '/includes/footer.php'); ?>
  <!-- // Footer -->