@extends('Core::template.index')
@section('content')
    <div class="login">
        <form  action="" method="post" enctype="multipart/form-data">
            <h2>Login</h2>
            <label for="">UserName: </label><input type="text" name="username" placeholder="User Name"><br>
            <label for="">Password: </label><input type="password" name="password" placeholder="Password"><br>
            <button type="submit">Login</button>
            <button type="button" onclick="cancel()">Cancel</button>
        </form>
    </div>

    <script>
        function cancel() {
            window.location.href = '/';
        }
    </script>
@stop