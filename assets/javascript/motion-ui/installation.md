# Getting Started

## Installation

Install Motion UI with npm or Bower.

```bash
npm install motion-ui --save
bower install motion-ui --save
```

## Sass Usage

To import the Sass files into a project, add the load path `[modules_folder]/motion-ui/src` to your Sass configuration, then `@import` the library:

```scss
@import 'motion-ui';
```

**[Autoprefixer](https://github.com/postcss/autoprefixer) is required to use this library.** The library uses unprefixed `transition` and `animation` properties, which are then prefixed by Autoprefixer.

The library includes two mixins which export all of the [default CSS](classes.md) for the framework. This includes:

- Transitions for slide, fade, hinge, scale, and spin
- Animation classes for spinning, shaking, and wiggling
- Modifier classes for transition/animation speed, timing, and delay

```scss
@include motion-ui-transitions;
@include motion-ui-animations;
```

## CSS Usage

The package files also include these pre-made classes as a standalone CSS file, in minified and unminified flavors.

- **Uncompressed:** `[modules_folder]/motion-ui/dist/motion-ui.css`
- **Compressed:** `[modules_folder]/motion-ui/dist/motion-ui.min.css`

## JavaScript Usage

The package includes a small JavaScript library to help you transition elements in and out using Motion UI classes. It can be referenced as a browser global or a CommonJS/AMD package. Like the CSS, there's uncompressed and compressed versions included.

- **Uncompressed:** `[modules_folder]/motion-ui/dist/motion-ui.js`
- **Compressed:** `[modules_folder]/motion-ui/dist/motion-ui.min.js`

Refer to the full [JavaScript documentation](javascript.md) to learn more about how the JS library works.



