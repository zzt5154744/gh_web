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

(function(){
    var $person = $("#header .h_m_right .h_m_r_login .person");
    $person.click(function(){
    })
})();
 (function(){
        var  edit =  $("#header .h_m_right .h_m_r_login li .balance");
        var  cancel = $("#addb_main .bottom .cancel");
        var  close = $("#addb_main .basics .top .close .guan");
            // console.log(edit);
            edit.click(function(){
                $("#addb_main").css("display","block");
            })
            cancel.click(function(){
                $("#addb_main").css("display","none");
            })
            close.click(function(){
                $("#addb_main").css("display","none");
            })
        })();

        (function(){
       var edit = $("#p_main .image .i_img li");
       edit.click(function(){
           alert(1);
                $("#img_main").css("display","block");
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

//     var btn = ("#addb_main .basics .center .bottom .save");
//     function config(){
//        alert("111");
//     //    var password = ("#addb_main .basics .center from .name .password");
//     var p1 = ("#addb_main .password");
//     var p2 = ("#addb_main .basics .password");
//        console.log(p2[0].value);
//    }


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
    var $firlist = $('#banner .b_nav .firstLi');
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
       $firlist.hover(function(){
           $(this).find('.info').show();
       },function(){
        $(this).find('.info').hide();
       });
    })
})();


/** star start */
(function(){
    //首先获取右按钮;
    var $btn = $('#star .s_btn span');
    var $show = $('#star .s_show');
    //定义一个定时器变量为null
    var timer = null;
    var index = false;
    $btn.click(function(){
        var i = $(this).index();
        console.log(i);
        if ( !!i != index )
        {
            clearInterval(timer);
            index = !!i;
            $(this).removeClass('able').siblings().addClass('able');
            $show.stop().animate({
                marginLeft : -i*1226 + 'px'
            },500);
            auto();
        }
    });
    auto();
    function auto(){
        timer = setInterval(function (){
            index = !index;
            var x = index-0;
            // console.log(x);
            $btn.eq(x).removeClass('able').siblings().addClass('able');
            $show.stop().animate({
                marginLeft : -x*1226 + 'px'
            },500);
        },6000);
    };
})();


 //搜索按钮
//  (#nav .n_search .n_s_btn .icon-sousu) 
 //文本框
//  (#nav .n_search .n_s_input input)
 //大区域
//  (#nav .n_search .n_s_input .hide ul)


(function(){
    var search = $("#nav .n_search .n_s_btn button");
    var input = $("#nav .n_search .n_s_input #input");
    var hidetow = $("#nav .n_search .n_s_input .hide");
    var hide = $("#nav .n_search .n_s_input .hide ul li span.s1");
    $("input").bind('input propertychange',function(){
        for(var i=0;i<hide.length;i++){
        var val = $("#nav .n_search .n_s_input #input").val().trim();
         $(hide[i]).html($(hide[i]).html().replace(val,`<span class="span">${val}</span>`));
        }
    })

})();

// function log(data){
//     var input = $("#nav .n_search .n_s_input #input").val();
//     $.post("../../front/vinegar/list_vinegar.php",{
//         dataType:"json",
//         "v_name":input
//     },function(data){

        // alert("添加成功");
    // })
// }