<?php

wp_enqueue_style('archive-artiste-style', get_template_directory_uri() . '/assets/css/archive-artiste.css');
get_header(); ?>

<div class="artists-archive">
  <h1 class="archive-title">Nos Artistes</h1>
  
  <?php if (have_posts()) : ?>
    <div class="artists-grid">
      <?php while (have_posts()) : the_post(); ?>
        <div class="artist-card">
          <a href="<?php the_permalink(); ?>">
            <?php if (has_post_thumbnail()) : ?>
              <div class="artist-thumbnail">
                <?php the_post_thumbnail('medium'); ?>
              </div>
            <?php endif; ?>
            <h2 class="artist-name"><?php the_title(); ?></h2>
          </a>
        </div>
      <?php endwhile; ?>
    </div>
    
    <?php the_posts_pagination(); ?>
    
  <?php else : ?>
    <p>Aucun artiste trouvé.</p>
  <?php endif; ?>
</div>

<?php get_footer(); ?>