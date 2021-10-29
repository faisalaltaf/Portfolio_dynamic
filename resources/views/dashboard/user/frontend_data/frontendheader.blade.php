@extends('dashboard.user.layout.main')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ __('Frontend Setup Header') }}</h5>
                </div>
                <div  id="error_id" class="p-3 mb-2 bg-danger text-white">
                                
                               
                                </div>
                <form enctype="multipart/form-data"  id="form_header_data">
                    <div class="card-body">
                            @csrf
                           

                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label>{{ __('Header Log Text') }}</label>
                                <input type="text" name="header_logo_text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Header Log') }}" value="">
                               
                            </div>
                           
                          
                            <div class="py-2">
                            <label class="px-2">{{ __('Logo Image ') }}</label>
                                <input type="file" name="logo_file" id="logo_file">
                                <label class="px-2">{{ __('header image ') }}</label>
                                <input type="file" name="file_header" placeholder="Choose File" id="file_header">
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                <label>{{ __('Header Title') }}</label>
                                <input type="text" name="header_title" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Header Title') }}" value="">
                              
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                <label>{{ __('Your Designation Developer etc') }}</label>
                                <input type="text" name="designation_developer" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Your Designation Developer etc') }}" value="">
                              
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                <label>{{ __('Brand Right side') }}</label>
                                <input type="text" name="brand_right" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Brand Right side') }}" value="">
                                <!-- {{ old('email', auth()->user()->email) }} -->
                            </div>
                            
                    </div>
                    <div class="card-footer">
                        <button type="submit" id="header_submit" class="btn btn-fill btn-primary">{{ __('Save and Edit') }}</button>
                    </div>
                </form>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ __('Portfolio') }}</h5>
                </div>
           
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-user">
                <div class="card-body">
                    <p class="card-text">
                        <div class="author">
                            <div class="block block-one"></div>
                            <div class="block block-two"></div>
                            <div class="block block-three"></div>
                            <div class="block block-four"></div>
                         
                        </div>
                    </p>
                    <div class="card-description">
                        {{ __('Example Header ') }}
                        <img src="{{ asset('/assets/Screenshot (375).png')}}"
                    </div>
                </div>
                <div class="card-footer">
                    <div class="button-container">
                        <button class="btn btn-icon btn-round btn-facebook">
                            <i class="fab fa-facebook"></i>
                        </button>
                        <button class="btn btn-icon btn-round btn-twitter">
                            <i class="fab fa-twitter"></i>
                        </button>
                        <button class="btn btn-icon btn-round btn-google">
                            <i class="fab fa-google-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection