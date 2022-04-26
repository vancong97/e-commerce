@extends('client.layout.master')
@section('title', trans('message.signin'))
@section('content')
<div class="container sigin">
    <hr>
    <div class="row" >
        <div class="col-md-12">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <fieldset>
                    <h4 class="text-uppercase text-center">
                        {{ trans('message.signin') }}
                    </h4>
                    </br>
                    <div class="form-group">
                        <label>{{ trans('message.email') }}</label> <span id="color"> *</span>
                        <input type="email" name="email" class="form-control input-lg"
                            value="{{ old('email') }}" placeholder="{{ trans('message.email') }}" required autofocus >
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>{{ trans('message.password') }}</label> <span id="color"> *</span>
                        <input type="password" name="password" class="form-control input-lg" placeholder="{{ trans('message.password') }}" required>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input"
                                {{ old('remember') ? 'checked' : '' }}>
                                {{ trans('message.remember') }}
                        </label>
                    </div>
                    </br>
                    <div>
                        <input type="submit" class="btn btn-lg btn-primary" value="{{ trans('message.signin') }}">
                        <a href="{{ route('password.request') }}">Forgot password</a>
                    </div>
                </fieldset>
            </form>
            <a class="btn btn-link" href="{{ url('login/github') }}">
                <i class="fa fa-github-official" aria-hidden="true"></i> Đăng nhập bằng Github
            </a>
            <a class="btn btn-link" href="{{ url('login/google') }}">
                <i class="fa fa-github-official" aria-hidden="true"></i> Đăng nhập bằng Google
            </a>
        </div>
    </div>
</div>
</br>
@endsection
