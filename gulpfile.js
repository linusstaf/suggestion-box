var gulp = require('gulp');
var sass = require('gulp-ruby-sass');
var uglify = require('gulp-uglify');
var watch = require('gulp-watch');
var browserify = require('browserify');
var watchify = require('watchify');
var source = require('vinyl-source-stream');

gulp.task('browserify', function() {
    return browserify('./resources/js/app.js')
        .bundle()
        .on('error', function(e){
            console.log(e.message);
            this.emit('end');
        })
        .pipe(source('app.js'))
        .pipe(gulp.dest('./public/js/'));
});

gulp.task('sass', function () {
    return sass('./resources/sass/style.scss')
        .on('error', function (err) {
            console.error('Error!', err.message);
        })
        .pipe(gulp.dest('./public/css'));
});

gulp.task('watch', function() {
    gulp.watch('./resources/js/**/*.js', ['browserify']);
    gulp.watch('./resources/sass/**/*.scss', ['sass']);
});