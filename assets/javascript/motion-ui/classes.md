# CSS Classes

The Sass mixins are the heart of Motion UI, but the library also includes many pre-made CSS classes to get you up and running faster.

## Defaults

The pre-made classes all use these transition/animation defaults:

- **Speed:** 500ms
- **Timing:** Linear
- **Delay:** 0s

These defaults can be changed by modifying the [Motion UI settings](configuration.md);

## Transition Classes

- **Slide:**
  - `.slide-in-down`
  - `.slide-in-left`
  - `.slide-in-up`
  - `.slide-in-right`
  - `.slide-out-down`
  - `.slide-out-left`
  - `.slide-out-up`
  - `.slide-out-right`
- **Fade:**
  - `.fade-in`
  - `.fade-out`
- **Hinge:**
  - `.hinge-in-from-top`
  - `.hinge-in-from-right`
  - `.hinge-in-from-bottom`
  - `.hinge-in-from-left`
  - `.hinge-in-from-middle-x`
  - `.hinge-in-from-middle-y`
  - `.hinge-out-from-top`
  - `.hinge-out-from-right`
  - `.hinge-out-from-bottom`
  - `.hinge-out-from-left`
  - `.hinge-out-from-middle-x`
  - `.hinge-out-from-middle-y`
- **Scale:**
  - `.scale-in-up`
  - `.scale-in-down`
  - `.scale-out-up`
  - `.scale-out-down`
- **Spin:**
  - `.spin-in`
  - `.spin-out`
  - `.spin-in-ccw`
  - `.spin-out-ccw`

## Animation Classes

- `.shake`: shakes the element horizontally.
- `.wiggle`: rotates the element back and forth.
- `.spin-cw`: rotates the element once.
- `.spin-ccw`: rotates the element once, counterclockwise.

## Modifier Classes

Modifiers work with both transitions and animations.

- **Speed:**
  - `.slow` (750ms)
  - `.fast` (250ms)
- **Timing:**
  - `.linear`
  - `.ease`
  - `.ease-in`
  - `.ease-out`
  - `.ease-in-out`
  - `.bounce-in`
  - `.bounce-out`
  - `.bounce-in-out`
- **Delay:**
  - `.short-delay` (300ms)
  - `.long-delay` (700ms)



