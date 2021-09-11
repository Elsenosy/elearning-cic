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
                        <strong>
                            {{ __('lang.avatar') }}
                            <br>
                            <img src="{{ \Storage::url($item->avatar) }}" width="100" height="100">
                        </strong>
                    </div>
                    <div class="col-sm-6">
                        <strong>Created at: </strong> {{ $item->created_at }}
                        <br>
                        <strong>Created at: </strong> {{ $item->created_at->diffForHumans() }}
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="col-sm-12 mt-5">
                        <h3>Course given by instructor</h3>
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                            Register new course
                        </button>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hovered">
                            <thead>
                                <th>Course ID</th>
                                <th>Course name</th>
                                <th>Price</th>
                            </thead>
                            <tbody>
                                @foreach ($item->courses as $instructorCourse)
                                <tr>
                                    <td>{{ $instructorCourse->course->id }}</td>
                                    <td>{{ $instructorCourse->course->name }}</td>
                                    <td>{{ $instructorCourse->price }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if ($item->courses->isEmpty())
                        <div class="alert alert-danger">No courses found!</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card -->

        <div class="modal fade" id="modal-default" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Default Modal</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form">
                            <form action="{{ route('instructor_courses.store', $item->id) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="">Course</label>
                                    <select class="form-control" name="course_id">
                                        <option>Select a course</option>
                                        @foreach ($courses as $get)
                                            <option value="{{ $get->id }}">{{ $get->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group text-center">
                                    <input type="submit" class="btn btn-success" value="Save">
                                    {{-- <button type="submit" class="btn btn-success">Save</button> --}}
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

    </div>
</div>
@endsection