<?php get_header(); ?>

<div class="album-single">
  <div class="album-header">
    <h1><?php the_title(); ?></h1>
    <?php if (has_post_thumbnail()) : ?>
      <div class="album-cover">
        <?php the_post_thumbnail('large'); ?>
      </div>
    <?php endif; ?>
  </div>

  <div class="album-details">
    <?php 
    // Récupération des champs personnalisés
    $release_date = get_field('date_de_sortie');
    $artist_id = get_field('artiste_associe');
    $tracks = get_field('nombre_de_titres');
    $listen_link = get_field('lien_decoute');
    
    // Récupération des genres
    $genres = get_the_terms(get_the_ID(), 'genre');
    ?>
    
    <?php if ($release_date) : ?>
      <p class="album-date">Date de sortie: <?php echo $release_date; ?></p>
    <?php endif; ?>
    
    <?php if ($artist_id) : ?>
      <p class="album-artist">
        Artiste: <a href="<?php echo get_permalink($artist_id); ?>">
          <?php echo get_the_title($artist_id); ?>
        </a>
      </p>
    <?php endif; ?>
    
    <?php if ($tracks) : ?>
      <p class="album-tracks">Nombre de titres: <?php echo $tracks; ?></p>
    <?php endif; ?>
    
    <?php if ($genres && !is_wp_error($genres)) : ?>
      <div class="album-genres">
        <p>Genres: 
          <?php 
          $genre_links = array();
          foreach ($genres as $genre) {
            $genre_links[] = '<a href="' . get_term_link($genre) . '">' . $genre->name . '</a>';
          }
          echo implode(', ', $genre_links);
          ?>
        </p>
      </div>
    <?php endif; ?>
    
    <?php if ($listen_link) : ?>
      <div class="album-listen">
        <a href="<?php echo $listen_link; ?>" class="button" target="_blank">Écouter l'album</a>
      </div>
    <?php endif; ?>
  </div>

  <div class="album-content">
    <?php the_content(); ?>
  </div>
</div>

<?php get_footer(); ?>