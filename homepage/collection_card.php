<li class="glide__slide featured-slide">
  <div class="featured-content" style="background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.3)), url('<?php echo image_uri($collection); ?>')">
      <a class="title-info" href="" target="_blank">
          <div class="pre-title"><?php echo get_theme_option('featured_collection_card_name') ?: "Featured Collection" ?></div>
          <div class="title"><?php echo metadata($collection, array('Dublin Core', 'Title')) ?></div>
      </a>
      <div class="description"><?php echo metadata($collection, array('Dublin Core', 'Description')) ?></div>
      <a class="action-btn" href="<?php echo record_url($collection) ?>" target="_blank"><?php echo get_theme_option('featured_collection_card_button_title') ?: "View Collection" ?></a>
  </div>
</li>