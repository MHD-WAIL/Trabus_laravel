<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>electronic card</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body style="background-color: #19b13a52;">

<div class="container">

    <h2 class="mt-5 mb-5 text-center" style="font-size:40px;font-weight:700;">Welcome To electronic </h2>

    <table>
        <tr>
            <td>Id</td>
            <td>First Name</td>
            <td>Last Name</td>
            <td>City Name</td>
            <td>Email</td>
        </tr>
        @foreach($e_card as $e_card )
            <tr>
                <td>{{ $e_card->card_type }}</td>
                <td>{{ $e_card->number }}</td>
                <td>{{ $e_card->balance }}</td>
                <td>{{ $e_card->vehicle }}</td>
                <td>{{ $e_card->customer_type }}</td>
            </tr>
    @endforeach


</div>
</body>

</html>
