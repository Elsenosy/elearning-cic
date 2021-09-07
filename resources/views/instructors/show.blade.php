@extends('layouts.master')

@section('title')
{{ $pageTitle }}
@endsection

@section('content')
<div class="container">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <strong>{{ __('lang.name') }}: </strong> {{ $item->name }}
                    </div>

                    <div class="col-sm-6">
                        <strong>{{ __('lang.email') }}: </strong> {{ $item->email }}
                    </div>
                    <div class="col-sm-6">
                        <strong>{{ __('lang.phone') }}: </strong> {{ $item->phone }}
                    </div>
                    <div class="col-sm-6">
                        <strong>Created at: </strong> {{ $item->created_at }}
                        <br>
                        <strong>Created at: </strong> {{ $item->created_at->diffForHumans() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection