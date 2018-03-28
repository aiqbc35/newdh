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
    $(function(){var source=document.referrer;if(source!=''){$.post("/Api/getSource",{url:source},function(data){})}});
</script>
@endsection