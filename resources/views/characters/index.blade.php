@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Characters</div>

                    <div class="card-body">
                        <ul>
                            @foreach($characters as $character)
                                <li>
                                    <a href="/characters/{{ $character->name }}">{{ $character->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
