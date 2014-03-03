<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file 
 *
 * Please see /external/reflex-utilities.php for info on Reflex_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Reflex
 * @since 		Reflex 1.0.0
 */
?>
<?php Reflex_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<?php if ( have_posts() ): ?>
<main>
  <header class="page-header">
    <div class="container">
      <h1>Blog</h1> 
    </div>
  </header>
  <div class="wrapper container">
  <ol class="article-list">
  <?php while ( have_posts() ) : the_post(); ?>
  	<li>
  		<article class="blog-post blog-preview">
  			<a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><h2 class="article-heading"><?php the_title(); ?></h2></a>
        <div class="content">
    			<?php the_content(); ?>
        </div>
        <footer class="article-footer">
          <p class="article-byline">Written by <?php the_author(); ?>. Posted on <time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?></time></p>
          <?php comments_popup_link('Leave a Comment', '1 Comment', '% Comments'); ?>
        </footer>
  		</article>
  	</li>
  <?php endwhile; ?>
  </ol>
  <?php else: ?>
  <h2>No posts to display</h2>
  <?php endif; ?>
  </div>
</main>

<?php Reflex_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>