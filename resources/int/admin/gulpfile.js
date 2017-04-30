var config      = require('./config.json');
var gulp        = require('gulp');
var less        = require('gulp-less');
var ejs         = require("gulp-ejs");
var concat      = require('gulp-concat');
var livereload  = require('gulp-livereload');
var uglify      = require('gulp-uglify');
var uglifycss   = require('gulp-uglifycss');
var rename      = require("gulp-rename");
var merge       = require('merge-stream');

/*-----------------------
        Less task
-----------------------*/
gulp.task('less', function() {
    return gulp.src( config.sources.less + '/style.less' )
        .pipe( less().on('error', function (err) {
            console.log(err);
        }) )
        .pipe( gulp.dest( config.destination.styles ))
        .pipe( livereload() );
});
/*-----------------------
    End Less task
-----------------------*/

/*-----------------------
        EJS task
-----------------------*/
gulp.task('ejs', function() {
    return gulp.src( [ config.sources.templates  + "/pages/**/*.ejs" ])
        .pipe( ejs( {} ,{
            ext : '.html'
        }) )
        .pipe(gulp.dest( config.destination.pages ))
        .pipe( livereload() );
});
/*-----------------------
    End EJS task
-----------------------*/

/*-----------------------
        Concat task
-----------------------*/
gulp.task('concat', function() {
    return gulp.src( config.collections.vendorScripts.concat( config.collections.customScripts ) )
        .pipe( concat( 'app.js' ).on('error', function (err) {
            console.log(err);
        }) )
        .pipe(gulp.dest( config.destination.scripts ))
        .pipe( livereload() );
});
/*-----------------------
    End Concat task
-----------------------*/

/*-----------------------
        Watch task
-----------------------*/
gulp.task('watch' , function() {

    livereload.listen();

    gulp.watch( config.sources.less + '/**/*.less' , ['less'] );

    gulp.watch([
            config.sources.vendorScriptsPath + '/**/*.js' ,
            config.sources.customScriptsPath + '/**/*.js'
        ],['concat'] );

    gulp.watch( config.sources.templates + '/**/*.ejs' , ['ejs'] );

});
/*-----------------------
    End Watch task
-----------------------*/

/*-----------------------
        Minify JS
-----------------------*/
gulp.task('compressJs', function () {
    return gulp.src( config.destination.scripts + '/*.js' )
        .pipe(uglify())
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(gulp.dest( config.theme.scripts ))
        .on('error', function(err) {
            console.error('Error in compress task', err.toString());
        });
});

/*-----------------------
        Minify CSS
-----------------------*/
gulp.task('compressCss', function () {
    gulp.src( config.destination.styles + '/*.css' )
        .pipe(uglifycss({
            "maxLineLen": 0,
            "uglyComments": false
        }))
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(gulp.dest( config.theme.styles  ))
});
/*-----------------------
    End Minify CSS
-----------------------*/

/*-----------------------
        Copy task
-----------------------*/
gulp.task('copy', function () {

    var stylesImages = gulp.src( config.destination.stylesImages + '/*' )
        .pipe(gulp.dest( config.theme.stylesImages ));

    var media = gulp.src( config.destination.media + '/*' )
        .pipe(gulp.dest( config.theme.media ));

    var fonts = gulp.src( config.destination.fonts + '/*' )
        .pipe(gulp.dest( config.theme.fonts ));

    return merge( stylesImages , media  , fonts );

});
/*-----------------------
    End Copy task
-----------------------*/

/*----------------------------
        Tasks group
----------------------------*/

    /*-----------------------
            Default
    -----------------------*/
    gulp.task('default', [ 'concat','less','watch' ] , function() {});

    /*-----------------------
                THEME
     -----------------------*/
    gulp.task('app', [ 'compressJs' , 'compressCss' , 'copy' ] , function() {

    });

/*----------------------------
        End tasks group
----------------------------*/