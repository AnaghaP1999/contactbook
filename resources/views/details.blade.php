@include('layouts.main')
<div class="card">
<div class="card-body">
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Mobile Number</th>
    </tr>
  </thead>
  <tbody>
    <tr>

      <td>{{ $query->name }}</td>
      <td>{{ $query->phone }}</td>
    </tr>

  </tbody>
</table>
</div>
</div>