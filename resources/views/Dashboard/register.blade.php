@extends('Dashboard.layout.dash-layout')

@section('content')
<div class="row">
    <div class ="cpl-md-6">
        @if($errors->any())
        @foreach($errors->all() as $err)
        <p class="alert alert-danger">{{ $err }}</p>
        @endforeach
        @endif
        <form method ="POST" {{route('register.action')}}">
            @csrf
            <div class="w-50 center border rounded px-5 py-5 mx-auto">
                <h1>Register</h1>
                <div class = "mb-3">
                    <label>Name <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="name" value="{{old('name')}}" />
                </div>
                <div class = "mb-3">
                    <label>Email <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="email" value="{{old('email')}}" />
                </div>
                <div class = "mb-3">
                    <label>Password <span class="text-danger">*</span></label>
                    <input class="form-control" type="password" name="password"  />
                </div>
                <div class = "mb-3">
                    <label>Password Confirmation <span class="text-danger">*</span></label>
                    <input class="form-control" type="password" name="password_confirmation"  />
                </div>
                <div class = "mb-3">
                    <button class="btn btn-warning">Register</button>
                    <a class="btn btn-danger" href="/">Back</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
