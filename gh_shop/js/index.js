/**hader*/
(function () {
    var $buy = $('#header .h_m_r_buy');
    var $buyA = $buy.find('a.buy');
    var $buyHide = $buy.find('.hide');
    $buy.hover(function () {
        $buyA.addClass('hover');
        $buyHide.stop().slideDown(300);
    }, function () {
        $buyHide.stop().slideUp(300, function () {
            $buyA.removeClass('hover');
        });
    });
})();

/**nav_main */
(function () {
    var $product = $("#nav .n_main .product");
    var $hide = $("#nav .nav_hide");
    var $ul = $("#nav .nav_hide .n_h_mian ul")
    $product.hover(function () {
        $hide.stop().slideDown(300);
        $ul.eq($(this).index()).show().siblings().hide();
    }, function () {
        $hide.stop().slideUp();
    });
    $hide.hover(function () {
        $hide.stop().slideDown(300);
    }, function () {
        $hide.stop().slideUp();
    })
})();

/**nav search*/
(function () {
    var $input = $('#nav .n_search .n_s_input input');
    var $search = $('#nav .n_search');
    var $hide = $("#nav .n_search .hide");
    var $tip = $('#nav .n_search .n_s_input a.tip');
    // $input.focus(function(){
    // 	$search.addClass('focus');
    // }).blur(function(){
    //     $search.removeClass('focus');
    // })

    $input.on('focus blur', function () {
        $search.toggleClass('focus');
        $hide.fadeToggle(100);
        $tip.fadeToggle(200);
    });
})();


/**banner main */
(function () {
    var $main = $("#banner .b_main");
    var $pic = $('#banner .b_main .b_m_pic li');
    var $tab = $("#banner .b_main .b_m_tab li");
    var $btn = $("#banner .b_main .b_m_btn .btn");
    var length = $pic.length;
    var index = 0;
    var timer = null;
    var nowTime = 0;
    $pic.eq(0).show();
    $tab.eq(0).addClass("on");
    $tab.click(function () {
        //淡出
        if (new Date() - nowTime > 800) {
            nowTime = new Date();
            anim(function () {
                index = $(this).index();
            }.  bind(this));
        }
    });
    $btn.click(function () {
        if (new Date() - nowTime > 800) {
            nowTime = new Date();
            var i = $(this).index();
            anim(function () {
                if (i) {
                    index++;
                    index %= length;
                } else {
                    i--;
                    if (index < 0) index = length - 1;
                };
            });
        };
    });
    $main.hover(function () {clearInterval(timer)}, auto);

    auto();
    function auto() {
        timer = setInterval(function () {
            anim(function () {
                index++;
                index %= length;
            });
        }, 5000)
    };
    function anim(fn) {
        //淡出
        $pic.eq(index).fadeOut(800);
        $tab.eq(index).removeClass('on');
        // index = $(this).index();
        fn();
        //淡入
        $pic.eq(index).fadeIn(800);
        $tab.eq(index).addClass('on');
    }
})();


/**banner nav */
(function(){
    var $info = $('#banner .b_nav .firstLi .info');
    $info.each(function(){

       var $li = $(this).find('li');
       var length = $li.length;
       var height = $li.height();
       var width = $li.width(); 
       var col = Math.ceil(length/6);
       $(this).width(col*width);
       $li.each(function(i){
            var x = Math.floor(i/6);
            var y = i%6;
            $(this).css({
                left:x*width + 'px',
                top: y*height + 'px'
            })
       });
    })

})();