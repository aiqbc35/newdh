@extends('index.layout')
@section('content')
    {{--推荐--}}
        @foreach($data as $key=>$value)
            @if($value['type'] == 1)
                <div class="item item-0" id="{{ $value['code'] }}">
                    @if($loop->index == 0)
                        @include('index.mune')
                    @endif
                    <h2><a href="/#{{ $value['code'] }}">{{ $value['title'] }}</a></h2>
                    <ul class="xoxo blogroll">
                        @foreach($value['data'] as $vu)
                            <li><a href="{{ $vu['link'] }}" target="_blank">
                                    @if(!empty($vu['color']))
                                        <span style="color:{!! $vu['color'] !!} !important;">{{ $vu['title'] }}</span>
                                    @else
                                        {{ $vu['title'] }}
                                    @endif
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        @endforeach
    {{--推荐结束--}}
        @foreach($data as $key=>$value)
            @if ($value['type'] == 0)
                <div class="item item-0" id="{{ $value['code'] }}">
                    @if($loop->index == 0)
                        @include('index.mune')
                    @endif
                    <h2><a href="/#{{ $value['code'] }}">{{ $value['title'] }}</a></h2>
                    <ul class="xoxo blogroll">
                        @foreach($value['data'] as $vu)
                            @if($vu['type'] == 1)
                                <li>
                                    <a href="{{ $vu['link'] }}" target="_blank" >
                                        @if(!empty($vu['color']))
                                            <span style="color:{!! $vu['color'] !!} !important;">{{ $vu['title'] }}</span>
                                        @else
                                            {{ $vu['title'] }}
                                        @endif
                                    </a>
                                </li>
                                @endif
                        @endforeach
                            @foreach($value['data'] as $vu)
                                @if($vu['type'] == 0)
                                    <li>
                                        <a href="{{ $vu['link'] }}" target="_blank" >
                                            {{--30次紫色、50次棕色、100次橘黄、200次粉色、300次蓝色、500次红色 --}}
                                            @if(!empty($vu['color']))
                                                <span style="color:{!! $vu['color'] !!} !important;">{{ $vu['title'] }}</span>
                                            @else
                                                @switch(true)
                                                    @case($vu['source'] >= 30 && $vu['source'] < 50)
                                                        <span style="color:#FFBBFF !important;">{{ $vu['title'] }}</span>
                                                        @break;
                                                    @case($vu['source'] >= 50 && $vu['source'] < 100 )
                                                        <span style="color:#B8860B !important;">{{ $vu['title'] }}</span>
                                                        @break;
                                                    @case($vu['source'] >= 100 && $vu['source'] < 200)
                                                        <span style="color:#EE7600 !important;">{{ $vu['title'] }}</span>
                                                        @break;
                                                    @case($vu['source'] >= 200 && $vu['source'] < 300)
                                                        <span style="color:#D02090 !important;">{{ $vu['title'] }}</span>
                                                        @break;
                                                    @case($vu['source'] >= 300 && $vu['source'] < 500 )
                                                        <span style="color:#0000FF !important;">{{ $vu['title'] }}</span>
                                                        @break;
                                                    @case($vu['source'] >= 500)
                                                        <span style="color:red !important;">{{ $vu['title'] }}</span>
                                                        @break;
                                                    @default
                                                        {{ $vu['title'] }}
                                                @endswitch
                                            @endif
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                    </ul>
                </div>
            @endif
        @endforeach
@endsection
@section('script')
<script type="application/javascript">
    $(function(){var source=document.referrer;if(source!=''){$.post("/Api/getSource",{url:source},function(data){})}});
</script>
@endsection