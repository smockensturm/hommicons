<?php
/**
 * HOMM Icons plugin for Craft CMS 3.x
 *
 * Craft CMS Icon Picker
 *
 * @link      https://github.com/HOMMinteractive
 * @copyright Copyright (c) 2019 HOMM interactive
 */

namespace homm\hommicons\models;

use craft\base\Model;

/**
 * @author    Benjamin Ammann
 * @package   HOMMSocialFeed
 * @since     0.0.1
 */
class Settings extends Model
{
    // Public Properties
    // =========================================================================

    /**
     * @var string Icon picker base volume name
     */
    public $iconsVolume = 'pictures';

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['iconsVolume'], 'required'],
        ];
    }
}
