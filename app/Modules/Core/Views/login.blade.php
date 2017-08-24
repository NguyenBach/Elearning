@extends('Core::template.index')
@section('content')
    <section id="login">
        <div class="container">
            <form  action="" method="post" enctype="multipart/form-data">
                <h2>Login</h2>
                <div class="form-group">
                    <label for="">UserName: </label><input type="text" name="username" placeholder="User Name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Password: </label><input type="password" name="password" placeholder="Password" class="form-control">
                </div>
                <div class="btn-main">
                    <button type="submit" class="btn btn-success">Login</button>
                    <button type="button" onclick="cancel()" class="btn btn-danger">Cancel</button>
                </div>
            </form>
            <a href="{{route('user::dangky')}}">Create new account.</a>
        </div>
    </section>

    <script>
        function cancel() {
            window.location.href = '/';
        }
    </script>
@stop