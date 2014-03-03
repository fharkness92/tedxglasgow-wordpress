// Define Variables for Dependencies
var gulp = require('gulp');
var gutil = require('gulp-util');
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');
var bourbon = require('node-bourbon').includePaths;
var sass = require('gulp-sass');
var csso = require('gulp-csso');
var jade = require('gulp-jade');
var imagemin = require('gulp-imagemin');
var themename = "tedxglasgow"

// JavaScript
gulp.task('js', function() {
  return gulp.src('scripts/*.js')
    .pipe( uglify() )
    .pipe( gulp.dest(themename + '/js/'))
});

gulp.task('js-concat', function() {
  return gulp.src('scripts/components/*.js')
    .pipe( uglify() )
    .pipe( concat('site.js'))
    .pipe( gulp.dest(themename + '/js/'))
});

// Styles
gulp.task('styles', function() {
  return gulp.src(['sass/*.scss', 'sass/*.sass'])
    .pipe( 
      sass( {
        includePaths: ['sass'].concat(bourbon),
        errLogToConsole: true
      } ) )
    .pipe( csso() )
    .pipe( gulp.dest(themename) )
});

// Images
gulp.task('imagemin', function () {
    gulp.src(['images/**/*.svg', 'images/**/*.png', 'images/**/*.jpg', 'images/**/*.gif'])
        .pipe(imagemin())
        .pipe(gulp.dest(themename + '/img/'));
});

// Watch
gulp.task('watch', function () {
  gulp.watch(['sass/**/*.scss', 'sass/**/*.sass'],['styles']);
  gulp.watch('scripts/**/*.js',['scripts']);
  gulp.watch(['images/**/*.svg', 'images/**/*.png', 'images/**/*.jpg', 'images/**/*.gif'],['imagemin']);
});

// Default Task
gulp.task('default', ['js', 'js-concat', 'styles', 'imagemin', 'watch']);