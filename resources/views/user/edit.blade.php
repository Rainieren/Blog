@extends('layouts.default')

@section('content')
    <div class="container first-container">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form method="POST" action="{{ route('updateuser', ['id' => $user->id]) }}">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <div class="form-group">
                                    <label for="username">Gebruikernaam: </label>
                                    <input type="text" id="username" class="form-control" name="username" value="{{ $user->username }}">
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