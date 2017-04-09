<?php include( VIEW_PATH . '/includes/header.php' ); ?>

      <div class="animalInfo">
        <div class="row">

         <div class="about">
            <img src="<?php echo IMAGE_PATH . '/' . $assets['Animal']->image ?>">

            <h3>About Me</h3>
            <p><?php echo htmlspecialchars( $assets['Animal']->about ) ?></p>

          </div> <!-- about -->

          <div class="button">
            <a href="#">Rehome Me</a>
          </div>

          <div class="button">
            <a href="#">How To Help</a>
          </div>

        </div> <!-- row -->

      </div> <!-- animalInfo -->

      <div class="animalGallery">
      </div> <!-- animalGallery -->

    </div>
  </div>

  <div class="sidebar">
    <div class="sidebar-row">
      <?php
        foreach ($assets['sidebar'] as $sidebar) {
          include( VIEW_PATH . '/includes/' . $sidebar );
        }
      ?>
    </div> <!-- sidebar-row -->
  </div> <!-- sidebar -->

</div>

<?php include( VIEW_PATH . '/includes/footer.php' ) ?>
