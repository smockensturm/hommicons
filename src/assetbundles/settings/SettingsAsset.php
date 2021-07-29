<?php
/**
 * HOMM Icons plugin for Craft CMS 3.x
 *
 * Craft CMS Icon Picker
 *
 * @link      https://github.com/HOMMinteractive
 * @copyright Copyright (c) 2019 HOMM interactive
 */

namespace homm\hommicons\assetbundles\settings;

use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

/**
 * @author    Benjamin Ammann
 * @package   HOMMSocialFeed
 * @since     0.0.1
 */
class SettingsAsset extends AssetBundle
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->sourcePath = "@homm/hommicons/assetbundles/settings/dist";

        $this->depends = [
            CpAsset::class,
        ];

        parent::init();
    }
}
