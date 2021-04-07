@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="card">
                    <div class="card-header">{{ __('Create Task') }}</div>
                    <br>
                    <form class="m-3" method="post" action="{{route('task.store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="description">Description</label>
                            <label class="col-md-10">
                                <input type="text" class="form-control @error('description') is-invalid @enderror"  placeholder="Description" name="description" value="{{old('description')}}">
                            </label>

                        </div>
                        <button type="submit" class="btn btn-success float-right">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
