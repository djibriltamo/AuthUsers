@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Liste de mes utilisateurs') }}</div>

                <div class="card-body">

                    <table class="table">

                        <thead>
                            <tr class="bg-blue-200">
                                <th scope="col">id</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Email</th>
                                <th scope="col">Roles</th>
                                <th scope="col">Date d'inscription</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)

                                <tr>
                                    <td scope="row">{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ implode (',', $user->roles()->get()->pluck('name')->toArray()) }}</td>
                                    <td>{{ $user->created_at }}</td>

                                    <td>
                                        @can('edit-users')
                                            <a href="{{ route('admin.users.edit', $user->id) }}"><button class="btn btn-primary"> Modifier</button></a>
                                        @endcan

                                        @can('delete-users')
                                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                            <button type="submit" class="btn btn-danger"> Supprimer</button>
                                            </form>
                                        @endcan
                                        </td>
                                </tr>

                            @endforeach

                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
