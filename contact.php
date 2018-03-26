<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $ok = true;
  if ($_POST['email'] && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $email = $_POST['email'];
  } else {
    $ok = false;
    echo "<p>Email validation failed</p>";
  }
  if ($_POST['name'] && strlen($_POST['name']) <= 30) {
    $name = htmlspecialchars($_POST['name']);
  } else {
    $ok = false;
    echo "<p>Name validation failed</p>";
  }
  if ($_POST['body'] && strlen($_POST['body']) <= 2000) {
    $body = htmlspecialchars($_POST['body']);
  } else {
    $ok = false;
    echo "<p>Message validation failed</p>";
  }
  if ($ok) {
    // TODO: Sendmail
    echo "<p>Validation passed</p>";
  } else {
    echo "<p>Validation failed. Please check your data</p>";
  }
} else {
  echo 'Method not allowed';
}
?>
