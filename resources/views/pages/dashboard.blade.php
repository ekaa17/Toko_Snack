@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="row justify-content-center">
                <!-- Card -->
                <div class="col-lg-8">

                    <div class="card">
                        <div class="card-body row justify-content-center text-center m-5">
                            <h3 class="m-0" style="font-family: 'Algerian';">WELCOME</h3>
                            <img src="{{ asset('assets/img/logotoko.png') }}" alt="" class="img-fluid w-50 mt-0 m-0">
                            <h4 class="m-0" style="font-family: 'Algerian';">Toko Hadi Mulya Snack</h4>
                        </div>
                    </div>

                </div><!-- End Card -->
            </div>
        </div>
    </div>
    <div class="row">


      </div>
      <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content">
            <div class="row">
                <!-- ============================================================== -->
                <!-- data karyawan -->
                <!-- ============================================================== -->
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="card border-0 shadow-lg rounded bg-gradient-primary text-dark" style="transition: transform 0.3s ease;">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-shape bg-white text-primary rounded-circle me-3">
                                    <i class="fas fa-users fa-3x"></i>
                                </div>
                                <div>
                                    <h5 class="text-dark">Data Karyawan</h5>
                                    <h1 class="mb-1">{{$staff}}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end data karyawan -->
                <!-- ============================================================== -->
    
                <!-- ============================================================== -->
                <!-- data produk -->
                <!-- ============================================================== -->
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="card border-0 shadow-lg rounded bg-gradient-success text-dark" style="transition: transform 0.3s ease;">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-shape bg-white text-success rounded-circle me-3">
                                    <i class="fas fa-box fa-3x"></i>
                                </div>
                                <div>
                                    <h5 class="text-dark">Data Produk</h5>
                                    <h1 class="mb-1">{{$total_Products}}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end data produk -->
                <!-- ============================================================== -->
    
                <!-- ============================================================== -->
                <!-- data customer -->
                <!-- ============================================================== -->
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="card border-0 shadow-lg rounded bg-gradient-info text-dark" style="transition: transform 0.3s ease;">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-shape bg-white text-info rounded-circle me-3">
                                    <i class="fas fa-users fa-3x"></i>
                                </div>
                                <div>
                                    <h5 class="text-dark">Data Customer</h5>
                                    <h1 class="mb-1">{{$total_customer}}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end data customer -->
                <!-- ============================================================== -->
    
                <!-- ============================================================== -->
                <!-- data supplier -->
                <!-- ============================================================== -->
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="card border-0 shadow-lg rounded bg-gradient-warning text-dark" style="transition: transform 0.3s ease;">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-shape bg-white text-warning rounded-circle me-3">
                                    <i class="fas fa-truck fa-3x"></i>
                                </div>
                                <div>
                                    <h5 class="text-dark">Data Supplier</h5>
                                    <h1 class="mb-1">{{$total_supplier}}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end data supplier -->
                <!-- ============================================================== -->
    
                <!-- ============================================================== -->
                <!-- data transaction -->
                <!-- ============================================================== -->
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="card border-0 shadow-lg rounded bg-gradient-danger text-dark" style="transition: transform 0.3s ease;">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-shape bg-white text-danger rounded-circle me-3">
                                    <i class="fas fa-credit-card fa-3x"></i>
                                </div>
                                <div>
                                    <h5 class="text-dark">Data Transaction</h5>
                                    <h1 class="mb-1">{{$total_transaction}}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end data transaction -->
                <!-- ============================================================== -->
    
                <!-- ============================================================== -->
                <!-- data transaction detail -->
                <!-- ============================================================== -->
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="card border-0 shadow-lg rounded bg-gradient-secondary text-dark" style="transition: transform 0.3s ease;">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-shape bg-white text-secondary rounded-circle me-3">
                                    <i class="fas fa-list-alt fa-3x"></i>
                                </div>
                                <div>
                                    <h5 class="text-dark">Data Transaction Detail</h5>
                                    <h1 class="mb-1">{{$total_transactiondetail}}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end data transaction detail -->
                <!-- ============================================================== -->
            </div>
        </div>
    </div>
    
    
    
    </div>
</div>
@endsection