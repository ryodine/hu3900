<?php
$showcasePosition = isset($options['showcase-position'])
    ? html_escape($options['showcase-position'])
    : 'none';
$showcaseFile = $showcasePosition !== 'none' && !empty($attachments);
$galleryPosition = isset($options['gallery-position'])
    ? html_escape($options['gallery-position'])
    : 'left';
$galleryFileSize = isset($options['gallery-file-size'])
    ? html_escape($options['gallery-file-size'])
    : null;
$captionPosition = isset($options['captions-position'])
    ? html_escape($options['captions-position'])
    : 'center';
?>
<?php if ($showcaseFile): ?>
<div class="gallery-showcase <?php echo $showcasePosition; ?> with-<?php echo $galleryPosition; ?> captions-<?php echo $captionPosition; ?>">
    <?php
        $attachment = array_shift($attachments);
        echo $this->exhibitAttachment($attachment, array('imageSize' => 'fullsize'));
    ?>
</div>
<?php endif; ?>
<div class="gallery <?php if ($showcaseFile || !empty($text)) echo "with-showcase $galleryPosition"; if (!$showcaseFile) echo " halfwidth "; echo " $galleryFileSize" ?> captions-<?php echo $captionPosition; ?>">
    <?php 
    if ($showcaseFile) {
        echo $this->exhibitAttachmentGallery($attachments, array('imageSize' => $galleryFileSize));
    } else {
        echo $this->exhibitAttachmentGallery($attachments, array('imageSize' => 'fullsize')); 
    }
    ?>
</div>
<?php echo $text; ?>
