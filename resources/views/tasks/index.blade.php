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
                    <form action="{{ url('task') }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Task Name -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Task</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="task-name" class="form-control" value="{{ old('task') }}">
                            </div>
                        </div>

                        <!-- Task Description -->
                        <div class="form-group">
                            <label for="task-desc" class="col-sm-3 control-label">Description</label>

                            <div class="col-sm-6">
                                <input type="text" name="desc" id="task-desc" class="form-control" value="{{ old('task') }}">
                            </div>
                        </div>

                        <!-- Task List -->
                        <div class="form-group">
                            <label for="task-list" class="col-sm-3 control-label">List</label>

                            <div class="col-sm-6">
                                <input type="radio" name="list" id="task-list" checked=true value=0><label for="TODO"> TODO</label><br>
                                <input type="radio" name="list" id="task-list" value=1><label for="DOING"> DOING</label><br>
                                <input type="radio" name="list" id="task-list" value=2><label for="DONE"> DONE</label>
                            </div>
                        </div>

                        <!-- Add Task Button -->
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

            <!-- TODO Tasks -->
            @if (count($tasks) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        TODO Tasks
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Task</th>
                                <!-- <th>&nbsp;</th> -->
                                <th>Description</th>

                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                    @if ($task->list == 0)
                                        <tr>
                                            <td class="table-text"><div>{{ $task->name }}</div></td>
                                            <td class="table-text"><div>{{ $task->desc }}</div></td>

                                            <td>
                                            <!-- Task Edit Button -->
                                                <form action="{{url('task/' . $task->id)}}" method="GET" style="display: inline-block;">
                                                    {{ csrf_field() }}
                                                    <button type="submit" id="delete-task-{{ $task->id }}" class="btn btn-warning">
                                                        <i class="fa fa-btn fa-edit"></i>Edit
                                                    </button>
                                                </form>

                                            <!-- Task Delete Button -->
                                            
                                                <form action="{{url('task/' . $task->id)}}" method="POST" style="display: inline-block;">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}

                                                    <button type="submit" id="delete-task-{{ $task->id }}" class="btn btn-danger">
                                                        <i class="fa fa-btn fa-trash"></i>Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif

            <!-- DOING Tasks -->
            @if (count($tasks) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        DOING Tasks
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Task</th>
                                <th>Description</th>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                    @if ($task->list == 1)
                                        <tr>
                                            <td class="table-text"><div>{{ $task->name }}</div></td>
                                            <td class="table-text"><div>{{ $task->desc }}</div></td>

                                            <!-- Task Delete Button -->
                                            <td>

                                            <!-- Task Edit Button -->
                                                <form action="{{url('task/' . $task->id)}}" method="GET" style="display: inline-block;">
                                                    {{ csrf_field() }}
                                                    <button type="submit" id="delete-task-{{ $task->id }}" class="btn btn-warning">
                                                        <i class="fa fa-btn fa-edit"></i>Edit
                                                    </button>
                                                </form>
                                                <form action="{{url('task/' . $task->id)}}" method="POST" style="display: inline-block;">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}

                                                    <button type="submit" id="delete-task-{{ $task->id }}" class="btn btn-danger">
                                                        <i class="fa fa-btn fa-trash"></i>Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif

            <!-- DONE Tasks -->
            @if (count($tasks) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        DONE Tasks
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Task</th>
                                <th>Description</th>

                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                    @if ($task->list == 2)
                                        <tr>
                                            <td class="table-text"><div>{{ $task->name }}</div></td>
                                            <td class="table-text"><div>{{ $task->desc }}</div></td>

                                            <!-- Task Delete Button -->
                                            <td>

                                            <!-- Task Edit Button -->
                                                <form action="{{url('task/' . $task->id)}}" method="GET" style="display: inline-block;">
                                                    {{ csrf_field() }}
                                                    <button type="submit" id="delete-task-{{ $task->id }}" class="btn btn-warning">
                                                        <i class="fa fa-btn fa-edit"></i>Edit
                                                    </button>
                                                </form>
                                                <form action="{{url('task/' . $task->id)}}" method="POST" style="display: inline-block;">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}

                                                    <button type="submit" id="delete-task-{{ $task->id }}" class="btn btn-danger">
                                                        <i class="fa fa-btn fa-trash"></i>Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
