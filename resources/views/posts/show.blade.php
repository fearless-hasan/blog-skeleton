@extends('partials.master')

@section('content')
<div class="col-sm-8 blog-main">

            <div class="blog-post">
            <h2 class="blog-post-title">{{ $post->title }}</h2>
            <p class="blog-post-meta">
              {{ $post->user->name }}
              {{ $post->created_at->toFormattedDateString() }}
            </p>

           {{ $post->body }}
<hr>
<div class="comment">
            <ul class="list-group">               
              @foreach($post->comments as $comment)
              @if($comment->publication_status)
                <li class="list-group-item">
                  {{ $comment->comment}}
                  <br>
                    {{ $comment->created_at->diffForHumans()}}: &nbsp; {{'-'.$comment->user->name}}
                  
                </li>
                @endif
              @endforeach
            </ul>
            
           </div>
<hr>

@if($user)
           <div class="card">
             <div class="card-block">
               <form method="POST" action="{{ route('comments.store',$post->id) }}">
                  {{ csrf_field() }}
                 <div class="form-group">
                   <textarea name="comment" placeholder="Your comment here." class="form-control"></textarea>
                 </div>
                 <div class="form-group">
                   <button type="submit" class="btn btn-primary">Add Comment</button>
                 </div>
               </form>
             </div>
           </div>
           @endif
          </div><!-- /.blog-post -->



        </div><!-- /.blog-main -->
@endsection