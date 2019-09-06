 

/*--------------------------------------------------- */
/* ナビゲーションメニュー
/*--------------------------------------------------- */
$(function(){
            $('#nav_toggle').click(function(){
                        $("header").toggleClass('open');
                $("nav").slideToggle(500);
                    });

        });


/*--------------------------------------------------- */
/* スマホの時だけtelリンクを有効
/*--------------------------------------------------- */

if (navigator.userAgent.match(/(iPhone|iPad|iPod|Android)/)) {
$(function() {
  $('.tel').each(function() {
//.tel内のHTMLを取得
    var str = $(this).html();
//子要素がimgだった場合、alt属性を取得して電話番号リンクを追加
    if ($(this).children().is('img')) {
      $(this).html($('<a>').attr('href', 'tel:' + $(this).children().attr('alt').replace(/-/g, '')).append(str + '</a>'));
    } else {
//それ以外はテキストを取得して電話番号リンクを追加
      $(this).html($('<a>').attr('href', 'tel:' + $(this).children().attr('alt').replace(/-/g, '')).append(str + '</a>'));
    }
  });
});
}
if (navigator.userAgent.match(/(iPhone|iPad|iPod|Android)/)) {
$(function() {
  $('.tel2').each(function() {
//.tel内のHTMLを取得
    var str = $(this).html();
//子要素がimgだった場合、alt属性を取得して電話番号リンクを追加
    if ($(this).text()) {
        $(this).html($('<a>').attr('href', 'tel:' + $(this).text().replace(/-/g, '')).append(str + '</a>'));
    }
  });
});
}

/*--------------------------------------------------- */
/* 固定ヘッダー
/*--------------------------------------------------- */
$(function() {
    var headNav = $(".headFix");
    var height = headNav.outerHeight(true)

//scrollだけだと読み込み時困るのでloadも追加
    $(window).on('load scroll', function(){

//現在の位置が500px以上かつ、クラスwhiteが付与されていない時
      if($(this).scrollTop() > 500 && headNav.hasClass('white') == false) {

//headerの高さ（100px）分上に設定
        headNav.css({"top": '-100px'}); 

//クラスwhiteを付与
        headNav.addClass('white');
        $('main').css('margin-top',height)

//位置を0に設定し、アニメーションのスピードを指定
        headNav.animate({"top": 0},400); 
      }

//現在の位置が100px以下かつ、クラスwhiteが付与されている時
      else if($(this).scrollTop() < 100 && headNav.hasClass('white') == true){

//クラスwhiteの除去
        headNav.removeClass('white');
        $('main').css('margin-top','')

      }
    });
  });


/*--------------------------------------------------- */
/* ズームインスライダー
/*--------------------------------------------------- */
function sliderStart() {

    const slide = document.getElementById('slide_wrapp');      //スライダー親
    const slideItem = slide.querySelectorAll('.slide_item');   //スライド要素
    const totalNum = slideItem.length - 1;                     // スライドの枚数を取得
    const FadeTime = 2000;                                     //フェードインの時間
    const IntarvalTime = 5000;                                 //クロスフェードさせるまでの間隔
    let actNum = 0;                                            //現在アクティブな番号
    let nowSlide;                                              //現在表示中のスライド
    let NextSlide;                                             //次に表示するスライド

    // DOM読み込み時にスライドの1枚目をフェードイン
    slideItem[0].classList.add('show_', 'zoom_');

    // 処理を繰り返す
    setInterval(() => {
        if (actNum < totalNum) {
          
            nowSlide = slideItem[actNum];
            NextSlide = slideItem[++actNum];

            //.show_削除でフェードアウト
            nowSlide.classList.remove('show_');
            // と同時に、次のスライドがズームしながらフェードインする
            NextSlide.classList.add('show_', 'zoom_');
            //フェードアウト完了後、.zoom_削除
            setTimeout(() => {
                nowSlide.classList.remove('zoom_');
            }, FadeTime);


        } else {

            nowSlide = slideItem[actNum];
            NextSlide = slideItem[actNum = 0];

            //.show_削除でフェードアウト
            nowSlide.classList.remove('show_');
            // と同時に、次のスライドがズームしながらフェードインする
            NextSlide.classList.add('show_', 'zoom_');
            //フェードアウト完了後、.zoom_削除
            setTimeout(() => {
                nowSlide.classList.remove('zoom_');
            }, FadeTime);

        };
    }, IntarvalTime);

}


/*-------------------------------------
  gotoTop
-------------------------------------*/

$(function() {

    var showFlag = false;

    var topBtn = $('#footGoto');   

    topBtn.css('bottom', '-200px');

    var showFlag = false;

    //スクロールが100～に達したらボタン表示

    $(window).scroll(function () {

        if ($(this).scrollTop() > 400) {

            if (showFlag == false) {

                showFlag = true;

                topBtn.stop().animate({'bottom' : '50px'}, 200);

            }

        } else {

            if (showFlag) {

                showFlag = false;

                topBtn.stop().animate({'bottom' : '-100px'}, 200);

            }

        }

    });

    //スクロールしてトップ

    topBtn.click(function () {

        $('body,html').animate({

            scrollTop: 0

        }, 400);

        return false;

    });

});