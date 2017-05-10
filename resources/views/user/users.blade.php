@extends('layouts.default')


@section('content')
    <div class="container first-container">
        <h1>Gebruikers</h1>
        <div class="row btn-new-user">
            <div class="col-md-10"></div>
            <div class="col-md-1">
                <button type="button"  class="btn btn-primary">Nieuwe user</button>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                {{--Iets zoals dit???? Dit werkt niet--}}
                    <table class="table table-striped">
                        <thead class="thead-inverse">
                        <tr>
                            <th>ID</th>
                            <th>Gebruikersnaam</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Bewerken</th>
                        </tr>
                        </thead>
                        @foreach($allusers as $user)
                        <tbody>
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                {{-- Als role = 1 laat "Admin" zien, Als role = 0 laat "Gebruiker" zien--}}
                                <td>{{ $user->role }}</td>

                                <td><a href="{{ route('deleteuser', ['id' => $user->id]) }}"
                                       onclick="event.preventDefault(); document.getElementById('delete-form{{ $user->id }}').submit();">
                                        <span class="glyphicon glyphicon-trash icon-large"></span>
                                        <span class="icon-small-text"><br> Verwijder </span>
                                        <form id="delete-form{{ $user->id }}" action="{{ route('deleteuser', ['id' => $user->id]) }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        </form>
                                    </a>


                                    <a href="{{ route('edituser', ['id' => $user->id]) }}"><span class="glyphicon glyphicon-pencil icon-large"></span>
                                        <span class="icon-small-text"><br> Bewerk </span></a>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
            </div>
        </div>

        <div class="row btn-new-user">
            <div class="col-md-10"></div>
            <div class="col-md-1">
                <button type="button"  class="btn btn-primary">Nieuwe user</button>
            </div>
        </div>

    </div>
@stop