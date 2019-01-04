function btn(){
    var total_ = $("#main .m_main .produce .list li span.total");
    var vid = $("#main .m_main .produce .list .vidclass");
    var inp = $("#main .m_main .produce .list .inpclass");
    // var address =  $("#b_main .basics .center .name input")[0].value;
    // var phononumber =  $("#b_main .basics .center .sex input")[0].value;
    var sum = $("#main .m_main .delivery .d_right .d_price")[0].innerHTML;
    var consignee = $("#main .m_main .address .list li")[0].innerHTML;
    var photonumber = $("#main .m_main .address .list li")[1].innerHTML;
    var address = $("#main .m_main .address .list li")[2].innerHTML;
 
    var o_id = "A"+(Math.random().toString(34).substr(4));
    var oo_id = o_id;
    console.log(sum,consignee,photonumber,address,oo_id);
    for(var i = 0 ; i < total_.length;i++ ){
    var v_id = vid[i].value;
    var s_id = inp[i].value;
    var total = total_[i].innerHTML;
    $.post("../../front/user/addrelation.php",{
        dataType:"json",
        "v_id":v_id,
        "s_id":s_id,
        "total":total,
        "o_id":o_id
    },function(){
        // location.href="../../front/user/order.php";
    })
    }
     $.post("../../front/user/addorder.php",{
        dataType:"json",
        "o_id":o_id,
        "address":address,
        "sum":sum,
        "consignee":consignee,
        "photonumber":photonumber
    },function(){
        location.href="../../front/user/order.php";
    })
  }
(function(){
var  edit =  $("#main .m_main .m_address");
var  cancel = $("#b_main .bottom .cancel");
var  close = $("#b_main .basics .top .close .guan");
    // console.log(edit);
    edit.click(function(){
        $("#b_main").css("display","block");
    })
    cancel.click(function(){
        $("#b_main").css("display","none");
    })
    close.click(function(){
        $("#b_main").css("display","none");
    })
})();

(function(){
var edit = $("#p_main .image .i_img li");
edit.click(function(){
   alert(1);
        $("#img_main").css("display","block");
    })

})();


var left_btn = document.getElementsByClassName("add");
var right_btn = document.getElementsByClassName("adc");
var inp = document.getElementsByClassName('inpclass');
var xiaoji = document.getElementsByClassName('xiaoji2');
var price = document.getElementsByClassName('price');
var sum = document.getElementsByClassName('sumprice')[0];
    for(var i=0;i<right_btn.length;i++){
    // console.log(sumtotal);
    right_btn[i].index = i;
    right_btn[i].onclick = function(){
    var text = document.getElementsByClassName("val");
    var val = ++text[this.index].innerHTML;
    var id = inp[this.index].value;
    pricecount = price[this.index].innerHTML;
    var xiaoji2 = xiaoji[this.index].innerHTML;
    // sum.innerHTML;]
    var that = this;
    $.post("../../front/user/addnum.php",{
        dataType: "json",//预期服务器返回的数据类型
        "s_id":id,
        "num":val,
    },function(){
        xiaoji[that.index].innerHTML = pricecount * val+"元";
        addc = parseInt(xiaoji[that.index].innerHTML);
        // sum.innerHTML += pricecount * val;
        var sumtotal = 0;
        for(var j =0;j<right_btn.length;j++){
            sumtotal+= parseInt(xiaoji[j].innerHTML);
        }
          sum.innerHTML  = sumtotal;
    })
}
}


for(var j=0;j<left_btn.length;j++){
    left_btn[j].index = j;
    left_btn[j].onclick = function(){
    var text = document.getElementsByClassName("val");
    var val = --text[this.index].innerHTML;
    var id = inp[this.index].value;
    pricecount = price[this.index].innerHTML;
    var xiaoji2 = xiaoji[this.index].innerHTML;
    if(text[this.index].innerHTML < 1){
        text[this.index].innerHTML = 1;
    }
    var thist = this;
    $.post("../../front/user/addnum.php",{
        dataType: "json",//预期服务器返回的数据类型
        "s_id":id,
        "num":val,
    },function(){
        xiaoji[thist.index].innerHTML = pricecount * val+"元";
        var sumtotal = 0;
        for(var j =0;j<right_btn.length;j++){
            sumtotal+= parseInt(xiaoji[j].innerHTML);
        }
          sum.innerHTML  = sumtotal;
    })
}
}

function member_del(obj,id){
layer.confirm('确认要删除这条商品吗？',function(index){
    //发异步删除数据
    $.post('http://localhost:8088/PHP/PHP_zzt/front/user/shop-del.php',{id:id},function(data){
    $(obj).parents("ul").remove();
    layer.msg('已删除!',{icon:1,time:1000});
        
    });

});
}