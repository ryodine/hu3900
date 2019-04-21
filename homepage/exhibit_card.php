<li class="glide__slide featured-slide">
    <div class="featured-content" style="background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.3)), url('<?php echo image_uri($exhibit); ?>')">
        <a class="title-info" href="<?php echo exhibit_builder_exhibit_uri($exhibit) ?>" target="_blank">
            <div class="pre-title">Featured Exhibit</div>
            <div class="title"><?php echo $exhibit["title"] ?></div>
        </a>
        <div class="description"><?php echo $exhibit["description"] ?></div>
        <a class="action-btn" href="<?php echo exhibit_builder_exhibit_uri($exhibit) ?>" target="_blank">View Exhibit</a>
    </div>
</li>