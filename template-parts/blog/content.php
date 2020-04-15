 <?php if (is_home()): ?>

 	    <div class="blog-post__image">
          <a href="single-post.html">

            <?php the_post_thumbnail(); ?>
        </div>
        <div class="blog-post__title">
          <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        </div>
        <div class="blog-post__info">
          <span>By <a href="<?php the_permalink(); ?>"><?php the_author(); ?></a></span>
          <span><?php the_date('F d, Y'); ?></span>
          <span><a href="<?php the_permalink(); ?>"><?php comments_popup_link('no comment','one comment','%comments'); ?></a></span>
        </div>
        <div class="blog-post__content">
          <p><?php echo wp_trim_words(get_the_content(),60,false); ?></p>
        </div>
        <div class="blog-post__footer">
          <a class="blog-post__footer-link" href="<?php the_permalink(); ?>">Read more</a>


          <div class="blog-post__footer-social">
            <span>Share:</span>
            <div class="blog-post__footer-social-icons">
              <a href="#">
                <svg>
                  <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#facebook"></use>
                </svg>
              </a>
              <a href="#">
                <svg>
                  <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#twitter"></use>
                </svg>
              </a>
              <a href="#">
                <svg>
                  <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#google"></use>
                </svg>
              </a>
              <a href="#">
                <svg>
                  <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#pinterest"></use>
                </svg>
              </a>
              <a href="#">
                <svg>
                  <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#email"></use>
                </svg>
              </a>
            </div>
          </div>
        </div>
  
   

 <?php endif ?>

 

         