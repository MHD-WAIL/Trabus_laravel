@extends('layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 class="text-uppercase">istanbul card transaction</h2>
            </div>

        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ url('ist-withdraw')}}" method="post" class="mt-3">
        @csrf


        <div class="form-group row">
            <label class="form-check-label" for="Card_Name" class="form-label">Card Name</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" id="card_number" name="card_number" value="{{ $card->number }} " readonly
                       placeholder="">
            </div>
        </div>

        {{--        <div class="form-group row">--}}
        {{--            <label for="Customer_Id" class="form-label">Customer Id</label>--}}
        {{--            <div class="col-sm-12 col-md-10">--}}
        {{--                <input type="number" class="form-control" id="Customer_Id" name="customer_id"--}}
        {{--                       placeholder="">--}}
        {{--            </div>--}}
        {{--        </div>--}}

        <div class="form-group row">
            <label class="form-check-label" for="Customer_Type">Customer Type</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" aria-label="Customer_Type" id="Customer_Type" name="customer_type"
                       value="{{ $card->customer_type }}" readonly
                       placeholder="">
            </div>
        </div>

        <div class="form-group row">
            <label class="form-check-label" for="Balance" class="form-label">Balance</label>
            <div class="col-sm-12 col-md-10">
                <input type="number" class="form-control" id="Balance" name="balance" value="{{ $card->balance }}"
                       readonly
                       placeholder="">
            </div>
        </div>

        <div class="form-group row">
            <label class="form-check-label" for="Vehicle_Type">Vehicle Type</label>
            <div class="col-sm-12 col-md-10">
                <select class="form-select" aria-label="Vehicle_Type" id="Vehicle_Type" name="vehicle_type"
                        value="{{ $card->vehicle }}"
                        placeholder="">
                    <option selected></option>
                    <option>Bus</option>
                    <option>MetroBus</option>

                </select>
            </div>
        </div>

        <div class="form-group row">
            <label class="form-check-label" for="Transfer_number" class="form-label">Stops</label>
            <div class="col-sm-12 col-md-10">
                <input type="number" class="form-control" id="Transfer_number" name="transfer_number"
                       placeholder="">
            </div>
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>


    </form>
@endsection
