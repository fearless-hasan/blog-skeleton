@extends('partials.master')

@section('content')
<div class="blog-post">
	<h1 class="text-center text-success">{{ Session::get('message') }}</h1>
	<form class="form" action="{{ route('posts.store') }}" method="POST">
		{{ csrf_field() }}
		<div class="form-group">
			<label class="control-label col-md-4">Tags</label>
			<div class="col-md-8" >
				@foreach($tags as $tag)
				<input type="checkbox" name="tags[]" value="{{ $tag->id }}">  {{ $tag->name }}<br>
				@endforeach	
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-4">Title</label>
			<div class="col-md-8" >
				<input type="text" name="title" class="form-control">		
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-4">Description</label>
			<div class="col-md-8" >
				<div >
					<textarea class="form-control"  name="body" id="editor" rows="10" ></textarea>                            
				</div>

			</div>       
		</div> 
		<div class="form-group">
			<label class="control-label col-md-4">Publication status</label>
			<div class="col-md-8 radio">
				<label><input type="radio" name="publication_status" value="1"/> Published</label>
				<label><input type="radio" name="publication_status" value="0"/> Unpublished</label>
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