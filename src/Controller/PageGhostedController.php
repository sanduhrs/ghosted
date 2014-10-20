<?php

/**
 * @file
 * Contains \Drupal\page_example\Controller\PageGhostedController.
 */

namespace Drupal\ghosted\Controller;

use Drupal\Core\Url;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

/**
 * Controller routines for page example routes.
 */
class PageGhostedController {

  /**
   * Constructs a simple page.
   *
   * The router _content callback, maps the path 'examples/page_example/simple'
   * to this method.
   *
   * _content callbacks return a renderable array for the content area of the
   * page. The theme system will later render and surround the content with the
   * appropriate blocks, navigation, and styling.
   */
  public function demo() {
    return array(
      '#theme' => 'ghosted',
      '#attached' => array(
        'css' => array(
          drupal_get_path('module', 'ghosted') . '/css/bootstrap.css' => array(),
          drupal_get_path('module', 'ghosted') . '/css/editor.css' => array(),
          drupal_get_path('module', 'ghosted') . '/css/ghosted.css' => array(),
          drupal_get_path('module', 'ghosted') . '/vendor/codemirror/CodeMirror/lib/codemirror.css' => array(),
          drupal_get_path('module', 'ghosted') . '/vendor/enyo/dropzone/downloads/css/basic.css' => array(),
          drupal_get_path('module', 'ghosted') . '/vendor/enyo/dropzone/downloads/css/dropzone.css' => array(),
        ),
        'js' => array(
          drupal_get_path('module', 'ghosted') . '/vendor/enyo/dropzone/downloads/dropzone.js' => array(),
          drupal_get_path('module', 'ghosted') . '/vendor/codemirror/CodeMirror/lib/codemirror.js' => array(),
          drupal_get_path('module', 'ghosted') . '/vendor/showdownjs/showdown/src/showdown.js' => array(),
          drupal_get_path('module', 'ghosted') . '/js/ghosted.js' => array(),
        ),
      ),
    );
  }

}
