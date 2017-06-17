<?php


// define variables and set to empty values
$name_error = $email_error = $phone_error = $url_error = "";
$name = $email = $phone = $message = $url = $success = "";

//form is submitted with POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $name_error = "Naam is verplicht";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $name_error = "Alleen letters en spaties toegestaan";
    }
  }

  if (empty($_POST["email"])) {
    $email_error = "E-mail is verplicht";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $email_error = "Ongeldig e-mailadres";
    }
  }

  if (empty($_POST["phone"])) {
    $phone_error = "Telefoon is verplicht";
  } else {
    $phone = test_input($_POST["phone"]);
    // check if e-mail address is well-formed
    if (!preg_match("/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i",$phone)) {
      $phone_error = "Ongeldig telefoonnummer";
    }
  }

  if (empty($_POST["message"])) {
    $message = "";
  } else {
    $message = test_input($_POST["message"]);
  }

  if ($name_error == '' and $email_error == '' and $phone_error == '' and $url_error == '' ){
      $message_body = '';
      unset($_POST['submit']);
      foreach ($_POST as $key => $value){
          $message_body .=  "$key: $value\n";
      }


      $to      = 'simone_vankempen@live.nl';
      $subject = 'Subject';
      $message = $_POST['message'];
      $headers = "From: webmaster@example.com\r\n";
      $headers .= "Reply-To: webmaster@example.com\r\n";
      $headers .= "X-Mailer: PHP/".phpversion();
      if (mail($to, $subject, $message, $headers)){
          $success = "Bedankt voor je bericht. We nemen zo snel mogelijk contact met je op.";
          $name = $email = $phone = $message = $url = '';
      }
  }

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
