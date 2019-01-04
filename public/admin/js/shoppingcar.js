var left_btn = document.getElementsByClassName("add");
var right_btn = document.getElementsByClassName("adc");
var inp = document.getElementsByClassName('inpclass');
var xiaoji = document.getElementsByClassName('xiaoji2');
var price = document.getElementsByClassName('price');
var sum = document.getElementsByClassName('sumprice')[0];
    for(var i=0;i<right_btn.length;i++){
    // console.log(sumtotal);
    right_btn[i].index = i;
    right_btn[i].onclick =()=>{
    var text = document.getElementsByClassName("val");
    var val = ++text[this.index].innerHTML;
    var id = inp[this.index].value;
    pricecount = price[this.index].innerHTML;
    var xiaoji2 = xiaoji[this.index].innerHTML;
    var that = this;
    $.post("../../front/user/addshadow.php",{
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
    left_btn[j].onclick =()=>{
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


function order(){
    var username = $(".vinegar .username");
    var vid = document.getElementsByClassName("vidclass");
    console.log(username.length);
    for(var i = 0 ; i < username.length;i++ ){
    var v_id = vid[i].value;
    var s_id = inp[i].value;
    // arrss_id+= "," +ss_id; 
    var total_ =  parseInt(xiaoji[i].innerHTML);
    console.log(v_id,s_id,total_);
    $.post("../../front/user/addshadow.php",{
        dataType:"json",
        "v_id":v_id,
        "s_id":s_id,
        "total":total_
    },function(){
        location.href="../../front/user/shadowsocks.php";
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