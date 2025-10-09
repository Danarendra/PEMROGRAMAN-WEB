<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><title>html_safe</title></head>
<body>
  <form method="post" action="">
    <label>Input:</label>
    <input type="text" name="input" required>
    <br><br>
    <label>Email:</label>
    <input type="email" name="email" required>
    <br><br>
    <input type="submit" value="Submit">
  </form>

  <?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $input = htmlspecialchars($_POST['input'], ENT_QUOTES, 'UTF-8');

    $email = trim($_POST['email']);
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
      echo "Processed input: " . $input . "<br>";
      echo "Valid email: " . $email;
    } else {
      echo "Processed input: " . $input . "<br>";
      echo "Email is not valid.";
    }
  }
  ?>
</body>
</html>

