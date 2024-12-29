@extends('layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Data Produk</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                <li class="breadcrumb-item active">Data Produk</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-12">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle me-1"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @elseif (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-octagon me-1"></i>
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body pt-3">
                        <div class="d-flex align-items-center justify-content-between m-3">
                            <h5 class="card-title">Total : {{$total_supplier}} Supplier</h5>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                                <i class="fas fa-plus fa-sm text-white-50"></i> Data Baru
                            </button>
                        </div>

                        <div class="table-responsive">
                            <table class="table datatable" id="supplier-table">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Kontak</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($suppliers as $supplier)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $supplier->name }}</td>
                                            <td>{{ $supplier->contact }}</td>
                                            <td>
                                                <a href="{{ route('data-supplier.edit', $supplier->id) }}" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $supplier->id }}">Edit</a>
                        
                                                <form action="{{ route('data-supplier.destroy', $supplier->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                        
                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="editModal{{ $supplier->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel">Edit Supplier</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('data-supplier.update', $supplier->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Nama</label>
                                                                <input type="text" class="form-control" name="name" value="{{ $supplier->name }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="contact" class="form-label">Kontak</label>
                                                                <input type="text" class="form-control" name="contact" value="{{ $supplier->contact }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Create -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Tambah Supplier Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('data-supplier.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="contact" class="form-label">Kontak</label>
                            <input type="text" class="form-control" name="contact" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Tambah Supplier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
