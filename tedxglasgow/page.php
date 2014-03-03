<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
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
  <header class="page-header">
    <div class="container">
      <h1><?php the_title(); ?></h1> 
    </div>
  </header>
  <div class="wrapper container">
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

  <?php the_content(); ?>
  <?php comments_template( '', true ); ?>
  <?php endwhile; ?>
  </div>
</main>

<?php Reflex_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>