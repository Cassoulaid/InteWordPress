<?php
/**
 * Template Name: Page d'accueil
 */

 wp_enqueue_style('page-home-style', get_template_directory_uri() . '/assets/css/page-home.css');
 get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        
        <section class="hero-section">
            <div class="hero-content">
                <h1>Rap'pearls</h1>
                <p>Le label de rap qui fait briller les perles rares</p>
                <div class="hero-buttons">
                    <a href="/artiste" class="button">Nos Artistes</a>
                    <a href="/album" class="button button-secondary">Nos Albums</a>
                </div>
            </div>
        </section>
        
        <section class="featured-artists">
            <h2>Artistes à la une</h2>
            <div class="artists-grid">
                <?php
                $featured_artists = get_posts(array(
                    'post_type' => 'artiste',
                    'posts_per_page' => 3,
                    'meta_key' => 'artiste_a_la_une',
                    'meta_value' => '1'
                ));
                
                if ($featured_artists) :
                    foreach ($featured_artists as $artist) :
                        ?>
                        <div class="artist-card">
                            <a href="<?php echo get_permalink($artist->ID); ?>">
                                <?php echo get_the_post_thumbnail($artist->ID, 'medium'); ?>
                                <h3><?php echo get_the_title($artist->ID); ?></h3>
                            </a>
                        </div>
                        <?php
                    endforeach;
                else :
                    echo '<p>Aucun artiste mis en avant actuellement.</p>';
                endif;
                ?>
            </div>
            <div class="section-action">
                <a href="<?php echo get_post_type_archive_link('artiste'); ?>" class="button">Voir tous nos artistes</a>
            </div>
        </section>
        
        <section class="latest-releases">
            <h2>Dernières sorties</h2>
            <div class="albums-grid">
                <?php
                $latest_albums = get_posts(array(
                    'post_type' => 'album',
                    'posts_per_page' => 4,
                    'orderby' => 'date',
                    'order' => 'DESC'
                ));
                
                if ($latest_albums) :
                    foreach ($latest_albums as $album) :
                        ?>
                        <div class="album-card">
                            <a href="<?php echo get_permalink($album->ID); ?>">
                                <?php echo get_the_post_thumbnail($album->ID, 'medium'); ?>
                                <h3><?php echo get_the_title($album->ID); ?></h3>
                                <?php 
                                $artist_id = get_field('artiste_associe', $album->ID);
                                if ($artist_id) : ?>
                                    <p class="album-artist"><?php echo get_the_title($artist_id); ?></p>
                                <?php endif; ?>
                            </a>
                        </div>
                        <?php
                    endforeach;
                else :
                    echo '<p>Aucun album disponible actuellement.</p>';
                endif;
                ?>
            </div>
            <div class="section-action">
                <a href="<?php echo get_post_type_archive_link('album'); ?>" class="button">Voir tous nos albums</a>
            </div>
        </section>
        
        <section class="about-section">
            <div class="about-content">
                <h2>À propos de Rap'pearls</h2>
                <?php
                the_content();
                ?>
				<div class="prout">
				<p>Un label pour ceux qui refusent d’être comme les autres.
					Si t’es ici, c’est que t’as compris un truc : le rap, c’est pas juste une question de buzz, c’est un art. 
					Chez Rap’Pearls, on ne cherche pas à suivre les tendances, on les façonne. 
					On mise sur les artistes rares, ceux qui ont une vraie patte, un univers solide et une identité marquée.
					On n’est pas là pour faire du rap en série. On repère les perles brutes et on les fait briller.</p>
				</div>
            </div>
			<div class="section-action">
                <a href="<?php echo get_post_type_archive_link(''); ?>" class="button">Voir plus !</a>
            </div>
        </section>
        
    </main>
</div>

<?php get_footer(); ?>