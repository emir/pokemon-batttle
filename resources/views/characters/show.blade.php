@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div>
                            <form action="/yakala" method="POST">
                                @csrf
                                <input type="hidden" name="character_id" value="{{ $character->id }}"/>
                                <button class="btn btn-danger" type="submit">Yakala!</button>
                            </form>
                        </div>
                    </div>

                    <div class="card-body">

                        <p>{{ session()->get('error') }}</p>

                        <p>{{ $character->name }}</p>
                        <p>{{ $character->pokeapi_id }}</p>

                        <ul>
                            @foreach($character->users as $user)
                                <li>{{ $user->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
