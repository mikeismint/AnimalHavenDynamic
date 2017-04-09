<?php include( VIEW_PATH . '/includes/header.php' ); ?>

      <?php foreach  ($assets['Animals'] as $animal) { ?>
        <div class="animalList">
          <a href=".?action=viewAnimal&amp;animalId=<?php echo $animal->id ?>" >
            <img src="<?php echo IMAGE_PATH . '/' . $animal->image ?>">
            <p class="name"><?php echo htmlspecialchars( $animal->name ) ?> </p>
          </a>
        </div>
      <?php } ?>

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
  </div>

</div>

<?php include( VIEW_PATH . '/includes/footer.php' ) ?> 
