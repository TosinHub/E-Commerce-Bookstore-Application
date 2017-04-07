<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="style/styles.css">
    <title>Home</title>
</head>
<body id="checkout">
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
    <div class="checkout-form">
      <form class="def-modal-form">
        <div class="total-cost">
          <h3>$2000 Total Purchase</h3>
        </div>
        <div class="cancel-icon close-form"></div>
        <label for="login-form" class="header"><h3>Checkout</h3></label>
        <input type="text"  class="text-field phone" placeholder="Phone Number">
        <input type="text" name="addy" class="text-field address" placeholder="Address">
        <input type="text" name="code" class="text-field post-code" placeholder="Post Code">
        <input type="submit" name="chkt" class="def-button checkout" value="Checkout">
      </form>
    </div>
  </div>
  <!-- footer starts here-->
  <div class="footer">
    <p class="copyright">&copy; copyright 2016</p>
  </div>
</body>
</html>
