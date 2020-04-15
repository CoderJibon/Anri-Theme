<?php get_header(); ?>



    <main>
      <div class="container">
        <div class="col-md-8  col-lg-9">

          <div class="single-post">
            
            <?php while (have_posts()):the_post();?>
            <div class="single-post__image">
                <?php the_post_thumbnail(); ?>
            </div>

            <div class="single-post__title">
              <h2><?php the_title(); ?></h2>
            </div>

            <div class="single-post__info">
              <span>By <a href="<?php the_permalink(); ?>"><?php the_author(); ?></a></span>
              <span><?php the_time('F d, Y'); ?></span>
              <span><a href="<?php the_permalink(); ?>"><?php comments_popup_link('no comment','one comment','%comments'); ?></a></span>
            </div>

            <div class="single-post__content">
              <?php the_content(); ?>
            </div>

            <div class="single-post__footer">
              <div class="single-post__footer-tags">
                <h3>Tags:</h3>
                <div class="single-post__footer-tags-list">
                  <?php the_tags("",""); ?>
                </div>
              </div>

              <div class="single-post__footer-social">
                <span>Share:</span>
                <div class="single-post__footer-social-icons">
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
          <?php endwhile; ?>
            <div class="single-post__author">
              <div class="single-post__author-avatar">
                <?php echo get_avatar(get_the_author_meta('user_email')); ?>
              </div>
              <div class="single-post__author-info">
                <h5>Written by <?php echo get_the_author_meta('nickname'); ?></h5>
                <p><?php echo get_the_author_meta('description'); ?></p>
                <div class="single-post__author-info-social">
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
                      <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#instagram"></use>
                    </svg>
                  </a>
                </div>
              </div>
            </div>

            <?php 

              $pre = get_previous_post();
              $next = get_next_post();

             ?>



            <div class="single-post__nav">
              <a class="single-post__nav-previous" href="<?php echo $pre->guid; ?>">
                <span class="single-post__nav-previous-link">Previous Post</span>
                <span><?php echo $pre->post_title; ?></span>
              </a>
              <a class="single-post__nav-next" href="<?php echo $next->guid; ?>">
                <span class="single-post__nav-next-link">Next Post</span>
                <span><?php echo $next->post_title; ?></span>
              </a>
            </div>


           <div class="single-post__related">

              <?php 

                 $categorys = get_the_terms(get_the_id(), 'category');

                 $catagory_all = array();

                 foreach ($catagory_all as $category_step) {
                    $catagory_all[]= $category_step->term_id;
                 }

                    $ret = new wp_query([
                        'post_type' => 'post',
                        'posts_per_page' => 3,
                        'category__in'  => $catagory_all,
                        'post__not_in'  => array($post->ID)
                    ]);

              while ($ret->have_posts()):$ret->the_post();
               ?>

              <div class="single-post__related-item">
                <a href="<?php the_permalink(); ?>">
                  <style>
                    .single-post__related-item img{
                      width: 300px;
                      height: auto;
                    }
                  </style>
                  <?php the_post_thumbnail(); ?>
                  <h6><?php the_title(); ?></h6>
                </a>
                <span><?php the_time('F d, Y'); ?></span>
              </div>
            <?php endwhile; ?>

              

             

            </div>



            <div class="single-post__comments">


              <h5><?php comments_number(); ?></h5>
     

              <?php comments_template(); ?>

             

            </div>

          </div>

        </div>

        <div class="col-md-4  col-lg-3">
        <?php get_sidebar(); ?>
        </div>


      </div>
    </main>

<?php get_footer(); ?>