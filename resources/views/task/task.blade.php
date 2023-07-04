
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
                                    <h5 class="mb-0">Tasks</h5>
                                </div>

                                <div>
                                    <button type="button" class="btn bg-gradient-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#modal-form-create">+&nbsp; New Task</button>
                                    <div class="modal fade" id="modal-form-create" tabindex="-1" role="dialog" aria-labelledby="modal-form-create" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body p-0">
                                                    <div class="card card-plain">
                                                        <div class="card-header pb-0 text-left">
                                                            <h3 class="font-weight-bolder text-info text-gradient">CREATE NEW Task</h3>
                                                        </div>
                                                        <div class="card-body">
                                                            <form action="{{route('tables.store')}}" method="post">
                                                                @csrf

                                                                <label for="name">Name</label>
                                                                <div class="input-group mb-3">
                                                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="name-addon">
                                                                </div>

                                                                <label for="user_id">User Id</label>
                                                                <div class="input-group mb-3">
                                                                    <input type="text" name="user_id" id="user_id" class="form-control" placeholder="User Id" aria-label="User Id" aria-describedby="user_id-addon">
                                                                </div>

                                                                <label for="status_id">Status Id</label>
                                                                <div class="input-group mb-3">
                                                                    <input type="text" name="status_id" id="status_id" class="form-control" placeholder="Status Id" aria-label="Status Id" aria-describedby="status_id-addon">
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
                                <table class="table align-items-center justify-content-center mb-0">
                                    <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Project</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Who Work</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Comment</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Completion</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($tasks as $task)
                                        <tr>
                                            <td>
                                                <strong>
                                                    {{ $task->name }}
                                                </strong>
                                            </td>
                                            <td>
                                                <ul>
                                                    @foreach($task->comments as $comment)
                                                        <li>{{ $comment->user->name }}</li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td>
                                                @foreach($task->comments as $comment)
                                                    <li> {{ $comment->description}}</li>
                                                @endforeach
                                            </td>
                                            <td>
                                                <p>{{ $task->status->name }}</p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <span class="me-2 text-xs font-weight-bold">{{$task->status->progress}} %</span>
                                                </div>
                                            </td>
                                            <td>
                                                <button type="button" class=" btn btn-link btn-lg mb-0" data-bs-toggle="modal" data-bs-target="#modal-form-edit-{{ $task->id }}"  data-bs-original-title="Edit status">
                                                    <i class="fas fa-pencil-alt ms-auto text-dark cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit status"></i>
                                                </button>
                                                <div class="modal fade" id="modal-form-edit-{{ $task->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-form-edit" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body p-0">
                                                                <div class="card card-plain">
                                                                    <div class="card-header pb-0 text-left">
                                                                        <h3 class="font-weight-bolder text-info text-gradient">EDIT STATUS</h3>
                                                                    </div>

                                                                    <div class="card-body">
                                                                        <form action="{{ route('tables.update', ['id' => $task->id]) }}" method="post">
                                                                            @csrf
                                                                            @method('put')

                                                                            <label for="name">Name</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" name="name" value="{{ old('name', $task->name) }}" id="name" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="name-addon">
                                                                            </div>

{{--                                                                                <label for="description">Description</label>--}}
{{--                                                                                <div class="input-group mb-3">--}}
{{--                                                                                    <input type="text" name="description" value="{{ $comment->description}}" id="description" class="form-control" placeholder="Description" aria-label="Description" aria-describedby="description-addon">--}}
{{--                                                                                </div>--}}

                                                                            <label for="user_id">User Id</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" name="user_id" value="{{ old('user_id', $task->user_id) }}" id="user_id" class="form-control" placeholder="User Id" aria-label="User Id" aria-describedby="user_id-addon">
                                                                            </div>

                                                                            <label for="status_id">Status Id</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" name="status_id" value="{{ old('status_id', $task->status_id) }}" id="status_id" class="form-control" placeholder="Status Id" aria-label="Status Id" aria-describedby="status_id-addon">
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
                                                {{--              Delete           --}}
                                                <form action="{{route('tables.destroy',['id'=>$task->id])}}" method="post" >
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-link btn-lg mb-0" type="submit" data-bs-toggle="tooltip" data-bs-original-title="Delete status" style="width: 50px">
                                                        <i class="cursor-pointer fas fa-trash text-secondary" ></i>
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
    </main>

@endsection
