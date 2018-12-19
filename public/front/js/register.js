

/**register start */

(function(){
    function isChina(n){
        return /[\u4e00-\u9fa5]+/.test(n);
        //中文编码
    }
    let email=/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/;
    let password=/^[0-9a-zA-Z_@.?`~#%^&*()+='/|;<>,!-]{6,16}$/;
    let use= /^[0-9a-zA-Z_.]{1,18}$/;
    let tel=/^(0|86|17951)?(13[0-9]|15[012356789]|166|17[3678]|18[0-9]|14[57])[0-9]{8}$/;
    var login_name = $("#main .m_login .m_headr .m_user .name");
    var login_pwd = $("#main .m_login .m_headr .m_user .pwd");
    var phone_number = $("#main .m_login .m_headr .m_user .phone_number");
    var confirmpassword = $("#main .m_login .m_headr .m_user .confirmpassword");
    var email_login =  $("#main .m_login .m_headr .m_user .email");
    var btn_name = $("#main .m_login .m_headr button");
    var p_name = $("#main .m_login .m_headr .m_user .p_name")[0];
    var p_pwd = $("#main .m_login .m_headr .m_user .p_pwd")[0];
    var p_number = $("#main .m_login .m_headr .m_user .p_number")[0];
    var p_confirmpassword = $("#main .m_login .m_headr .m_user .p_confirm")[0];
    var p_email = $("#main .m_login .m_headr .m_user .p_email")[0];
    //用户名格式判断
    login_name.blur(function(){
        if(this.value === ""){
            p_name.innerHTML = "用户名不能为空！";
        }else{
            if(use.test(this.value) === false){
                // this.value = "";
                p_name.innerHTML = "用户名格式不正确！";
            }else{
                p_name.innerHTML = "";
            }
            if(isChina(this.value) === true){
                p_name.innerHTML = "用户名不能带有中文！";
            }else{
                p_name.innerHTML = "";
            } 
        }
    });
    //判断密码格式
    login_pwd.blur(function(){
        if(this.value === ""){
            p_pwd.innerHTML = "密码不能为空！";
        }else{
            if(password.test(this.value) === false){
                p_pwd.innerHTML = "密码格式不正确！";
            }else{
                p_pwd.innerHTML = "";
            }
        }
    });
    phone_number.blur(function(){
        if(this.value === ""){
            p_number.innerHTML = "手机号码不能为空！";
        }else{
            if(tel.test(this.value) === false){
                p_number.innerHTML = "手机号码格式格式不正确！";
            }else{
                p_number.innerHTML = "";
            }
        }
    });

    confirmpassword.blur(function(){
        if(this.value === ""){
            p_confirmpassword.innerHTML = "确认密码不能为空！";
        }else{
            if(confirmpassword.value !== p_pwd.value){
                p_confirmpassword.innerHTML = "确认密码错误！";
            }else{
                p_confirmpassword.innerHTML = "";
            }
        }
    });

    
    email_login.blur(function(){
        if(this.value === ""){
            p_email.innerHTML = "邮箱不能为空！";
        }else{
            if(email.test(this.value) === false){
                p_email.innerHTML = "邮箱格式错误！";
            }else{
                p_email.innerHTML = "";
            }
        }
    });

})();



 