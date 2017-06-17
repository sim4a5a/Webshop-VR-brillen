<?php
include('includes/header.php');
include('contact_process.php');
 ?>

 <div class="container">
  <form id="contact" action="<?= $_SERVER['PHP_SELF'];?>" method="post">
    <h3>Contact</h3>
    <h4>Neem contact met ons op en u krijgt zo snel mogelijk een antwoord!</h4>
    <fieldset>
      <input placeholder="Uw Naam" type="text" name="name" tabindex="1" value="<?= $name ?>" autofocus>
      <span class="error"><?= $name_error ?></span>
    </fieldset>
    <fieldset>
      <input placeholder="Uw Email" type="email" name="email" value="<?= $email ?>" tabindex="2" >
      <span class="error"><?= $email_error ?></span>
    </fieldset>
    <fieldset>
      <input placeholder="Uw telefoonnummer" type="tel" name="phone" value="<?= $phone ?>" tabindex="3" >
      <span class="error"><?= $phone_error ?></span>
    </fieldset>
    <fieldset>
      <textarea placeholder="Typ u bericht hier...." name="message" value="<?= $message ?>" tabindex="5" ></textarea>
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">verzend</button>
    </fieldset>
    <div class="succes"><?= $success; ?></div>
  </form>


</div>







 <?php
 include('includes/footer.php');
 ?>
