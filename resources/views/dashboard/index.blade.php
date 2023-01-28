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
    <div class="row justify-content-start" id="container">
        <div class="col mb-3" id="absensi">
            <div class="card">
                <div class="card-header">
                    Kamera Scanner
                </div>
                <div class="card-body">
                    <video id="preview"></video>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-end float-end float-end">
                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-gear-fill"></i> Pengaturan</button>
                    </div>
                    <a>Absensi Siswa</a> 
                </div>
                <div class="card-body">
                    <div>
                        <div class="alert alert-warning" role="alert" id="alert-absensi">

                        </div>
                    </div>
                    <div id="data" class="overflow-auto" style="height:330px">
                        <div class="card mb-3">
                            <div class="card-header border-0">
                             <div class="d-flex justify-content-end float-end">
                                 <small class="pt-1">12:30</small>
                             </div>
                             <a></a> 1.&nbsp;&nbsp;&nbsp; 121314 | Gerin Sena Pratama | 12 IPA 2 </a>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-header border-0">
                             <div class="d-flex justify-content-end float-end">
                                 <small class="pt-1">12:30</small>
                             </div>
                             <a></a> 1.&nbsp;&nbsp;&nbsp; 121314 | Gerin Sena Pratama | 12 IPA 2 </a>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-header border-0">
                             <div class="d-flex justify-content-end float-end">
                                 <small class="pt-1">12:30</small>
                             </div>
                             <a></a> 1.&nbsp;&nbsp;&nbsp; 121314 | Gerin Sena Pratama | 12 IPA 2 </a>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-header border-0">
                             <div class="d-flex justify-content-end float-end">
                                 <small class="pt-1">12:30</small>
                             </div>
                             <a></a> 1.&nbsp;&nbsp;&nbsp; 121314 | Gerin Sena Pratama | 12 IPA 2 </a>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-header border-0">
                             <div class="d-flex justify-content-end float-end">
                                 <small class="pt-1">12:30</small>
                             </div>
                             <a></a> 1.&nbsp;&nbsp;&nbsp; 121314 | Gerin Sena Pratama | 12 IPA 2 </a>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-header border-0">
                             <div class="d-flex justify-content-end float-end">
                                 <small class="pt-1">12:30</small>
                             </div>
                             <a></a> 1.&nbsp;&nbsp;&nbsp; 121314 | Gerin Sena Pratama | 12 IPA 2 </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modal -->
    <div class="modal fade" id="modalShort" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div id="modalbox" class="modal-content rounded-4 shadow">
            <div class="modal-header border-bottom-0">
                <h1 id="modal-title" class="modal-title fs-5">Pemberitahuan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="modal-body" class="modal-body py-0">
                <div class="alert alert-warning" role="alert" id="pesan">
                    Maaf, waktu absen sudah habis. Anda tidak dapat melakukan absensi lagi.
                  </div>
            </div>
            <div class="modal-footer flex-column border-top-0">
                <button type="button" class="btn btn-light w-100 mx-0" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
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