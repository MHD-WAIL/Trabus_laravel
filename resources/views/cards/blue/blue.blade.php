<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>blue card</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body style="background-color: #19b13a52;">

<div class="container">

    <form method="post" action="">
        @csrf
        @foreach($card as $card)
            <div class="mb-3">
                <label for="Card_Name" class="form-label">Card Name</label>
                <input class="form-control" id="Card_Name"
                       value="{{ $card->number }}"
                >
                {{--            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>--}}
                {{--                    <option selected>Open this select menu</option>--}}

                {{--                    <option value="1">{{ $card->number }}</option>--}}


            </div>
            <div class="mb-3">
                <label for="Customer_Id" class="form-label">Customer Id</label>
                <input type="number" class="form-control" id="Customer_Id">
            </div>
            <div class="mb-3">
                <label class="form-check-label" for="Customer_Type">Customer Type</label>
                <input class="form-control" aria-label="Customer_Type" id="Customer_Type"
                       value="{{ $card->customer_type }}" disabled>

            </div>
            <div class="mb-3">
                <label for="Balance" class="form-label">Balance</label>
                <input type="number" class="form-control" id="Balance" value="{{ $card->balance }}" disabled>
            </div>
            <div class="mb-3">
                <label class="form-check-label" for="Vehicle_Type">Vehicle Type</label>
                <input class="form-control" aria-label="Vehicle_Type" id="Vehicle_Type" value="{{ $card->vehicle }}"
                       disabled>

            </div>
            <div class="mb-3">
                <label for="Transfer_number" class="form-label">Transfer number</label>
                <input type="number" class="form-control" id="Transfer_number">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <div class="mb-3">
                <label for="Amount_deducted" class="form-label">Amount deducted </label>
                <input type="number" class="form-control" id="Amount_deducted" disabled>
            </div>
        @endforeach
    </form>


    {{--            <tr>--}}
    {{--                <td>{{ $card->card_type }}</td>--}}
    {{--                <td>{{ $card->number }}</td>--}}
    {{--                <td>{{ $card->balance }}</td>--}}
    {{--                <td>{{ $card->vehicle }}</td>--}}
    {{--                <td>{{ $card->customer_type }}</td>--}}
    {{--            </tr>--}}


</div>
</body>

</html>
