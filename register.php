<!-- Include Head -->
<?php require "./components/db.php"; ?>

<?php
session_start();
$loggedin = false;

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
  header("location: index.php");
  exit;
}

$email = $username = $password = $confirm_password = "";
$email_err = $username_err = $password_err = $confirm_password_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Validate email
  if (empty(trim($_POST["email"]))) {
    $email_err = "Please enter email.";
  } else {
    // Prepare a select statement to check if the email already exists
    $sql_check_email = "SELECT id FROM users WHERE email = :email";

    if ($stmt_check_email = $pdo->prepare($sql_check_email)) {
      // Bind variables to the prepared statement as parameters
      $stmt_check_email->bindParam(":email", $param_email, PDO::PARAM_STR);

      // Set parameters
      $param_email = trim($_POST["email"]);

      // Attempt to execute the prepared statement
      if ($stmt_check_email->execute()) {
        // If email exists, display error
        if ($stmt_check_email->rowCount() > 0) {
          $email_err = "This email is already taken.";
        } else {
          $email = trim($_POST["email"]);
        }
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }

      // Close statement
      unset($stmt_check_email);
    }
  }

  // Validate username
  if (empty(trim($_POST["username"]))) {
    $username_err = "Please enter username.";
  } else {
    $username = trim($_POST["username"]);
  }

  // Validate password
  if (empty(trim($_POST["password"]))) {
    $password_err = "Please enter your password.";
  } elseif (strlen(trim($_POST["password"])) < 6) {
    $password_err = "Password must have at least 6 characters.";
  } else {
    $password = trim($_POST["password"]);
  }

  // Validate confirm password
  if (empty(trim($_POST["confirm_password"]))) {
    $confirm_password_err = "Please confirm password.";
  } else {
    $confirm_password = trim($_POST["confirm_password"]);
    if (empty($password_err) && ($password != $confirm_password)) {
      $confirm_password_err = "Password did not match.";
    }
  }

  // Check for input errors before inserting into database
  if (empty($email_err) && empty($username_err) && empty($password_err) && empty($confirm_password_err)) {

    function uniqidReal($length = 13)
    {
      // uniqid gives 13 chars, but you could adjust it to your needs.
      if (function_exists("random_bytes")) {
        $bytes = random_bytes(ceil($length / 2));
      } elseif (function_exists("openssl_random_pseudo_bytes")) {
        $bytes = openssl_random_pseudo_bytes(ceil($length / 2));
      } else {
        throw new Exception("No cryptographically secure random function available");
      }
      return substr(bin2hex($bytes), 0, $length);
    }

    $id = uniqidReal();
    // Prepare an insert statement
    $sql = "INSERT INTO users (id, email, username, password, created_at) VALUES (:id, :email, :username, :password, NOW())";

    if ($stmt = $pdo->prepare($sql)) {
      // Bind variables to the prepared statement as parameters
      $stmt->bindParam(":id", $param_id, PDO::PARAM_STR);
      $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
      $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
      $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);

      // Set parameters
      $param_id = $id;
      $param_email = $email;
      $param_username = $username;
      $param_password = password_hash($password, PASSWORD_DEFAULT); // Hash password

      // Attempt to execute the prepared statement
      if ($stmt->execute()) {
        // Redirect user to login page
        header("location: index.php");
        exit;
      } else {
        echo "Something went wrong. Please try again later.";
      }

      // Close statement
      unset($stmt);
    }
  }

  // Close connection
  unset($pdo);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- css styles -->
  <link rel="stylesheet" href="public/css/font.css" />
  <link rel="stylesheet" href="public/css/global.css" />
  <link rel="stylesheet" href="public/css/header.css" />

  <!-- font -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />

  <title>Register Page</title>

  <!-- Custom CSS -->
  <link rel="stylesheet" href="./public/css/register.css" />
</head>

<body>
  <!-- Include Header -->
  <?php include "./components/header.php" ?>

  <main style="height: calc(100vh - 70px); padding: 80px;">
    <section>
      <div class="container">
        <h3>CSUSM Blog</h3>
        <form id="registerForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          <label for="email">Email</label>
          <input type="text" name="email" id="email" />
          <label for="username">Username</label>
          <input type="text" name="username" id="username" />
          <label for="password">Password</label>
          <input type="password" name="password" id="password" />
          <label for="confirm_password">Confirm Password</label>
          <input type="password" name="confirm_password" id="confirm_password" />
          <button class="submit_button" type="submit">Register</button>
        </form>
        <span>or</span>
        <div class="button" id="login">
          <a href="/csusm_blog/login.php">Login</a>
        </div>
      </div>
    </section>
  </main>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>

  <!-- Footer -->
  <?php include "./components/footer.php" ?>
</body>

</html>