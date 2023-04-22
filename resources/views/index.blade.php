@include('layouts.main')
 
@if(session('success'))
    <div class="col-lg-10">
        <div class="pg-header row">
            <div class="alert alert-success" style="width:100%;">
                <strong>Success!</strong>{{session('success')}}
            </div>
        </div>
    </div>
@endif
@if(session('error'))
    <div class="col-lg-10">
        <div class="pg-header row">
            <div class="alert alert-danger" style="width:100%;">
                <strong>Failed!</strong>{{session('error')}}
            </div>
        </div>
    </div>
@endif

<div class="card">
<div class="card-body">
<a class="btn btn-outline-primary my-2 my-sm-0" href="{{ route('add-contact')}}">Add New Contact</a><br><br>
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">View</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($list as $key => $item)
    <tr>
      <th scope="row">{{ $key + 1 }}</th>
      <td>{{ $item->name }}</td>
      <td><a href="{{route('view-contact',['id'=>$item->id])}}"><svg style="width:25px;" xmlns="http://www.w3.org/2000/svg" class="w-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg></a></td>
      <td><a href="{{route('edit-contact',['id'=>$item->id])}}"><svg style="width:25px;" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400" width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                              </svg></a></td>
      <td><a href="{{route('delete-contact',['id'=>$item->id])}}" onclick="return confirm('Are you sure?')"><svg style="width:25px;" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400" width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                              </svg></a></td>
    </tr>
  @endforeach
  </tbody>
</table>
</div>
</div>
