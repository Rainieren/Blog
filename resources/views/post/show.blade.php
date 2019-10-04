@extends('layouts.default')

    @section('content')

        <div class="container first-container">
            <div class="row">
                <div class="row-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-2">
                                <img src="/uploads/avatars/{{ $post->user->avatar }}" style="width: 152px; height: 152px; position: absolute; top: 30px; left: 15px; border-radius: 50%;">
                            </div>
                            <div class="col-md-9">
                                <h1>{{ $post->title }}</h1>
                                <p>{!! $post->text !!}</p>
                            </div>
                            <div class="col-md-1">
                                <a href=""><span class="glyphicon glyphicon-heart icon-large" style="float: right; font-size: 32px;"></span></a>
                            </div>
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
                        {{--@if(count($comment > 1))--}}
                            {{--<p style="color: lightgrey"><i>Nog geen reacties beschikbaar</i></p>--}}
                        {{--@else--}}
                                @foreach($post->comments->sortBydesc('created_at') as $comment)

                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <img src="/uploads/avatars/" style="width: 52px; height: 52px; position: initial; top: -5px; left: 15px; border-radius: 50%;">
                                                </div>
                                                <div class="col-md-10">
                                                    {!! $comment->comment !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-footer">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <a href=""></a> <span class="glyphicon glyphicon-ok-circle" style="color: #1d75b3; margin-left: 5px; top: 2px;"></span>
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
