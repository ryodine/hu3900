</div><!-- end content -->

<?php
    function footer_logo_uri($n="") {
        $footer_logo = get_theme_option('footer_logo'. $n);
        if ($footer_logo) {
            $storage = Zend_Registry::get('storage');
            $uri = $storage->getUri($storage->getPathByType($footer_logo, 'theme_uploads'));
            return $uri;
        }
    }
    function footer_link_url($n="") {
        return ((get_theme_option('footer_url'. $n) == null) ? '' : 'href="' . get_theme_option('footer_url' . $n) . '"');
    }
?>

<footer role="contentinfo">

    <div id="footer-content" class="center-div">
        <?php if($footerText = get_theme_option('Footer Text')): ?>
        <div id="custom-footer-text">
            <p><?php echo get_theme_option('Footer Text'); ?></p>
        </div>
        <?php endif; ?>
        <?php if ((get_theme_option('Display Footer Copyright') == 1) && $copyright = option('copyright')): ?>
        <p><?php echo $copyright; ?></p>
        <?php endif; ?>
        <nav><?php echo public_nav_main()->setMaxDepth(0); ?></nav>
        <div class="flogos">
        <?php if (get_theme_option('footer_logo') != null): ?>
            <a class="footlogo" <?php echo footer_link_url(); ?> target="_blank" style="background-image:url('<?php echo footer_logo_uri(); ?>');">
                <img src="<?php echo footer_logo_uri(); ?>" />
            </a>
        <?php endif; ?>
        <?php if (get_theme_option('footer_logo2') != null): ?>
            <a class="footlogo" <?php echo footer_link_url("2"); ?> target="_blank" style="background-image:url('<?php echo footer_logo_uri("2"); ?>');">
                <img src="<?php echo footer_logo_uri("2"); ?>" />
            </a>
        <?php endif; ?>
        <?php if (get_theme_option('footer_logo3') != null): ?>
            <a class="footlogo" <?php echo footer_link_url("3"); ?> target="_blank" style="background-image:url('<?php echo footer_logo_uri("3"); ?>');"><img src="
                <?php echo footer_logo_uri("3"); ?>" />
            </a>
        <?php endif; ?>
        </div>
    </div><!-- end footer-content -->

     <?php fire_plugin_hook('public_footer', array('view'=>$this)); ?>

</footer>

<script type="text/javascript">
    jQuery(document).ready(function(){
        Omeka.showAdvancedForm();
        Omeka.skipNav();
        Omeka.megaMenu();
        window.Berlin.dropDown();
    });
</script>

</body>

</html>
