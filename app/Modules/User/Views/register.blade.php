@extends('Core::template.index')

@section('content')
    <section id="register">
        <div class="container">
            <h2>Register</h2>
            <form action="" enctype="multipart/form-data" method="post">
                <div style="color:red"> @if($errors->has('registererror')) {{$errors->first('registererror')}} @endif</div>
                <div class="form-group">
                    <label for="">Username: </label><input type="text" name="username" class="form-control" value="{{old('username')}}">
                    <div style="color:red"> @if($errors->has('username')) {{$errors->first('username')}} @endif</div>
                </div>
                <div class="form-group">
                    <label for="">Password: </label><input type="password" name="password" class="form-control" >
                    <div style="color:red"> @if($errors->has('password')) {{$errors->first('password')}} @endif</div>
                </div>
                <div class="form-group">
                    <label for="">Repeat password: </label><input type="password" name="repassword" class="form-control">
                    <div style="color:red"> @if($errors->has('repassword')) {{$errors->first('repassword')}} @endif</div>
                </div>
                <div class="form-group">
                    <label for="">FullName: </label><input type="text" name="fullname" class="form-control" value="{{old('fullname')}}">
                    <div style="color:red"> @if($errors->has('fullname')) {{$errors->first('fullname')}} @endif</div>
                </div>
                <div class="form-group">
                    <label for="">Email: </label> <input type="email" name="email" class="form-control" value="{{old('email')}}">
                    <div style="color:red"> @if($errors->has('email')) {{$errors->first('email')}} @endif</div>
                </div>
                <div class="form-group">
                    <label for="">Birthday: </label> <input type="date" name="birthday" class="form-control" value="{{old('birthday')}}">
                    <div style="color:red"> @if($errors->has('birthday')) {{$errors->first('birthday')}} @endif</div>
                </div>

                <div class="btn-main">
                    <button type="submit" class="btn btn-success">Ok</button>
                    <button type="button" class="btn btn-danger" onclick="window.location.href='/'">Cancel</button>
                </div>

            </form>
        </div>
    </section>
@stop