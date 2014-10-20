<?php

/**
 * @file
 * Contains \Drupal\editor\Plugin\EditorBase.
 */

namespace Drupal\editor\Plugin;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Plugin\PluginBase;
use Drupal\editor\Entity\Editor;
use Drupal\editor\Plugin\EditorPluginInterface;

/**
 * Defines a base class from which other modules providing editors may extend.
 *
 * This class provides default implementations of the EditorPluginInterface so
 * that classes extending this one do not need to implement every method.
 *
 * Plugins extending this class need to define a plugin definition array through
 * annotation. These definition arrays may be altered through
 * hook_editor_info_alter(). The definition includes the following keys:
 *
 * - id: The unique, system-wide identifier of the text editor. Typically named
 *   the same as the editor library.
 * - label: The human-readable name of the text editor, translated.
 * - supports_content_filtering: Whether the editor supports "allowed content
 *   only" filtering.
 * - supports_inline_editing: Whether the editor supports the inline editing
 *   provided by the Edit module.
 * - is_xss_safe: Whether this text editor is not vulnerable to XSS attacks.
 *
 * A complete sample plugin definition should be defined as in this example:
 *
 * @code
 * @Editor(
 *   id = "ghosted",
 *   label = @Translation("Ghosted"),
 *   supports_content_filtering = FALSE,
 *   supports_inline_editing = FALSE,
 *   is_xss_safe = FALSE
 * )
 * @endcode
 *
 * @see \Drupal\editor\Annotation\Editor
 * @see \Drupal\editor\Plugin\EditorPluginInterface
 * @see \Drupal\editor\Plugin\EditorManager
 * @see plugin_api
 */
class Ghosted extends EditorBase {

  /**
   * Returns the default settings for this configurable text editor.
   *
   * @return array
   *   An array of settings as they would be stored by a configured text editor
   *   entity (\Drupal\editor\Entity\Editor).
   */
  public function getDefaultSettings() {
    return array('editor' => 12);
  }

  /**
   * Returns a settings form to configure this text editor.
   *
   * If the editor's behavior depends on extensive options and/or external data,
   * then the implementing module can choose to provide a separate, global
   * configuration page rather than per-text-format settings. In that case, this
   * form should provide a link to the separate settings page.
   *
   * @param array $form
   *   An empty form array to be populated with a configuration form, if any.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The state of the entire filter administration form.
   * @param \Drupal\editor\Entity\Editor $editor
   *   A configured text editor object.
   *
   * @return array
   *   A render array for the settings form.
   */
  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state, Editor $editor) {
    $settings = $editor->getSettings();
    $form['dummy'] = array(
      '#type' => 'textfield',
      '#title' => 'Test',
    );
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function settingsFormValidate(array $form, FormStateInterface $form_state) {
  }

  /**
   * {@inheritdoc}
   */
  public function settingsFormSubmit(array $form, FormStateInterface $form_state) {
  }

  /**
   * Returns JavaScript settings to be attached.
   *
   * Most text editors use JavaScript to provide a WYSIWYG or toolbar on the
   * client-side interface. This method can be used to convert internal settings
   * of the text editor into JavaScript variables that will be accessible when
   * the text editor is loaded.
   *
   * @param \Drupal\editor\Entity\Editor $editor
   *   A configured text editor object.
   *
   * @return array
   *   An array of settings that will be added to the page for use by this text
   *   editor's JavaScript integration.
   *
   * @see drupal_process_attached()
   * @see EditorManager::getAttachments()
   */
  public function getJSSettings(Editor $editor) {
    return array('editor' => 'Ghosted', 'eid' => 'ashoigfziddsf');
  }

  /**
   * Returns libraries to be attached.
   *
   * Because this is a method, plugins can dynamically choose to attach a
   * different library for different configurations, instead of being forced to
   * always use the same method.
   *
   * @param \Drupal\editor\Entity\Editor $editor
   *   A configured text editor object.
   *
   * @return array
   *   An array of libraries that will be added to the page for use by this text
   *   editor.
   *
   * @see drupal_process_attached()
   * @see EditorManager::getAttachments()
   */
  public function getLibraries(Editor $editor) {
    return array('toolbar' => array());
  }
}
