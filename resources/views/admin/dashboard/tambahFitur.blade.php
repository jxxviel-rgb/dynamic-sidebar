@extends('layouts.main')

@section('content')
    <div class="main-content">
        <section class="section">

            <div class="section-body">

                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Tambah Sidebar</h4>
                            </div>
                            <div class="card-body">

                                <div class="form-group">
                                    @if (Session::has('success'))
                                        <div class="alert alert-success text-center">
                                            {{ Session::get('success') }}
                                        </div>
                                    @endif
                                    <form action="/tambah-fitur/store" method="post">
                                        @csrf
                                        <label>Nama Sidebar</label>
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <button class="mt-3 btn btn-primary" type="submit">Submit</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
@endsection
