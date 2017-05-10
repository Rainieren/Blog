@extends('layouts.default')

    @section('content')

        <div class="container first-container">
            <div class="row">
                <div class="row-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h1>{{ $post->title }}</h1>
                            <p>{!! $post->text !!}</p>
                        </div>
                        <div class="panel-footer">
                            <a href="">{{ $post->user->username }}</a>
                            <p style="float: right;"><b>Gepost op: </b>{{ $post->created_at }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header">
                            <h1>Nieuwe reactie</h1>
                        </div>
                            <form method="POST" action="{{ route('createcomment') }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                <div class="form-group">
                                    <textarea id="message-body" class="form-control" name="comment"></textarea>
                                </div>
                                <button type="submit" class="btn btn-default pull-right">Plaatsen</button>
                            </form>
                        </div>
                    </div>
                </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header">
                            <h1>Reacties</h1>
                        </div>
                            {{--<div class="form-group">--}}
                                @foreach($post->comments as $comment)
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    @if($post->comments()->count())
                                                        {!! $comment->comment !!}
                                                    @else
                                                        <p style="color: lightgrey"><i>Nog geen reacties beschikbaar</i></p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-footer">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    @if($post->comments()->count())
                                                        <a href="">{{ $comment->user->username }} </a>
                                                    @endif
                                                </div>
                                                <div class="col-md-6">
                                                    @if($post->comments()->count())
                                                        <span class="post-author-postedon pull-right">
                                                        {{ $comment->created_at }}
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                {{--</div>--}}
                            </div>
                         </div>
                    </div>

    @stop

@section('scripts')
                <script type="text/javascript" src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
                <script type="text/javascript" src="{{ asset('js/editor.js') }}"></script>
                <script type="text/javascript" src="{{ asset('js/blog.js') }}"></script>
    @stop
