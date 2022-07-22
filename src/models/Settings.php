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
 * Class Settings
 *
 * @author    Benjamin Ammann
 * @package   HOMMIcons
 * @since     0.0.1
 */
class Settings extends Model
{
    // Public Properties
    // =========================================================================

    /**
     * @var string Icon picker base volume name
     */
    public string $iconsVolume = 'pictures';

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function rules(): array
    {
        return [
            [['iconsVolume'], 'required'],
        ];
    }
}
