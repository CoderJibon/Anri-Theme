<?php get_header(); ?>

    <main>
      <div class="container">
        <div class="col-md-8  col-lg-9">
           <div class="single-post">
            
            <?php while (have_posts()):the_post(); ?>

              <?php echo get_template_part('/template-parts/blog/content'); ?>

            <?php endwhile; ?>
 
          

          <?php 
              $pageinumber = get_the_posts_pagination([
                  "prev_text" => 'Prev Page',
                  "next_text" => 'Next Page',
                  'type'      => 'list',
                  'screen_reader_text' => ' '
                ]);

                $pageinumber = str_replace('navigation pagination', 'blog-pagination',$pageinumber );
                $pageinumber = str_replace('page-numbers', 'blog-pagination__items',$pageinumber );
                $pageinumber = str_replace('<li>', '<li class="blog-pagination__item">',$pageinumber );

                echo $pageinumber;

           ?>
 

          </div>
        </div>
        <div class="col-md-4  col-lg-3">
         <?php get_sidebar(); ?>
        </div>
        
      </div>
    </main>


<?php get_footer(); ?>