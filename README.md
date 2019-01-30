# FoundationPress

[![Gitter](https://badges.gitter.im/Join%20Chat.svg)](https://gitter.im/olefredrik/foundationpress?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge)
[![GitHub version](https://badge.fury.io/gh/olefredrik%2Ffoundationpress.svg)](https://github.com/olefredrik/FoundationPress/releases)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
[![Buy Me a Coffee at ko-fi.com](https://img.shields.io/badge/-Buy%20me%20a%20Coffee-orange.svg?colorB=593C1F&colorA=4e798d&logo=data%3Aimage%2Fpng%3Bbase64%2CiVBORw0KGgoAAAANSUhEUgAAAA4AAAAOCAYAAAAfSC3RAAAAVUlEQVR4AWNQtnJTQcZ%2Blb2fsWF0dQzYNRHWzIBdE2EDGGCaSNYI47x69fY%2FMRimnmiNyGqwavyflo6MaawRTTP1%2FIiM4dFBQBPl8UggyRHWSHYiBwCwA90T1NTlAQAAAABJRU5ErkJggg%3D%3D%0D%0A&logoWidth=14)](https://ko-fi.com/olefredrik)

This is a starter-theme for WordPress based on Zurb's [Foundation for Sites 6](https://foundation.zurb.com/sites.html), the most advanced responsive (mobile-first) framework in the world. The purpose of FoundationPress, is to act as a small and handy toolbox that contains the essentials needed to build any design. FoundationPress is meant to be a starting point, not the final product.

Please fork, copy, modify, delete, share or do whatever you like with this.

All contributions are welcome!

## Requirements

**This project requires [Node.js](http://nodejs.org) v6.x.x 11.6.x to be installed on your machine.** Please be aware that you might encounter problems with the installation if you are using the most current Node version (bleeding edge) with all the latest features.

FoundationPress uses [Sass](http://Sass-lang.com/) (CSS with superpowers). In short, Sass is a CSS pre-processor that allows you to write styles more effectively and tidy.

The Sass is compiled using libsass, which requires the GCC to be installed on your machine. Windows users can install it through [MinGW](http://www.mingw.org/), and Mac users can install it through the [Xcode Command-line Tools](http://osxdaily.com/2014/02/12/install-command-line-tools-mac-os-x/).

If you have not worked with a Sass-based workflow before, I would recommend reading [FoundationPress for beginners](https://foundationpress.olefredrik.com/posts/tutorials/foundationpress-for-beginners), a short blog post that explains what you need to know.

## Quickstart

### 1. Clone the repository and install with npm
```bash
$ cd my-wordpress-folder/wp-content/themes/
$ git clone https://github.com/olefredrik/FoundationPress.git
$ cd FoundationPress
$ npm install
```

### 2. Configuration

#### YAML config file
FoundationPress includes a `config-default.yml` file. To make changes to the configuration, make a copy of `config-default.yml` and name it `config.yml` and make changes to that file. The `config.yml` file is ignored by git so that each environment can use a different configuration with the same git repo.

At the start of the build process a check is done to see if a `config.yml` file exists. If `config.yml` exists, the configuration will be loaded from `config.yml`. If `config.yml` does not exist, `config-default.yml` will be used as a fallback.

#### Browsersync setup
If you want to take advantage of [Browsersync](https://www.browsersync.io/) (automatic browser refresh when a file is saved), simply open your `config.yml` file after creating it in the previous step, and put your local dev-server address and port (e.g http://localhost:8888) in the `url` property under the `BROWSERSYNC` object.

#### Static asset hashing / cache breaker
If you want to make sure your users see the latest changes after re-deploying your theme, you can enable static asset hashing. In your `config.yml`, set ``REVISIONING: true;``. Hashing will work on the ``npm run build`` and ``npm run dev`` commands. It will not be applied on the start command with browsersync. This is by design.  Hashing will only change if there are actual changes in the files.

### 3. Get started

```bash
$ npm start
```

### 4. Compile assets for production

When building for production, the CSS and JS will be minified. To minify the assets in your `/dist` folder, run

```bash
$ npm run build
```

#### To create a .zip file of your theme, run:

```
$ npm run package
```

Running this command will build and minify the theme's assets and place a .zip archive of the theme in the `packaged` directory. This excludes the developer files/directories from your theme like `/node_modules`, `/src`, etc. to keep the theme lightweight for transferring the theme to a staging or production server.

### Project structure

In the `/src` folder you will find the working files for all your assets. Every time you make a change to a file that is watched by Gulp, the output will be saved to the `/dist` folder. The contents of this folder is the compiled code that you should not touch (unless you have a good reason for it).

The `/page-templates` folder contains templates that can be selected in the Pages section of the WordPress admin panel. To create a new page-template, simply create a new file in this folder and make sure to give it a template name.

I guess the rest is quite self explanatory. Feel free to ask if you feel stuck.

### Styles and Sass Compilation

 * `style.css`: Do not worry about this file. (For some reason) it's required by WordPress. All styling are handled in the Sass files described below

 * `src/assets/scss/app.scss`: Make imports for all your styles here
 * `src/assets/scss/global/*.scss`: Global settings
 * `src/assets/scss/components/*.scss`: Buttons etc.
 * `src/assets/scss/modules/*.scss`: Topbar, footer etc.
 * `src/assets/scss/templates/*.scss`: Page template styling

 * `dist/assets/css/app.css`: This file is loaded in the `<head>` section of your document, and contains the compiled styles for your project.

If you're new to Sass, please note that you need to have Gulp running in the background (``npm start``), for any changes in your scss files to be compiled to `app.css`.

### JavaScript Compilation

All JavaScript files, including Foundation's modules, are imported through the `src/assets/js/app.js` file. The files are imported using module dependency with [webpack](https://webpack.js.org/) as the module bundler.

If you're unfamiliar with modules and module bundling, check out [this resource for node style require/exports](http://openmymind.net/2012/2/3/Node-Require-and-Exports/) and [this resource to understand ES6 modules](http://exploringjs.com/es6/ch_modules.html).

Foundation modules are loaded in the `src/assets/js/app.js` file. By default all components are loaded. You can also pick and choose which modules to include. Just follow the instructions in the file.

If you need to output additional JavaScript files separate from `app.js`, do the following:
* Create new `custom.js` file in `src/assets/js/`. If you will be using jQuery, add `import $ from 'jquery';` at the top of the file.
* In `config.yml`, add `src/assets/js/custom.js` to `PATHS.entries`.
* Build (`npm start`)
* You will now have a `custom.js` file outputted to the `dist/assets/js/` directory.

## Demo

* [Clean FoundationPress install](http://foundationpress.olefredrik.com/)
* [FoundationPress Kitchen Sink - see every single element in action](http://foundationpress.olefredrik.com/kitchen-sink/)

## Local Development
We recommend using one of the following setups for local WordPress development:

* [MAMP](https://www.mamp.info/en/) (macOS)
* [WAMP](http://www.wampserver.com/en/download-wampserver-64bits/) (Windows)
* [LAMP](https://www.linux.com/learn/easy-lamp-server-installation) (Linux)
* [Local](https://local.getflywheel.com/) (macOS/Windows)
* [VVV (Varying Vagrant Vagrants)](https://github.com/Varying-Vagrant-Vagrants/VVV) (Vagrant Box)
* [Trellis](https://roots.io/trellis/)

## Resources

* [Foundation UI Kit for Adobe XD](https://gumroad.com/l/foundation-ui-kit-xd)
* [Foundation UI Kit for Axure RP](https://gumroad.com/l/foundation-ui-kit-axure-rp)
* [Foundation UI Kit for Photoshop](https://gumroad.com/l/foundation-ui-kit-psd)
* [Foundation 6 Shortcodes for Visual Composer](https://www.402websites.com/downloads/foundation-6-shortcodes-visual-composer/?ref=2&campaign=Foundation6ShortcodesforVisualComposer)


## Tutorials

* [FoundationPress for beginners](https://foundationpress.olefredrik.com/posts/tutorials/foundationpress-for-beginners/)
* [Responsive images in WordPress with Interchange](http://rachievee.com/responsive-images-in-wordpress/)
* [Learn to use the _settings file to change almost every aspect of a Foundation site](http://zurb.com/university/lessons/66)
* [Other lessons from Zurb University](http://zurb.com/university/past-lessons)

## Documentation

* [Zurb Foundation Docs](http://foundation.zurb.com/docs/)
* [WordPress Codex](http://codex.wordpress.org/)

## Showcase

* [Harvard Center for Green Buildings and Cities](http://www.harvardcgbc.org/)
* [INTI International University & Colleges](http://international.newinti.edu.my/)
* [Conservative Leadership Conference](http://civitasclc.com/)
* [The New Tropic](http://thenewtropic.com/)
* [Parent-Child Home Program](http://www.parent-child.org/)
* [Hip and Healthy](http://hipandhealthy.com/)
* [Threadbird blog](http://blog.threadbird.com/)
* [Public House Wines](http://publichousewine.com/)
* [Franchise Career Advisors](http://franchisecareeradvisors.com/)
* [Le saint](http://www.lesaint.ca/)
* [Help blog](http://help.com/blog/)
* [Maren Schmidt](http://marenschmidt.com/)
* [The Rainbow Venues](http://www.therainbowvenues.co.uk/)
* [Ameronix](http://www.ameronix.com/)
* [Finnerodja](http://www.finnerodja.se/)
* [Glossop Cartons](http://www.glossopcartons.co.uk/)
* [Ready4Work](http://www.ready4work.my/)
* [Just Legal](http://www.justlegal.co.jp/en/)
* [Vintage and Stuff](http://vintageandstuff.com/)
* [Software for FM](http://softwareforfm.co.uk/)
* [WP Diamonds](http://www.wpdiamonds.com/)
* [Storm Arts](http://stormarts.fi/)
* [USS Illinois](http://ussillinois.org/)
* [OffGrid Magazine](https://offgridweb.com/)
* [Axe](http://www.axe.be/)
* [ProfitGym](http://profitgym.nl/)
* [Dr Now](http://www.drnow.com/)
* [Agritur Piasina](http://www.agriturpiasina.it/)
* [Atomic Interactive](http://atomicinteractive.com/)
* [Byington Vineyard & Winery](http://byington.com/)
* [Philanthropy House](http://philanthropyhouse.eu/)
* [TVA Group](http://www.groupe-tva.com/en/)
* [Well Made Studio](http://wellmadestudio.com/)
* [Show And Tell](http://www.showandtelluk.com/)
* [Wahl + Case](https://www.wahlandcase.com/)
* [Forefront Dermatology](https://forefrontdermatology.com/)
* [Wirthschaftsjunioren](http://www.wirtschaftsjunioren.org/)
* [Morgridge Institute for Research](https://morgridge.org)
* [Impeach Trump Now](https://impeachdonaldtrumpnow.org/)
* [La revanche des sites](https://www.la-revanche-des-sites.fr/)


>Credit goes to all the brilliant designers and developers out there. Have **you** made a site that should be on this list? [Please let me know](https://twitter.com/olefredrik)

## Contributing
#### Here are ways to get involved:

1. [Star](https://github.com/olefredrik/FoundationPress/stargazers) the project!
2. Answer questions that come through [GitHub issues](https://github.com/olefredrik/FoundationPress/issues)
3. Report a bug that you find
4. Share a theme you've built on top of FoundationPress
5. [Tweet](https://twitter.com/intent/tweet?original_referer=http%3A%2F%2Ffoundationpress.olefredrik.com%2F&text=Check%20out%20FoundationPress%2C%20the%20ultimate%20%23WordPress%20starter-theme%20built%20on%20%23Foundation%206&tw_p=tweetbutton&url=http%3A%2F%2Ffoundationpress.olefredrik.com&via=olefredrik) and [blog](http://www.justinfriebel.com/my-first-experience-with-foundationpress-a-wordpress-starter-theme-106/) your experience of FoundationPress.

#### Pull Requests

Pull requests are highly appreciated. Please follow these guidelines:

1. Solve a problem. Features are great, but even better is cleaning-up and fixing issues in the code that you discover
2. Make sure that your code is bug-free and does not introduce new bugs
3. Create a [pull request](https://help.github.com/articles/creating-a-pull-request)
4. Verify that all the Travis-CI build checks have passed
