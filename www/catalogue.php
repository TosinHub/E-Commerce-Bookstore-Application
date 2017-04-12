 <?php 





  include 'includes/db.php';
   include 'includes/function.php';

    include 'includes/header.php';
   ?>

<!DOCTYPE html>

  <!-- side bar starts here -->
  <div class="side-bar">
    <div class="categories">
      <h3 class="header">Categories</h3>
      <ul class="category-list">
        <?php $view = getCategory($conn); echo $view; ?>
      </ul>
    </div>
  </div>
  <!-- main content starts here -->
  <div class="main">
    <div class="main-book-list horizontal-book-list">
      <ul class="book-list">
          <?php 
        $view = call($conn,'rv');
        echo $view;

  ?>
          
      </ul>
      <div class="actions">
        <button class="def-button previous">Previous</button>
        <button class="def-button next">Next</button>
      </div>
    </div>
    <div class="recently-viewed-books horizontal-book-list">
      <h3 class="header">Recently Viewed</h3>
      <ul class="book-list">
        <div class="scroll-back"></div>
        <div class="scroll-front"></div>
           <?php 
        $view = call($conn,'trending');
        echo $view;

  ?>
      </ul>
    </div>
    
  </div>
  <!-- footer starts here -->
  <div class="footer">
    <p class="copyright">&copy; copyright 2016</p>
  </div>
</body>
</html>
