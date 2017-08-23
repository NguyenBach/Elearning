@extends('Core::template.index')

@section('content')
    <section>
        <h2>Register</h2>
        <form action="" enctype="multipart/form-data" method="post">
            <label for="">Username: </label><input type="text" name="username"> <br>
            <label for="">Password: </label><input type="password" name="password"><br>
            <label for="">FullName: </label><input type="text" name="fullname"><br>
            <label for="">Email: </label> <input type="email" name="email"><br>
            <label for="">Birthday: </label> <input type="date" name="birthday"> <br>
            <button type="submit">Ok</button>
            <button type="button" onclick="window.location.href='/'">Cancel</button>
        </form>
    </section>
@stop