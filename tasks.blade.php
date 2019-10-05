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
                    <form action="{{ url('task')}}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Task Name -->
                        <div class="form-group">
                            <label for="task-title" class="col-sm-3 control-label">Task</label>

                            <div class="col-sm-6">
                                <input type="text" name="title" id="task-title" class="form-control" value="{{ old('title') }}">
                            </div>
                        </div>
                        <div class="form-group">
                                <label for="task-description" class="col-sm-3 control-label">Description</label>

                                <div class="col-sm-6">
                                    <textarea rows="3"  name="description" id="task-description" class="form-control"> {{ old('description') }}</textarea>
                                </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Add Task
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Current Tasks -->
            @if (count($tasks) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Current Tasks
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th style="text-align: center;">Options</th>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                    <tr>
                                        <td class="table-text"><div>{{ $task->title }}</div></td>
                                        <td class="table-text">{{ $task->description }}</td>
                                        <td class="table-text">{{ $task->status }}</td>

                                        <td style="display:flex;justify-content: space-evenly;">
                                            <a href="{{ url('task/'.$task->id.'/edit') }}" class="btn btn-info">
                                                <i class="fa fa-btn fa-edit"></i>Edit
                                            </a>
                                            <form action="{{ url('task/'.$task->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
