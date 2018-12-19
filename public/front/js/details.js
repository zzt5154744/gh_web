
(function(){
    var $liuyan = $(".c_b_right .c_r_bottom .t_btn .liji")[0];
    $(".c_b_right .c_r_bottom .t_btn .liji").on("click",function(){
        alert(1);
    });

$("from #comment .l_bottom .submit").on('click', function(data){
    //发异步，把数据提交给php
        // 获得frame索引
        console.log(data.form);
        $.post('../../front/user/details.php',{
            id:id},function(data){
            console.log(1);
            // return false;
        },JSON);
    });

})();

// var liuyan = document.getElementsByClassName("liji")[0];
    // liuyan.onclick=function(){
        // alert
    // }