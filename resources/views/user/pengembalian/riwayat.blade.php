@extends('layouts.master')
@section('content')
<div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>Pengembalian</h3>

        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
        </div>
      </div>
    </div>
    <section class="section">
      <div class="card">
        <div class="card-body">
          <table class="table table-striped" id="table1">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Anggota</th>
                <th>Judul Buku</th>
                <th>Tanggal Pengembalian</th>
                <th>Kondisi Buku Saat Dikembalikan</th>
                <th>Denda</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($pengembalian as $p)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <th>{{ Auth::user()->fullname }}</th>
                    <th>{{ $p->buku->judul }}</th>
                    <th>{{ $p->tanggal_pengembalian }}</th>
                    <th>{{ $p->kondisi_buku_saat_dikembalikan }}</th>
                    <th>{{ $p->denda }}</th>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </div>

@endsection
