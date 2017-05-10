@extends('layouts.default')

@section('content')
    <div class="container first-container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h1>Nieuwe POST</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <div class="form-group">
                                <label for="post-title">Titel</label>
                                <input type="text" id="post-title" class="form-control" name="title"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="post-slug">Gegenereerde slug</label>
                                <input type="text" id="post-slug" class="form-control" name="slug"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="message-body">Tekst</label>
                                <textarea id="message-body" class="form-control" name="text"></textarea>
                            </div>
                            <button type="submit" class="btn btn-default pull-right">Plaatsen</button>
                        </form>
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