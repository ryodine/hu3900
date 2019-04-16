<?php
$title = __('Browse Exhibits');
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

<?php
    // Based on FileMarkup.php:image_tag()
    function image_uri($record, $format)
    {
        if (!($record && $record instanceof Omeka_Record_AbstractRecord)) {
            return false;
        }

        // Use the default representative file.
        $file = $record->getFile();
        if (!$file) {
            return false;
        }

        if (!$format) {
            $format = 'original';
        }

        if ($file->hasThumbnail()) {
            $uri = $file->getWebPath($format);
        } else {
            $uri = img($this->_getFallbackImage($file));
        }
        return $uri;
    }

    // Based on ExhibitFunctions.php:exhibit_builder_link_to_exhibit()
    function exhibit_title($exhibit = null, $text = null, $props = array(), $exhibitPage = null)
    {
        if (!$exhibit) {
            $exhibit = get_current_record('exhibit');
        }
        $text = !empty($text) ? $text : html_escape($exhibit->title);
        return $text;
    }
?>

<?php echo pagination_links(); ?>

<div class="item-container">
    <?php $exhibitCount = 0; ?>
    <?php foreach (loop('exhibit') as $exhibit): ?>
        <?php $exhibitCount++; ?>
        <a href="<?php echo exhibit_builder_exhibit_uri($exhibit, $exhibitPage) ?>" class="exhibit <?php if ($exhibitCount%2==1) echo ' even'; else echo ' odd'; ?>" style="background-image: url(<?php echo image_uri($exhibit, null) ?>)">
            <h2><?php echo exhibit_title(); ?></h2>
        </a>
    <?php endforeach; ?>
</div>

<?php echo pagination_links(); ?>

<?php else: ?>
<p><?php echo __('There are no exhibits available yet.'); ?></p>
<?php endif; ?>

<?php echo foot(); ?>
