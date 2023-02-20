@extends('layouts.master')
@section('content')
<div class="page-heading">
  <h3>Dashboard</h3>
</div>

  <div class="mb-3">
    <div class="alert alert-secondary">
      @if (date('H') >= 00 && date('H') <= 12)
          Selamat Pagi,
      @elseif(date('H') >= 12 && date('H') <= 17)
          Selamat Siang,
      @elseif(date('H') >= 17 && date('H') <= 00)
          Selamat Malam,
      @endif
      Selamat Datang <b> {{ Auth::user()->fullname }}</b> di {{ $identitas->nama_app }}
    </div>
  </div>

  <section class="row">
      <div class="col-12 col-lg-12">
          <div class="row">
              <div class="col-4 col-lg-3 col-md-6">
                  <div class="card">
                      <div class="card-body px-4 py-4-5">
                          <div class="row">
                              <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                  <div class="stats-icon blue mb-2">
                                      <i class="iconly-boldShow"></i>
                                  </div>
                              </div>
                              <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                  <h6 class="text-muted font-semibold">Anggota</h6>
                                  {{-- @foreach ($countAnggota as $anggota) --}}

                                  <h6 class="font-extrabold mb-0">{{ $anggota }}</h6>
                                  {{-- @endforeach --}}
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-6 col-lg-3 col-md-6">
                  <div class="card">
                      <div class="card-body px-4 py-4-5">
                          <div class="row">
                              <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                  <div class="stats-icon green mb-2">
                                      <i class="iconly-boldArrow---Up"></i>
                                  </div>
                              </div>
                              <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                  <h6 class="text-muted font-semibold">Buku</h6>
                                  {{-- @foreach ($countBuku as $buku) --}}

                                  <h6 class="font-extrabold mb-0">{{ $buku }}</h6>
                                  {{-- @endforeach --}}
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-6 col-lg-3 col-md-6">
                  <div class="card">
                      <div class="card-body px-4 py-4-5">
                          <div class="row">
                              <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                  <div class="stats-icon red mb-2">
                                      <i class="iconly-boldArrow---Down"></i>
                                  </div>
                              </div>
                              <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                {{-- @foreach ($countPeminjaman as $peminjaman) --}}

                                <h6 class="text-muted font-semibold">Peminjaman</h6>
                                <h6 class="font-extrabold mb-0">{{ $peminjaman }}</h6>
                                {{-- @endforeach --}}
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon red mb-2">
                                    <i class="iconly-boldArrow---Down"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                              {{-- @foreach ($countPengembalian as $pengembalian) --}}

                              <h6 class="text-muted font-semibold">Pengembalian</h6>
                              <h6 class="font-extrabold mb-0">{{ $pengembalian }}</h6>
                              {{-- @endforeach --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

          </div>
      </div>

@endsection
