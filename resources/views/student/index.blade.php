@extends('layouts.main')

@section('container')
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        </ol>
    </nav>
    @if (session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('gagal'))
        <div class="alert alert-danger col-lg-8" role="alert">
            {{ session('gagal') }}
        </div>
    @endif
    {{-- toash --}}
        <div class="card">
            <div class="card-header">
                <div class="d-flex float-end">
                    <a class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modal-upload">
                        <i class="bi bi-file-earmark-excel-fill"></i> Upload File Exel
                    </a>
                </div>
                <a>Data Siswa</a> 
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">NIS</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                      <tr>
                        <th scope="row">{{ ($students ->currentpage()-1) * $students ->perpage() + $loop->index + 1 }}</th>
                        <td>{{ $student->nama }}</td>
                        <td>{{ $student->nis }}</td>
                        <td>{{ $student->classroom->nama_kelas }}</td>
                        <td>{{ $student->jenis_kelamin }}</td>
                        <td></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  {{ $students->links() }}
            </div>
        </div>

    <!-- modal -->
        <div class="modal fade" id="modal-upload" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="/students" method="post" enctype="multipart/form-data">
                    @csrf
                    <div id="modalbox" class="modal-content rounded-4 shadow">
                    <div class="modal-header border-bottom-0">
                        <h1 id="modal-title" class="modal-title fs-5">File Upload</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div id="modal-body" class="modal-body py-0">
                        <input type="file" class="form-control" name="file" id="file">
                    </div>
                    <div class="modal-footer flex-column border-top-0">
                        <button type="submit" class="btn btn-primary w-100 mx-0" data-bs-dismiss="modal">Upload</button>
                    </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div id="modalbox" class="modal-content rounded-4 shadow">
                    <div class="modal-header border-bottom-0">
                        <h1 id="modal-title" class="modal-title fs-5">Atur Waktu</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div id="modal-body" class="modal-body py-0">
                        <div class="row">
                            <div class="col">
                                <label class="mb-2" for="absen">Batas Waktu Absensi</label>
                                <div class="input-group mb-3" style="width: 200px">
                                    <input type="text" class="form-control" id="jam" placeholder="Jam">
                                    <span class="input-group-text">:</span>
                                    <input type="text" class="form-control" id="menit" placeholder="Menit">
                                </div>
                            </div>
                            <div class="col">
                                <label class="mb-2" for="absen">Batas Waktu Telat</label>
                                <div class="input-group mb-3" style="width: 200px">
                                    <input type="text" class="form-control" id="jam" placeholder="Jam">
                                    <span class="input-group-text">:</span>
                                    <input type="text" class="form-control" id="menit" placeholder="Menit">
                                </div>
                            </div>
                        </div>
                        <small class="text-danger"><b>Note:</b> Jika sudah melebihi batas waktu telat, maka siswa tidak dapat melakukan absen dan dinyatakan <b>Tidak Hadir</b>.</small>
                    </div>
                    <div class="modal-footer flex-column border-top-0">
                        <button type="button" class="btn btn-primary w-100 mx-0" data-bs-dismiss="modal" id="addButton">Add</button>
                    </div>
                </div>
            </div>
        </div>


@endsection