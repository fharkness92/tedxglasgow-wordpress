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

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<header class="page-header">
  <h2><?php the_title(); ?></h2>
</header>
<?php the_content(); ?>
<?php comments_template( '', true ); ?>
<?php endwhile; ?>

<?php Reflex_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>