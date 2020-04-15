 <?php 

function anri_theme_start(){


	load_theme_textdomain('anri',get_template_directory().'/languages');

	add_theme_support('menus');
	add_theme_support('post-thumbnails');
	add_theme_support('widgets');
	add_theme_support('title-tag');
	add_theme_support('html5',['comment-list','comment-form']);




	register_nav_menus([
		'main-menu' => __('main menu','anri')
	]);


	function menu_empty(){

	}


}
add_action('after_setup_theme','anri_theme_start');

function anri_enqueue_style(){

	wp_enqueue_style('stylesheet',get_stylesheet_uri());
	wp_enqueue_style('fonts','https://fonts.googleapis.com/css?family=Quicksand');
	wp_enqueue_style('bootstrap', get_template_directory_uri().'/css/bootstrap.min.css');
	wp_enqueue_style('style', get_template_directory_uri().'/css/style.min.css');
}

add_action('wp_enqueue_scripts','anri_enqueue_style');


function anri_enqueue_script(){

	wp_enqueue_script('script',get_template_directory_uri().'/js/script.js',array('jquery'),true,true);

}
add_action('wp_enqueue_scripts','anri_enqueue_script');

function admin_within_script(){

	wp_enqueue_media();	
	wp_register_script('admin_anri',get_template_directory_uri().'/js/admin-anri.js',array('jquery'),true,false);
	wp_enqueue_script('admin_anri');
	wp_register_script('banner_anri',get_template_directory_uri().'/js/banner-anri.js',array('jquery'),true,false);
	wp_enqueue_script('banner_anri');
}
add_action('admin_enqueue_scripts','admin_within_script');

function anri_widget(){

	register_sidebar([
		'name'			=> 'Riget Sidebar',
		'discription'	=> 'Add widget Here',
		'id'			=> 'right-sidebar',
		'before_widget' => '<div class="sidebar-widget">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h3>',
		'after_title'	=> '</h3>'
	]);
	register_sidebar([
		'name'			=> 'Footer One',
		'discription'	=> 'Add widget Here',
		'id'			=> 'footer-one',
		'before_widget' => ' <div class="page-footer__top-about">',
		'after_widget'	=> '</div>',
		'before_title'	=> ' <h4>',
		'after_title'	=> '</h4>'
	]);
	register_sidebar([
		'name'			=> 'Footer Two',
		'discription'	=> 'Add widget Here',
		'id'			=> 'footer-two',
		'before_widget' => '<div class="col-sm-3  col-md-3">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h4>',
		'after_title'	=> '</h4>'
	]);
	register_sidebar([
		'name'			=> 'Footer There',
		'discription'	=> 'Add widget Here',
		'id'			=> 'footer-there',
		'before_widget' => '<div class="col-sm-4  col-md-4">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h4>',
		'after_title'	=> '</h4>'
	]);
	

	//register widget include

	register_widget('anriinfo');
	register_widget('anricustompost');
	register_widget('anriabout');
	register_widget('follow');
	register_widget('resentpost');
	register_widget('subcribe');

}
add_action('widgets_init','anri_widget');

// widget class include

//subcribe
class subcribe extends wp_widget{


	public function __construct(){

		parent:: __construct('subcribe','Anri Subcribe',[
				'description'	=> 'Display an Resent post'
			]);
	}

	public function widget($one,$two){

		$title 	= $two['title'];
		$subtitle 	= $two['subtitle'];

	?> 

        <?php echo $one['before_widget']; ?>
            <?php echo $one['before_title']; ?><?php echo $title; ?><?php echo $one['after_title']; ?>
          
            <div class="sidebar-widget__subscribe">
              <p><?php echo $subtitle; ?></p>
              <form action="http://feelman.info/html/anri/index.html">
                <input type="text" placeholder="Your email">
                <input class="sidebar-widget__subscribe-submit" type="submit" value="Submit">
              </form>
            </div>
         <?php echo $one['after_widget']; ?>



	<?php }
	public function form($two){

		$title 	= $two['title'];
		$subtitle 	= $two['subtitle'];
	?>
			<p>
				<label for="<?php echo  $this->get_field_id('title'); ?>">Title</label>
				<input id="<?php echo  $this->get_field_id('title'); ?>" class="widefat" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" type="text">
			</p>
			<p>
				<label for="">Title</label>
				<input class="widefat" name="<?php echo $this->get_field_name('subtitle'); ?>" value="<?php echo $subtitle; ?>" type="text">
			</p>

	<?php }
}

// populer post

class resentpost extends wp_widget{


	public function __construct(){

		parent:: __construct('resentpost','Anri Resent post',[
				'description'	=> 'Display an Resent post'
			]);
	}

	public function widget($one,$two){

		$title 	= $two['title'];

	?> 

        <?php echo $one['before_widget']; ?>
            <?php echo $one['before_title']; ?><?php echo $title; ?><?php echo $one['after_title']; ?>
             <div class="sidebar-widget__popular">

         <?php 
         	$anriposts = new wp_query([
         		'post_type'	=> 'post',
         		'posts_per_page' => 5
         	]);
         while ($anriposts->have_posts()):$anriposts->the_post(); ?>

           <div class="sidebar-widget__popular-item">
                <div class="sidebar-widget__popular-item-image">
                  <a href="<?php the_permalink(); ?>">
                  	<?php the_post_thumbnail(); ?>
                  </a>
                  <style>
                  	.sidebar-widget__popular-item a img{
                  		
                  		height:auto;
                  	}
                  </style>
                </div>
                <div class="sidebar-widget__popular-item-info">
                  <div class="sidebar-widget__popular-item-date">
                    <span><?php the_time('F d, Y'); ?></span>
                  </div>
                  <div class="sidebar-widget__popular-item-content">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                  </div>
                </div>
              </div>
        <?php endwhile; ?>

            </div>

         <?php echo $one['after_widget']; ?>



	<?php }
	public function form($two){

		$title 	= $two['title'];
	?>
			<p>
				<label for="<?php echo  $this->get_field_id('title'); ?>">Title</label>
				<input id="<?php echo  $this->get_field_id('title'); ?>" class="widefat" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" type="text">
			</p>

	<?php }
}


//Follow Me
class follow extends wp_widget{


	public function __construct(){

		parent:: __construct('follow','Follow Social',[
				'description'	=> 'Display a Follow Social'
			]);
	}

	public function widget($one,$two){

		$title 	= $two['title'];
		$facebook	=$two['facebook'];
		$twitter	=$two['twitter'];
		$google		=$two['google'];
		$pinterest	=$two['pinterest'];
		$instagram	=$two['instagram'];
	
	?> 

            <?php echo $one['before_widget']; ?>
            <?php echo $one['before_title']; ?><?php echo $title; ?><?php echo $one['after_title']; ?>
            <div class="sidebar-widget__follow-me">
              <div class="sidebar-widget__follow-me-icons">

              	<?php if ($facebook): ?>
                <a href="<?php echo esc_url($facebook); ?>">
                  <svg>
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#facebook"></use>
                  </svg>
                </a>
                <?php endif ?>

				<?php if ($twitter): ?>
                <a href="<?php echo esc_url($twitter); ?>">
                  <svg>
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#twitter"></use>
                  </svg>
                </a>
                <?php endif ?>

				<?php if ($google): ?>
                <a href="<?php echo esc_url($google); ?>">
                  <svg>
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#google"></use>
                  </svg>
                </a>
				<?php endif ?>

				<?php if ($pinterest): ?>
                <a href="<?php echo esc_url($pinterest); ?>">
                  <svg>
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#pinterest"></use>
                  </svg>
                </a>
                <?php endif ?>

				<?php if ($instagram): ?>
                <a href="<?php echo esc_url($instagram); ?>">
                  <svg>
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#instagram"></use>
                  </svg>
                </a>
                <?php endif ?>

              </div>
            </div>
        <?php echo $one['after_widget']; ?>
          



	<?php }
	public function form($two){

		$title 		= $two['title'];
		$facebook	=$two['facebook'];
		$twitter	=$two['twitter'];
		$google		=$two['google'];
		$pinterest	=$two['pinterest'];
		$instagram	=$two['instagram'];
	?>
			<p>
				<label for="<?php echo  $this->get_field_id('title'); ?>">Title</label>
				<input id="<?php echo  $this->get_field_id('title'); ?>" class="widefat" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" type="text">
			</p>
			
			<p>
				<label for="">Facebook</label>
				<input type="text" class="widefat" name="<?php echo $this->get_field_name('facebook'); ?>" value=" <?php echo $facebook ; ?>">
			</p>
			<p>
				<label for="">Twitter</label>
				<input type="text" class="widefat" name="<?php echo $this->get_field_name('twitter'); ?>" value=" <?php echo $twitter ; ?>">
			</p>
			<p>
				<label for="">Google</label>
				<input type="text" class="widefat" name="<?php echo $this->get_field_name('google'); ?>" value=" <?php echo $google ; ?>">
			</p>
			<p>
				<label for="">Pinterest</label>
				<input type="text" class="widefat" name="<?php echo $this->get_field_name('pinterest'); ?>" value=" <?php echo $pinterest ; ?>">
			</p>
			<p>
				<label for="">Instagram</label>
				<input type="text" class="widefat" name="<?php echo $this->get_field_name('instagram'); ?>" value=" <?php echo $instagram ; ?>">
			</p>
			

	<?php }
}

//anri about

class anriabout extends wp_widget{


	public function __construct(){

		parent:: __construct('anriabout','Anri About',[
				'description'	=> 'Display an Anri abouts'
			]);
	}

	public function widget($one,$two){

		$title 	= $two['title'];
		$des 	= $two['des'];
		$url 	= $two['url'];

	?> 

        <?php echo $one['before_widget']; ?>
            <?php echo $one['before_title']; ?><?php echo $title; ?><?php echo $one['after_title']; ?>

            <div class="sidebar-widget__about-me">
              <div class="sidebar-widget__about-me-image">
                <img src="<?php echo $url; ?>" alt="About Me">
              </div>
              <p><?php echo $des; ?></p>
            </div>
           <?php echo $one['after_widget']; ?>



	<?php }
	public function form($two){

		$title 	= $two['title'];
		$des 	= $two['des'];
		$url 	= $two['url'];
	?>
			<p>
				<label for="<?php echo  $this->get_field_id('title'); ?>">Title</label>
				<input id="<?php echo  $this->get_field_id('title'); ?>" class="widefat" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" type="text">
			</p>
			<div class="widget_field">
				<button class="button" id="author_info_image"> Upload Image</button>
				<input name="<?php echo $this->get_field_name('url'); ?>" class="image_er_link" value="<?php echo $url; ?>"	 type="hidden">
				<div class="img-box">
					<img src="<?php echo $url; ?>" alt="" style="max-width: 100%; height: auto; padding: 10px 0 0; " >
				</div>
			</div>
			<p>
				<label for="">Description</label>
				<textarea class="widefat" name="<?php echo $this->get_field_name('des'); ?>">
					<?php echo $des; ?>
				</textarea>
			</p>

	<?php }
}

//custom post

class anricustompost extends wp_widget{


	public function __construct(){

		parent:: __construct('anricustompost','Anri Custom post',[
				'description'	=> 'Display an Custom posts'
			]);
	}

	public function widget($one,$two){

		$title 	= $two['title'];

	?> 

        <?php echo $one['before_widget']; ?>
            <?php echo $one['before_title']; ?><?php echo $title; ?><?php echo $one['after_title']; ?>

         <?php 
         	$anripostss = new wp_query([
         		'post_type'	=> 'post',
         		'posts_per_page' => 2
         	]);
         while ($anripostss->have_posts()):$anripostss->the_post(); ?>

          <div class="page-footer__recent-post">
            <div class="page-footer__recent-post-info">
              <div class="page-footer__recent-post-content">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </div>
              <div class="page-footer__recent-post-date">
                <span><?php the_time('F d, Y'); ?></span>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
         <?php echo $one['after_widget']; ?>



	<?php }
	public function form($two){

		$title 	= $two['title'];
	?>
			<p>
				<label for="<?php echo  $this->get_field_id('title'); ?>">Title</label>
				<input id="<?php echo  $this->get_field_id('title'); ?>" class="widefat" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" type="text">
			</p>

	<?php }
}

//author informisson
class anriinfo extends wp_widget{


	public function __construct(){

		parent:: __construct('anriinfo','Anri INformisson',[
				'description'	=> 'Display an author informisson'
			]);
	}

	public function widget($one,$two){

		$title 	= $two['title'];
		$des 	= $two['des'];
		$phone 	= $two['phone'];
		$email 	= $two['email'];

	?> 
		<?php echo $one['before_widget']; ?>
          <?php echo $one['before_title']; ?><?php echo $title; ?><?php echo $one['after_title']; ?>
            <p><?php echo $des; ?></p>
            <p>Phone: <?php echo $phone; ?></p>
            <p>Email: <a href="mailto:mail@danielanri.com"><?php echo $email; ?></a></p>
         <?php echo $one['after_widget']; ?>

	<?php }
	public function form($two){

		$title 	= $two['title'];
		$des 	= $two['des'];
		$phone 	= $two['phone'];
		$email 	= $two['email'];

	?>
			<p>
				<label for="<?php echo  $this->get_field_id('title'); ?>">Title</label>
				<input id="<?php echo  $this->get_field_id('title'); ?>" class="widefat" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" type="text">
			</p>
			<p>
				<label for="">Description</label>
				<textarea class="widefat" name="<?php echo $this->get_field_name('des'); ?>">
					<?php echo $des; ?>
				</textarea>
			</p>
			<p>
				<label for="">Phone :</label>
				<input class="widefat" name="<?php echo $this->get_field_name('phone'); ?>" value="<?php echo $phone; ?>" type="text">
			</p>
			<p>
				<label for="">Email :</label>
				<input class="widefat" name="<?php echo $this->get_field_name('email'); ?>" value="<?php echo $email; ?>" type="text">
			</p>

	<?php }
}

//***class extends widget end*****

//comment start


//comment end

/*
*
* custom_nav_walker file include
*/
if (file_exists(dirname(__FILE__)."/inc/custom_nav_walker.php")) {
	require_once get_template_directory()."/inc/custom_nav_walker.php";
}

if (file_exists(dirname(__FILE__)."/inc/anri_comment_wp/anri_comment_wp.php")) {
	require_once get_template_directory()."/inc/anri_comment_wp/anri_comment_wp.php";
}



// anri theme options 

if (file_exists(dirname(__FILE__)."/inc/opt/ReduxCore/framework.php")) {
	require_once get_template_directory()."/inc/opt/ReduxCore/framework.php";
}
if (file_exists(dirname(__FILE__)."/inc/opt/ReduxCore/framework.php")) {
	require_once get_template_directory()."/inc/opt/sample/config.php";
}












?>