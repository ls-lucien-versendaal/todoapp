@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Update Task') }}</div>

                    <form class="m-3" method="post" action="{{route('task.update',$task->id)}}">
                        @csrf
                        <div class="form-group">
                            <label for="description">Description</label>
                            <label class="col-md-10">
                                <input type="text" class="form-control "  placeholder="Description" name="description" value="{{$task->description}}">
                            </label>
                        </div>
                        <button type="submit" class="btn btn-success float-right">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
