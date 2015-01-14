@extends('layouts.default')

@section('content')
    <h1>All Users</h1>

    @foreach($users->chunk(4) as $userSet)
        <div class="row users">
            @foreach($userSet as $user)
                <div class="col-md-3 user-block">
                    <h4 class="user-block-username">
                        {{ $user->username }}
                    </h4>
                </div>
            @endforeach
        </div>
    @endforeach

    <div class="users-pagination">{{ $users->links() }}</div>
@stop