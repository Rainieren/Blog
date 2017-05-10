@extends('layouts.default')

@section('content')
    <div class="container first-container">
        <h1>Beheer posts</h1>
        <div class="row btn-new-post">
            <div class="col-md-10"></div>
            <div class="col-md-1">
                <a href="{{ url('post/create') }}"><button type="button" class="btn btn-primary">Nieuwe post</button></a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">

                <!-- Laat overzicht van alle post zien.
                     Zorg ervoor dat delete werkt
                     Zorg ervoor dat bewerken werkt -->

                    @foreach($allposts as $post)
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-10">
                                        <h1>{{ $post->title }}</h1>
                                        <p class="first-line-of-post">
                                        {!! $post->text  !!}
                                        </p>
                                    </div>
                                    <div class="col-md-1">
                                        <a href="{{ route('deletepost', ['id' => $post->id]) }}"
                                           onclick="event.preventDefault(); document.getElementById('delete-form{{ $post->id }}').submit();">
                                            <span class="glyphicon glyphicon-trash icon-large"></span>
                                            <span class="icon-small-text"><br> Verwijder </span>
                                            <form id="delete-form{{ $post->id }}" action="{{ route('deletepost', ['id' => $post->id]) }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                            </form>
                                        </a>
                                    </div>

                                    <div class="col-md-1">
                                        <a href="{{ route('editpost', ['id' => $post->id]) }}"><span class="glyphicon glyphicon-pencil icon-large"></span>
                                            <span class="icon-small-text"><br> Bewerk </span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                <div class="row">
                    <div class="col-md-10"></div>
                    <div class="col-md-1">
                        <a href="{{ url('post/create') }}"><button type="button" class="btn btn-primary">Nieuwe post</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop