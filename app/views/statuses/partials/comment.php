<article class="comment__comment media status-media">
    <div class="pull-left"></div>
    <div class="media-body">
        <h4 class="media-heading">{{ $comment->owner->username; }}</h4>
        {{ $comment->body }}
    </div>
</article>