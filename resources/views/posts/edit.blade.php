@extends('partials.master')

@section('content')
<div class="blog-post">
	<h1 class="text-center text-success">{{ Session::get('message') }}</h1>
	<form class="form" action="{{ route('posts.update', $post) }}" method="POST">
		{{ csrf_field() }}
		<input name="_method" type="hidden" value="PATCH">
		<div class="form-group">
			<label class="control-label col-md-4">Title</label>
			<div class="col-md-8" >
				<input type="text" name="title" class="form-control" value="{{$post->title}}">		
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-4">Description</label>
			<div class="col-md-8" >
				<div >
					<textarea class="form-control"  name="body" id="editor" rows="10" >{{$post->body}}</textarea>                            
				</div>

			</div>       
		</div> 
		<div class="form-group">
			<label class="control-label col-md-4">Publication status</label>
			<div class="col-md-8 radio">
				<label><input type="radio" name="publication_status" value="1" {{ $post->publication_status = 1 ? "checked" : "" }}/> Published</label>
				<label><input type="radio" name="publication_status" value="0" {{ $post->publication_status = 0 ? "checked" : "" }}/> Unpublished</label>
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-9" >
				<input type="submit" name="btn" class="form-control btn btn-success" value="Post">		
			</div>
		</div>
	</form>
</div><!-- /.blog-post -->

@endsection