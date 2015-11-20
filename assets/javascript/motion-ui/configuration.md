# Configuration

Motion UI has six variables which store all of the library's settings. Each is a map of keys and values.

## States

```scss
$motion-ui-states: (
  in: 'enter',
  out: 'leave',
);
```

Motion UI defines two motion states: `in` and `out`, which create classes with the words `enter` and `leave` respectively.

## Classes

```scss
$motion-ui-classes: (
  chain: true,
  prefix: 'mui-',
  active: '-active',
);
```

Different animation libraries have different ways of writing classes, but most libraries require a setup class, as well as an active class to trigger a transition or animation.

The default configuration outputs classes like this:

```css
.fade-in.mui-enter {}
.fade-in.mui-enter.mui-enter-active {}
```

Set the `chain` property of `$motion-ui-classes` to `false` to create classes like this:

```css
.fade-in-mui-enter {}
.fade-in-mui-enter.fade-in-mui-enter-active {}
```

The class output can also be fine-tuned with the `prefix` and `active` properties.

## Animation Defaults

The maps `$motion-ui-speeds`, `$motion-ui-delays`, and `$motion-ui-easings` define terms for animation speeds, delays, and timing functions. For example, the `default` speed of animations is 500ms, while `slow` is 750ms, and `fast` is 250ms.

## Other Settings

Miscellaneous settings are in the `$motion-ui-settings` map. These settings define if animations include a fade, and what class to use for triggering an animation queue.

```scss
$motion-ui-settings: (
  slide-and-fade: false,
  hinge-and-fade: true,
  scale-and-fade: true,
  spin-and-fade: true,
  activate-queue-class: 'is-animating'
);
```



