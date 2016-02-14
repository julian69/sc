// Include gulp
var gulp = require('gulp');

// Include Our Plugins
var nunjucksRender = require('gulp-nunjucks-render');
var sass = require('gulp-sass');
var prefix = require('gulp-autoprefixer');
var rename = require("gulp-rename");
var minify = require('gulp-minify-css');
var jshint = require('gulp-jshint');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var imagemin = require('gulp-imagemin');
var del = require('del');
var runSequence = require('run-sequence');
var browserSync = require('browser-sync');
var reload = browserSync.reload;

// Wordpress custom theme name
var wp_theme_name = 'salecaravana';

// Nunjucks Template Task
gulp.task('nunjucks', function() {
  nunjucksRender.nunjucks.configure(['html/templates/']);
  // Gets .html and .nunjucks files in pages
  return gulp.src('html/pages/**/*.+(html|nunjucks)')
  // Renders template with nunjucks
  .pipe(nunjucksRender())
  // output files in app folder
  .pipe(gulp.dest('html'))
});


// gulp.task('uncss', function() {
//     return gulp.src('html/stylesheets/**/*.scss')
//         .pipe(sass())
//         .pipe(concat('main.css'))
//         .pipe(prefix('last 2 versions'))
// 		// .pipe(gulp.dest('dist/assets/css'))
// 		.pipe(rename({ suffix: '.min' }))
// 		.pipe(uncss({
//         	 ignore: [/\w\.in/,
//                     ".fade",
//                     ".collapse",
//                     ".collapsing",
//                     /(#|\.)navbar(\-[a-zA-Z]+)?/,
//                     /(#|\.)dropdown(\-[a-zA-Z]+)?/,
//                     /(#|\.)(open)/,
//                     ".modal",
//                     ".modal.fade.in",
//                     ".modal-dialog",
//                     ".modal-document",
//                     ".modal-scrollbar-measure",
//                     ".modal-backdrop.fade",
//                     ".modal-backdrop.in",
//                     ".modal.fade.modal-dialog",
//                     ".modal.in.modal-dialog",
//                     ".modal-open",
//                     ".affix",
//                     ".affix-top",
//                     ".very-nav.affix-top",
//                     ".very-nav.affix",
//                     ".in",
//                     ".modal-backdrop"],
//             html: ['html/*.html']
//         }))
//         .pipe(minify())
//         .pipe(gulp.dest('cms/wp-content/themes/' + wp_theme_name + '/assets/css'))
// 		.pipe(gulp.dest('dist/assets/css'))
// });



// Prefix and Minify Our Sass
gulp.task('sass', function() {
	return gulp.src('html/stylesheets/main.scss')
		.pipe(sass())
		.pipe(prefix('last 2 versions'))
		.pipe(gulp.dest('dist/assets/css'))
		.pipe(rename({ suffix: '.min' }))
		.pipe(minify())
		.pipe(gulp.dest('cms/wp-content/themes/' + wp_theme_name + '/assets/css'))
		.pipe(gulp.dest('dist/assets/css'))
});


// Fonts
// gulp.task('fonts', function() {
//     return gulp.src(['html/stylesheets/libs/fonts/fontawesome-webfont.*'])
//    			.pipe(gulp.dest('cms/wp-content/themes/' + wp_theme_name + '/assets/fonts'))
//             .pipe(gulp.dest('dist/assets/fonts/'));
// });

// Concatenate and Uglify Our CSS vendors
// Already loading files from main.scss

// gulp.task('css', function() {
// 	return gulp.src('html/stylesheets/libs/*.css')
// 		.pipe(concat('vendor.css'))
// 		.pipe(gulp.dest('dist/assets/css'))
// 		.pipe(rename({ suffix: '.min' }))
// 		.pipe(minify())
// 		.pipe(gulp.dest('cms/wp-content/themes/' + wp_theme_name + '/assets/css'))
// 		.pipe(gulp.dest('dist/assets/css'))
// });



// Concatenate, Lint and Uglify Our Scripts
gulp.task('scripts', function() {
	return gulp.src('html/javascripts/*.js')
		.pipe(jshint())
		//.pipe(jshint.reporter('default'))
		.pipe(concat('main.js'))
		.pipe(gulp.dest('dist/assets/js'))
		.pipe(rename({ suffix: '.min' }))
		.pipe(uglify())
		.pipe(gulp.dest('cms/wp-content/themes/' + wp_theme_name + '/assets/js'))
		.pipe(gulp.dest('dist/assets/js'))
});




// Concatenate and Uglify Our JS vendors
gulp.task('vendors', function() {
	return gulp.src([
			'html/javascripts/libs/jquery-2.1.4.min.js',
			'html/javascripts/libs/bootstrap.min.js',
			'html/javascripts/libs/wow.min.js',
			// 'html/javascripts/libs/jquery.smoothWheel.js'
		])
		.pipe(concat('vendors.min.js'))
		.pipe(gulp.dest('cms/wp-content/themes/' + wp_theme_name + '/assets/js/libs'))
		.pipe(gulp.dest('dist/assets/js/libs'))
});


// Optimizing Our Images
gulp.task('images', function() {
	return gulp.src('html/images/**/*.{png,jpg,gif,svg}')
	.pipe(imagemin({ optimizationLevel: 3, progressive: true, interlaced: true }))
	.pipe(gulp.dest('cms/wp-content/themes/' + wp_theme_name + '/assets/images'))
	.pipe(gulp.dest('dist/assets/images'))
});

// Copy All HTML Files
gulp.task('copy', function () {
	return gulp.src('html/*.html')
	.pipe(gulp.dest('dist'))
});


// Clean
gulp.task('clean', function() {
	del('dist');
});


// Static Server
gulp.task('serve', function() {
	browserSync({
		server: {
			baseDir: 'dist'
		}
	});
	gulp.watch('html/templates/**/*.nunjucks', ['nunjucks']);
	gulp.watch('html/pages/**/*.html', ['nunjucks']);
	gulp.watch('html/stylesheets/**/*.scss', ['sass', reload]);
	gulp.watch('html/stylesheets/**/*.css', [reload]);
	gulp.watch('html/javascripts/*.js', ['scripts', reload]);
	// gulp.watch('html/images/*.{png,jpg,gif,svg}', ['images', reload]);
	gulp.watch('html/*.html', ['copy', reload]);
});

// Reload All Browsers
gulp.task('bs-reload', function () {
	browserSync.reload();
});

// Default Task
gulp.task('default', ['clean'], function(cb) {
	runSequence('nunjucks', 'copy', ['sass','vendors', 'scripts', 'images'], 'serve', cb);
});





