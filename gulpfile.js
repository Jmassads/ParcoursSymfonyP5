'use strict';
const gulp = require('gulp');
const sourcemaps = require('gulp-sourcemaps');
const sass = require('gulp-sass');
let uglify = require('gulp-uglify-es').default;

let path = {
    src_sass:'./src/scss/*.scss',
    src_js:'./src/js/main.js',
}

gulp.task("sassTask", function() {
    return gulp
        .src(path.src_sass)
        .pipe(sourcemaps.init()) // initialize sourcemaps first
        .pipe(sass().on('error', sass.logError))
        // .pipe(sourcemaps.write('.')) // write sourcemaps file in current directory
        .pipe(gulp.dest('./public'))
});

// JS task: uglifies JS files to main.js
gulp.task('jsTask', function() {
    return gulp
        .src(path.src_js)
        .pipe(sourcemaps.init())
        .pipe(uglify())
        .pipe(sourcemaps.write()) // Inline source maps.
        .pipe(gulp.dest('./public'))
});

// Static Server & watching scss/js/html files
gulp.task('serve', gulp.series('sassTask', function() {

    gulp.watch(path.src_sass,
        gulp.series('sassTask'));

    gulp.watch(path.src_js,
        gulp.series("jsTask"));
}));

gulp.task('default',
    gulp.series('sassTask', "jsTask", 'serve'));