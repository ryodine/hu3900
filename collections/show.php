<?php
require_once __DIR__ . '/../theme_helpers.php';

$collectionTitle = metadata('collection', 'display_title');
$totalItems = metadata('collection', 'total_items');
?>

<?php echo head(array('title' => $collectionTitle, 'bodyclass' => 'collections show')); ?>

<h1><?php echo $collectionTitle; ?></h1>

<?php echo all_element_texts('collection'); ?>

<div id="collection-items">
    <h2><?php echo __(Inflector::titleize(singular_model_name('collection')) . ' Items'); ?></h2>
    <?php if ($totalItems > 0): ?>
        <?php foreach (loop('items') as $item): ?>
        <?php $itemTitle = metadata('item', 'display_title'); ?>
        <div class="item hentry">
            <h3><?php echo link_to_item($itemTitle, array('class' => 'permalink')); ?></h3>

            <?php if (metadata('item', 'has thumbnail')): ?>
            <div class="item-img">
                <?php echo link_to_item(item_image(null, array('alt' => $itemTitle))); ?>
            </div>
            <?php endif; ?>

            <?php if ($description = metadata('item', array('Dublin Core', 'Description'), array('snippet' => 250))): ?>
            <div class="item-description">
                <?php echo $description; ?>
            </div>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
        <?php echo link_to_items_browse(__(plural('View ' . strtolower(singular_model_name('item')), 'View all %s ' . strtolower(pluralized_model_name('item')), $totalItems), $totalItems), array('collection' => metadata('collection', 'id')), array('class' => 'view-items-link')); ?>
    <?php else: ?>
        <p><?php echo __("There are currently no items within this collection."); ?></p>
    <?php endif; ?>
</div><!-- end collection-items -->

<?php fire_plugin_hook('public_collections_show', array('view' => $this, 'collection' => $collection)); ?>

<?php echo foot(); ?>
