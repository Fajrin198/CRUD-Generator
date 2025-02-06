@extends('layouts.main')

@section('content')
    @include('partials.headerAddMenu')
    <form action="{{ route('processForm2') }}" method="POST">
        @csrf
        <div class="table-responsive small">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama Field</th>
              <th scope="col">Label</th>
              <th scope="col">Type</th>
              <th scope="col">Validation</th>
              <th scope="col">Options</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($datas as $data)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>
                {{ $data['nama'] }}
              </td>
              <td>
                <input type="text" id="label{{ $loop->iteration-1 }}" name="label{{ $loop->iteration-1 }}" class="form-control form-control-sm" placeholder="{{ $data['nama'] }}">
              </td>
              <td>
                <select id="type{{ $loop->iteration-1 }}" name="type{{ $loop->iteration-1 }}" required placeholder="graduation-cap" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px;">
                  <option value="text">Text</option>
                  
                  <option value="select">Select</option>
                  <option value="number">Number</option>
                </select>
              </td>
              <td>
                <input type="text" id="validation{{ $loop->iteration-1 }}" name="validation{{ $loop->iteration-1 }}" class="form-control form-control-sm" id="exampleFormControlInput1" placeholder="required">
              </td>
              <td>
                <button type="button" class="btn btn-primary btn-sm"><svg class="bi"><use xlink:href="#gear-wide-connected"/></svg> Options</button>
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
            @endforeach
          </tbody>
        </table>
      </div>     
      <div style="display: flex; justify-content: flex-end; margin-top: 20px;">
        <button style="background-color: #007bff; color: white; padding: 8px 12px; border: none; border-radius: 4px; cursor: pointer; font-size: 14px;">Step 3 &raquo;</button>
      </div>
    </form>
@endsection
