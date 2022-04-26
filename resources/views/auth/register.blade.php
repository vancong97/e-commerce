@extends('client.layout.master')
@section('title', trans('message.signup'))
@section('content')
<div class="container-fluid">
    <div class="container sigin">
        <hr>
        <div class="row">
            <div class="col-md-12 ">
                 <form role="form" method="post" action="{{ route('register') }}">
                    @csrf
                    <fieldset>
                        <h4 class="text-uppercase text-center">
                            {{ trans('message.signup') }}
                        </h4>
                        </br>
                        <div class="form-group">
                            <label>{{ trans('message.name') }}</label> <span id="color"> *</span>
                            <input type="text" name="name" class="form-control input-lg"    placeholder="{{ trans('message.name') }}"
                                value="{{ old('name') }}" required autofocus>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>{{ trans('message.email') }}</label> <span id="color"> *</span>
                            <input type="email" name="email" class="form-control input-lg" placeholder="{{ trans('message.email') }}"
                                value="{{ old('email') }}" required>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>{{ trans('message.phone') }}</label> <span id="color"> *</span>
                            <input type="text" name="phone" class="form-control input-lg" placeholder="{{ trans('message.phone') }}"
                                value="{{ old('phone') }}" required>
                            @if ($errors->has('phone'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>{{ trans('message.address') }}</label> <span id="color"> *</span>
                            <input type="text" name="address" class="form-control input-lg" placeholder="{{ trans('message.address') }}"
                                value="{{ old('address') }}" required>
                            @if ($errors->has('address'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>{{ trans('message.password') }}</label> <span id="color"> *</span>
                            <input type="password" name="password" class="form-control input-lg"
                                placeholder="{{ trans('message.password') }}" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>{{ trans('message.confirmpass') }}</label> <span id="color"> *</span>
                            <input type="password" name="password_confirmation"
                                class="form-control input-lg" placeholder="{{ trans('message.confirmpass') }}" required>
                        </div>
                        </br>
                        <div>
                            <input type="submit" class="btn btn-lg btn-primary" value="{{ trans('message.signup') }}">
                        </div>

                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
</br>
@endsection
