@extends('index.layout')
@section('content')
    <div class="items">
        <div class="item item-0">
            @include('index.mune')
            <h2>网址信息修改</h2><div class="page_content">
                <p>	<span style="color:#4C33E5;"><b>每个网站对应一个唯一的管理员邮箱，请使用管理员邮箱进行修改！</b></span></p>
                <p>	<span style="color:#0cd7e2;"><b>本站对外邮箱：{{ $system['email'] }}，邮箱使用范围：广告合作，主动获取最新网址!</b></span></p>
                <hr />
                <div class="input">
                    <div>管理员邮箱：<input type="email" name="email" id="email" placeholder="请输入管理员邮箱" class="signinput"></div>
                    <div>
                        <button style="width: 150px;line-height: 33px;background-color: #61b3e6;border: none;color: #fff;margin-top: 20px;margin-left: 70px;" id="signbtn">提交</button>
                    </div>
                </div>
                <div class="webinfo" style="display: none">
                    <div>网站名称：<input type="text" name="name" id="name" placeholder="请输入网站名称" class="signinput" style="margin-bottom: 10px;"></div>
                    <div>网站地址：<input type="text" name="url" id="url" placeholder="请输入网址" class="signinput" style="margin-bottom: 10px;"></div>
                    <div>管理邮箱：<input type="email" name="email" id="upemail" placeholder="请输入管理邮箱" class="signinput">*用于自助修改网站信息</div>
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
                        <button style="width: 150px;line-height: 33px;background-color: #61b3e6;border: none;color: #fff;margin-top: 20px;margin-left: 70px;" id="uptadebtn">提交</button>
                    </div>
                </div>
            </div>
        </div>
        @endsection
        @section('script')
            <script type="application/javascript">
                eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('$(h(){L=f;$(\'#W\').E(h(){g b=$("#j").6();3(b==\'\'){8(\'邮箱不能为空\');7 f}3(!u(b)){8(\'请输入正确的邮箱\');7 f}$.F("/G/S",{j:b},h(a){3(a.H==\'K\'){$(".v").w();$("#p").6(a.q.p);$("#m").6(a.q.m);$("#M").6(a.q.j);$("#n").6(a.q.n);$(".y").s();L=t}o{8(a.x)}})});$("#Q").E(h(){g b=$("#p").6();g c=$("#m").6();g d=$("#M").6();g e=$("#n").6();3(b==\'\'){8(\'网站名称不能为空\');7 f}3(c==\'\'){8(\'网站链接不能为空\');7 f}3(d==\'\'){8(\'管理邮箱不能为空\');7 f}3(!B(c)){8(\'请输入正确的域名，如：z://C.D,z://V.C.D\');7 f}3(!u(d)){8(\'请输入正确的邮箱\');7 f}$.F("/G/U",{p:b,m:c,j:d,n:e},h(a){3(a.H==\'K\'){$(".y").w();$(".v").s();$("#j").6(\'\');8(a.x)}o{3(a.T==R){$(".y").w();$(".v").s();$("#j").6(\'\')}8(a.x)}})});h u(a){g b=I J("^[a-k-9]+([.A\\\\-]*[a-k-9])*@([a-k-9]+[-a-k-9]*[a-k-9]+.){1,O}[a-k-9]+$");3(!b.N(a)){7 f}o{7 t}}h B(a){g b=\'^(z|P)\\\\://([a-i-l-9\\\\.\\\\-]+(\\\\:[a-i-l-9\\\\.&%\\\\$\\\\-]+)*@)?((r[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9])\\\\.(r[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9]|0)\\\\.(r[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9]|0)\\\\.(r[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[0-9])|([a-i-l-9\\\\-]+\\\\.)*[a-i-l-9\\\\-]+\\\\.[a-i-X]{2,4})(\\\\:[0-9]+)?(/[^/][a-i-l-9\\\\.\\\\,\\\\?\\\\\\\'\\\\\\\\/\\\\+&%\\\\$#\\\\=~A\\\\-@]*)*$\';g c=I J(b);3(c.N(a)){7 t}o{7 f}}})',60,60,'|||if|||val|return|alertWind|||||||false|var|function|zA|email|z0|Z0|url|sort|else|name|data|25|show|true|checkemail|input|hide|msg|webinfo|http|_|checkUrl|xxx|com|click|post|Api|status|new|RegExp|success|isData|upemail|test|63|https|uptadebtn|404|isEmailUrl|code|updateUrl|www|signbtn|Z'.split('|'),0,{}))
            </script>
@endsection