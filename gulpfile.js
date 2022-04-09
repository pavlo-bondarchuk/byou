'use strict';

/**************** gulpfile.js configuration ****************/

const

	// directory locations
	dir = {
		nm: '/node_modules/',
		theme: '.',
		src: 'assets/src/',
		build: 'assets/dist/'
	},
	url = 'http://byou.test/',
	textdomain = 'byou',

	// modules
	gulp = require( 'gulp' ),
	newer = require( 'gulp-newer' ),
	size = require( 'gulp-size' ),
	imagemin = require( 'gulp-imagemin' ),
	sass = require( 'gulp-sass' ),
	babel = require( 'gulp-babel' ),
	postcss = require( 'gulp-postcss' ),
	sassGlob = require( 'gulp-sass-glob' ),
	sourcemaps = require( 'gulp-sourcemaps' ),
	rename = require( 'gulp-rename' ),
	jshint = require( 'gulp-jshint' ),
	uglify = require( 'gulp-uglify' ),
	concat = require( 'gulp-concat' ),
	criticalCss = require( 'gulp-penthouse' ),
	sassLint = require( 'gulp-sass-lint' ),
	replace = require( 'gulp-replace' ),
	browsersync = require( 'browser-sync' ).create();

	// Default error handler
	const onError = function( err ) {

	console.log( 'An error occured:', err.message );
	this.emit( 'end' );
};

/**************** textdomain task ****************/

function translate() {

	return gulp.src( './**/*', {ignore: 'gulpfile.js'} )
		.pipe( replace( 'byou', textdomain ) )
		.pipe( gulp.dest( './' ) );

}

/**************** fonts task ****************/

const fontsConfig = {

	src: dir.src + 'fonts/**/*',
	build: dir.build + 'fonts/',
	watch: dir.src + 'fonts/**/*',
};

function fonts() {

	return gulp.src( fontsConfig.src )
		.pipe( gulp.dest( fontsConfig.build ) );

}

/**************** images task ****************/

const imgConfig = {

	src: dir.src + 'img/**/*',
	build: dir.build + 'img/',
	watch: dir.src + 'img/**/*',
	minOpts: {
		optimizationLevel: 5
	}
};

function images() {

	return gulp.src( imgConfig.src )
		.pipe( newer( imgConfig.build ) )
		.pipe( imagemin( imgConfig.minOpts ) )
		.pipe( size( {showFiles: true} ) )
		.pipe( gulp.dest( imgConfig.build ) );

}

/**************** CSS task ****************/

const cssConfig = {

	src: [dir.src + 'scss/styles.scss', './editor-style.scss', './gutenberg-blocks/**/*.scss'],
	//lint: dir.src + 'scss/**/*.s+(a|c)ss',
	watch: [dir.src + 'scss/**/*', './editor-style.scss', './gutenberg-blocks/**/*.scss', '!'],
	build: dir.build + 'css/',
	main: dir.build + 'css/styles.css',
	sassOpts: {
		sourceMap: false,
		outputStyle: 'compressed',
		imagePath: '../img/',
		precision: 5,
		errLogToConsole: true,
		includePaths: [
			dir.nm
		]
	},

	postCSS: [
		require( 'autoprefixer' )
	]

};

// function cssLint() {
//
// 	return gulp.src( cssConfig.lint )
// 		.pipe( sassLint( {
// 			configFile: '.sass-lint.yml'
// 		} ) )
// 		.pipe( sassLint.format() )
// 		.pipe( sassLint.failOnError() )
// }

function css() {

	return gulp.src( cssConfig.src )
		.pipe( sourcemaps.init() )
		.pipe( sassGlob() )
		.pipe( sass( cssConfig.sassOpts ).on( 'error', sass.logError ) )
		.pipe( postcss( cssConfig.postCSS ) )
		.pipe( sourcemaps.write() )
		.pipe( size( {showFiles: true} ) )
		.pipe( gulp.dest( cssConfig.build ) )
		//.pipe( browsersync.reload( {stream: true} ) );
}

function critCss() {

	return gulp.src( cssConfig.main )
		.pipe( criticalCss( {
			out: '/critical.php', // output file name
			url: url, // url from where we want penthouse to extract critical styles
			width: 1400, // max window width for critical media queries
			height: 900, // max window height for critical media queries
			userAgent: 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)' // pretend to be googlebot when grabbing critical page styles.
		} ) )
		.pipe( gulp.dest( dir.theme ) ); // destination folder for the output file
}

/**************** JS task ****************/

const jsConfig = {

	src: [dir.src + 'js/*'],
	// src: [dir.src + 'js/libs/*.js', dir.src + 'js/custom/*.js'],
	//srcLibs: dir.src + 'js/libs/*.js',
	//srcLint: dir.src + 'js/custom/*.js',
	//srcCopy: [dir.src + 'js/copy/*.js'],
	watch: dir.src + 'js/**/*',
	build: dir.build + 'js/'

};

const jsBabelOpts = {
	presets: ['@babel/preset-env']
};

// Jshint outputs any kind of javascript problems you might have
// Only checks javascript files inside /src directory
function jsHint() {

	return gulp.src( jsConfig.srcLint )
		.pipe( jshint( '.jshintrc' ) )
		.pipe( jshint.reporter( 'jshint-stylish' ) )
		.pipe( jshint.reporter( 'fail' ) );
}

function js() {

	return gulp.src( jsConfig.src )
		.pipe( sourcemaps.init() )
		.pipe( babel( jsBabelOpts ) )
		.pipe( concat( 'app.js' ) )
		.pipe( gulp.dest( jsConfig.build ) )
		.pipe( uglify() )
		.pipe( rename( {suffix: '.min'} ) )
		.pipe( sourcemaps.write() )
		.pipe( gulp.dest( jsConfig.build ) )
		// .pipe( jsCopy() )
		//.pipe( browsersync.reload( {stream: true} ) );
}

// function jsCopy() {
//
// 	return gulp.src( jsConfig.srcCopy )
// 		.pipe( gulp.dest( jsConfig.build ) );
// }

/**************** browser-sync task ****************/

// const syncConfig = {
// 	proxy: {
// 		target: url
// 	},
// 	port: 8000,
// 	files: [
// 		'./**/*.php'
// 	],
// 	open: false
// };
//
// // browser-sync
// function bs() {
//
// 	return browsersync.init( syncConfig );
// }

/**************** watch task ****************/

function watchimages() {
	gulp.watch( imgConfig.watch, images );
}

function watchjs() {
	// gulp.watch( jsConfig.watch, jsHint );
	gulp.watch( jsConfig.watch, js );
}

function watchcss() {
	gulp.watch( cssConfig.watch, gulp.series( css ) );
}

function watchfonts() {
	gulp.watch( fontsConfig.watch, fonts );
}

const start = gulp.parallel( fonts, images, css, js, /**bs,**/ watchcss, watchjs, watchfonts, watchimages );

//exports.cssLint = cssLint;
exports.css = css;
exports.critCss = critCss;
exports.images = images;
exports.jsHint = jsHint;
exports.js = js;
//exports.bs = bs;
// exports.watchimages = watchimages;
// exports.watchfonts = watchfonts;
// exports.watchjs = watchjs;
// exports.watchcss = watchcss;
exports.translate = translate;

exports.default = start;
