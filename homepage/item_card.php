<?php require_once __DIR__ . '/../theme_helpers.php'; ?>
<li class="glide__slide featured-slide">
  <div class="featured-content" style="background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.3)), url('<?php echo image_uri($item); ?>')">
      <a class="title-info" href="" target="_blank">
          <div class="pre-title"><?php echo "Featured " . Inflector::titleize(singular_model_name('item')) ?></div>
          <div class="title"><?php echo metadata($item, array('Dublin Core', 'Title')) ?></div>
      </a>
      <div class="description"><?php echo metadata($item, array('Dublin Core', 'Description')) ?></div>
      <a class="action-btn" href="<?php echo record_url($item) ?>" target="_blank"><?php echo get_theme_option('featured_item_card_button_title') ?: "View Item" ?></a>
  </div>
</li>