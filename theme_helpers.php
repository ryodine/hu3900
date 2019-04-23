<?php
  // Options

  // Returns the default model names in case the config option isn't set
  function default_model_name($model) {
    switch ($model) {
      case 'exhibit': return 'Exhibit';
      case 'collection': return 'Collection';
      case 'item': return 'Item';
      default: return null;
    }
  }

  function model_name($model) {
    return get_theme_option($model . '_display_name') ?: default_model_name($model);
  }

  function singular_model_name($model) {
    $name = model_name($model);
    if ($name != null) {
      return Inflector::singularize($name);
    } else {
      return null;
    }
  }

  function pluralized_model_name($model) {
    $name = model_name($model);
    if ($name != null) {
      return Inflector::pluralize($name);
    } else {
      return null;
    }
  }

  // Field Retrieval

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
?>