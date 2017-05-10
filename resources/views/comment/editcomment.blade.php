@extends('layouts.default')

@section('content')
    <div class="container first-container">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Verander je comment</h1>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form method="POST" action="{{ route('updatecomment', ['id' => $comment->id]) }}">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <div class="form-group">
                                        <label for="message-body">Comment</label>
                                        <textarea id="message-body" class="form-control" name="comment"> {{ $comment->comment }}</textarea>
                                </div>

                                <button type="submit" class="btn btn-default pull-right">Veranderen</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script type="text/javascript" src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/editor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/blog.js') }}"></script>
@stop