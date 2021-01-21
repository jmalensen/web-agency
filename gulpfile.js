
"use strict";

var gulp = require('gulp');
var fs = require('fs');
var browserSync = require('browser-sync').create();
var runSequence = require('run-sequence');
var plumber = require('gulp-plumber');
var addsrc = require('gulp-add-src');
var merge = require('merge-stream');
var image = require('gulp-imagemin');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var concat = require('gulp-concat');
var minifyCss = require('gulp-minify-css');
var replace = require('gulp-replace');
var uglify = require('gulp-uglify');
var clean = require('gulp-clean');

var pkg = JSON.parse(fs.readFileSync('./package.json')),
	paths = {
		src: './theme/',
		dist: '../www/wp-content/themes/' + pkg.name + '/'
	};

gulp.task('clean', function() {
	return gulp.src(paths.dist)
        .pipe(clean({force: true}));
});

gulp.task('wp_files', function() {

	return gulp
			.src([
				paths.src + 'wp_files/**/*.php',
				paths.src + 'wp_files/style.css',
			])
			.pipe(plumber())
			.pipe(replace(/@@themeName/g, pkg.name))
			.pipe(replace(/@@prettyThemeName/g, pkg.prettyName))
			.pipe(replace(/@@themeAuthor/g, pkg.author))
			.pipe(replace(/@@themeVersion/g, pkg.version))
			.pipe(replace(/@@themeDescription/g, pkg.description))
			.pipe(addsrc(paths.src + 'wp_files/screenshot.png'))
			.pipe(gulp.dest(paths.dist))
			.pipe(browserSync.stream());

});

gulp.task('lang', function() {

	return gulp
			.src([paths.src + 'lang/*.mo', '!' + paths.src + 'lang/*.temp.mo'])
			.pipe(gulp.dest(paths.dist + 'lang/'))
			.pipe(browserSync.stream());

});

gulp.task('images', function() {

	return gulp
			.src(paths.src + 'images/**/*.{jpg,png,gif,svg,ico}')
			.pipe(plumber())
			.pipe(image())
			.pipe(gulp.dest(paths.dist + 'images/'))
			.pipe(browserSync.stream());

});

gulp.task('fonts', function() {

	return gulp
			.src(paths.src + 'fonts/**/*')
			.pipe(gulp.dest(paths.dist + 'fonts/'))
			.pipe(browserSync.stream());

});

gulp.task('main_sass', function () {
    var sassStream,
        cssStream;

    sassStream = gulp
			.src(paths.src + '/sass/main.scss')
			.pipe(plumber())
			.pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
			.pipe(autoprefixer('last 3 version','safari 5', 'ie 9'))
			.pipe(minifyCss());

    cssStream = gulp.src([
                    'node_modules/owl.carousel/dist/assets/owl.carousel.min.css',
                    'node_modules/owl.carousel/dist/assets/owl.theme.default.min.css',
                    ]);

    return merge(sassStream, cssStream)
        .pipe(concat('main.css'))
        .pipe(gulp.dest(paths.dist + '/css/'))
        .pipe(browserSync.stream());
});

gulp.task('lib_scripts', function() {

	return gulp
			.src([
				'node_modules/lodash/lodash.min.js',
				'node_modules/bootstrap/dist/js/bootstrap.min.js',
				'node_modules/wowjs/dist/wow.min.js',
				'node_modules/owl.carousel/dist/owl.carousel.min.js',
                'node_modules/waypoints/lib/jquery.waypoints.js',
			])
			.pipe(concat('lib.js'))
			.pipe(gulp.dest(paths.dist + 'js/'))
			.pipe(browserSync.stream());

});

gulp.task('main_scripts', function() {

	return gulp
			.src([
                paths.src + 'js/animations.js',
				paths.src + 'js/common.js',
				paths.src + 'js/front-page.js',
                paths.src + 'js/header-nav.js',
                paths.src + 'js/prestation.js',
				paths.src + 'js/realisation.js',
                paths.src + 'js/portfolio.js',
                paths.src + 'js/responsive.js',
                paths.src + 'js/carousel.js',
                paths.src + 'js/forms.js',
				paths.src + 'js/main.js',
			])
			.pipe(plumber())
			.pipe(uglify())	
			.pipe(concat('main.js'))			
			.pipe(gulp.dest(paths.dist + 'js/'))
			.pipe(browserSync.stream());

});

gulp.task('ajax_scripts', function() {

	return gulp
			.src([
				paths.src + 'js/ajax.js',
			])
			.pipe(plumber())
			.pipe(uglify())	
			.pipe(concat('ajax.js'))			
			.pipe(gulp.dest(paths.dist + 'js/'))
			.pipe(browserSync.stream());

});

gulp.task('live', ['default'], function() {
    browserSync.init({
		injectChanges: true,
        proxy: 'concept-image-2017.ci',
        port: 5433,
        open: false
    });

    gulp.watch(paths.src + '**/*.php', ['wp_files']);
    gulp.watch(paths.src + 'lang/*', ['lang']);
    gulp.watch(paths.src + 'images/**/*', ['images']);
    gulp.watch(paths.src + 'sass/**/*.scss', ['main_sass']);
    gulp.watch(paths.src + 'js/**/*.js', ['main_scripts', 'ajax_scripts']);  
});

gulp.task('default', function() {
	runSequence('clean', [
		'wp_files',
		'lang',
		'images',
		'fonts',
		'main_sass',
		'lib_scripts',
		'main_scripts',
        'ajax_scripts',
	]);
});