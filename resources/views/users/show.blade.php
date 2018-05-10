@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $user->name }}</div>

                    <div class="card-body">
                        <p>
                            <strong>Deneyim Puanı:</strong> {{ $user->experience }}
                        </p>
                        <p>
                            <strong>Email Adresi:</strong> {{ $user->email }}
                        </p>

                        <p>{{ session()->get('message') }}</p>

                        <ul>
                            @foreach($user->characters as $character)

                                @if(auth()->user()->id != $user->id)
                                <form action="/battle" method="POST">
                                    @csrf

                                    <li>{{ $character->name }} ile</li>

                                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                                    <input type="hidden" name="character_id" value="{{ $character->id }}">

                                    <select name="my_character_id" id="">
                                        @foreach(auth()->user()->characters as $myCharacters)
                                            <option value="{{ $myCharacters->id }}">{{ $myCharacters->name }}</option>
                                        @endforeach
                                    </select>

                                    <button type="submit" class="btn btn-danger">Savaş</button>
                                </form>
                                @endif

                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
