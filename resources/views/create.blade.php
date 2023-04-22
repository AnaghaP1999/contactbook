@include('layouts.main')
<div class="container mt-4">
  <div class="card">
    <div class="card-header text-center font-weight-bold">
      Add New Contact
    </div>
    <div class="card-body">
      <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{ route('save-contact') }}">
       @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Name</label>
          <input type="text" id="name" name="name" class="form-control" required>
          @error('name')
            <p class="text-red-600 text-xs italic">{{ $message }}</p>
          @enderror
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Phone Number</label>
          <input type="tel" name="phone" class="form-control" required>
          @error('phone')
            <p class="text-red-600 text-xs italic">{{ $message }}</p>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
        <a class="btn btn-danger" href="{{ route('home')}}">Cancel</a>
      </form>
    </div>
  </div>
</div>  