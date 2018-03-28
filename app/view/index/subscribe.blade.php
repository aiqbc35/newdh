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
                eval(function(p,a,c,k,e,r){e=function(c){return c.toString(a)};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('$(2(){$(\'#f\').m(2(){7 b=$("#c").g();6(b==\'\'){4(\'邮箱不能为空\');3 5}6(!8(b)){4(\'请输入正确的邮箱\');3 5}$.d("/e/s",{c:b},2(a){4(a.h);i.j(a)})});2 8(a){7 b=k l("^[a-0-9]+([.o\\\\-]*[a-0-9])*@([a-0-9]+[-a-0-9]*[a-0-9]+.){1,p}[a-0-9]+$");6(!b.q(a)){3 5}r{3 n}}})',29,29,'z0||function|return|alertWind|false|if|var|checkemail||||email|post|Api|signbtn|val|msg|console|log|new|RegExp|click|true|_|63|test|else|subscribe'.split('|'),0,{}))
            </script>
@endsection