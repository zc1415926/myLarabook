@extends('layouts.default')

@section('content')

    <div class="row">
        <div class="col-md-3">
            <div class="media">
                <div class="pull-left"></div>
                <div class="media-body">
                    <h1 class="media-heading">{{$user->username}}</h1>
                    <ul class="list-inline text-muted">
                        <li>{{ $statusCount = $user->statuses->count() }} {{ str_plural('Status', $statusCount) }}</li>
                        <li>{{ $followerCount = $user->followers()->count() }} {{ str_plural("Follower", $followerCount) }}</li>
                    </ul>
                    <p>Followed by:</p>
                    <ul>
                    @foreach($user->followers as $follower)
                        <li>{{ $user->username }}</li>
                    @endforeach
                    </ul>

                </div>
            </div>

            @unless($user->is($currentUser))
                @include('users.partials.follow-form')
            @endif
        </div>

        <div class="col-md-6">
            @if($user->is($currentUser))
                @include('statuses.partials.publish-status-form')
            @endif

            @include('statuses.partials.statuses', ['statuses' => $user->statuses])

        </div>
    </div>
@stop