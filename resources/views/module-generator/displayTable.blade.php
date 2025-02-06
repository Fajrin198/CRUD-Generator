@extends('layouts.main')

@section('content')
    @include('partials.headerAddMenu')
        <form action="{{ route('addIterasi') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="rows">Field:</label>
            <input style="width: 100px;" type="number" id="rows" name="rows" min="1" required>
            <button type="submit">Save</button>
          </div>
        </form>

        <form action="{{ route('processForm') }}" method="POST">
          @csrf
        <div class="table-responsive small">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">Type</th>
              <th scope="col">Width</th>
              <th scope="col">Images</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            
            @for ($i = 0; $i < $rows; $i++)
            <tr>
              <td>{{ $i+1 }}</td>
              <td>
                <input type="text" id="nama{{ $i }}" name="nama{{ $i }}" required class="form-control form-control-sm" id="exampleFormControlInput1" >
              </td>
              <td>
                <input type="text" id="type{{ $i }}" name="type{{ $i }}" required class="form-control form-control-sm" id="exampleFormControlInput1" >
              </td>
              <td>
                <input type="text" id="width{{ $i }}" name="width{{ $i }}" required class="form-control form-control-sm" id="exampleFormControlInput1" >
              </td>
              <td>
              <select class="form-select" id="useImage{{ $i }}" name="useImage{{ $i }}" required aria-label="Default select example">
                <option selected>N</option>
                <option value="1">Y</option>
              </select>
              </td>
              <td>
                <button type="button" class="btn btn-success btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
</svg></button>
                <button type="button" class="btn btn-danger btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
  <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
</svg></button>
                <button type="button" class="btn btn-primary btn-sm"><svg class="bi"><use xlink:href="#gear-wide-connected"/></svg></button>
              </td>
            </tr>
            @endfor
          </tbody>
        </table>
      </div>
      <div style="display: flex; justify-content: flex-end; margin-top: 20px;">
        <a href="{{ route('addMenu') }}" style="background-color:rgb(155, 159, 162); color: white; padding: 8px 12px; border: none; border-radius: 4px; cursor: pointer; font-size: 14px;">Back &raquo;</a>
      </div>    
      <div style="display: flex; justify-content: flex-end; margin-top: 20px;">
          <button style="background-color: #007bff; color: white; padding: 8px 12px; border: none; border-radius: 4px; cursor: pointer; font-size: 14px;">Step 2 &raquo;</button>
      </div>    
    </form>
    </div>
@endsection
