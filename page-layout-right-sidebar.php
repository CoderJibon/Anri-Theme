<?php
/*
* template name: Right sidebar
*/

 get_header(); 




?>




    <main>
      <div class="container">

        <div class="col-md-8  col-lg-9">
          <div class="blog-post">
            <?php while (have_posts()):the_post(); ?>
            <div class="single-post__image">
              <?php the_post_thumbnail(); ?>
            </div>
            <div class="single-post__title  single-post__title--about">
              <h2><?php the_title(); ?></h2>
            </div>
            <div class="single-post__content  single-post__content--about">
              <?php the_content(); ?>
            </div>
            <?php endwhile; ?>
          </div>
        </div>

        <div class="col-md-4  col-lg-3">
         <?php get_sidebar(); ?>
        </div>
      </div>
    </main>


<?php get_footer(); ?>