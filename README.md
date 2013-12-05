# FoundationPress

This is a WordPress starter theme based on Foundation 5 by Zurb. 
I made it for myself, as a solid starter theme for new and exciting WordPress projects.

The purpose of the Foundation Press is that it should only contain the most essential, with no need to peel away unnecessary features. If you're looking for a starter theme with built-in shortcode plugins, fancypancy portfolio templates or whatnot, I'm afraid you have to look elsewhere. 

## Requirements

*You'll need to have the following items installed before continuing.*

  * [Node.js](http://nodejs.org): Use the installer provided on the NodeJS website.
  * [Grunt](http://gruntjs.com/): Run `[sudo] npm install -g grunt-cli`
  * [Bower](http://bower.io): Run `[sudo] npm install -g bower`

## Quickstart

```bash
cd my-wordpress-folder/wp-content/themes/
mkdir FoundationPress && cd FoundationPress
git clone git@github.com:olefredrik/FoundationPress.git
npm install && bower install
```

While you're working on your project, run:

`grunt`

And you're set!

Check for Foundation Updates? Run:
`foundation update`


## Directory Strucutre

  * `style.css`: Do not worry about this file. (For some reason) it's required by WordPress. All styling are handled in the Sass files described below
  * `scss/_settings.scss`: Original Foundation base settings are found here
  * `scss/custom.scss`: Add your custom styling here
  * `css/app.css`: All Sass files are minified and compiled to this file

## Documentation

* [Zurb Foundation Docs](http://foundation.zurb.com/docs/)