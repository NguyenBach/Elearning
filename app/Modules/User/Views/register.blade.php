@extends('Core::template.index')

@section('content')
    <section id="register">
        <div class="container">
            <h2>Register</h2>
            <form action="" enctype="multipart/form-data" method="post">
                <div class="form-group">
                    <label for="">Username: </label><input type="text" name="username" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Password: </label><input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">FullName: </label><input type="text" name="fullname" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Email: </label> <input type="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Birthday: </label> <input type="date" name="birthday" class="form-control">
                </div>

                <div class="btn-main">
                    <button type="submit" class="btn btn-success">Ok</button>
                    <button type="button" class="btn btn-danger" onclick="window.location.href='/'">Cancel</button>
                </div>

            </form>
        </div>
    </section>
@stop