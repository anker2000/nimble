var gulp 		= require('gulp'),
	livereload 	= require('gulp-livereload'),
	watch 		= require('gulp-watch'),
	sass		= require('gulp-ruby-sass'),
	gutil 		= require('gulp-util'),
	uglify 		= require('gulp-uglify'),
	concat 		= require('gulp-concat');
	install 	= require("gulp-install");
	sourcemaps	= require("gulp-sourcemaps");
 
gulp.src(['./bower.json', './package.json'])
  .pipe(install());
// Styles Task
// Uglifies
gulp.task('styles', function() {

	'use strict';

	return sass('src/scss/', { sourcemap: true })
		.on('error', function (err) {
		    gutil.log(gutil.colors.red(err.message));
		    gutil.beep();
		})
	    .pipe(gulp.dest('./build/wp-content/themes/childtheme-template-nimble/'))
	    .pipe(livereload());

});

// Scripts Task
gulp.task('scripts', function() {

	'use strict';

	gulp.src('src/js/**/*.js')
		
		.pipe(sourcemaps.init())
			.pipe(uglify())
			.pipe(concat("scripts.min.js"))
		.pipe(sourcemaps.write('./'))
		.pipe(gulp.dest('./build/wp-content/themes/childtheme-template-nimble/js/'))
		.pipe(livereload())
		.on('error', function (err) {
		    gutil.log(gutil.colors.red(err.toString()));
		    gutil.beep();
		});
});
gulp.task('templates', function() {

	'use strict';

	gulp.src('src/**/*.php')
		
		.pipe(gulp.dest('./build/wp-content/themes/childtheme-template-nimble/'))
		.pipe(livereload())
		.on('error', function (err) {
		    gutil.log(gutil.colors.red(err.toString()));
		    gutil.beep();
		});
});
gulp.task('images', function() {

	'use strict';

	gulp.src('src/img/*.*')
		
		.pipe(gulp.dest('./build/wp-content/themes/childtheme-template-nimble/img/'))
		.pipe(livereload())
		.on('error', function (err) {
		    gutil.log(gutil.colors.red(err.toString()));
		    gutil.beep();
		});
});
// Watch Tasks
gulp.task('watch', function() {
	
	'use strict';

	livereload.listen();
	gulp.watch('src/js/*.js', ['scripts']);
	gulp.watch('src/js/**/*.js', ['scripts']);
	gulp.watch('src/**/**/**/**/*.php', ['templates']);
	gulp.watch('src/img/**/**/**/*.*', ['images']);
	gulp.watch('src/scss/**/**/**/**/*.scss', ['styles']);
	gulp.watch('src/**/*.php').on('change', livereload.changed);;

});
gulp.task('fonts', function() {
    return gulp.src(['src/scss/fonts/**/*.*'])
            .pipe(gulp.dest('./build/wp-content/themes/childtheme-template-nimble/'));
});

gulp.task('default', ['styles', 'scripts', 'images', 'templates','watch', 'fonts']);

