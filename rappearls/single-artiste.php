<?php 

wp_enqueue_style('single-artiste-style', get_template_directory_uri() . '/assets/css/single-artiste.css');
get_header(); ?>

<div class="artist-single">
  <div class="artist-header">
    <h1><?php the_title(); ?></h1>
    <?php if (has_post_thumbnail()) : ?>
      <div class="artist-image">
        <?php the_post_thumbnail('large'); ?>
      </div>
    <?php endif; ?>
  </div>

  <div class="artist-content">
    <?php the_content(); ?>
    
    <?php 
    // Récupération des champs personnalisés
    $bio = get_field('biographie'); 
    $start_date = get_field('date_de_debut');
    $social_links = get_field('reseaux_sociaux');
    ?>
    
    <?php if ($bio) : ?>
      <div class="artist-bio">
        <h2>Biographie</h2>
        <?php echo $bio; ?>
      </div>
    <?php endif; ?>
    
    <?php if ($start_date) : ?>
      <p class="artist-since">Depuis: <?php echo $start_date; ?></p>
    <?php endif; ?>
    
    <?php if ($social_links) : ?>
      <div class="artist-social">
        <h3>Suivez l'artiste</h3>
        <ul>
          <?php foreach ($social_links as $link) : ?>
            <li><a href="<?php echo $link['url']; ?>" target="_blank"><?php echo $link['title']; ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>
    
    <?php 
    // Récupération des albums de l'artiste
    $albums = get_posts(array(
      'post_type' => 'album',
      'meta_query' => array(
        array(
          'key' => 'artiste_associe',
          'value' => get_the_ID(),
          'compare' => '='
        )
      )
    ));
    ?>
    
    <?php if ($albums) : ?>
      <div class="artist-albums">
        <h2>Albums</h2>
        <div class="albums-grid">
          <?php foreach ($albums as $album) : ?>
            <div class="album-card">
              <a href="<?php echo get_permalink($album->ID); ?>">
                <?php echo get_the_post_thumbnail($album->ID, 'medium'); ?>
                <h3><?php echo get_the_title($album->ID); ?></h3>
              </a>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    <?php endif; ?>
  </div>
</div>

<?php get_footer(); ?>