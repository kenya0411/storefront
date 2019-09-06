


var gulp = require( 'gulp' );
var sass = require( 'gulp-sass' );
var plumber = require( 'gulp-plumber' );
var notify = require( 'gulp-notify' );
var sassGlob = require( 'gulp-sass-glob' );
var mmq = require( 'gulp-merge-media-queries' );
var browserSync = require( 'browser-sync' ).create();
var wait = require( 'gulp-wait' );
var postcss = require( 'gulp-postcss' );
var autoprefixer = require( 'autoprefixer' );

var cssdeclsort = require( 'css-declaration-sorter' );


//sassのコンパイル
gulp.task( 'sass', (done) => {

	gulp.src( './scss/**/*.sass' )
	.pipe(sass().on('error', sass.logError))/*エラーログを解除*/
	.pipe(gulp.dest('./'))
	.pipe(sassGlob()) // Sassの@importにおけるglobを有効にする
	.pipe(browserSync.stream())//リロード時に位置を固定

	done();

})
//cssファイルのautoprefixer
gulp.task("css", function () {
  return gulp.src("./**/*.css")
	.pipe(wait( 300 ))
    .pipe(postcss([
      autoprefixer({
        // ☆IEは11以上、Androidは4.4以上
        // その他は最新2バージョンで必要なベンダープレフィックスを付与する設定
        browsers: ["last 2 versions", "ie >= 11", "Android >= 4"],
        cascade: false,
         grid: true
      })
    ]))
    .pipe(gulp.dest("./"));
});

//sassファイルを監視
gulp.task( 'watch', (done) => {
	gulp.watch( './scss/**/*.sass',  gulp.series( 'sass' ));//watchをするファイルを選択
	done();
});

//ブラウザを自動リロード
gulp.task( 'browser-sync', (done) =>{
	browserSync.init({
        proxy: 'kenjapanshop.wp',  // ← ドメイン（.localは遅くなる原因になるので避ける）
        open: true,
        watchOptions: {
            debounceDelay: 1000  //1秒間、タスクの再実行を抑制
        }
	});
	done();
});



gulp.task( 'bs-reload', (done)=> {
	browserSync.reload();
	done();
});

//ファイルを監視して自動リロード
gulp.task( 'default', gulp.series(( 'browser-sync' ), (done) => {
	gulp.watch( './scss/**/*.sass', gulp.series( 'sass','bs-reload','css' ))
	gulp.watch( './**/*.php', gulp.series( 'bs-reload' ))
	gulp.watch( './*.html', gulp.series( 'bs-reload' ))
	// gulp.watch( './**/*.css', gulp.series( 'bs-reload' ))
	gulp.watch( './**/*.js', gulp.series( 'bs-reload' ))
	done();
}));

