var gulp = require('gulp');
var server = require('gulp-server-livereload');


gulp.task('serve', ['clean', 'scripts'], function() {
  gulp.src('./')
    .pipe(server({
      defaultFile: 'demo.html',
      livereload: true,
      open: true
  }));

  gulp.watch(['./what-input.js', './polyfills/*.js'], ['scripts']);
});
