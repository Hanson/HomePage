@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12" style="margin-bottom: 20px">
            <div class="form-inline">
                百度搜索：
                <input id="baidu" type="text" class="form-control">
                <a id="search" target="_blank" href="javascript:;" class="form-control">搜索</a>
            </div>
        </div>
        @foreach($folders as $folder)
            @if(count($folder->bookmarks) > 0)
            <div class="col-sm-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $folder->title }}</div>
                    <table class="table">
                        @foreach($folder->bookmarks as $bookmark)
                            <tr>
                                <td><a target="_blank" href="{{ $bookmark->url }}">{{ $bookmark->title }}</a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            @endif
        @endforeach
    </div>
</div>
@endsection

@section('js')
    <script>
        var baiduUrl = "https://www.baidu.com/s?wd=";

        $("#baidu").keypress(function(e){
            if(e.which == 13){
                window.open(baiduUrl + $(this).val());
            }
        });

        $("#search").click(function(){
            window.open(baiduUrl + $("#baidu").val());
        });
    </script>
@endsection