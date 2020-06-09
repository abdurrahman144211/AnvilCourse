@extends('administration.layouts.app')

@section('title')
    Add new user
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('administration.users.store') }}" method="POST" class="card">
                    @csrf
                    <div class="card-header">
                        <h3 class="card-title">Insert a new {{ presentation('name') }} User</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="John Doe" value="{{ old('name') }}">
                                    @error('name')
                                    <label class="text-sm-center text-red">{{$message}}</label>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="example@example.com" value="{{ old('email') }}">
                                    @error('email')
                                    <label class="text-sm-center text-red">{{$message}}</label>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="**********">
                                    @error('password')
                                    <label class="text-sm-center text-red">{{$message}}</label>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label class="form-label">Role</label>
                                    <select class="form-control @error('role') is-invalid @enderror" name="role">
                                        <option value="">Select User Role</option>
                                        @foreach(appRoles() as $role => $value)
                                            <option value="{{$role}}" @if(old('role') == $role) selected @endif>{{ $value }}</option>
                                        @endforeach
                                    </select>
                                    @error('role')
                                    <label class="text-sm-center text-red">{{$message}}</label>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <div class="d-flex">
                            <button type="submit" class="btn btn-primary ml-auto">Insert User</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
