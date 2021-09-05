@extends('layouts.master')

@section('title')
{{ "Add instructor" }}
@endsection

@section('content')
<h3>Add instructor</h3>
<section class="content">
    <div class="container-fluid">
        <div class="col-sm-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Instructor data</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start --  >
                <form action="{{ url('instructors') }}">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">{{ __('lang.name') }}</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="{{ trans('lang.name') }}" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">{{ trans('lang.email') }}</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="{{ trans('lang.email') }}" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">{{ trans('lang.phone') }}</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="{{ trans('lang.phone') }}" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">{{ __('lang.password') }}</label>
                            <input type="password" class="form-control" id="exampleInputPassword1"
                                placeholder="{{ __('lang.password') }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection