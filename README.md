# FoundationPress

This is a WordPress starter theme based on Foundation 5 by Zurb. The purpose of FoundationPress, is to act as a small and handy toolbox that contains the essentials needed to build any design. FoundationPress is meant to be a starting point, not the final product. If you're looking for an all-in-one theme with built-in shortcodes, plugins, fancypancy portfolio templates or whatnot, I'm afraid you have to look elsewhere.

Please fork, copy, modify, delete, share or do whatever you like with this. 

All contributions are welcome!

## Requirements

*You'll need to have the following items installed before continuing.*

  * [Node.js](http://nodejs.org): Use the installer provided on the NodeJS website.
  * [Grunt](http://gruntjs.com/): Run `[sudo] npm install -g grunt-cli`
  * [Bower](http://bower.io): Run `[sudo] npm install -g bower`

## Quickstart

```bash
cd my-wordpress-folder/wp-content/themes/
git clone git@github.com:olefredrik/FoundationPress.git
mv FoundationPress your-theme-name
cd your-theme-name
npm install && bower install
```

While you're working on your project, run:

`grunt`

And you're set!

Check for Foundation Updates? Run:
`foundation update` 
(this requires the foundation gem to be installed in order to work. Please see the [docs](http://foundation.zurb.com/docs/sass.html) for details.)


## Stylesheet Folder Structure

  * `style.css`: Do not worry about this file. (For some reason) it's required by WordPress. All styling are handled in the Sass files described below

  * `scss/app.scss`: Sass imports for global config, foundation and site structure

  * `scss/config/_variables.scss`: Your custom variables
  * `scss/config/_colors.scss`: Your custom color scheme
  * `scss/config/_settings.scss`: Original Foundation 5 base settings

  * `scss/site/_structure`: Your custom site structure

  * `css/app.css`: All Sass files are minified and compiled to this file

## Script Folder Strucutre
  
  * `bower_components/`: This is the source folder where all Foundation scripts are located. `foundation update` will check and update scripts in this folder
  * `js/`: jQuery, Modernizr and Foundation scripts are copied from `bower_components/` to this directory, where they are minified and concatinated and enqueued in WordPress
  * Please note that you must run `grunt` in your terminal for the scripts to be copied. See [Gruntfile.js](https://github.com/olefredrik/FoundationPress/blob/master/Gruntfile.js) for details

## How to get started with Foundation

* [Zurb Foundation Docs](http://foundation.zurb.com/docs/)

## Learn how to use WordPress

* [WordPress Codex](http://codex.wordpress.org/)

## Demo

* [Clean FoundationPress install](http://foundationpress.olefredrik.com/)
* [FoundationPress Kitchen Sink - see every single element in action](http://foundationpress.olefredrik.com/kitchen-sink/)
