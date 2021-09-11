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
                <!-- form start -->
                <form action="{{ url('instructors') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">                        
                        @include('instructors.form')
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