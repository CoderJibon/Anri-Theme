<?php 

class anri_comment_wp extends Walker_Comment{


  public function start_lvl( &$output, $depth = 0, $args = array() ) {
    $GLOBALS['comment_depth'] = $depth + 1;

    switch ( $args['style'] ) {
      case 'div':
        break;
      case 'ol':
        $output .= '<ol class="single-post__comments-children">' . "\n";
        break;
      case 'ul':
      default:
        $output .= '<ul class="single-post__comments-children">' . "\n";
        break;
    }
  }



    protected function html5_comment( $comment, $depth, $args ) {
      $tag = ( 'div' === $args['style'] ) ? 'div' : 'li';

      $commenter = wp_get_current_commenter();
      if ( $commenter['comment_author_email'] ) {
        $moderation_note = __( 'Your comment is awaiting moderation.' );
      } else {
        $moderation_note = __( 'Your comment is awaiting moderation. This is a preview, your comment will be visible after it has been approved.' );
      }

      ?>

      <<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $this->has_children ? 'parent' : '', $comment ); ?>>
        <article id="div-comment-<?php comment_ID(); ?>" class="single-post__comments-item">

           <div class="single-post__comments-item-body">
              <div class="single-post__comments-item-avatar">

              <?php 
                echo get_avatar($two,'','','',[
                  'class' => ' '
                ]);
               ?>
               
              </div>

              <div class="single-post__comments-item-right">
                <div class="single-post__comments-item-reply">

                  <?php
                      comment_reply_link(
                        array_merge(
                          $args,
                          array(
                            'add_below' => 'div-comment',
                            'depth'     => $depth,
                            'max_depth' => $args['max_depth'],
                            'before'    => '<div class="reply">',
                            'after'     => '</div>',
                          )
                        )
                      );
                      ?>

                </div>
                <div class="single-post__comments-item-info">
                  <div class="single-post__comments-item-info-author">
                    <span>
                      <a href="<?php the_permalink(); ?>"><?php comment_author(); ?></a>
                    </span>
                  </div>
                  <div class="single-post__comments-item-info-date">
                    <span>
                      <a href="<?php echo esc_url( get_comment_link( $comment, $args ) ); ?>"><?php echo get_comment_date( '', $comment ); ?> at <?php echo get_comment_time(); ?></a>
                    </span>
                  </div>
                </div>
                <div class="single-post__comments-item-post">
                  <p><?php comment_text(); ?></p>
                  <?php edit_comment_link( __( 'Edit' ), '<span class="edit-link">', '</span>' ); ?>
                </div>
              </div>
            </div>

      <?php
    }


 






}

 ?>
