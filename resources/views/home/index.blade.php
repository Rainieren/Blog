@extends('layouts.default')

@section('content')
    <div class="container first-container">
        <div class="jumbotron">
            <h1>BLOG</h1>
            <p>Dit is een JUMBOTRON voor onze BLOG</p>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title panel-title-md">LAATSTE POST</h3>
                    </div>
                    <div class="panel-body">
                        <h3>Post Titel</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat.</p>
                        <a href="#" class="post-read-more">Lees meer...</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title panel-title-md">POPULAIRSTE POST</h3>
                    </div>
                    <div class="panel-body">
                        <h3>Post titel</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat.</p>
                        <a href="#" class="post-read-more">Lees meer...</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h1>POSTS
                        <small>De andere posts...</small></h1>
                </div>
                @foreach($allposts as $post)
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3>{{ $post->title }}</h3>
                            <div class="row">
                                <div class="col-md-11">
                                    <p class="first-line-of-post">
                                    {!! str_limit($post->text, $limit = 150, $end = '...') !!} <!-- Verwijderd alle HTML Tags -->
                                    </p>
                                </div>
                                <div class="col-md-1">
                                    <a href="{{ route('showpost', ['id' => $post->id]) }}"><span class="glyphicon glyphicon-circle-arrow-right icon-readmore"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop