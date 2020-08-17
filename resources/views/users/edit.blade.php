@extends('layouts.app')

@section('content')

<div class="container" style="padding: 0">
    <div class="row">
        <div class="col-md-3">
            <div class="card left-bar">
                <div class="user-bg"></div>
                <div class="user-info">
                    <div class="user-avatar"><img src="{{ $user->avatar }}" alt="" class="avatar-img"></div>
                    <div class="user-name"><span class="username">{{ $user->name }}</span></div>
                </div>
            </div>
        </div>
        <div class="col-md-9">

            <div class="card ">

                <div class="card-body">

                    <form action="{{ route('users.update', $user->id) }}" method="POST" accept-charset="UTF-8"
                        enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        @include('shared._error')


                        <div class="form-group row" style="height: 100px">
                            <label for="" class="avatar-label col-sm-2"></label>
                            <div class="col-sm-6 img-upload">
                                @if($user->avatar)
                                <img class="avatar-img" src="{{ $user->avatar }}" />
                                @endif
                                <div class="upload-drag">
                                    <input type="file" name="avatar" class="upload-input">
                                    <div class="icon-btn"><i class="fa fa-camera" aria-hidden="true"></i></div>
                                </div>
                            </div>


                        </div>


                        <div class="form-group row">
                            <label for="name-field" class="col-sm-2 col-form-label">用户名</label>
                            <input class="form-control col-sm-6" type="text" name="name" id="name-field"
                                value="{{ old('name', $user->name) }}" />
                        </div>
                        <div class="form-group row">
                            <label for="email-field" class="col-sm-2 col-form-label">邮 箱</label>
                            <input class="form-control col-sm-6" type="text" name="email" id="email-field"
                                value="{{ old('email', $user->email) }}" />
                        </div>
                        <div class="form-group row">
                            <label for="introduction-field" class="col-sm-2 col-form-label">个人简介</label>
                            <textarea name="introduction" id="introduction-field" class="form-control col-sm-6"
                                rows="3">{{ old('introduction', $user->introduction) }}</textarea>
                        </div>


                        <div class="form-group row">
                           <div class="col-sm-2"></div>
                            <div class="col-sm-6" style="padding: 0"><button type="submit" class="btn btn-primary">保存</button></div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
