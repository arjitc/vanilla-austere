Austere
=======
#### An advanced and yet modest framework for Vanilla theme development
Austere enables you to write themes for Vanilla using your choice of preprocessors and languages. Austere uses Assetic for managing and compiling all its assets and using LESS, SASS, SCSS, Stylus, Compass and CoffeeScript in your themes has therefore never been easier.  
In its most basic form, Austere compiles and bundles all your assets and writes them to `custom.css` and `custom.js` for Vanilla to read. However, you're free to change this to your liking as well as do more advanced stuff - Austere is simply a set of easy-to-use tools.

Installation
------------
Austere manages all its dependencies using Composer:

    $ cd your-theme  
    $ curl -s https://getcomposer.org/installer | php
    $ php composer.phar install

When you've installed all dependencies, go ahead and activate the theme in the Vanilla dashboard. You're now free to organize the structure of your theme as well as your assets in `assets.php`. By default, `assets.php` calls in `design/app.less` and `design/includes/*.css` as well as `js/app.js` and `js/includes/*.js` and writes the output to `custom.css` and `custom.js` respectively.

Usage
-----
All aspects of asset management are thoroughly covered in the Assetic documentation (https://github.com/kriswallsmith/assetic) and as such this is not something I'll talk about any further.

Austere encourages you to separate your production code and your development code. This means that released versions of your theme should not contain files any folders created by Composer:

    *.lock
    *.phar
    vendor/

You'll also need to comment out the line of code that enables your asset manager in `class.themehooks.php`:

    // Development mode
    // ----------------------------------------
    /*  The following is an example of an
     *  asset manager written for Austere. It's
     *  well commented and it should be easy
     *  figuring out how to write one yourself
     */
    require "assets.php";

You're free to decide whether or not you want to include the source files (e.g `.less` or `.coffee`) in your release or leave it there for other developers to customize. If you intend to release your theme on VF.org or if you created it for a client, I suggest you go all the way in separating your production and development code and therefore only include the most necessary files in the release (`custom.css`, `custom.js` etc.). You can always create a Github repo to host and share the source.