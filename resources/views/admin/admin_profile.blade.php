@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
    @include('message')

    <div class="row profile-body">
        <!-- left wrapper start -->
        <div class="d-none d-md-block col-md-4 col-xl-3 left-wrapper">
            <div class="card rounded">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h6 class="card-title mb-0">About</h6>

                    </div>
                    <p>{{Auth::user()->about}}</p>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Name:</label>
                        <p class="text-muted">{{Auth::user()->name}}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">UserName:</label>
                        <p class="text-muted">{{Auth::user()->username}}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone:</label>
                        <p class="text-muted">{{Auth::user()->phone}}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Joined:</label>
                        <p class="text-muted">{{date('d-m-Y',strtotime (Auth::user()->created_at))}}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Lives:</label>
                        <p class="text-muted">{{Auth::user()->address}}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
                        <p class="text-muted">{{Auth::user()->email}}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Website:</label>
                        <p class="text-muted">{{Auth::user()->website}}</p>
                    </div>

                </div>
            </div>
        </div>
        <!-- left wrapper end -->
        <!-- middle wrapper start -->
        <div class="col-md-8 col-xl-9 middle-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title">Profile Update</h6>

                            <form class="forms-sample" action="{{route('admin.profile.update')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Name" value="{{$user->name}}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Username</label>
                                    <input type="text" name="username" class="form-control" placeholder="Username" value="{{$user->username}}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email address</label>
                                    <input type="email" name="email"  class="form-control" placeholder="Email" value="{{$user->email}}">
                                    <span style="color:red;">{{ $errors->first('email') }}</span>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Phone</label>
                                    <input type="text" name="phone" class="form-control" placeholder="phone" value="{{$user->phone}}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password" >
                                    (Leave blank if you are not changing the password)
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Profile Image</label>
                                    <input type="file" name="photo" class="form-control">
                                    @if(!empty($user->photo))
                                    <img src="{{asset('upload/'.$user->photo)}}" alt="" style="width:10%; height:10%">
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Address</label>
                                    <input type="text" name="address" class="form-control" placeholder="Address" value="{{$user->address}}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Website</label>
                                    <input type="text" name="website" class="form-control" placeholder="Website" value="{{$user->website}}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">About</label>
                                    <textarea name="about" class="form-control" placeholder="About">{{$user->about}}</textarea>

                                </div>

                                <button type="submit" class="btn btn-primary me-2">Submit</button>
                                <button class="btn btn-secondary">Cancel</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- middle wrapper end -->

    </div>

</div>

@endsection