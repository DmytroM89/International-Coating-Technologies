/**
 * Created by Дмитрий on 26.01.2017.
 */

var gulp = require('gulp'),
    sass = require('gulp-sass'), //Подключаем Sass пакет
    browserSync   = require('browser-sync'),
    concat        = require('gulp-concat'),
    uglify        = require('gulp-uglifyjs'),
    cssnano       = require('gulp-cssnano'),
    rename        = require('gulp-rename'),
    del           = require('del'),
    imagemin      = require('gulp-imagemin'),
    pngquant      = require('imagemin-pngquant'),
    cache         = require('gulp-cache'),
    autoprefixer  = require('gulp-autoprefixer'),
    svgstore      = require('gulp-svgstore');


gulp.task('sass', function(){ // Создаем таск "sass"
    return gulp.src('./assets/sass/style.sass') // Берем источник
        .pipe(sass()) // Преобразуем Sass в CSS посредством gulp-sass
        .pipe(autoprefixer(['last 15 versions', '> 1%', 'ie 8', 'ie 7'], {cascade: true}))
        .pipe(cssnano())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('./assets/css/'))
        .pipe(browserSync.reload({stream: true})); // Обновляем CSS на странице при изменении
});

gulp.task('js', function () {
    return gulp.src('./assets/js/main.js')
        .pipe(rename({suffix: '.min'}))
        .pipe(uglify())
        .pipe(gulp.dest('./assets/js/'))
});

gulp.task('browser-sync', function() { // Создаем таск browser-sync
    browserSync({ // Выполняем browser Sync
        server: { // Определяем параметры сервера
            baseDir: './' // Директория для сервера - app
        },
        notify: false // Отключаем уведомления
    });
});

gulp.task('clean', function () {
   return del.sync('dist');
});

gulp.task('clean-cache', function () {
    return cache.clearAll();
});

gulp.task("svg", function () {
    return gulp
        .src("./assets/img/svg/*.svg", { base: "./assets/img/sprites" })
        .pipe(svgstore())
        .pipe(gulp.dest("./assets/img/"));
});

gulp.task('watch', ['browser-sync', 'sass'], function() {
    gulp.watch('./assets/sass/**/*.sass', ['sass']); // Наблюдение за sass файлами
    // Наблюдение за другими типами файлов
    gulp.watch('./assets/js/**/*.js', browserSync.reload);
});

