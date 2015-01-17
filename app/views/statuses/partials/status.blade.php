<article class="media status-media">

    <div class="media-body">
        <h3 class="media-heading">{{ $status->user->username }}</h3>
        <p>{{ $status->created_at->format('Y-m-d') }}</p>
        {{ $status->body }}
        @include('users.partials.follow-form', ['user' => $status->user])
    </div>
</article>