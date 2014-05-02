<?php Reflex_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<main>
<div class="intro">
<div class="container">
<div class="grid"><section class="unit-1-2">
<h1>TEDxGLASGOW</h1>
<h3>Sunday June 8th </h3>
<h3>The Royal Conservatoire of Scotland</h3>
<a class="button" href="Awaiting link">Learn More</a>
</section><section class="unit-1-2"></section></div>
</div>
</div>
<div class="row">
<div class="container">
		<div class="grid">
		<section class="unit-1-2">
			<h2>Welcome to TEDxGlasgow</h2>
			<p>In the spirit of ideas worth spreading, TED has created TEDx; a program of local, self-organised events that bring people together to share a TED-like experience.<p>
			<p>Our events, which aim to inspire creativity, empower change and drive innovation to help our city thrive, are organised by our group of volunteers, without whom TEDxGlasgow wouldn’t be possible.</p>
			<p>Our partners are also key to us; supporting us by providing their resources, knowledge and capital to help us make our events possible.</p>
			<p>Our next event takes place on Sunday June 8th at The Royal Conservatoire of Scotland, the theme for which is <a href="#">The Common Wealth</a>. Information on ticket sales and prices is available <a href="#">here</a>.</p>
		</section>
		<section class="unit-1-2">
<img src="http://placehold.it/600x400">
</section>
	</div>
</div>
</div>

<div class="row latest-blog">
<div class="container">
		<div class="grid">
		<section class="unit-1-2">
			<?php $my_query = new WP_Query('showposts=1'); ?>
			<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
			<h1><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
			<?php the_title(); ?></a></h1>
			<small><strong>Written by </strong><?php the_author()?> <strong>Posted</strong> <?php the_time('F jS, Y') ?> </small>
			<p><?php the_excerpt(); ?></p>
			<?php endwhile; ?>
		</section>
		<section class="unit-1-2">
		<div class="recent-posts">
		<h2>Recent Blog Posts</h2>
            <?php $my_query = new WP_Query('showposts=5&offset=1'); ?>
			<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
			<h4><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
			<?php the_title(); ?></a></h4>
			<small><strong>Written by </strong><?php the_author()?><strong> Posted</strong> <?php the_time('F jS, Y') ?> </small>
			<?php endwhile; ?>
			</div>
		</section>
	</div>
</div>
</div>
</main>
<?php Reflex_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>