<footer id="colophon" class="site-footer">
        <div class="footer-content">
            <div class="footer-logo">
                <?php
                if (has_custom_logo()) :
                    the_custom_logo();
                else :
                ?>
                    <h2 class="footer-title"><?php bloginfo('name'); ?></h2>
                <?php
                endif;
                ?>
            </div>
            
            <div class="footer-menu">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'footer-menu',
                        'menu_id'        => 'footer-menu',
                        'depth'          => 1,
                    )
                );
                ?>
            </div>
            
            <div class="footer-social">
                <h3>Suivez-nous</h3>
                <ul class="social-links">
                    <li><a href="#" target="_blank"><span class="screen-reader-text">Instagram</span>Instagram</a></li>
                    <li><a href="#" target="_blank"><span class="screen-reader-text">Twitter</span>Twitter</a></li>
                    <li><a href="#" target="_blank"><span class="screen-reader-text">YouTube</span>YouTube</a></li>
                </ul>
            </div>
        </div>
        
        <div class="site-info">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. Tous droits réservés.</p>
        </div>
    </footer>
</div><!-- #page -->

<?php 
wp_enqueue_style('footer-style', get_template_directory_uri() . '/assets/css/footer.css');
wp_footer();
 ?>

</body>
</html>