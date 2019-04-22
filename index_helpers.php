<?php
  // Used to get an array of all the featured records of a type
  function featured_generic($table, $featured_condition, $limit) {
    if (!class_exists($table)) {
        return [];
    }
    $query = get_db()->getTable($table)->getSelect()->where($featured_condition)->order('RAND()');
    if ($limit != null) {
      $query = $query->limit($limit);
    }
    return get_db()->getTable($table)->fetchObjects($query);
  }

  // Gets all the featured exhibits
  function featured_exhibits($limit=null) {
    return featured_generic('Exhibit', 'exhibits.featured = 1', $limit);
  }

  // Gets all the featured collections
  function featured_collections($limit=null) {
    return featured_generic('Collection', 'collections.featured = 1', $limit);
  }

  // Gets all the featured items
  function featured_items($limit=null) {
    return featured_generic('Item', 'items.featured = 1', $limit);
  }

  // Returns an array of shuffled HTML hero cards to display
  function hero_cards() {
    $cards = array();

    if (get_theme_option('Display Featured Exhibit')) {
      $exibits = featured_exhibits();
      foreach ($exibits as $exhibit) {
        array_push($cards, get_view()->partial('homepage/exhibit_card.php', array('exhibit' => $exhibit)));
      }
    }

    if (get_theme_option('Display Featured Collection')) {
      $collections = featured_collections();
      foreach ($collections as $collection) {
        array_push($cards, get_view()->partial('homepage/collection_card.php', array('collection' => $collection)));
      }
    }

    if (get_theme_option('Display Featured Item')) {
      $items = featured_items();
      foreach ($items as $item) {
        array_push($cards, get_view()->partial('homepage/item_card.php', array('item' => $item)));
      }
    }

    // Randomize card order
    shuffle($cards);

    return $cards;
  }
?>