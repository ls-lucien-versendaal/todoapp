@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif


                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}<span class="float-right"><a href="{{route('task.create')}}">Add new task</a></span></div>

                    <table class="table table-hover">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Task</th>
                            <th scope="col" colspan="2">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(auth()->user()->tasks as $task)
                        <tr>
                            <td class="col">{{$task->description}}</td>
                            <td class="col">
                                <a class="btn btn-primary" href="{{route('task.edit',$task->id)}}">Edit</a>
                            </td>
                            <td class="col">
                                <form action="{{route('task.destroy', $task->id)}}" method="post">
                                    <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                                    @csrf
                                    @method('DELETE')
                                </form></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>




@endsection
