// Dit is een bestand die ik heb aangemaakt maar neit zeker weet of het werkt. Dit is puur experimenteel

@extends('layouts.default')

@section('content')
    <div class="container first-container">
        <h1>Profiel van {{ Auth::user()->username }}</h1>
        <br>

        <div class="row">
            <div class="col-md-4">
                <img class="foto" src="/placeholder.png" alt="" style="width: 100%; height: 100%;">
                <br>
                <a href=""><span class="glyphicon glyphicon-camera"> Verander foto </span></a>
            </div>

            <div class="col-md-4">ll
                <hr style="border-color: grey">
                <h3>Biografie:</h3>
                <p style="color: lightgrey;"><i>Nog niks opgeschreven</i></p>
            </div>

            <div class="col-md-4">
                <hr style="border-color: grey">
                <h3>Contact informatie:</h3>

                <table style="width:100%">
                    <tr>
                        <th>Gebruikernaam: </th>
                        <td> {{ Auth::user()->username }}</td>
                    </tr>
                    <tr>
                        <th>Email adress: </th>
                        <td>{{ Auth::user()->email }}</td>
                    </tr>
                    <tr>
                        <th>Wachtwoord: </th>
                        <td> ******** </td>
                    </tr>
                </table>

            </div>
        </div>
@stop