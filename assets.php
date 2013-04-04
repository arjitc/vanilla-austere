<?php if (!defined('APPLICATION')) exit();

// Composer autoload
// ----------------------------------------
/*  This file handles autoloading of all
 *  dependencies of the Composer packages
 */
require 'vendor/autoload.php';

// Manage filters
// ----------------------------------------
/*  These filters are merely a sample of
 *  the available filters in Assetic
 */
use Assetic\Asset\AssetCollection;
use Assetic\Asset\FileAsset;
use Assetic\Asset\GlobAsset;
use Assetic\Filter\LessphpFilter;
use Assetic\Filter\GoogleClosure;
use Assetic\Filter\CssMinFilter;

// Manage stylesheets
// ----------------------------------------
/*  Here we create a new collection of
 *  stylesheet that gets compiled and mini-
 *  fied to custom.css
 */
$css = new AssetCollection(array(
   
   /*  Here we create a file asset that calls
    *  app.less and compiles it from LESS to
    *  CSS after which it gets minified
    */
   new FileAsset(__DIR__.'/design/app.less',
      array(
         new LessphpFilter(),
         new CssMinFilter()
      )
   ),
   
   /*  Here we create a global file asset
    *  that looks for all files with a .css
    *  extension located in the includes
    *  directory in the design folder
    */
   new GlobAsset(__DIR__.'/design/includes/*.css')
   
));
/*  Lastly, all the stylesheet assets get
 *  dumped and the combined contents gets
 *  written to custom.css for Vanilla to read
 */
$css = $css->dump();
file_put_contents(__DIR__.'/design/custom.css', $css);

// Manage Javascript
// ----------------------------------------
/*  Here we create a new collection of
 *  Javascript that gets compiled and mini-
 *  fied to custom.js
 */
$js = new AssetCollection(array(

   /*  Here we create a file asset that calls
    *  app.js and minifies it using Closure
    */
   new FileAsset(__DIR__.'/js/app.js',
      array(
         new GoogleClosure\CompilerApiFilter()
      )
   ),
   
   /*  Here we create a global file asset
    *  that looks for all files with a .js
    *  extension located in the includes
    *  directory in the js folder
    */
   new GlobAsset(__DIR__.'/js/includes/*.js')
   
));
/*  Lastly, all the scripts assets get
 *  dumped and the combined contents gets
 *  written to custom.js for Vanilla to read
 */
$js = $js->dump();
file_put_contents(__DIR__.'/js/custom.js', $js);