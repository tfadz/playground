// Include the necessary modules.

// Npm install dependencies -- > npm install gulp@3.9 browser-sync gulp-sass gulp-postcss autoprefixer gulp-concat gulp-sourcemaps gulp-uglify --save-dev


var gulp = require('gulp'),
    browserSync = require('browser-sync'),
    sass = require('gulp-sass');
    postcss = require('gulp-postcss');
    autoprefixer = require('autoprefixer');
    concat = require('gulp-concat');
    sourcemaps = require('gulp-sourcemaps');
    uglify = require('gulp-uglify');
    plumber = require('gulp-plumber');

// Configure Browsersync.
gulp.task('browser-sync', function() {
    var files = [
        './style.css',
        './*.php',
        './template-parts/*.php',
        './js/*.js'
    ];

// Initial Browsersync with PHP Server
browserSync.init(files, {
    proxy: "http://localhost:8888/playground" // Change to match local host address

  });

});


// Configure Sass task to run when the specified .scss files change.
// Browsersync will also reload browsers.

gulp.task('sass', function() {
    return gulp.src([
        'node_modules/bootstrap/dist/css/bootstrap.min.css',
        'node_modules/animate.css/animate.min.css',
        'sass/style.scss'

        ])
    
        .pipe(sourcemaps.init())
        .pipe(sass({ outputStyle: 'compressed' })
            .on('error', sass.logError)
        )
        .pipe(postcss([
            autoprefixer({
                overrideBrowserslist: ['last 2 versions'],
                cascade: false,
                grid: true

            })
        ]))
        .pipe(concat('style.css'))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('./'))
        .pipe(browserSync.stream());
});



gulp.task('js', function () {
    return gulp.src([
        'js/theme/*.js'
    ])
     .pipe(plumber(function(error) {
        console.error(error.message);
        gulp.emit('finish');
    }))
    .pipe(concat('theme.js'))
    .pipe(uglify())
    .pipe(gulp.dest('js'));

});

// Create the default task that can be called using 'gulp'.
// The task will process sass, run browser-sync and start watching for changes.
gulp.task('default', ['sass', 'js', 'browser-sync'], function() {
    gulp.watch("sass/**/*.scss", ['sass']);
    gulp.watch("js/theme/*.js", ['js']);
})
