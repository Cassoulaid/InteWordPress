<?php get_header(); ?>

<div class="albums-archive">
  <h1 class="archive-title">Nos Albums</h1>
  
  <?php 
  // Si nous sommes sur une page de taxonomie
  $current_term = get_queried_object();
  if ($current_term && !empty($current_term->taxonomy) && $current_term->taxonomy == 'genre') : ?>
    <div class="genre-description">
      <h2>Genre: <?php echo $current_term->name; ?></h2>
      <?php if (!empty($current_term->description)) : ?>
        <p><?php echo $current_term->description; ?></p>
      <?php endif; ?>
    </div>
  <?php endif; ?>
  
  <?php if (have_posts()) : ?>
    <div class="albums-grid">
      <?php while (have_posts()) : the_post(); ?>
        <div class="album-card">
          <a href="<?php the_permalink(); ?>">
            <?php if (has_post_thumbnail()) : ?>
              <div class="album-cover">
                <?php the_post_thumbnail('medium'); ?>
              </div>
            <?php endif; ?>
            <h2 class="album-title"><?php the_title(); ?></h2>
            
            <?php 
            $artist_id = get_field('artiste_associe');
            if ($artist_id) : ?>
              <p class="album-artist"><?php echo get_the_title($artist_id); ?></p>
            <?php endif; ?>
            
            <?php 
            $genres = get_the_terms(get_the_ID(), 'genre');
            if ($genres && !is_wp_error($genres)) : ?>
              <div class="album-genres">
                <?php 
                $genre_names = array();
                foreach ($genres as $genre) {
                  $genre_names[] = $genre->name;
                }
                echo implode(', ', $genre_names);
                ?>
              </div>
            <?php endif; ?>
          </a>
        </div>
      <?php endwhile; ?>
    </div>
    
    <?php the_posts_pagination(); ?>
    
  <?php else : ?>
    <p>Aucun album trouvé.</p>
  <?php endif; ?>
</div>

<?php get_footer(); ?>