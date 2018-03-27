<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $ok = true;
  $grecaptcha_secret_key = '6LcGPU8UAAAAANB2tVqhxbvUSkbxJlOjxLDa8UT4';
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
  if ($_POST['g-recaptcha-response']) {
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $params = array(
      'secret' => $grecaptcha_secret_key,
      'response' => $_POST['g-recaptcha-response'],
    );
    $result = file_get_contents($url, false, stream_context_create(array(
      'http' => array(
          'method'  => 'POST',
          'header'  => 'Content-type: application/x-www-form-urlencoded',
          'content' => http_build_query($params)
        )
    )));
    if (!json_decode($result, true)['success']) {
      $ok = false;
      echo "<p>recaptcha remote validation failed</p>";
    }
  } else {
    $ok = false;
    echo "<p>recaptcha validation failed</p>";
  }
  if ($ok) {
    $ip = $_SERVER["REMOTE_ADDR"];
    $message = "Message from $name <$email>, ip: $ip\r\n $body";
    $answer = (int)$_POST["answ"];
    $headers = 'From: Contact Form <noreply@teamfnd.ru>' . "\r\n" .
                'Reply-To: No Reply <noreply@teamfnd.ru>' . "\r\n" .
                'Content-Type: text/plain; charset=UTF-8; format=flowed' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
    mail('info@teamfnd.ru', "Contact Form on teamfnd.ru from $name <$email>", $message, $headers);
    ?>
    <div style="text-align: center; margin-top: 70px;">
      <h1 style="color: green;">Success!</h1>
      <p>Your message has been sent.</p>
      <p>We will reply you as soon as it is possilble.</p>
      <p>You will be redirected back on site soon.</p>
    </div>
    <?php
    echo '<meta http-equiv="refresh" content="4;URL='.$_SERVER['HTTP_REFERER'].'" />';
  } else {
    echo '<h1 style="color: red;">Validation failed. Please check your data</h1>';
  }
} else {
  echo 'Method not allowed';
}
?>
