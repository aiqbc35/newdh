@extends('index.layout')
@section('content')
    <div class="items">
        <div class="item item-0">
            @include('index.mune')
            <h2>申请收录</h2><div class="page_content">
                <p>	<span style="color:#4C33E5;"><b>欢迎大家使用网址订阅，当我站启用最新网址时将发送最新网址至您订阅的邮箱！</b></span></p>
                <p>	<span style="color:#0cd7e2;"><b>本站承若：除了发送最新网址，绝不会发送任何信息至您的邮箱！</b></span></p>
                <p>	<span style="color:#0cd7e2;"><b>本站对外邮箱：{{ $system['email'] }}，邮箱使用范围：广告合作，主动获取最新网址!</b></span></p>
                <hr />
                <div class="input">
                    <div>订阅邮箱：<input type="email" name="email" id="email" placeholder="请输入邮箱地址" class="signinput"></div>
                    <div>
                        <button style="width: 150px;line-height: 33px;background-color: #61b3e6;border: none;color: #fff;margin-top: 20px;margin-left: 70px;" id="signbtn">提交</button>
                    </div>
                </div>
            </div>
        </div>
        @endsection
        @section('script')
            <script type="application/javascript">
                $(function(){
                    $('#signbtn').click(function(){

                        var email = $("#email").val();

                        if (email == '') {
                            alertWind('邮箱不能为空');
                            return false;
                        }
                        if (!checkemail(email)) {
                            alertWind('请输入正确的邮箱');
                            return false;
                        }
                        $.post("/Api/subscribe", { email:email},function(data){
                            alertWind(data.msg);
                            console.log(data);
                        });

                    });
                    function checkemail(email)
                    {
                        var reg = new RegExp("^[a-z0-9]+([._\\-]*[a-z0-9])*@([a-z0-9]+[-a-z0-9]*[a-z0-9]+.){1,63}[a-z0-9]+$");
                        if (!reg.test(email)) {
                            return false;
                        }else{
                            return true;
                        }
                    }
                })
            </script>
@endsection