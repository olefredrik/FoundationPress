# Transitions

Each transition has its own mixin, with multiple parameters that can customize the details of the effect. To create a transition class, just `@include` the mixin inside a class. Motion UI will create the necessary boilerplate for you.

Here's a basic fade in class. The first parameter of every transition mixin is a *state*, which is either `in` or `out`. In transitions reveal elements, while out transitions hide them.

```scss
.fade-in {
  @include mui-fade(in);
}
```

Here's what the CSS looks like.

```css
.fade-in.mui-enter {
  opacity: 0;
  transition-property: opacity; }

.fade-in.mui-enter.mui-enter-active {
  opacity: 1; }
```

The last three parameters of every transition mixin are the same: `$duration`, which sets the speed of the effect; `$timing`, which adjusts the easing; and `$delay`, which adds a delay before the effect starts.

```scss
.fade-in {
  // A long, long fade
  @include mui-fade(in, $duration: 10s);
}
```


## Mixins


### mui-fade()

Creates a fade transition by adjusting the opacity of the element.

**Parameters:**

- `state` (Keyword) - State to transition to. (**Default:** in)
- `from` (Number) - Opacity to start at. Must be a number between 0 and 1. (**Default:** 0)
- `to` (Number) - Opacity to end on. (**Default:** 1)
- `duration` (Keyword) - Length (speed) of the transition. (**Default:** null)
- `timing` (Keyword|Function) - Easing of the transition. (**Default:** null)
- `delay` (Duration) - Delay in seconds or milliseconds before the transition starts. (**Default:** null)


### mui-hinge()

Creates a hinge transition by rotating the element.

**Parameters:**

- `state` (Keyword) - State to transition to. (**Default:** in)
- `from` (Keyword) - Edge of the element to rotate from. Can be `top`, `right`, `bottom`, or `left`. (**Default:** left)
- `axis` (Keyword) - Axis of the element to rotate on. Can be `edge` or `center`. (**Default:** edge)
- `perspective` (Length) - Perceived distance between the viewer and the element. A higher number will make the rotation effect more pronounced. (**Default:** 2000px)
- `turn-origin` (Keyword) - Side of the element to start the rotation from. Can be `from-back` or `from-front`. (**Default:** from-back)
- `fade` (Boolean) - Set to `true` to fade the element in or out simultaneously. (**Default:** true)
- `duration` (Duration) - Length (speed) of the transition. (**Default:** null)
- `timing` (Keyword|Function) - Easing of the transition. (**Default:** null)
- `delay` (Duration) - Delay in seconds or milliseconds before the transition starts. (**Default:** null)


### mui-slide()

Creates a sliding transition by translating the element horizontally or vertically.

**Parameters:**

- `state` (Keyword) - State to transition to. (**Default:** in)
- `direction` (Keyword) - Side of the element to slide from. Can be `top`, `right`, `bottom`, or `left`. (**Default:** left)
- `amount` (Length) - Length of the slide as a percentage value. (**Default:** 100%)
- `fade` (Boolean) - Set to `true` to fade the element in or out simultaneously. (**Default:** false)
- `duration` (Duration) - Length (speed) of the transition. (**Default:** null)
- `timing` (Keyword|Function) - Easing of the transition. (**Default:** null)
- `delay` (Duration) - Delay in seconds or milliseconds before the transition starts. (**Default:** null)


### mui-spin()

Creates a spinning transition by rotating the element. The `turn` unit is used to specify how far to rotate. `1turn` is equal to a 360-degree spin.

**Parameters:**

- `state` (Keyword) - State to transition to. (**Default:** in)
- `direction` (Boolean) - Direction to spin. Should be `cw` (clockwise) or `ccw` (counterclockwise). (**Default:** cw)
- `amount` (Number) - Amount to element the element. (**Default:** 0.75turn)
- `fade` (Boolean) - Set to `true` to fade the element in or out simultaneously. (**Default:** false)
- `duration` (Duration) - Length (speed) of the transition. (**Default:** null)
- `timing` (Keyword|Function) - Easing of the transition. (**Default:** null)
- `delay` (Duration) - Delay in seconds or milliseconds before the transition starts. (**Default:** null)


### mui-zoom()

Creates a scaling transition. A scale of `1` means the element is the same size. Larger numbers make the element bigger, while numbers less than 1 make the element smaller.

**Parameters:**

- `state` (Keyword) - State to transition to. (**Default:** in)
- `from` (Number) - Size to start at. (**Default:** 1.5)
- `from` (Number) - Size to end at. (**Default:** 1)
- `fade` (Boolean) - Set to `true` to fade the element in or out simultaneously. (**Default:** true)
- `duration` (Duration) - Length (speed) of the transition. (**Default:** null)
- `timing` (Keyword|Function) - Easing of the transition. (**Default:** null)
- `delay` (Duration) - Delay in seconds or milliseconds before the transition starts. (**Default:** null)


