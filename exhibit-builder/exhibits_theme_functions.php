<?php
  // Based on ExhibitFunctions.php:exhibit_builder_link_to_exhibit()
  function exhibit_title($exhibit = null, $text = null, $props = array(), $exhibitPage = null) {
      if (!$exhibit) {
          $exhibit = get_current_record('exhibit');
      }
      $text = !empty($text) ? $text : html_escape($exhibit->title);
      return $text;
  }
?>