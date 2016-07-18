@extends('layouts.app')

@section('content')
<div class="container" xmlns:v-on="http://www.w3.org/1999/xhtml">
    <div class="row">

        <form class="form-horizontal" action="" id="form">
            <legend>新增书签</legend>
            <div class="form-group">
                <label class="col-sm-1 control-label" for="">文件夹: </label>
                <div class="col-sm-2">
                    <select class="form-control input-sm" v-model="folder_id">
                        @foreach($folders as $folder)
                            <option value="{{ $folder->id }}">{{ $folder->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label" for="">书签链接: </label>
                <div class="col-sm-4">
                    <input v-model="bookmarksUrl" type="text" class="form-control" id="" placeholder="http://hanc.cc">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label" for="">书签名称: </label>
                <div class="col-sm-4">
                    <input v-model="bookmarksName" type="text" class="form-control" id="" placeholder="HanSon博客" v-on:keyup.enter="addBookmarks">
                </div>
            </div>
            <button class="btn btn-primary" v-on:click="addBookmarks">提交</button>
        </form>

        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('js')
    <script src="{{ asset('asset/js/vue.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/vue.resource/0.9.3/vue-resource.min.js"></script>
    <script>
        new Vue({
            el: '#form',
            data: {
                bookmarksName: '',
                bookmarksUrl: '',
                folder_id: '',
            },
            methods: {
                addBookmarks: function () {
                    var name = this.bookmarksName.trim()
                    var url = this.bookmarksUrl.trim()
                    if (name && url) {
                        this.$http.post('{{ url('bookmarks') }}', {title: name, url: url, folder_id: this.folder_id}).then(function(response){

                        }, function(response) {

                        });
                    }else{
                        alert('请填写书签链接和书签名称');
                    }
                },
                removeTodo: function (index) {
                    this.todos.splice(index, 1)
                }
            }
        })
    </script>
@endsection