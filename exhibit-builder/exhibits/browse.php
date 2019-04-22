<?php
require_once __DIR__ . '/../exhibits_theme_functions.php';
require_once __DIR__ . '/../../theme_helpers.php';

$title = __('Browse ' . Inflector::titleize(pluralized_model_name('exhibit')));
echo head(array('title' => $title, 'bodyclass' => 'exhibits browse'));
?>
<h1><?php echo $title; ?> <?php echo __('(%s total)', $total_results); ?></h1>
<?php if (count($exhibits) > 0): ?>

<nav class="navigation secondary-nav">
    <?php echo nav(array(
        array(
            'label' => __('Browse All'),
            'uri' => url('exhibits')
        ),
        array(
            'label' => __('Browse by Tag'),
            'uri' => url('exhibits/tags')
        )
    )); ?>
</nav>

<?php echo pagination_links(); ?>

<div class="item-container">
    <?php $exhibitCount = 0; ?>
    <?php foreach (loop('exhibit') as $exhibit): ?>
        <?php $exhibitCount++; ?>
        <a href="<?php echo exhibit_builder_exhibit_uri($exhibit) ?>" class="exhibit <?php if ($exhibitCount%2==1) echo ' even'; else echo ' odd'; ?>" style="background-image: url(<?php echo image_uri($exhibit, null) ?>)">
            <h2><?php echo exhibit_title(); ?></h2>
        </a>
    <?php endforeach; ?>
</div>

<?php echo pagination_links(); ?>

<?php else: ?>
<p><?php echo __('There are no ' . pluralized_model_name('exhibit') . ' available yet.'); ?></p>
<?php endif; ?>

<?php echo foot(); ?>
