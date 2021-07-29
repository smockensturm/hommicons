# HOMM Icons plugin for Craft CMS 3.x

Craft CMS Icon Picker

> This plugin reads all images in the "icons" folder of your specified subvolumes.
> You should only upload SVG's in this folder!

![Screenshot](resources/img/plugin-logo.svg)

## Requirements

This plugin requires Craft CMS 3.x.

## Installation

To install the plugin, follow these instructions.

1. Open your terminal and go to your Craft project:

        cd /path/to/project

2. Then tell Composer to load the plugin:

        composer require homm/hommicons

3. In the Control Panel, go to Settings → Plugins and click the “Install” button for HOMM Icons.

## HOMM Icons Overview

This plugin reads all images in the "icons" folder of your specified subvolumes. You should only upload SVG's in this
folder!

## Configuring HOMM Icons

Go to _Settings > HOMM Icons_:

Here you can choose the desired assets volume which should be scanned.

## Using HOMM Icons

1. Go to _Settings > Fields_ and choose the desired field.
2. Within the _Field Type_ choose _HOMM Icons_
3. Upload your SVG icons in your `<VOLUME>/icons` folder

Basic usage in the template (Twig):

```html
{{ svg('@webroot/images/icons/' ~ entry.icon ~ '.svg') }}
```

## HOMM Icons Roadmap

Some things to do, and ideas for potential features:

* Add option to choose (an optional) subfolder
* Provide Craft Variable to easily output the icon

Brought to you by [HOMM interactive](https://github.com/HOMMinteractive)
