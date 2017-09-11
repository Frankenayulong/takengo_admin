var gulp = require('gulp');
var minifyCSS = require('gulp-csso');
var concatCss = require('gulp-concat-css');
var concat = require('gulp-concat');
var minify = require('gulp-minify');
var filesExist = require('files-exist')

gulp.task('css', function(){
    var css_files = [
        'global/plugins/font-awesome/css/font-awesome.min.css',
        'global/plugins/simple-line-icons/simple-line-icons.min.css',
        'global/plugins/bootstrap/css/bootstrap.min.css',
        'global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',
        'global/plugins/select2/css/select2.min.css',
        'global/plugins/select2/css/select2-bootstrap.min.css',
        'global/css/components-md.min.css',
        'global/css/plugins-md.min.css',
        'layouts/layout2/css/layout.min.css',
        'layouts/layout2/css/themes/blue.min.css',
        'layouts/layout2/css/custom.min.css'
    ];
    return gulp.src(filesExist(css_files))
    .pipe(concatCss('build.css'))
    .pipe(minifyCSS())
    .pipe(gulp.dest('../public/css'));  
});

gulp.task('login_css', function(){
    var css_files = [
        'pages/css/login-2.min.css'
    ];
    return gulp.src(filesExist(css_files))
    .pipe(concatCss('login.css'))
    .pipe(minifyCSS())
    .pipe(gulp.dest('../public/css'));  
});

gulp.task('js', function(){
    var js_files = [
        'global/plugins/jquery.min.js',
        'global/plugins/bootstrap/js/bootstrap.min.js',
        'global/plugins/js.cookie.min.js',
        'global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
        'global/plugins/jquery.blockui.min.js',
        'global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',
        'global/plugins/jquery-validation/js/jquery.validate.min.js',
        'global/plugins/jquery-validation/js/additional-methods.min.js',
        'global/plugins/select2/js/select2.full.min.js',
        'global/scripts/app.min.js'
    ];
    return gulp.src(filesExist(js_files))
    .pipe(concat('build.js'))
    .pipe(minify())
    .pipe(gulp.dest('../public/js'))
})

gulp.task('app_js', function(){
    var js_files = [
        'layouts/layout2/scripts/layout.min.js',
        'layouts/layout2/scripts/demo.min.js',
        'layouts/global/scripts/quick-sidebar.min.js'
    ];
    return gulp.src(filesExist(js_files))
    .pipe(concat('master.js'))
    .pipe(minify())
    .pipe(gulp.dest('../public/js'))
})

gulp.task('login_js', function(){
    var js_files = [
        'pages/scripts/login.min.js',
    ];
    return gulp.src(filesExist(js_files))
    .pipe(concat('login.js'))
    .pipe(minify())
    .pipe(gulp.dest('../public/js'))
})

gulp.task('default', [ 'css', 'login_css', 'js', 'login_js', 'app_js' ]);
module.exports = gulp;