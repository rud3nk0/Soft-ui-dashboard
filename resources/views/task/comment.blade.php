@extends('layouts.user_type.auth')

@section('content')

    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <div class="d-flex flex-row justify-content-between">
                                <div>
                                    <h5 class="mb-0">Comments</h5>
                                </div>

                                <div>
                                    <button type="button" class="btn bg-gradient-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#modal-form-create">+&nbsp; New Comments</button>
                                    <div class="modal fade" id="modal-form-create" tabindex="-1" role="dialog" aria-labelledby="modal-form-create" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body p-0">
                                                    <div class="card card-plain">
                                                        <div class="card-header pb-0 text-left">
                                                            <h3 class="font-weight-bolder text-info text-gradient">CREATE NEW Status</h3>
                                                        </div>
                                                        <div class="card-body">
                                                            <form action="{{route('comments.store')}}" method="post">
                                                                @csrf

                                                                <label for="description">Description</label>
                                                                <div class="input-group mb-3">
                                                                    <input type="text" name="description" id="description" class="form-control" placeholder="Description" aria-label="Description" aria-describedby="description-addon">
                                                                </div>

                                                                <label for="user_id">User Id</label>
                                                                <div class="input-group mb-3">
                                                                    <input type="text" name="user_id" id="user_id" class="form-control" placeholder="User Id" aria-label="User Id" aria-describedby="user_id-addon">
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
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Author</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Function</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Employed</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-12" >Action</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($comments as $comment)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $comment->user->name }}</h6>
                                                        <p>{{ $comment->user->email }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{$comment->description}}</p>

                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="badge badge-sm bg-gradient-success">Online</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">23/04/18</span>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-end">
                                                    <button type="button" class=" btn btn-link btn-lg mb-0" data-bs-toggle="modal" data-bs-target="#modal-form-edit-{{ $comment->id }}"  data-bs-original-title="Edit status">
                                                        <i class="fas fa-pencil-alt ms-auto text-dark cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit status"></i>
                                                    </button>
                                                    <div class="modal fade" id="modal-form-edit-{{ $comment->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-form-edit" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-body p-0">
                                                                    <div class="card card-plain">
                                                                        <div class="card-header pb-0 text-left">
                                                                            <h3 class="font-weight-bolder text-info text-gradient">EDIT STATUS</h3>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <form action="{{ route('comments.update', ['id' => $comment->id]) }}" method="post">
                                                                                @csrf
                                                                                @method('put')
                                                                                <label for="description">Description</label>
                                                                                <div class="input-group mb-3">
                                                                                    <input type="text" name="description" value="{{ old('description', $comment->description) }}" id="description" class="form-control" placeholder="Description" aria-label="Description" aria-describedby="description-addon">
                                                                                </div>

                                                                                <label for="user_id">User Id</label>
                                                                                <div class="input-group mb-3">
                                                                                    <input type="text" name="user_id" value="{{ old('user_id', $comment->user_id) }}" id="user_id" class="form-control" placeholder="User Id" aria-label="User Id" aria-describedby="user_id-addon">
                                                                                </div>

                                                                                <div class="text-center">
                                                                                    <button type="submit" class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Save Changes</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{--              Delete           --}}
                                                    <form action="{{route('comments.destroy',['id'=>$comment->id])}}" method="post" >
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-link btn-lg mb-0" type="submit" data-bs-toggle="tooltip" data-bs-original-title="Delete status" style="width: 50px">
                                                            <i class="cursor-pointer fas fa-trash text-secondary" ></i>
                                                        </button>
                                                    </form>
                                                </div>
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
    </main>

@endsection
