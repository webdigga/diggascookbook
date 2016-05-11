// Includes
var gulp = require('gulp');
var sass = require('gulp-sass');
var browserSync = require('browser-sync').create();
var useref = require('gulp-useref');
var uglify = require('gulp-uglify');
var gulpIf = require('gulp-if');
var cssnano = require('gulp-cssnano');
var del = require('del');
var runSequence = require('run-sequence');

// BROWSER SYNC
// Start browserSync (live reload) server
gulp.task('browserSync', function() {
  browserSync.init({
    server: {
      baseDir: ''
    },
  })
})

// SASS
// Compile the Sass into CSS and add into app folder
gulp.task('sass', function() {
  return gulp.src('scss/**/*.scss') // Gets all files ending with .scss in app/scss
    .pipe(sass())
    .pipe(gulp.dest('css'))
    .pipe(browserSync.reload({
      stream: true
    }))
});

// WATCH
// Watch for any Sass, HTML or JS changes and run browserSync and if Sass then compile into CSS
gulp.task('watch', ['browserSync', 'sass'], function () {
  gulp.watch('scss/**/*.scss', ['sass']);  
  gulp.watch('**/*.html', browserSync.reload); 
  gulp.watch('js/**/*.js', browserSync.reload); 
});

// OPTIMISATION
// Concatenate(useref) and minify(uglify/cssnano) JS and CSS
gulp.task('useref', function(){
  return gulp.src('*.html')
    .pipe(useref())
    .pipe(gulpIf('*.js', uglify()))    
    .pipe(gulpIf('*.css', cssnano()))
    .pipe(gulp.dest('dist'))
});

// CLEAN
// Empty the distribution folder
gulp.task('clean:dist', function() {
  return del.sync('dist');
});

// BUILD
// Run clean:dist first, then sass, useref, images and fonts concurrently
gulp.task('build', function (callback) {
  runSequence('clean:dist', 
    ['sass', 'useref'],
    callback
  )
});

// DEV
// Run sass, browser sync and watch concurrently
gulp.task('dev', function (callback) {
  runSequence(['sass','browserSync', 'watch'],
    callback
  )
});