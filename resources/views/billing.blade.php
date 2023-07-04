@extends('layouts.user_type.auth')

@section('content')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-xl-6 mb-xl-0 mb-4">
                        <div class="card bg-transparent shadow-xl">
                            <div class="overflow-hidden position-relative border-radius-xl" style="background-image: url('../assets/img/curved-images/curved14.jpg');">
                                <span class="mask bg-gradient-dark"></span>
                                <div class="card-body position-relative z-index-1 p-3">
                                    <i class="fas fa-wifi text-white p-2"></i>
                                    <h5 class="text-white mt-4 mb-5 pb-2">4562&nbsp;&nbsp;&nbsp;1122&nbsp;&nbsp;&nbsp;4594&nbsp;&nbsp;&nbsp;7852</h5>
                                    <div class="d-flex">
                                        <div class="d-flex">
                                            <div class="me-4">
                                                <p class="text-white text-sm opacity-8 mb-0">Card Holder</p>
                                                <h6 class="text-white mb-0">Jack Peterson</h6>
                                            </div>
                                            <div>
                                                <p class="text-white text-sm opacity-8 mb-0">Expires</p>
                                                <h6 class="text-white mb-0">11/22</h6>
                                            </div>
                                        </div>
                                        <div class="ms-auto w-20 d-flex align-items-end justify-content-end">
                                            <img class="w-60 mt-2" src="../assets/img/logos/mastercard.png" alt="logo">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header mx-4 p-3 text-center">
                                        <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                                            <i class="fas fa-landmark opacity-10"></i>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0 p-3 text-center">
                                        <h6 class="text-center mb-0">Salary</h6>
                                        <span class="text-xs">Belong Interactive</span>
                                        <hr class="horizontal dark my-3">
                                        <h5 class="mb-0">+$2000</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mt-md-0 mt-4">
                                <div class="card">
                                    <div class="card-header mx-4 p-3 text-center">
                                        <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                                            <i class="fab fa-paypal opacity-10"></i>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0 p-3 text-center">
                                        <h6 class="text-center mb-0">Paypal</h6>
                                        <span class="text-xs">Freelance Payment</span>
                                        <hr class="horizontal dark my-3">
                                        <h5 class="mb-0">$455.00</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-lg-0 mb-4">
                        <div class="card mt-4">
                            <div class="card-header pb-0 p-3">
                                <div class="row">
                                    <div class="col-6 d-flex align-items-center">
                                        <h6 class="mb-0">Payment Method</h6>
                                    </div>
                                    <div class="col-6 text-end">
                                        <a class="btn bg-gradient-dark mb-0" href="javascript:;"  data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New Card</a>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Card</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="{{route('billing.store')}}" method="post">
                                                    <div class="modal-body">
                                                        @csrf
                                                        <label for="number_Card">Number card</label>
                                                        <div class="input-group mb-3">
                                                            <input type="text" name="number_Card" id="number_Card" class="form-control"  placeholder="Number Card" aria-label="number_Card" aria-describedby="number_Card-addon">
                                                        </div>
                                                        <label for="number_Card">Card Holder</label>
                                                        <div class="input-group mb-3">
                                                            <input type="text" name="card_Holder" id="card_Holder" class="form-control"  placeholder="card_Holder" aria-label="card_Holder" aria-describedby="card_Holder-addon">
                                                        </div>
                                                        <label for="number_Card">Expires</label>
                                                        <div class="input-group mb-3">
                                                            <input type="text" name="expires" id="expires" class="form-control"  placeholder="expires" aria-label="expires" aria-describedby="expires-addon">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Create Card</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-3">
                                @foreach($billings as $billing)

                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="card bg-transparent shadow-xl">
                                                <div class="overflow-hidden position-relative border-radius-xl" style="background-image: url('../assets/img/curved-images/curved14.jpg');">
                                                    <span class="mask bg-gradient-dark"></span>
                                                    <div class="card-body position-relative z-index-1 p-3">
                                                        <i class="fas fa-wifi text-white p-2" aria-hidden="true"></i>
                                                        <h5 class="text-white mt-4 mb-5 pb-2">{{$billing->number_Card}}</h5>
                                                        <div class="d-flex">
                                                            <div class="d-flex">
                                                                <div class="me-4">
                                                                    <p class="text-white text-sm opacity-8 mb-0">Card Holder</p>
                                                                    <h6 class="text-white mb-0">{{$billing->card_Holder}}</h6>
                                                                </div>
                                                                <div>
                                                                    <p class="text-white text-sm opacity-8 mb-0">Expires</p>
                                                                    <h6 class="text-white mb-0">{{$billing->expires}}</h6>
                                                                </div>
                                                            </div>
                                                            <div class="ms-auto w-20 d-flex align-items-end justify-content-end">
                                                                <img class="w-60 mt-2" src="../assets/img/logos/mastercard.png" alt="logo">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="action d-flex justify-content-end">
                                                {{--              Edit           --}}
                                                <button type="button" class=" btn btn-link btn-lg mb-0" data-bs-toggle="modal" data-bs-target="#modal-form-edit-{{ $billing->id }}" data-bs-original-title="Edit Card">
                                                    <i class="fas fa-pencil-alt ms-auto text-dark cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Card" style="left: 70px"></i>
                                                </button>
                                                @foreach($billings as $billing)
                                                    <div class="modal fade" id="modal-form-edit-{{ $billing->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-form-edit" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-body p-0">
                                                                    <div class="card card-plain">
                                                                        <div class="card-header pb-0 text-left">
                                                                            <h3 class="font-weight-bolder text-info text-gradient">EDIT CARD</h3>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <form action="{{route('billing.update',['id'=>$billing->id])}}" method="post">
                                                                                @csrf
                                                                                @method('put')
                                                                                <label for="number_Card">Number Card</label>
                                                                                <div class="input-group mb-3">
                                                                                    <input type="text" name="number_Card" value="{{ old('number_Card', $billing->number_Card) }}" id="number_Card" class="form-control" placeholder="Number Card" aria-label="Number Card" aria-describedby="number_Card-addon">
                                                                                </div>

                                                                                <label for="card_Holder">Card Holder</label>
                                                                                <div class="input-group mb-3">
                                                                                    <input type="text" name="card_Holder" value="{{ old('card_Holder', $billing->card_Holder) }}" id="card_Holder" class="form-control" placeholder="Card Holder" aria-label="Card Holder" aria-describedby="card_Holder-addon">
                                                                                </div>

                                                                                <label for="expires">Expires</label>
                                                                                <div class="input-group mb-3">
                                                                                    <input type="text" name="expires" value="{{ old('expires', $billing->expires) }}" id="expires" class="form-control" placeholder="Expires" aria-label="Expires" aria-describedby="expires-addon">
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

                                                {{--              Delete           --}}
                                                <form action="{{route('billing.destroy',['id'=>$billing->id])}}" method="post" >
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-link btn-lg mb-0" type="submit" data-bs-toggle="tooltip" data-bs-original-title="Delete Card" style="width: 50px">
                                                        <i class="cursor-pointer fas fa-trash text-secondary" ></i>
                                                    </button>
                                                </form>
                                            </div>

                                            <hr>

                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card h-100">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-6 d-flex align-items-center">
                                <h6 class="mb-0">Invoices</h6>
                            </div>
                            <div class="col-6 text-end">
                                <button class="btn btn-outline-primary btn-sm mb-0">View All</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3 pb-0">
                        <ul class="list-group">
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark font-weight-bold text-sm">March, 01, 2020</h6>
                                    <span class="text-xs">#MS-415646</span>
                                </div>
                                <div class="d-flex align-items-center text-sm">
                                    $180
                                    <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="fas fa-file-pdf text-lg me-1"></i> PDF</button>
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex flex-column">
                                    <h6 class="text-dark mb-1 font-weight-bold text-sm">February, 10, 2021</h6>
                                    <span class="text-xs">#RV-126749</span>
                                </div>
                                <div class="d-flex align-items-center text-sm">
                                    $250
                                    <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="fas fa-file-pdf text-lg me-1"></i> PDF</button>
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex flex-column">
                                    <h6 class="text-dark mb-1 font-weight-bold text-sm">April, 05, 2020</h6>
                                    <span class="text-xs">#FB-212562</span>
                                </div>
                                <div class="d-flex align-items-center text-sm">
                                    $560
                                    <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="fas fa-file-pdf text-lg me-1"></i> PDF</button>
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex flex-column">
                                    <h6 class="text-dark mb-1 font-weight-bold text-sm">June, 25, 2019</h6>
                                    <span class="text-xs">#QW-103578</span>
                                </div>
                                <div class="d-flex align-items-center text-sm">
                                    $120
                                    <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="fas fa-file-pdf text-lg me-1"></i> PDF</button>
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
                                <div class="d-flex flex-column">
                                    <h6 class="text-dark mb-1 font-weight-bold text-sm">March, 01, 2019</h6>
                                    <span class="text-xs">#AR-803481</span>
                                </div>
                                <div class="d-flex align-items-center text-sm">
                                    $300
                                    <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="fas fa-file-pdf text-lg me-1"></i> PDF</button>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-7 mt-4">
                <div class="card">
                    <div class="card-header pb-0 px-3">
                        <h6 class="mb-0">Billing Information</h6>
                    </div>
                    <div class="card-body pt-4 p-3">
                        <ul class="list-group">
                            <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                <div class="d-flex flex-column">
                                    <h6 class="mb-3 text-sm">Oliver Liam</h6>
                                    <span class="mb-2 text-xs">Company Name: <span class="text-dark font-weight-bold ms-sm-2">Viking Burrito</span></span>
                                    <span class="mb-2 text-xs">Email Address: <span class="text-dark ms-sm-2 font-weight-bold">oliver@burrito.com</span></span>
                                    <span class="text-xs">VAT Number: <span class="text-dark ms-sm-2 font-weight-bold">FRB1235476</span></span>
                                </div>
                                <div class="ms-auto text-end">
                                    <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i class="far fa-trash-alt me-2"></i>Delete</a>
                                    <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex p-4 mb-2 mt-3 bg-gray-100 border-radius-lg">
                                <div class="d-flex flex-column">
                                    <h6 class="mb-3 text-sm">Lucas Harper</h6>
                                    <span class="mb-2 text-xs">Company Name: <span class="text-dark font-weight-bold ms-sm-2">Stone Tech Zone</span></span>
                                    <span class="mb-2 text-xs">Email Address: <span class="text-dark ms-sm-2 font-weight-bold">lucas@stone-tech.com</span></span>
                                    <span class="text-xs">VAT Number: <span class="text-dark ms-sm-2 font-weight-bold">FRB1235476</span></span>
                                </div>
                                <div class="ms-auto text-end">
                                    <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i class="far fa-trash-alt me-2"></i>Delete</a>
                                    <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex p-4 mb-2 mt-3 bg-gray-100 border-radius-lg">
                                <div class="d-flex flex-column">
                                    <h6 class="mb-3 text-sm">Ethan James</h6>
                                    <span class="mb-2 text-xs">Company Name: <span class="text-dark font-weight-bold ms-sm-2">Fiber Notion</span></span>
                                    <span class="mb-2 text-xs">Email Address: <span class="text-dark ms-sm-2 font-weight-bold">ethan@fiber.com</span></span>
                                    <span class="text-xs">VAT Number: <span class="text-dark ms-sm-2 font-weight-bold">FRB1235476</span></span>
                                </div>
                                <div class="ms-auto text-end">
                                    <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i class="far fa-trash-alt me-2"></i>Delete</a>
                                    <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-5 mt-4">
                <div class="card h-100 mb-4">
                    <div class="card-header pb-0 px-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="mb-0">Your Transaction's</h6>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end align-items-center">
                                <i class="far fa-calendar-alt me-2"></i>
                                <small>23 - 30 March 2020</small>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-4 p-3">
                        <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Newest</h6>
                        <ul class="list-group">
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <button class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-down"></i></button>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Netflix</h6>
                                        <span class="text-xs">27 March 2020, at 12:30 PM</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold">
                                    - $ 2,500
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Apple</h6>
                                        <span class="text-xs">27 March 2020, at 04:30 AM</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                                    + $ 2,000
                                </div>
                            </li>
                        </ul>
                        <h6 class="text-uppercase text-body text-xs font-weight-bolder my-3">Yesterday</h6>
                        <ul class="list-group">
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Stripe</h6>
                                        <span class="text-xs">26 March 2020, at 13:45 PM</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                                    + $ 750
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">HubSpot</h6>
                                        <span class="text-xs">26 March 2020, at 12:30 PM</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                                    + $ 1,000
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Creative Tim</h6>
                                        <span class="text-xs">26 March 2020, at 08:30 AM</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                                    + $ 2,500
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <button class="btn btn-icon-only btn-rounded btn-outline-dark mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-exclamation"></i></button>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Webflow</h6>
                                        <span class="text-xs">26 March 2020, at 05:00 AM</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center text-dark text-sm font-weight-bold">
                                    Pending
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

