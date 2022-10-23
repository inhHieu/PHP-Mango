<?php # Script 3.4 - index.php
$page_title = 'Welcome to this Site!';
include('includes/header.html');
?>

<div class="contact-container">
  <!-- <div class="img-bg">
    <img src="https://images.unsplash.com/photo-1529720317453-c8da503f2051?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="">
  </div> -->
  <div class="email">
    <!-- <p id="title">Fell free to send me an email</p> -->



    <div class="bigform ">
      <div class="form">
        <div class="input">
          <input type="text" required>
          <span class="placeholder">Your name</span>
        </div>
        <div class="input">
          <input type="text" required>
          <span class="placeholder">Email</span>
        </div>
        <div class="textarea">
          <textarea name="Message" id="textarea" required></textarea>
          <span class="placeholder">Message</span>
        </div>
        <input type="submit" class="button" value="Send">
        </input>
      </div>

      <div class="semiform">
        <p class="MGSP">Mango Suport</p>
        <p>Our advisers will give you a personalised welcome and will be delighted to accompany you as you discover Mango Boutique and its products. </p>
        <p>Also see us on</p>
        <p>
          <i class="fa fa-facebook" aria-hidden="true"></i>
          <i class="fa fa-instagram" aria-hidden="true"></i>
          <i class="fa fa-twitter" aria-hidden="true"></i>
        </p>

      </div>
    </div>
  </div>

</div>




<script src="includes/contact.js"></script>
<?php
include('includes/footer.html');
?>