@extends('layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Data Transaction-Detail</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                <li class="breadcrumb-item active">Data Transaction-Detail</li>
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
                            <h5 class="card-title">Total : {{$total_transactiondetail}} TransactionDetail</h5>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                                <i class="fas fa-plus fa-sm text-white-50"></i> Data Baru
                            </button>
                        </div>

                        <div class="table-responsive">
                            <table class="table datatable" id="TransactionDetail-table">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Transaction</th>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Total Price</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($details as $detail)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $detail->transaction->customer->name }}</td>
                                            <td>{{ $detail->product->name }}</td>
                                            <td>{{ $detail->quantity }}</td>
                                            <td> Rp {{ number_format($detail->total_price * 1000, 0, ',', '.') }} </td>
                                            <td>
                                                <!-- Tombol Edit -->
                                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $detail->id }}">
                                                    <i class="bi bi-pencil-fill"></i>
                                                </button>
                                                
                                                <!-- Tombol Hapus -->
                                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $detail->id }}">
                                                    <i class="bi bi-trash-fill"></i>
                                                </button>
                        
                                                <!-- Modal Konfirmasi Hapus -->
                                                <div class="modal fade" id="deleteModal{{ $detail->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $detail->id }}" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="deleteModalLabel{{ $detail->id }}">Konfirmasi Hapus</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Apakah Anda yakin ingin menghapus produk ini?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                <form action="{{ route('data-transaction.destroy', $detail->id) }}" method="POST" class="d-inline">
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
                                        <div class="modal fade" id="editModal{{ $detail->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel">Edit Detail</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('data-transactiondetail.update', $detail->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label for="transaction_id" class="form-label">Transaction</label>
                                                                <select name="transaction_id" class="form-control" required>
                                                                    <option value="">Pilih Transaction</option>
                                                                    @foreach ($transactions as $transaction)
                                                                        <option value="{{ $transaction->id }}" {{ $transaction->customer->name == $detail->transaction_id ? 'selected' : '' }}>{{ $transaction->customer->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="product_id" class="form-label">Product</label>
                                                                <select name="product_id" class="form-control" required>
                                                                    @foreach ($products as $product)
                                                                        <option value="{{ $product->id }}" {{ $product->id == $detail->product_id ? 'selected' : '' }}>{{ $product->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="quantity" class="form-label">Quantity</label>
                                                                <input type="number" name="quantity" class="form-control" value="{{ $detail->quantity }}" required>
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
                    <h5 class="modal-title" id="createModalLabel">Tambah Detail Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('data-transactiondetail.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="transaction_id" class="form-label">Transaction</label>
                            <select name="transaction_id" class="form-control" required>
                                <option value="">Pilih Transaction</option>
                                @foreach ($transactions as $transaction)
                                    <option value="{{ $transaction->id }}">{{ $transaction->customer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="product_id" class="form-label">Product</label>
                            <select name="product_id" class="form-control" required>
                                <option value="">Pilih Product</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3"> <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" name="quantity" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
