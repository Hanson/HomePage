@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach($folders as $folder)
            @if(count($folder->bookmarks) > 0)
            <div class="col-sm-4">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $folder->title }}</div>
                    <table class="table">
                        @foreach($folder->bookmarks as $bookmark)
                            <tr>
                                <td><a href="{{ $bookmark->url }}">{{ $bookmark->title }}</a></td>
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
