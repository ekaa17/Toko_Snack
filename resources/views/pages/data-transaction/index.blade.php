@extends('layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Data Transaction</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                <li class="breadcrumb-item active">Data Transaction</li>
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
                            <h5 class="card-title">Total : {{$total_transaction}} Transaction</h5>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                                <i class="fas fa-plus fa-sm text-white-50"></i> Data Baru
                            </button>
                        </div>

                        <div class="table-responsive">
                            <table class="table datatable" id="transaction-table">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Customer</th>
                                        <th>Date</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transaction as $order)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $order->customer->name }}</td>
                                            <td>{{ $order->date }}</td>
                                            <td>
                                                <!-- Tombol Edit -->
                                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $order->id }}">
                                                    <i class="bi bi-pencil-fill"></i>
                                                </button>
                                                
                                                <!-- Tombol Hapus -->
                                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $order->id }}">
                                                    <i class="bi bi-trash-fill"></i>
                                                </button>
                        
                                                <!-- Modal Konfirmasi Hapus -->
                                                <div class="modal fade" id="deleteModal{{ $order->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $order->id }}" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="deleteModalLabel{{ $order->id }}">Konfirmasi Hapus</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Apakah Anda yakin ingin menghapus produk ini?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                <form action="{{ route('data-transaction.destroy', $order->id) }}" method="POST" class="d-inline">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                        
                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="editModal{{ $order->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel">Edit Order</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('data-transaction.update', $order->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label for="customer_id" class="form-label">Customer</label>
                                                                <select name="customer_id" class="form-control" required>
                                                                 <option value="">Pilih Customer</option>
                                                                    @foreach ($customers as $customer)
                                                                        <option value="{{ $customer->id }}" {{ $customer->id == $order->customer_id ? 'selected' : '' }}>{{ $customer->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="date" class="form-label">Date</label>
                                                                <input type="date" name="date" class="form-control" value="{{ $order->date }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save Changes</button>
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
                    <h5 class="modal-title" id="createModalLabel">Tambah Order Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('data-transaction.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="customer_id" class="form-label">Customer</label>
                            <select name="customer_id" class="form-control" required>
                                <option value="">Pilih Customer</option>
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" name="date" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Order</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
