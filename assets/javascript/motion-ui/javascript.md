# JavaScript

Motion UI includes a small JavaScript library that can play transitions, although this specific library is not required to take advantage of Motion UI's CSS. Animating in reveals a hidden element, while animating out hides a visible element.

The library is available on `window.MotionUI`, or can imported with a module system.

## Usage

The `MotionUI` object has two methods: `animateIn()` and `animateOut()`. Both functions take three parameters:

- `element`: a DOM element to animate.
- `animation`: a transition class to use.
- `cb` (optional): a callback to run when the transition finishes. Within the callback, the value of `this` is the DOM element that was transitioned.

Here's an example:

```js
var $elem = $('[data-animate]');

MotionUI.animateIn($elem, 'slide-in', function() {
  console.log('Transition finished!');
});
```

What about animations? Those can be triggered just by adding the animation class to an element. Here are examples with plain JavaScript and with jQuery:

```js
// Plain JavaScript (IE10+)
document.querySelector('.animating-thing').classList.add('wiggle');

// jQuery
$('.animating-thing').addClass('wiggle');
```



