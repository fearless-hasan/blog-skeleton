@extends('partials.master')

@section('content')
@foreach($posts as $post)
<div class="blog-post">
        <h2 class="blog-post-title"><a href="{{ route('posts.show',$post) }}">{{$post->title}}</a></h2>
        <p class="blog-post-meta">{{ $post->created_at->toFormattedDateString() }} <a href="#">{{ $post->user->name }}</a></p>

        @foreach($post->tags as $tag)
        <a href="{{route('posts.tag', $tag) }}"><span class="badge badge-pill badge-primary">{{$tag->name}}</span></a>

        @endforeach

         <p>{{ str_limit(strip_tags($post->body), 50) }}
            @if (strlen(strip_tags($post->body)) > 50)
            ... <a href="{{ route('posts.show',$post) }}" class="btn btn-info btn-sm">Read More</a>
            @endif
        </p>
        <hr>
	</div><!-- /.blog-post -->
@endforeach
@if($posts->links())
{{ $posts->links() }}
@endif
<nav class="blog-pagination">
    <a class="btn btn-outline-primary" href="#">Older</a>
    <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
</nav>
@endsection