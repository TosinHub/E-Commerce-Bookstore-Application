<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="style/styles.css">
    <title>Registration</title>
</head>
<body id="registration">
  <!-- DO NOT TAMPER WITH CLASS NAMES! -->

  <!-- top bar starts here -->
  <div class="top-bar">
    <div class="top-nav">
      <a href="index.html"><h3 class="brand"><span>B</span>rain<span>F</span>ood</h3></a>
      <ul class="top-nav-list">
        <li class="top-nav-listItem Home"><a href="index.html">Home</a></li>
        <li class="top-nav-listItem catalogue"><a href="catalogue.html">Catalogue</a></li>
        <li class="top-nav-listItem login"><a href="login.html">Login</a></li>
        <li class="top-nav-listItem register"><a href="registration.html">Register</a></li>
        <li class="top-nav-listItem cart">
          <div class="cart-item-indicator">
            <p>12</p>
          </div>
          <a href="cart.html">Cart</a>
        </li>
      </ul>
      <form class="search-brainfood">
        <input type="text" class="text-field" placeholder="Search all books">
      </form>
    </div>
  </div>
  <!-- main content starts here -->
  <div class="main">
    <div class="registration-form">
      <form class="def-modal-form">
        <div class="cancel-icon close-form"></div>
        <label for="registration-from" class="header"><h3>User Registration</h3></label>
        <input type="text" class="text-field first-name" placeholder="Firstname">
        <input type="text" class="text-field last-name" placeholder="Lastname">
        <input type="email" class="text-field email" placeholder="Email">
        <input type="text" class="text-field username" placeholder="Username">
        <input type="password" class="text-field password" placeholder="Password">
        <input type="password" class="text-field confirm-password" placeholder="Confirm Password">
        <input type="submit" class="def-button" value="Register">
        <p class="login-option">Have an account already? Login</p>
      </form>
    </div>
  </div>
  <!-- footer starts here-->
  <div class="footer">
    <p class="copyright">&copy; copyright 2016</p>
  </div>
</body>
</html>
