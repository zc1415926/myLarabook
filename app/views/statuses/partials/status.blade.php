<article class="media status-media">

    <div class="media-body">
        <h3 class="media-heading">{{ $status->user->username }}</h3>
        <p>{{ $status->created_at->format('Y-m-d') }}</p>
        {{ $status->body }}
        @include('users.partials.follow-form', ['user' => $status->user])
    </div>
</article>

@if($signedIn)
    {{ Form::open(['route' => ['comment_path', $status->id], 'class' => 'comment__create-form']) }}
        {{ Form::hidden('status_id', $status->id) }}

        <div class="form-group">
            {{ Form::textarea('body', null, ['class' => 'form-control', 'rows' => 1]) }}
        </div>
    {{ Form::close() }}
@endif

@unless($status->comments->isEmpty())
    <div class="comments">
        @foreach($status->comments as $comment)
            @include('statuses.partials.comment')
        @endforeach
    </div>
@endunless