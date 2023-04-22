@include('layouts.main')
<div class="container mt-4">
  <div class="card">
    <div class="card-header text-center font-weight-bold">
      Update Contact
    </div>
    <div class="card-body">
      <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{ route('save-contact') }}">
       @csrf
       <input type="hidden" name="id" value="{{ $query->id }}">
        <div class="form-group">
          <label for="exampleInputEmail1">Name</label>
          <input type="text" id="name" name="name" class="form-control" value="{{$query->name}}"required>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Phone Number</label>
          <input type="tel" name="phone" class="form-control" value="{{$query->phone}}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a class="btn btn-danger" href="{{ route('home')}}">Cancel</a>
      </form>
    </div>
  </div>
</div>  