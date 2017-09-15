@extends('Core::template.1column')
@section('header')
    @include('Core::template.header')
    @stop
@section('content')
    <section id="login">
        <div class="container">
            <form  action="" method="post" enctype="multipart/form-data">
                <h2>Login</h2>
                <div style="color:red"> @if($errors->has('errorlogin')) {{$errors->first('errorlogin')}} @endif</div>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group">
                    <label for="">UserName: </label><input type="text" name="username" value="{{old('username')}}" placeholder="User Name" class="form-control">
                    <div style="color:red">@if($errors->has('username')) {{$errors->first('username')}} @endif</div>
                </div>
                <div class="form-group">
                    <label for="">Password: </label><input type="password" name="password"  placeholder="Password" class="form-control">
                    <div style="color:red">@if($errors->has('password')) {{$errors->first('password')}} @endif</div>

                </div>
                <div class="btn-main">
                    <button type="submit" class="btn btn-success">Login</button>
                    <button type="button" onclick="cancel()" class="btn btn-danger">Cancel</button>
                </div>
            </form>
            <a href="{{route('dangky')}}">Create new account.</a>
        </div>
    </section>

    <script>
        function cancel() {
            window.location.href = '/';
        }
    </script>
@stop