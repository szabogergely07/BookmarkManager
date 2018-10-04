@extends('layouts.app')

@section('content')

<div class="jumbotron" style="background-color: grey;">

@if (session('success'))
<div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Well done!</strong>
  {{session('success')}}
</div>
@endif

@if (count($errors) > 0)
	@foreach( $errors->all() as $error)
		<div class="alert alert-dismissible alert-danger">
		  <button type="button" class="close" data-dismiss="alert">&times;</button>
		  <strong>Oh snap!</strong> {{$error}}
		</div>
	@endforeach
@endif

<div style="width:90%; margin:auto" class="container">

	<button style="width:60%; margin:auto auto 20px;" type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#bookmarkModal">Add new Bookmark</button>


	<ul class="list-group">
		@foreach($bookmarks as $bookmark)
  <li class="list-group-item list-group-item-action">
    <a href="{{$bookmark->url}}" target="_blank">{{$bookmark->name}}</a>
    <span style="background-color: #333; color:white; padding: 2px; border-radius: 10%">{{$bookmark->description}}</span>
    <span style="cursor: pointer;" id="update" class="badge badge-primary badge-pill float-right" data-toggle="modal" data-target="#updateModal" data-id="{{$bookmark->id}}">
    	Update</span>
    <span style="cursor: pointer;" id="delete" class="badge badge-primary badge-pill float-right" data-id="{{$bookmark->id}}">
    	Delete</span>
  </li>
  @endforeach
</ul>



</div>

<div class="modal" id="bookmarkModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <form action="{{route('bookmarks.store')}}" method="POST">
      	{{ csrf_field() }}
	      <div class="modal-body">
	    
					 	<div class="form-group">
	      			
	      			
	      			<input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" aria-describedby="emailHelp" placeholder="Enter Bookmark's name">
	      			
    				</div>

    				<div class="form-group">
	      			<textarea style="resize: none;" type="text" name="description" class="form-control" id="description"placeholder="Enter Bookmark's description" rows="3">
	      			</textarea>
    				</div>

    				<div class="form-group">
	      			
	      			<input type="text" class="form-control" id="url" name="url"  placeholder="Enter Bookmark's url">
    				</div>
					
	      </div>
	      <div class="modal-footer">
	        <button type="submit" class="btn btn-primary">Save changes</button>
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	    	
	      </div>
			</form>
    </div>
  </div>
</div>

<!-- UPDATE modal -->
<div class="modal" id="updateModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Bookmark</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <form>
      	<input id="editId" type="hidden">
	      <div class="modal-body">
	    
					 	<div class="form-group">
	      			
	      			
	      			<input type="text" class="form-control" id="updateName" name="name" value="" aria-describedby="emailHelp" placeholder="Enter Bookmark's name">
	      			
    				</div>

    				<div class="form-group">
	      			<textarea style="resize: none;" type="text" name="description" class="form-control" id="updateDescription"placeholder="Enter Bookmark's description" rows="3">
	      			</textarea>
    				</div>

    				<div class="form-group">
	      			
	      			<input type="text" class="form-control" id="updateUrl" name="url"  placeholder="Enter Bookmark's url">
    				</div>
					
	      </div>
	      <div class="modal-footer">
	        <button id="putBookmark" class="btn btn-primary">Save changes</button>
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	    	
	      </div>
			</form>
    </div>
  </div>
</div>


</div>
@endsection