@extends('layouts.back-layout')

@section('main-content')
    <section class="section">
        <div class="section-header">
            <h1>Support</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('home.page') }}">Home</a></div>
                <div class="breadcrumb-item"><a href="{{ route('user.home') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Support</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Send Us A Message</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('messages.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-lg-6 col-sm-6 form-group">
                                        <label for="frist_name">Frist Name <span class="text-danger">*</span></label>
                                        <input class="form-control @error('first_name') is-invalid @enderror" type="text" name="first_name" placeholder="Enter First Name" required>
                                        @error('first_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div><!-- end col-lg-12 -->

                                    <div class="col-lg-6 col-sm-6 form-group">
                                        <label for="last_name">Last Name <span class="text-danger">*</span></label>
                                        <input class="form-control @error('last_name') is-invalid @enderror" type="text" name="last_name" placeholder="Enter Last Name" required>
                                        @error('last_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div><!-- end col-lg-12 -->

                                    <div class="col-lg-6 col-sm-6 form-group">
                                        <label for="email">Email <span class="text-danger">*</span></label>
                                        <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="Enter Your Email" required>
                                        @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div><!-- end col-lg-12 -->

                                    <div class="col-lg-6 col-sm-6 form-group">
                                        <label for="subject">Subject <span class="text-danger">*</span></label>
                                        <select id="subject" name="subject" class="form-control" required @error('subject') is-invalid @enderror>
                                            <option disabled selected>Select Subject</option>
                                            <option value="Technical">Technical</option>
                                            <option value="KYC">KYC</option>
                                            <option value="Transaction">Transaction</option>
                                            <option value="Masternodes">Masternodes</option>
                                            <option value="Others">Others</option>
                                        </select>
                                        @error('subject')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div><!-- end col-lg-12 -->

                                    <div class="col-lg-12 col-sm-12 form-group">
                                        <label for="attachment">Attachment (If Needed)</label>
                                        <input class="form-control" type="file" name="attachment" @error('attachment') is-invalid @enderror>
                                        @error('attachment')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div><!-- end col-lg-12 -->

                                    <div class="col-lg-12 col-sm-12 form-group">
                                        <label for="message">Message <span class="text-danger">*</span></label>
                                        <textarea class="message-control form-control" name="message" placeholder="Write Your Message Here" required @error('message') is-invalid @enderror style="height: 150px;"></textarea>
                                        @error('message')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div><!-- end col-lg-12 -->

                                    <div class="col-lg-12 col-sm-12 col-xs-12 form-group">
                                        <button class="btn btn-primary" type="submit">Send Message</button>
                                    </div><!-- end col-lg-12 -->
                                </div><!-- end row -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
