@extends('index.layout')
@section('content')
        @foreach($data as $key=>$value)
        <div class="item item-0" id="{{ $value['code'] }}">
            @if($loop->index == 0)
                @include('index.mune')
            @endif
            <h2><a href="/#{{ $value['code'] }}">{{ $value['title'] }}</a></h2>
            <ul class="xoxo blogroll">
                @foreach($value['data'] as $vu)
                <li><a href="{{ $vu['link'] }}" target="_blank">{{ $vu['title'] }}</a></li>
                @endforeach
            </ul>
        </div>
        @endforeach
@endsection
@section('script')
<script type="application/javascript">
    eval(function(p,a,c,k,e,r){e=function(c){return c.toString(a)};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('$(1(){4 0=2.3;9(0!=\'\'){$.5("/6/7",{8:0},1(a){})}});',11,11,'b|function|document|referrer|var|post|Api|getSource|url|if|'.split('|'),0,{}))
</script>
@endsection