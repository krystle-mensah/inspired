<?php
include "inc/db.php";
include "inc/head.php";
include "inc/header.php";
?>

<div class="container">
  <!-- NAVIGATION -->
  <?php include "inc/navigation.php"; ?>
</div>

<main role="main" class="container">
  <div class="row">
    <div class="col-md-8 blog_main">
      <!-- CONTACT FORM -->
      <div class="contact_container">
        <div class="wrapper animated bounceInLeft">
          <div class="contact_message_box">

            <?php
            $Msg = "";
            if (isset($_GET['success'])) {
              $Msg = "Message has been sent";
              echo  $Msg;
            }
            if (isset($_GET['error'])) {
              $Msg = "Message could not be sent";
              echo  $Msg;
            }
            ?>

            <!-- <ul>
              <li><i class="fa fa-road"></i> 44 Something st</li>
              <li><i class="fa fa-phone"></i> (555) 555-5555</li>
              <li><i class="fa fa-envelope"></i> kofi@acme.test</li>
            </ul> -->
          </div>
          <div class="contact">
            <h3>Email Us</h3>
            <form method="post" action="mail.php">
              <p>
                <label>Name</label>
                <input type="text" name="name" id="first_name" value="<?php echo isset($_POST['name']) ? $name : '' ?>" required />
              </p>
              <p>
                <label>Email Address</label>
                <input type="email" name="email" value="<?php echo isset($_POST['email']) ? $email : '' ?>" required />
              </p>
              <p class="full">
                <label>Message</label>
                <textarea name="message" value="<?php echo isset($_POST['message']) ? $message : '' ?>"></textarea>
              </p>
              <p class="full">
                <input class="contact_form_submit_button" type="submit" name="submit" value="Submit" />
              </p>
            </form><!-- form -->
          </div><!-- contact -->
        </div><!-- wrapper animated bounceInLeft -->
      </div><!-- contact_container -->
    </div><!-- alignment and main blog -->

    <!-- SIDEBAR -->
    <aside class="col-md-4 blog-sidebar">
      <?php include "inc/sidebar.php"; ?>
    </aside><!-- /.blog-sidebar -->

  </div><!-- /.row -->
</main><!-- /.container -->

<?php include "inc/footer.php"; ?>
<?php include "inc/scripts.php"; ?>