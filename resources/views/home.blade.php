@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12" style="margin-bottom: 20px">
            <form class="form-inline">
                百度搜索：
                <input id="baidu" type="text" class="form-control">
                <a id="search" target="_blank" href="https://www.baidu.com/s?wd=" type="text" class="form-control">搜索</a>
            </form>
        </div>
        @foreach($folders as $folder)
            @if(count($folder->bookmarks) > 0)
            <div class="col-sm-4">
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
        $("#baidu").keyup(function(){
            $("#search").attr("href", baiduUrl + $(this).val());
        });
    </script>
@endsection