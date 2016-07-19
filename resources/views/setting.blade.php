@extends('layouts.app')

@section('content')
    <div class="container" xmlns:v-on="http://www.w3.org/1999/xhtml">
        <div class="row">

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="form-horizontal" action="{{ url('/bookmarks') }}" id="form" method="post">
                {{ csrf_field() }}
                <legend>新增书签</legend>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="">文件夹: </label>
                    <div class="col-sm-2">
                        <select class="form-control input-sm" name="folder_id">
                            @foreach($folders as $folder)
                                <option value="{{ $folder->id }}">{{ $folder->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="">书签链接: </label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="url" placeholder="http://hanc.cc">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="">书签名称: </label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="title" placeholder="HanSon博客">
                    </div>
                </div>
                <button class="btn btn-primary btn-sm col-sm-offset-2" type="submit">提交</button>
            </form>

            <div>
                {{ csrf_field() }}
                <legend>编辑书签</legend>
                @foreach($folders as $folder)
                    <div class="col-sm-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">{{ $folder->title }}</div>
                            <table class="table">
                                @foreach($folder->bookmarks as $bookmark)
                                <tr>
                                    <td>{{ $bookmark->title }}</td>
                                    <td>{{ $bookmark->url }}</td>
                                    <td><a href="javascript:delBookmarks({{ $bookmark->id }})" class="btn btn-danger btn-sm">删除</a></td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                @endforeach
            </div>

                <form class="form-horizontal" action="{{ url('/folder') }}" id="form" method="post">
                    {{ csrf_field() }}
                    <legend>新增文件夹</legend>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="">文件夹名称: </label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="title" placeholder="论坛">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="">权重: </label>
                        <div class="col-sm-1">
                            <input type="number" class="form-control" name="weight" placeholder="50">
                        </div>
                        <span class="help-block">请填写0到99的数字</span>
                    </div>
                    <button class="btn btn-primary btn-sm col-sm-offset-2" type="submit">提交</button>
                </form>

        </div>
    </div>
@endsection

@section('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function delBookmarks(id) {
            $.ajax({
                url: "{{ url('/bookmarks') }}/" + id,
                type: "POST",
                data: {
                    _method: "DELETE"
                },
                dataType: "json",
                success: function (data) {
                    if(data.code == 200){
                        window.location.href = "{{ url('setting') }}"
                    }else{
                        alert(data.msg)
                    }
                }
            })
        }
    </script>
@endsection

