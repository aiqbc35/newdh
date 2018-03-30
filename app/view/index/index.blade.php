@extends('index.layout')
@section('content')
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
                                            @if(!empty($vu['color']))
                                                <span style="color:{!! $vu['color'] !!} !important;">{{ $vu['title'] }}</span>
                                            @else
                                                {{ $vu['title'] }}
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