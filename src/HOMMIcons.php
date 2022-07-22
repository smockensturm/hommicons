<?php
/**
 * HOMM Icons plugin for Craft CMS 3.x
 *
 * Craft CMS Icon Picker
 *
 * @link      https://github.com/HOMMinteractive
 * @copyright Copyright (c) 2019 HOMM interactive
 */

namespace homm\hommicons;

use homm\hommicons\fields\HOMMIconsField;

use Craft;
use craft\base\Plugin;
use craft\services\Plugins;
use craft\events\PluginEvent;
use craft\services\Fields;
use craft\events\RegisterComponentTypesEvent;

use homm\hommicons\models\Settings;
use yii\base\Event;

/**
 * Class HOMMIcons
 *
 * @author    Benjamin Ammann
 * @package   HOMMIcons
 * @since     0.0.1
 */
class HOMMIcons extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * Static property that is an instance of this plugin class so that it can be accessed via
     * HOMMIcons::$plugin
     *
     * @var HOMMIcons
     */
    public static $plugin;

    // Public Properties
    // =========================================================================

    /**
     * To execute your plugin’s migrations, you’ll need to increase its schema version.
     *
     * @var string
     */
    public string $schemaVersion = '1.0.0';

    /**
     * @var bool
     */
    public bool $hasCpSettings = true;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;

        // Register our fields
        Event::on(
            Fields::class,
            Fields::EVENT_REGISTER_FIELD_TYPES,
            function (RegisterComponentTypesEvent $event) {
                $event->types[] = HOMMIconsField::class;
            }
        );

        Craft::info(
            Craft::t(
                'hommicons',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );
    }

    // Protected Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    protected function createSettingsModel(): ?\craft\base\Model
    {
        return new Settings();
    }

    /**
     * @inheritdoc
     */
    protected function settingsHtml(): ?string
    {
        return Craft::$app->view->renderTemplate(
            'hommicons/settings',
            [
                'settings' => $this->getSettings(),
                'volumes' => Craft::$app->getVolumes(),
            ]
        );
    }
}
