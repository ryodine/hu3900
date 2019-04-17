<?php echo head(array('title' => metadata('exhibit', 'title'), 'bodyclass'=>'exhibits summary')); ?>

<?php set_exhibit_pages_for_loop_by_exhibit(); ?>
<?php foreach (loop('exhibit_page') as $exhibitPage): ?>
<?php endforeach;?>

<div class="exhibit-internal-wrap">
<h1 style="width:100%"><?php echo metadata('exhibit', 'title'); ?></h1>

<?php if (get_theme_option('show_on_summary') == 1): ?>
<?php if ($exhibitDescription = metadata('exhibit', 'description', array('no_escape' => true))): ?>
<div class="exhibit-description">
    <?php echo $exhibitDescription; ?>
</div>
<?php endif; ?>
<?php foreach (loop('exhibit_page') as $exhibitPage): ?>
    <h2 class="exhibit_title"><?php echo $exhibitPage->title; ?></h2>
    <?php exhibit_builder_render_exhibit_page($exhibitPage); ?>
<?php endforeach; ?>
<?php if (($exhibitCredits = metadata('exhibit', 'credits'))): ?>
<div class="exhibit-credits">
    <h3><?php echo __('Credits'); ?></h3>
    <p><?php echo $exhibitCredits; ?></p>
</div>
<?php endif; ?>
<?php endif;?>

<?php if (get_theme_option('show_on_summary') == 0): ?>

    <div class="internal_summary_descriptor">
    <?php if ($exhibitDescription = metadata('exhibit', 'description', array('no_escape' => true))): ?>
    <div class="exhibit-description">
        <?php echo $exhibitDescription; ?>
    </div>
    <?php endif; ?>

    <?php if (($exhibitCredits = metadata('exhibit', 'credits'))): ?>
    <div class="exhibit-credits">
        <h3><?php echo __('Credits'); ?></h3>
        <p><?php echo $exhibitCredits; ?></p>
    </div>
    <?php endif; ?>
    </div>

    <?php
    $pageTree = exhibit_builder_page_tree();
    if ($pageTree):
    ?>
    <nav id="exhibit-pages">
        <?php echo $pageTree; ?>
    </nav>
    <?php endif; ?>
<?php endif; ?>

</div>

<?php echo foot(); ?>
