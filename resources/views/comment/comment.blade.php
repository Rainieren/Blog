@extends('layouts.default')

@section('content')

    <div class="container first-container">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Je reacties</h1>
                    </div>
                    {{--<div class="form-group">--}}
                    @foreach($allcomments as $comment)
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-1">
                                        <img src="/uploads/avatars/{{ $comment->user->avatar }}" style="width: 62px; height: 62px; position: initial; top: 0px; left: 20px; border-radius: 50%;">
                                    </div>
                                    <div class="col-md-9">
                                        {!! $comment->comment !!}
                                    </div>
                                    <div class="col-md-1">
                                        <a href="{{ route('deletecomment', ['id' => $comment->id]) }}"
                                           onclick="event.preventDefault(); document.getElementById('delete-form{{ $comment->id }}').submit();">
                                            <span class="glyphicon glyphicon-trash icon-large"></span>
                                            <span class="icon-small-text"><br> Verwijder </span>
                                            <form id="delete-form{{ $comment->id }}"
                                                  action="{{ route('deletecomment', ['id' => $comment->id]) }}"
                                                  method="POST"
                                                  style="display: none;">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                            </form>
                                        </a>
                                    </div>
                                    <div class="col-md-1">
                                        <a href="{{ route('editcomment', ['id' => $comment->id]) }}"><span class="glyphicon glyphicon-pencil icon-large"></span>
                                            <span class="icon-small-text"><br> Bewerk </span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="">{{ $comment->user->username }} </a>
                                    </div>
                                    <div class="col-md-6">
                                            <span class="post-author-postedon pull-right">
                                                {{ $comment->created_at }}
                                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
@stop

@section('scripts')
    <script type="text/javascript" src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/editor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/blog.js') }}"></script>
@stop
