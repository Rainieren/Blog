// Dit is een bestand die ik heb aangemaakt maar neit zeker weet of het werkt. Dit is puur experimenteel

@extends('layouts.default')

@section('content')
    <div class="container first-container">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <img src="/uploads/avatars/{{ $user->avatar }}" class="profielfoto">
                    <h1>{{ Auth::user()->username }}'s Profiel</h1>

                    <form enctype="multipart/form-data" action="profile" method="POST">
                        <label for="">Update Profiel Foto</label>
                        <input type="file" name="avatar">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class="pull-right btn btn-primary" value="Bewerken">
                    </form>
                </div>
            </div>
            <div class="page-header">
                <h1>Persoonlijke informatie</h1>
            </div>
            <div class="col-md-12">

            </div>
        </div>
    </div>
@stop