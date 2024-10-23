@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Tables</a></li>
            <li class="breadcrumb-item active" aria-current="page">Users List</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-lg-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Table with contextual classes</h4>

                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Photo</th>
                                    <th>Phone</th>
                                    <th>Website</th>
                                    <th>Address</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr class="table-info text-dark">
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->username}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        @if(!empty($user->photo))
                                        <img src="{{asset('upload/'.$user->photo)}}" alt=""
                                            style="width:100%; height:100%">
                                        @endif
                                    </td>
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->website}}</td>
                                    <td>{{$user->address}}</td>
                                    <td>
                                        @if($user->role == 'admin')
                                        <span class="badge bg-info">Admin</span>
                                        @elseif($user->role == 'agent')
                                        <span class="badge bg-primary">Agent</span>
                                        @elseif($user->role == 'user')
                                        <span class="badge bg-success">User</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($user->status == 'active')
                                        <span class="badge bg-primary">Active</span>
                                        @else
                                        <span class="badge bg-danger">InActive</span>
                                        @endif
                                    </td>
                                    <td>{{date('d-m-Y',strtotime($user->created_at))}}</td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                   
                    </div>
                    <!-- pagination add -->
                     <div style="padding:20px; float:right;">
                     {!! $users->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                     </div>
                 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection