@extends('layouts.master')
@section('content')
<div class="mb-3">
    <center>
        <h3>Profil Saya</h3>
    </center>
</div>
<div class="mb-3">
  <center>
    <img src="/img/{{ Auth::user()->foto == null ? 'profile.png' : Auth::user()->foto  }}" class="rounded" style="width: 450px;"
      alt="Avatar" />

  </center>

</div>


<div class="col-md-12 col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Edit Profil Saya</h4>
      </div>
      <div class="card-content">
        <div class="card-body">
          <form class="form form-vertical" action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-body">
              <div class="row">

                <div class="col-12">
                    <div class="form-group">
                      <label>Foto</label>
                      <input
                        type="file"
                        class="form-control"
                        name="foto"
                        />
                    </div>
                  </div>

                <div class="col-12">
                  <div class="form-group">
                    <label
                      >Kode Anggota</label
                    >
                    <input
                      type="text"
                      class="form-control"
                      name="kode"
                      value="{{ Auth::user()->kode }}"
                      readonly
                    />
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <label>NIS</label>
                    <input
                      type="text"
                      class="form-control"
                      name="nis"
                    value="{{ Auth::user()->nis }}"
                      />
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <label for="contact-info-vertical"
                      >Nama Lengkap</label
                    >
                    <input
                      type="text"
                      class="form-control"
                      name="fullname"
                      value="{{ Auth::user()->fullname }}"
                    />
                  </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                      <label for="contact-info-vertical"
                        >Nama Pengguna</label
                      >
                      <input
                        type="text"
                        class="form-control"
                        name="username"
                        value="{{ Auth::user()->username }}"
                      />
                    </div>
                  </div>
                <div class="col-12">
                  <div class="form-group">
                    <label for="password-vertical">Password</label>
                    <input
                      type="password"
                      id="password-vertical"
                      class="form-control"
                      name="password"
                      placeholder="Update Password"
                    />
                  </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                      <label for="contact-info-vertical"
                        >Kelas</label
                      >
                      <input
                        type="text"
                        class="form-control"
                        name="kelas"
                        value="{{ Auth::user()->kelas }}"
                      />
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                        <label
                        for="exampleFormControlTextarea1"
                        class="form-label"
                        > Alamat Lengkap</label
                      >
                      <textarea
                        class="form-control"
                        name="alamat"
                        id="exampleFormControlTextarea1"
                        rows="3"
                      >{{ Auth::user()->alamat }}</textarea>
                      {{-- <input
                        type="text"
                        class="form-control"
                        name="username"
                        value="{{ Auth::user()->alamat }}"
                      /> --}}
                    </div>
                  </div>
                <div class="col-12 d-flex justify-content-start">
                  <button
                    type="submit"
                    class="btn btn-primary me-1 mb-1"
                  >
                    Submit
                  </button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


@endsection
