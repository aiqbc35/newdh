@extends('index.layout')
@section('content')
    <div class="items">
        <div class="item item-0">
            @include('index.mune')
            <h2>申请收录</h2><div class="page_content">
                <p>	<span style="color:#4C33E5;"><b>所有申请站点需保证有免费资源通道，不收录纯收费站点</b></span></p>
                <p>	<span style="color:#0cd7e2;"><b>提交前，请在贵站首页前三位置处添加本站链接，来路越多在本站排名越靠前</b></span></p>
                <p>	<span style="color:#0cd7e2;"><b>提交后，请在贵站上点击一次本站链接就会自动收录!</b></span></p>
                <p>	本站将定期抽查所有网站，如发现链接失效﹑更换本站位置﹑下掉本站链接的情况将立即删除</p>
                <p>	贵站如有弹窗请勿提交，提交也不会被收录</p>
                <hr />
                <p>	名称：<span style="color:#12e812;">
                        <b>{{ $system['website'] }}</b></span>
                </p>
                <p>	地址：<span style="color:#12e812;"><b>{{ $system['newlink'] }}</b></span>
                    <span style="color:red;"><b> (注：本站友链专用域名，设置本站友链时，请填此域名，填别的域名概不收录，谢谢合作)</b>
                    </span>
                </p>
                <div class="input">
                    <div>网站名称：<input type="text" name="name" id="name" placeholder="最多8个文字！" maxlength="8" class="signinput" style="margin-bottom: 10px;"></div>
                    <div>网站地址：<input type="text" name="url" id="url" placeholder="网址必须带http://或https://" class="signinput" style="margin-bottom: 10px;"></div>
                    <div>管理邮箱：<input type="email" name="email" id="email" placeholder="请输入管理邮箱" class="signinput">*用于自助修改网站信息</div>         
                    <div>
                        网站分类:
                        <div id="parent">
                            <select name="sort" id="sort">
                                @foreach($sort as $value)
                                <option value="{{ $value->id }}">{{ $value->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div>
                        <button style="width: 150px;line-height: 33px;background-color: #61b3e6;border: none;color: #fff;margin-top: 20px;margin-left: 70px;" id="signbtn">提交</button>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('script')
            <script type="application/javascript">
                $(function(){$('#signbtn').click(function(){var name=$("#name").val();var url=$("#url").val();var email=$("#email").val();var sort=$("#sort").val();if(name==''){alertWind('网站名称不能为空');return false}if(url==''){alertWind('网站链接不能为空');return false}if(email==''){alertWind('管理邮箱不能为空');return false}if(!checkUrl(url)){alertWind('请输入正确的域名，如：http://xxx.com,http://www.xxx.com');return false}if(!checkemail(email)){alertWind('请输入正确的邮箱');return false}$.post("/Api/signin",{name:name,url:url,email:email,sort:sort},function(data){alertWind(data.msg)})});function checkemail(email){var reg=new RegExp("^[a-z0-9]+([._\\-]*[a-z0-9])*@([a-z0-9]+[-a-z0-9]*[a-z0-9]+.){1,63}[a-z0-9]+$");if(!reg.test(email)){return false}else{return true}}function checkUrl(url){var reg='^(http|https)\\://([a-zA-Z0-9\\.\\-]+(\\:[a-zA-Z0-9\\.&%\\$\\-]+)*@)?((25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9])\\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9]|0)\\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9]|0)\\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[0-9])|([a-zA-Z0-9\\-]+\\.)*[a-zA-Z0-9\\-]+\\.[a-zA-Z]{2,4})(\\:[0-9]+)?(/[^/][a-zA-Z0-9\\.\\,\\?\\\'\\\\/\\+&%\\$#\\=~_\\-@]*)*$';var objExp=new RegExp(reg);if(objExp.test(url)){return true}else{return false}}})
            </script>
@endsection