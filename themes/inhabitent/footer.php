<?php
/**
 * The template for displaying the footer.
 *
 * @package RED_Starter_Theme
 */

?>

</div><!-- #content -->

<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="site-info">
        <a
            href="<?php echo esc_url( 'https://wordpress.org/' ); ?>"><?php printf( esc_html( 'Proudly powered by %s' ), 'WordPress' ); ?></a>
    </div>

    <div class="contact-hours">
        <div class="info">
            <ul>
                <li class="footer-cats">
                    CONTACT INFO
                </li>
                <li><i class="fas fa-envelope"></i><a href="" class="foota"> info@inhabitent.com</a></li>
                <li><i class="fas fa-phone" style="color:white; transform:scaleX(-1)"><a href="" class="foota"></i>
                    778-456-7891</a></li>
                <li><i class="fab fa-facebook-square"></i><span style="color:black">te</span><i
                        class="fab fa-twitter-square"></i><span style="color:black">te</span><i
                        class="fab fa-google-plus-g"></i></li>
            </ul>
        </div>
        <div class="hours">
            <li class="footer-cats">
                BUSINESS HOURS</li>
            <li>Monday-Friday: 9am to 5pm</li>
            <li>Saturday: 10am to 2pm</li>
            <li>Sunday: Closed</li>
        </div>


        <div class="copyright">
            <p>COPYWRITE &copy 2019 INHABITENT</p>
        </div>

        <div class="footer-img"><img
                src="<?php echo get_template_directory_uri(); ?>/images/logos/inhabitent-logo-text.svg" alt="">
        </div>
    </div>





</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>