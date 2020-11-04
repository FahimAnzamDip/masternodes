@extends('layouts.front-layout')

@section('front-page-styles')
    <style>
        .transaction_id:visited {
            color: #434F6C;
        }
        .transaction_id:link {
            color: #FFAC45;
        }
        .transaction_id:active {
            color: #434F6C;
        }
        .transaction_id {
            color: #FFAC45;
        }
    </style>
@endsection

@section('content')
    <!-- ================================
    START BREADCRUMB AREA
================================= -->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content">
                        <div class="breadcrumb-inner">
                            <h2 class="breadcrumb__title">Transactions.</h2>
                            <ul class="breadcrumb__list">
                                <li class="active__list-item"><a href="{{ route('home.page') }}">home</a></li>
                                <li>transactions</li>
                            </ul>
                        </div><!-- end breadcrumb-inner -->
                        <div class="text-outline">transactions</div>
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end hero-area -->
    <!-- ================================
        END BREADCRUMB AREA
    ================================= -->


    <!-- ================================
       START MARKETPRICE AREA
================================= -->
    <section class="marketprice-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="sec-heading text-center">
                        <div class="heading-circle m-x-auto"></div>
                        <p class="sec__meta">check out market depth</p>
                        <h2 class="sec__title">All Transactions</h2>
                    </div>
                    <!-- end sec-heading -->
                </div>
                <!-- end col-lg-12 -->
            </div>
            <!-- end row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="coinprice-table table-responsive">
                        <table class="table table-bordered text-left">
                            <thead>
                            <tr>
                                <th>Date & Time</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Transaction ID</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <p>20/10/2020</p>
                                    </td>
                                    <td>
                                        <p>Lorem Ipsum Dolor</p>
                                    </td>
                                    <td>
                                        <p>Lorem Ipsum Dolor</p>
                                    </td>
                                    <td>
                                        <p>
                                            <a class="transaction_id" target="_blank" href="#1">
                                                SDFKSDFKSssdfkhaDSHFKDFWLEsdfoahpawSDFSDhwfsXsdofhaf
                                            </a>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>20/10/2020</p>
                                    </td>
                                    <td>
                                        <p>Lorem Ipsum Dolor</p>
                                    </td>
                                    <td>
                                        <p>Lorem Ipsum Dolor</p>
                                    </td>
                                    <td>
                                        <p>
                                            <a class="transaction_id" target="_blank" href="#2">
                                                SDFKSDFKSssdfkhaDSHFKDFWLEsdfoahpawSDFSDhwfsXsdofhaf
                                            </a>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>20/10/2020</p>
                                    </td>
                                    <td>
                                        <p>Lorem Ipsum Dolor</p>
                                    </td>
                                    <td>
                                        <p>Lorem Ipsum Dolor</p>
                                    </td>
                                    <td>
                                        <p>
                                            <a class="transaction_id" target="_blank" href="#3">
                                                SDFKSDFKSssdfkhaDSHFKDFWLEsdfoahpawSDFSDhwfsXsdofhaf
                                            </a>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>20/10/2020</p>
                                    </td>
                                    <td>
                                        <p>Lorem Ipsum Dolor</p>
                                    </td>
                                    <td>
                                        <p>Lorem Ipsum Dolor</p>
                                    </td>
                                    <td>
                                        <p>
                                            <a class="transaction_id" target="_blank" href="#4">
                                                SDFKSDFKSssdfkhaDSHFKDFWLEsdfoahpawSDFSDhwfsXsdofhaf
                                            </a>
                                        </p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- end table -->
                </div>
                <!-- end col-lg-12 -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- end marketprice-area -->
    <!-- ================================
       START MARKETPRICE AREA
    ================================= -->
@endsection
