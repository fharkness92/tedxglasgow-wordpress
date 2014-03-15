<?php
/**
 * The template for displaying the homepage.
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
      <h1><?php the_title(); ?></h1> 
    </div>
  </header>
  <section id="content" class="wrapper container">
    <div class="grid">
      <div class="primary">
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

  <?php the_content(); ?>
  <?php comments_template( '', true ); ?>
  <?php endwhile; ?>
      </div>
    </div>
  </section>
</main>

<?php Reflex_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>