@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ToDo List</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!----List task----->
                <div class="list-task">
                    @if(count($data)>0)
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                <th>Task Name</th>
                                <th>Action</th>

                                </tr>
                            </thead>

                            @foreach($data as $datas)
                                <tbody>
                                <tr>
                                    <td>
                                        @if($datas->completed == 1)
                                            <s>{{ $datas->task_name }}</s>
                                            @else
                                            {{ $datas->task_name }}
                                        @endif
                                    </td>
                                    <td>
                                        @if($datas->completed != 1)
                                            <a href ="{{url('/complete-task/'.$datas->task_id)}}" class="btn btn-primary btn-xs" title="Mark as Completed"><span class="glyphicon glyphicon-ok"></span> Completed</a>
                                            <a href="/edit-task/{{ $datas->task_id }}" class="btn btn-primary btn-xs" title="Edit Task"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                                        @endif

                                        {!! Form::open(['method'=>'DELETE','url' => ['delete-task', $datas->task_id],
                                        'style' => 'display:inline']) !!}
                                        {!! Form::button(' Delete', array('type' => 'submit','class' => 'btn btn-danger btn-xs glyphicon glyphicon-trash',
                                                            'title' => 'Delete Task','onclick'=>'return confirm("Do you want to delete this Task?")'))!!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                </tbody>
                            @endforeach
                            {{ $data->links() }}
                        </table>
                    @endif
                </div>
                <div class="form-group ">
                    <button type="submit" class="btn btn-primary" id="addList">
                        <i class="glyphicon glyphicon-plus-sign"></i> Add
                    </button>
                    {{--<span class="glyphicon glyphicon-ok"></span><input type="submit" class="btn btn-primary" id="addList" value="Add">--}}
                </div>
                <div id="addNew" style="display:none;">
                    {!! Form::open(['url' => '/add-task','autocomplete' => 'off']) !!}
                        <div class="form-group ">
                            {!! Form::text('task_name', null, ['class' => 'form-control ','id'=>'task_name', 'placeholder' => 'Add new task']) !!}
                        </div>
                        <div class="form-group ">
                            {{ Form::submit('Add Task',['class'=>'btn btn-primary']) }}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection
@section('extra-script')
    <script>
        $(document).ready(function(){

            $("#addList").click(function(){
                $("#addNew").slideToggle();
                $("#addList").hide();
            });
        });
    </script>
@endsection
