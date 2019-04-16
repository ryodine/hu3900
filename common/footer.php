</div><!-- end content -->

<?php
    function footer_logo_uri() {
        $footer_logo = get_theme_option('footer_logo');
        if ($footer_logo) {
            $storage = Zend_Registry::get('storage');
            $uri = $storage->getUri($storage->getPathByType($footer_logo, 'theme_uploads'));
            return $uri;
        }
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
        <?php if (get_theme_option('footer_logo') != null): ?>
            <a class="wpilogo" href="https://wpi.edu" target="_blank" style="background-image:url('<?php echo footer_logo_uri(); ?>');"></a>
        <?php endif; ?>
    </div><!-- end footer-content -->

     <?php fire_plugin_hook('public_footer', array('view'=>$this)); ?>

</footer>

<script type="text/javascript">
    jQuery(document).ready(function(){
        Omeka.showAdvancedForm();
        Omeka.skipNav();
        Omeka.megaMenu();
        Berlin.dropDown();
    });
</script>

</body>

</html>
