<?php
  // Based on FileMarkup.php:image_tag()
  function image_uri($record, $format=null) {
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
  function exhibit_title($exhibit = null, $text = null, $props = array(), $exhibitPage = null) {
      if (!$exhibit) {
          $exhibit = get_current_record('exhibit');
      }
      $text = !empty($text) ? $text : html_escape($exhibit->title);
      return $text;
  }
?>