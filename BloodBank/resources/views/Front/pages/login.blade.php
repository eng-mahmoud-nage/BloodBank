@extends('Front.layouts.master')
@section('title')
    Log In
@endsection
@section('content')
    <!-- Navigator Start -->
    <section id="navigator">
        <div class="container">
            <div class="path">
                <div class="path-main" style="color: darkred; display:inline-block;">Home</div>
                <div class="path-directio" style="color: grey; display:inline-block;"> / Login</div>
            </div>

        </div>
    </section>
    <!-- Navigator End -->

    <!-- Login Start -->
    <section id="login">
        <div class="container">

                <img src="imgs/logo.png" alt="">
                <form url="/client-login" method="POST">
                    @csrf

                    <input class="username @error('e_mail') is-invalid @enderror" name="e_mail" type="email" placeholder="E mail" required>
                        @error('e_mail')
                            <div style="width: 70%; height: 20px; margin-left:16%; font-size: x-small" class="small-box text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </div>
                        @enderror

                    <input class="password @error('password') is-invalid @enderror" name="password" type="Password" placeholder="Password" required>
                    @error('password')
                    <div style="width: 70%; height: 20px; margin-left: 16%" class="small-box text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </div>
                    @enderror

                    <input class="check" type="checkbox">Remember me
                    <a href="{{url('/forgetPassword')}}">Forget Password ?</a><br>
                    <div class="reg-group">
                        <button style="background-color: darkred;">Login</button>
                        <a class="btn btn-primary" style="background-color: rgb(51, 58, 65);">Make new account</a>
                    </div>
                </form>
        </div>

    </section>
    <!-- Login End -->
@endsection
@push('scripts')
<script>
    function alert(e) {
        alert(e)
    }
</script>
@endpush
