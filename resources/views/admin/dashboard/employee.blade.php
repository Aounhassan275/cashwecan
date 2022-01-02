@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>DASHBOARD | CASH WE CAN</h3>
    </div>
</div>
<div class="row">

    <div class="col-12 col-sm-12 col-xl  d-xxl-flex">

        <div class="card flex-fill">

            <div class="card-body py-4">

                <div class="media">

                    <div class="d-inline-block mt-2 mr-3">

                        <i class="feather-lg text-info" data-feather="dollar-sign"></i>

                    </div>

                    <div class="media-body">

                        <h3 class="mb-2">$ {{number_format(Auth::user()->balance, 2)}}</h3>

                        <div class="mb-0">Available Balance</div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection