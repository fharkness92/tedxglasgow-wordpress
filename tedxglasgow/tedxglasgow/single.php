<?php
/**
 * The Template for displaying all single posts
 *
 * Please see /external/reflex-utilities.php for info on Reflex_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Reflex
 * @since 		Reflex 1.0.0
 */
?>
<?php Reflex_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<main>
  <header id="page-header">
    <div class="container">
      <h1>Blog</h1> 
    </div>
  </header>
  <div class="wrapper container">
    <div class="grid">
      <div class="primary">
        <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        <article class="blog-post">
          <a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><h2 class="article-heading"><?php the_title(); ?></h2></a>
          <div class="content">
            <p class="article-byline">Written by <?php the_author(); ?>. Posted on <time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?></time></p>
            <?php the_content(); ?>
          </div>
          <footer class="article-footer">
            <?php comments_popup_link('Leave a Comment', '1 Comment', '% Comments'); ?>
          </footer>

        	<?php if ( get_the_author_meta( 'description' ) ) : ?>
        	<?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
        	<h3>About <?php echo get_the_author() ; ?></h3>
        	<?php the_author_meta( 'description' ); ?>
        	<?php endif; ?>
        	<?php comments_template( '', true ); ?>
          </article>
        <?php endwhile; ?>
      </div>
    </div>
  </div>
</main>

<?php Reflex_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>