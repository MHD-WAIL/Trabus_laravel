<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body style="background-color: #19b13a52;">

<div class="container">

    <h2 class="mt-5 mb-5 text-center" style="font-size:40px;font-weight:700;">Welcome To Our Terabus Application</h2>
    <h3 class="text-center mb-5">Please Select You Card Type To Start </h3>


    <div class="row align-items-center ">
        <a href="{{url('electronic')}}" action="ElectronicCardController"
           class=" text-decoration-none text-muted w-auto p-3">
            <div class="col py-3 "
                 style="background-color: rgb(123 155 255 / 85%);border-radius: 5%;">
                <img src="https://bireysel.istanbulkart.istanbul/static/media/digital_tr.fe090b3a.png"
                     style="width:150px;max-height:250px">
                <span style="font-size:20px;"
                      class="ms-4 fs-4 fw-bolde ">Electrnic Card</span>
            </div>
        </a>
        <a href="{{url('blue')}}" action="BlueCardController" class=" text-decoration-none text-muted w-auto p-3">

            <div class="col py-3 mx-1" style="background-color: rgb(60 180 231 / 60%);border-radius: 5%;">
                <img src="https://bireysel.istanbulkart.istanbul/static/media/blue.36358d3d.png"
                     style="width:150px;max-height:250px">
                <span style="font-size:20px;" class="ms-5 fs-4">Blue Card</span>
            </div>
        </a>
        <a href="{{url('istanbul')}}" class=" text-decoration-none text-muted d-inline w-auto p-3">

            <div class="col py-3 " style="background-color: rgb(86 196 196 / 85%);border-radius: 5%;">
                <img src="https://bireysel.istanbulkart.istanbul/static/media/green.aad69d77.png"
                     style="width:150px;max-height:250px">
                <span style="font-size:20px;" class="ms-4 fs-4"> Istanbul Card</span>
            </div>
        </a>

    </div>
</div>
</body>

</html>
