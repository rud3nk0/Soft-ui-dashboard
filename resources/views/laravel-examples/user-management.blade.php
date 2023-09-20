@extends('layouts.user_type.auth')

@section('content')

<div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Web 22</h5>
                        </div>

                        <div>
                            <button type="button" class="btn bg-gradient-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#modal-form-create">+&nbsp; New User</button>
                            <div class="modal fade" id="modal-form-create" tabindex="-1" role="dialog" aria-labelledby="modal-form-create" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body p-0">
                                            <div class="card card-plain">
                                                <div class="card-header pb-0 text-left">
                                                    <h3 class="font-weight-bolder text-info text-gradient">CREATE NEW USER</h3>
                                                </div>
                                                <div class="card-body">
                                                    <form action="{{route('user-management.store')}}" method="post" enctype="multipart/form-data">
                                                        @csrf

                                                        <label for="name">Name</label>
                                                        <div class="input-group mb-3">
                                                            <input type="text" name="name" id="name" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="name-addon">
                                                        </div>

                                                        <label for="email">Email</label>
                                                        <div class="input-group mb-3">
                                                            <input type="email" name="email" id="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email-addon">
                                                        </div>

                                                        <label for="role">Role</label>
                                                        <div class="input-group mb-3">
                                                            <input type="text" name="role" id="role" class="form-control" placeholder="Role" aria-label="Role" aria-describedby="role-addon">
                                                        </div>

                                                        <label for="password">Password</label>
                                                        <div class="input-group mb-3">
                                                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                                                        </div>

                                                        <label for="phone">Phone</label>
                                                        <div class="input-group mb-3">
                                                            <input type="tel" name="phone" id="phone" class="form-control" placeholder="Phone" aria-label="Phone" aria-describedby="phone-addon">
                                                        </div>

                                                        <label for="location">Location</label>
                                                        <div class="input-group mb-3">
                                                            <input type="text" name="location" id="location" class="form-control" placeholder="Location" aria-label="Location" aria-describedby="location-addon">
                                                        </div>

                                                        <label for="image">Photo</label>
                                                        <div class="input-group mb-3">
                                                            <input type="file" name="image" id="image" class="form-control" placeholder="Image" aria-label="Image" aria-describedby="image-addon">
                                                        </div>

                                                        <div class="text-center">
                                                            <button type="submit" class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Create</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ID
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Photo
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Name
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Email
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        role
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Creation Date
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">{{ $user->id }}</p>
                                    </td>
                                    <td>
                                        <div>
                                            <img src="{{ asset('images/' . $user->image) }}" class="avatar avatar-sm me-3">
                                        </div>
                                    </td>
                                    <td class="text-center">
										<a href="{{ route('user-view', ['id' => $user->id]) }}" class="text-xs font-weight-bold">{{ $user->name }}</a>
									</td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $user->email }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $user->role}}</p>
                                    </td>
                                    <td class="text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{ $user->created_at }}</span>
                                    </td>
                                    <td class="d-flex-column">
                                        <div class="d-flex justify-content-end">
                                            <button type="button" class="btn btn-link btn-lg mb-0" data-bs-toggle="modal" data-bs-target="#modal-form-edit-{{ $user->id }}" data-bs-original-title="Edit user"><i class="fas fa-user-edit text-secondary"></i></button>
                                            @foreach($users as $user)
												<div class="modal fade" id="modal-form-edit-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-form-edit" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body p-0">
                                                            <div class="card card-plain">
                                                                <div class="card-header pb-0 text-left">
                                                                    <h3 class="font-weight-bolder text-info text-gradient">EDIT USER</h3>
                                                                </div>
                                                                <div class="card-body">
                                                                    <form action="{{route('user-management.update',['id'=>$user->id])}}" method="post" enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('put')
                                                                        <label for="name">Name</label>
                                                                        <div class="input-group mb-3">
                                                                            <input type="text" name="name" value="{{ old('name', $user->name) }}" id="name" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="name-addon">
                                                                        </div>

                                                                        <label for="email">Email</label>
                                                                        <div class="input-group mb-3">
                                                                            <input type="email" name="email" value="{{ old('email', $user->email) }}" id="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email-addon">
                                                                        </div>

                                                                        <label for="role">Role</label>
                                                                        <div class="input-group mb-3">
                                                                            <input type="text" name="role" value="{{ old('role', $user->role) }}" id="role" class="form-control" placeholder="Role" aria-label="Role" aria-describedby="role-addon">
                                                                        </div>

                                                                        <label for="password">Password</label>
                                                                        <div class="input-group mb-3">
                                                                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                                                                        </div>

                                                                        <label for="phone">Phone</label>
                                                                        <div class="input-group mb-3">
                                                                            <input type="tel" name="phone" value="{{ old('phone', $user->phone) }}" id="phone" class="form-control" placeholder="Phone" aria-label="Phone" aria-describedby="phone-addon">
                                                                        </div>

                                                                        <label for="location">Location</label>
                                                                        <div class="input-group mb-3">
                                                                            <input type="text" name="location" value="{{ old('location', $user->location) }}" id="location" class="form-control" placeholder="Location" aria-label="Location" aria-describedby="location-addon">
                                                                        </div>

                                                                        <label for="image">Photo</label>
                                                                        <div class="input-group mb-3">
                                                                            <input type="file" name="image" value="{{ old('image', $user->image) }}" id="image" class="form-control" placeholder="Image" aria-label="image" aria-describedby="image-addon">
                                                                        </div>

                                                                        <div class="text-center">
                                                                            <button type="submit" class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Save</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
											@endforeach
                                        </div>

                                        <form action="{{route('user-management.destroy',['id'=>$user->id])}}" method="post" class="d-flex justify-content-end m-1">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-link btn-lg mb-0" type="submit" data-bs-toggle="tooltip" data-bs-original-title="Delete user">
                                                    <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

