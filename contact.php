<?php
include('includes/header.php');
include('contact_process.php');
 ?>

 <div class="container">
  <form id="contact" action="<?= $_SERVER['PHP_SELF'];?>" method="post">
    <h3>Contact</h3>
    <h4>Neem contact met ons op en u krijgt zo snel mogelijk een antwoord!</h4>
    <fieldset>
      <input placeholder="Uw Naam" type="text" tabindex="1" name="name" autofocus>
      <span class="error"><?= $name_error ?></span>
    </fieldset>
    <fieldset>
      <input placeholder="Uw Email" type="email" tabindex="2" name="email">
      <span class="error"><?= $email_error ?></span>
    </fieldset>
    <fieldset>
      <input placeholder="Uw telefoonnummer" type="tel" tabindex="3" name="phone">
      <span class="error"><?= $phone_error ?></span>
    </fieldset>
    <fieldset>
      <textarea placeholder="Typ u bericht hier...." tabindex="5" name="message"></textarea>
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">verzend</button>
    </fieldset>
  </form>


</div>







 <?php
 include('includes/footer.php');
 ?>
