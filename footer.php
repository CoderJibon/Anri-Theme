

    <footer class="page-footer">
      <div class="container  page-footer__top">

        <div class="col-sm-5  col-md-5">

         <?php dynamic_sidebar('footer-one'); ?>

        </div>

          <?php dynamic_sidebar('footer-two'); ?>


          <?php dynamic_sidebar('footer-there'); ?>


        <?php global $anri; ?>
      </div>
      <div class="container  page-footer__bottom">
        <div class="col-sm-8  col-md-8  page-footer__bottom-copyright">
          <p><?php echo $anri['areat']; ?></p>
        </div>
        <div class="col-sm-4  col-md-4  page-footer__bottom-social">

  
        <?php if ($anri['f']): ?>
          <a href="<?php echo esc_url($anri['f']); ?>">
            <svg>
              <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#facebook"></use>
            </svg>
          </a>
        <?php endif ?>
        <?php if ($anri['t']): ?>
          <a href="<?php echo esc_url($anri['t']); ?>">
            <svg>
              <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#twitter"></use>
            </svg>
          </a>
        <?php endif ?>
        <?php if ($anri['g']): ?>
          <a href="<?php echo esc_url($anri['g']); ?>">
            <svg>
              <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#google"></use>
            </svg>
          </a>
        <?php endif ?>
        <?php if ($anri['p']): ?>
          <a href="<?php echo esc_url($anri['p']); ?>">
            <svg>
              <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#pinterest"></use>
            </svg>
          </a>
        <?php endif ?>
        <?php if ($anri['i']): ?>
          <a href="<?php echo esc_url($anri['i']); ?>">
            <svg>
              <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#instagram"></use>
            </svg>
          </a>
        <?php endif ?>
        </div>
      </div>
    </footer>
    
  <div class="search-popup">
      <svg class="search-popup__close">
        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#btn-close"></use>
      </svg>
      <div class="container  search-popup__container">
        <form action="http://feelman.info/html/anri/index.html">
          <input type="text" size="32" placeholder="Search">
        </form>
      </div>
  </div>
    <div class="content-overlay"></div>



<?php wp_footer(); ?>

</body>
</html>
