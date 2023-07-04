
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
                                    <h5 class="mb-0">Statuses</h5>
                                </div>

                                <div>
                                    <button type="button" class="btn bg-gradient-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#modal-form-create">+&nbsp; New Status</button>
                                    <div class="modal fade" id="modal-form-create" tabindex="-1" role="dialog" aria-labelledby="modal-form-create" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body p-0">
                                                    <div class="card card-plain">
                                                        <div class="card-header pb-0 text-left">
                                                            <h3 class="font-weight-bolder text-info text-gradient">CREATE NEW Status</h3>
                                                        </div>
                                                        <div class="card-body">
                                                            <form action="{{route('status.store')}}" method="post">
                                                                @csrf

                                                                <label for="name">Status Name</label>
                                                                <div class="input-group mb-3">
                                                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="name-addon">
                                                                </div>

                                                                <label for="is_active">Is active</label>
                                                                <div class="input-group mb-3">
                                                                    <input type="text" name="is_active" id="is_active" class="form-control" placeholder="Is active" aria-label="is_active" aria-describedby="is_active-addon">
                                                                </div>

                                                                <label for="progress">Progress</label>
                                                                <div class="input-group mb-3">
                                                                    <input type="text" name="progress" id="progress" class="form-control" placeholder="Progress" aria-label="progress" aria-describedby="progress-addon">
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
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-1">Is active</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-1">Progress</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-6">Action</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($statuses as $status)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2">
{{--                                                    <div>--}}
{{--                                                        <img src="../assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm rounded-circle me-2" alt="spotify">--}}
{{--                                                    </div>--}}
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-sm">{{$status->name}}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{$status->is_active}}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{$status->progress}} %</p>
                                            </td>

                                            <td>
                                                <button type="button" class=" btn btn-link btn-lg mb-0" data-bs-toggle="modal" data-bs-target="#modal-form-edit-{{ $status->id }}"  data-bs-original-title="Edit status">
                                                    <i class="fas fa-pencil-alt ms-auto text-dark cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit status"></i>
                                                </button>
                                                <div class="modal fade" id="modal-form-edit-{{ $status->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-form-edit" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body p-0">
                                                                <div class="card card-plain">
                                                                    <div class="card-header pb-0 text-left">
                                                                        <h3 class="font-weight-bolder text-info text-gradient">EDIT STATUS</h3>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <form action="{{ route('status.update', ['id' => $status->id]) }}" method="post">
                                                                            @csrf
                                                                            @method('put')

                                                                            <label for="status">Status name</label>
                                                                            <select name="status" id="status" class="form-control">
                                                                                <option value="Working">Working</option>
                                                                                <option value="Done">Done</option>
                                                                                <option value="Decline">Decline</option>
                                                                            </select>

{{--                                                                            <label for="status"></label>--}}
{{--                                                                            <div class="input-group mb-3">--}}
{{--                                                                                <input type="text" name="name" value="{{ old('name', $status->name) }}" id="name" class="form-control" placeholder="Status name" aria-label="Status name" aria-describedby="number_Card-addon">--}}
{{--                                                                            </div>--}}

                                                                            <label for="is_active">Status is active</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" name="is_active" value="{{ old('is_active', $status->is_active) }}" id="is_active" class="form-control" placeholder="Status is active" aria-label="Status is active" aria-describedby="card_Holder-addon">
                                                                            </div>

                                                                            <label for="progress">Status Progress</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="number" name="progress" value="{{ old('progress', $status->progress) }}" id="progress" class="form-control" placeholder="Status Progress" aria-label="Status Progress" aria-describedby="progress-addon">
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
                                                <form action="{{route('status.destroy',['id'=>$status->id])}}" method="post" >
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
