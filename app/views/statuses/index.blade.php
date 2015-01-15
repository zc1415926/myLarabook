@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            @include('statuses.partials.publish-status-form')
            <h1>Post your Status</h1>
            <br>
            @include('statuses.partials.statuses')
        </div>
    </div>
@stop