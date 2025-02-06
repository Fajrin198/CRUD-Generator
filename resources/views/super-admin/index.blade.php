@extends('layouts.main')

@section('content')
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Super Admin</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
            <svg class="bi"><use xlink:href="#calendar3"/></svg>
            This week
          </button>
        </div>
      </div>
      <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
          <button data-bs-toggle="modal" data-bs-target="#bookingModal1" style="background-color: #28a745; color: white; padding: 8px 12px; border: none; border-radius: 4px; cursor: pointer; font-size: 14px;">+ Tambah Data</button>
      </div>
      <div class="table-responsive small">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
                @foreach ($columns as $header)
                  @if($header != "created_at" && $header != "updated_at" && $header != "id" && $header != "image")
                    <th scope="col">{{ $header }}</th>
                  @endif
                @endforeach
                <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($menus as $row)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $row->table }}</td>
              <td>{{ $row->name }}</td>
              <td>{{ $row->icon }}</td>
              <td>{{ $row->module_slug }}</td>
                <td>
                <a href="#" class="btn btn-info btn-sm">Lihat</a>
                <a href="#" class="btn btn-warning btn-sm">Edit</a>
                <form action=" {{route( 'superAdmin.destroy', $row )}} " method="POST" style="display: inline;">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">
                        Hapus
                    </button>
                </form>
                </td>
            </tr>
            @endforeach
            <!-- <tr>
              <td>1,001</td>
              <td>random</td>
              <td>data</td>
              <td>placeholder</td>
              <td>text</td>
            </tr>
            <tr>
              <td>1,002</td>
              <td>placeholder</td>
              <td>irrelevant</td>
              <td>visual</td>
              <td>layout</td>
            </tr> -->
          </tbody>
        </table>
      </div>
@endsection