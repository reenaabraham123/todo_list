@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Task</div>
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
                        <div class="list-task">
                            <div id="addNew">
                                {!! Form::open(['url' => ['update-task',$list[0]->task_id]]) !!}
                                <div class="form-group ">
                                    <input type="hidden" name="task_id" value="{{$list[0]->task_id}}">
                                    {!! Form::text('task_name', $list[0]->task_name, ['class' => 'form-control ','id'=>'task_name']) !!}
                                </div>
                                <div class="form-group ">
                                    {{ Form::submit('Edit Task',['class'=>'btn btn-primary']) }}
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
