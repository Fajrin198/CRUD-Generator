@extends('layouts.adminLayout')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{$tittle}}</h1>
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
                @foreach ($filteredColumns as $header)
                    <th scope="col">{{ $header }}</th>
                @endforeach
                <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $row)
            <tr>
              <td>{{ $loop->iteration }}</td>
              @foreach ($filteredColumns as $header)
                    <td>{{ $row->$header }}</td>
                @endforeach
                <td>
                <a href="#" class="btn btn-info btn-sm">Lihat</a>
                <a href="#" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route($routeName . '.destroy', $row) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
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
      <div class="modal fade" id="bookingModal1" tabindex="-1"
          aria-labelledby="bookingModalLabel1" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="bookingModalLabel1">{{$tittle}}</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal"
                          aria-label="Close"></button>
                  </div>
                  <form action="{{ route($routeName . '.store') }}" method="POST">
                      @csrf
                      <div class="modal-body">
                          <!-- <div class="mb-3">
                              <label for="date" class="form-label">Tanggal Pemesanan</label>
                              <input type="date" class="form-control" id="date" name="date" required>
                          </div>
                          <div class="mb-3">
                              <label for="start_time" class="form-label">Jam Mulai</label>
                              <input type="time" class="form-control" id="start_time" name="start_time"
                                  required>
                          </div> -->
                          @foreach ($filteredColumns as $header)
                              <div class="mb-3">
                                <label class="form-label">{{ $displayForm[ $loop->iteration-1 ]['label'] }}</label>
                                <input type="text" class="form-control" id="{{ $header }}" name="{{ $header }}"
                                    required>
                              </div>
                          @endforeach
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn-primary">Simpan</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
   
@endsection
