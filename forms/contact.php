<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  */

  // ✅ Your real email address
  $receiving_email_address = 'mabuza834@gmail.com';

  if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
    include($php_email_form);
  } else {
    die('Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;

  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  // Optional: Uncomment and configure SMTP if needed
  /*
  $contact->smtp = array(
    'host' => 'your-smtp-server.com',
    'username' => 'your-smtp-username',
    'password' => 'your-smtp-password',
    'port' => '587'
  );
  */

  $contact->add_message($_POST['name'], 'Name');
  $contact->add_message($_POST['email'], 'Email');
  $contact->add_message($_POST['phone'], 'Phone'); // ✅ Captures phone number
  $contact->add_message($_POST['message'], 'Message', 10);

  echo $contact->send();
?>
