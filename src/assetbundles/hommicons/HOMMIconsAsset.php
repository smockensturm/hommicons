<?php
/**
 * HOMM Icons plugin for Craft CMS 3.x
 *
 * Craft CMS Icon Picker
 *
 * @link      https://github.com/HOMMinteractive
 * @copyright Copyright (c) 2019 HOMM interactive
 */

namespace homm\hommicons\assetbundles\hommicons;

use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

/**
 * Class HOMMIconsAsset
 *
 * @author    Benjamin Ammann
 * @package   HOMMIcons
 * @since     0.0.1
 */
class HOMMIconsAsset extends AssetBundle
{
    // Public Methods
    // =========================================================================

    /**
     * Initializes the bundle.
     */
    public function init()
    {
        // define the path that your publishable resources live
        $this->sourcePath = "@homm/hommicons/assetbundles/hommicons/dist";

        // define the dependencies
        $this->depends = [
            CpAsset::class,
        ];

        // define the relative path to CSS/JS files that should be registered with the page
        // when this asset bundle is registered
        $this->js = [
            'js/HOMMIconsField.js',
        ];

        $this->css = [
            'css/HOMMIconsField.css',
        ];

        parent::init();
    }
}
