<?php
    require_once __DIR__ . '/exhibit-builder/exhibits_theme_functions.php';
    require_once __DIR__ . '/index_helpers.php';
    queue_js_file('home.bundle', 'assets');
?>

<?php echo head(array('bodyid' => 'home', 'bodyclass' => 'two-col', 'contentclass' => 'home-content-wrapper')); ?>
<?php $cards = hero_cards() ?>
<?php if (count($cards) > 0): ?>
    <div class="glide hero">
        <div class="glide__track" data-glide-el="track">
            <ul class="glide__slides">
                <?php foreach ($cards as $card): ?>
                    <?php echo $card ?>
                <?php endforeach ?>
            </ul>
        </div>

        <div class="glide">
            <div class="glide__bullets" data-glide-el="controls[nav]">
                <?php for ($i = 0; $i < count($cards); $i++): ?>
                    <button class="glide__bullet" data-glide-dir="=<?php echo $i ?>"></button>
                <?php endfor ?>
            </div>
        </div>
    </div>
<?php endif ?>

<div class="content">
    <div id="primary">
        <?php if ($homepageText = get_theme_option('Homepage Text')): ?>
        <p><?php echo $homepageText; ?></p>
        <?php endif; ?>
        <?php if (get_theme_option('Display Featured Item') == 1): ?>
        <!-- Featured Item -->
        <div id="featured-item" class="featured">
            <h2><?php echo __('Featured Item'); ?></h2>
            <?php echo random_featured_items(1); ?>
        </div><!--end featured-item-->
        <?php endif; ?>
        <?php if (get_theme_option('Display Featured Collection')): ?>
        <!-- Featured Collection -->
        <div id="featured-collection" class="featured">
            <h2><?php echo __('Featured Collection'); ?></h2>
            <?php echo random_featured_collection(); ?>
        </div><!-- end featured collection -->
        <?php endif; ?>
        <?php if ((get_theme_option('Display Featured Exhibit')) && function_exists('exhibit_builder_display_random_featured_exhibit')): ?>
        <!-- Featured Exhibit -->
        <?php echo exhibit_builder_display_random_featured_exhibit(); ?>
        <?php endif; ?>

    </div><!-- end primary -->

    <div id="secondary">
        <?php
        $recentItems = get_theme_option('Homepage Recent Items');
        if ($recentItems === null || $recentItems === ''):
            $recentItems = 3;
        else:
            $recentItems = (int) $recentItems;
        endif;
        if ($recentItems):
        ?>
        <div id="recent-items">
            <h2><?php echo __('Recently Added Items'); ?></h2>
            <?php echo recent_items($recentItems); ?>
            <p class="view-items-link"><a href="<?php echo html_escape(url('items')); ?>"><?php echo __('View All Items'); ?></a></p>
        </div><!--end recent-items -->
        <?php endif; ?>
        
        <?php fire_plugin_hook('public_home', array('view' => $this)); ?>

    </div><!-- end secondary -->
</div>
<?php echo foot(); ?>
