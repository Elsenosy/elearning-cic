@extends('layouts.master')

@section('title')
{{ __('lang.add_course') }}
@endsection

@section('content')
<h3>{{ __('lang.add_course') }}</h3>
<section class="content">
    <div class="container-fluid">
        <div class="col-sm-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Course data</h3> 
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ url('courses') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <h4>There is an error!</h4>
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="exampleInputEmail1">{{ __('lang.name') }}</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="exampleInputEmail1" placeholder="{{ trans('lang.name') }}" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label>{{ trans('lang.desc') }}</label>
                            <textarea name="desc" rows="10" class="form-control" placeholder="{{ __('lang.desc') }}"></textarea>
                            
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