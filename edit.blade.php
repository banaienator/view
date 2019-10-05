@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Task
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Task Form -->
                    <form action="{{ url('task/'.$task->id)}}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <!-- Task Name -->
                        <div class="form-group">
                            <label for="task-title" class="col-sm-3 control-label">Task</label>

                            <div class="col-sm-6">
                                <input type="text" name="title" id="task-title" class="form-control" value="{{ $task->title }}">
                            </div>
                        </div>
                        <div class="form-group">
                                <label for="task-description" class="col-sm-3 control-label">Description</label>

                                <div class="col-sm-6">
                                    <textarea rows="3"  name="description" id="task-description" class="form-control">{{ $task->description }}</textarea>
                                </div>
                        </div>
                        <div class="form-group">
                                <label for="task-status" class="col-sm-3 control-label">Status</label>
                                <div class="col-sm-6">
                                    <select name="status" id="task-status" class="form-control">
                                            @foreach (['Active', 'Done', 'Deleted'] as $status)

                                            @if ($status === $task->status)
                                                <option value="{{ $status }}" selected>{{ $status }}</option>
                                            @else
                                                <option value="{{ $status }}">{{ $status }}</option>
                                            @endif

                                          @endforeach
                                    </select>
                                </div>
                        </div>

                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Edit Task
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Current Tasks -->

        </div>
    </div>
@endsection
