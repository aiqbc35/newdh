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
                    <div>网站名称：<input type="text" name="name" id="name" placeholder="请输入网站名称" class="signinput" style="margin-bottom: 10px;"></div>
                    <div>网站地址：<input type="text" name="url" id="url" placeholder="请输入网址" class="signinput" style="margin-bottom: 10px;"></div>
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
                eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('$(i(){$(\'#D\').G(i(){6 b=$("#z").l();6 c=$("#v").l();6 d=$("#q").l();6 e=$("#o").l();8(b==\'\'){f(\'网站名称不能为空\');3 7}8(c==\'\'){f(\'网站链接不能为空\');3 7}8(d==\'\'){f(\'管理邮箱不能为空\');3 7}8(!w(c)){f(\'请输入正确的域名，如：m://r.A,m://J.r.A\');3 7}8(!u(d)){f(\'请输入正确的邮箱\');3 7}$.K("/E/F",{z:b,v:c,q:d,o:e},i(a){f(a.I)})});i u(a){6 b=x y("^[a-g-9]+([.p\\\\-]*[a-g-9])*@([a-g-9]+[-a-g-9]*[a-g-9]+.){1,H}[a-g-9]+$");8(!b.n(a)){3 7}s{3 t}}i w(a){6 b=\'^(m|C)\\\\://([a-h-j-9\\\\.\\\\-]+(\\\\:[a-h-j-9\\\\.&%\\\\$\\\\-]+)*@)?((k[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9])\\\\.(k[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9]|0)\\\\.(k[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9]|0)\\\\.(k[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[0-9])|([a-h-j-9\\\\-]+\\\\.)*[a-h-j-9\\\\-]+\\\\.[a-h-B]{2,4})(\\\\:[0-9]+)?(/[^/][a-h-j-9\\\\.\\\\,\\\\?\\\\\\\'\\\\\\\\/\\\\+&%\\\\$#\\\\=~p\\\\-@]*)*$\';6 c=x y(b);8(c.n(a)){3 t}s{3 7}}})',47,47,'|||return|||var|false|if|||||||alertWind|z0|zA|function|Z0|25|val|http|test|sort|_|email|xxx|else|true|checkemail|url|checkUrl|new|RegExp|name|com|Z|https|signbtn|Api|signin|click|63|msg|www|post'.split('|'),0,{}))
            </script>
@endsection