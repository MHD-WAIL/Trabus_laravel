@extends('layout')
@section('content')

    {{--        @foreach ($blueCards as $card)--}}
    {{--            <tr>--}}
    {{--                <td>{{$card->id   }}</td>--}}
    {{--                <td>{{ $card->number }}</td>--}}
    {{--                <td>{{ $card->card_type }}</td>--}}
    {{--                <td>{{ $card->balance }}</td>--}}
    {{--                <td>{{ $card->vehicle }}</td>--}}
    {{--                <td>{{ $card->customer_type }}</td>--}}
    {{--                <td>{{ $card->updated_at }}</td>--}}
    {{--                <td>--}}
    {{--                    <form action="{{ route('cards.destroy',$card->id) }}" method="POST">--}}
    {{--                        <a class="btn btn-info" href="{{ route('blue.show',$card->id) }}">Show</a>--}}
    {{--                        <a class="btn btn-primary" href="{{ route('blue.edit',$card->id) }}">Edit</a>--}}
    {{--                        @csrf--}}
    {{--                        @method('DELETE')--}}
    {{--                        <button type="submit" class="btn btn-danger">Delete</button>--}}
    {{--                    </form>--}}
    {{--                </td>--}}
    {{--            </tr>--}}
    {{--        @endforeach--}}

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Blue Cards Table</h6>
                        <a type="button" class="btn btn-outline-primary btn-sm mb-0"><i class="far fa-plus-square"
                                                                                        style="font-size: 11px"></i>&nbsp
                            Create new record</a>
                        <a type="button" class="btn btn-outline-primary btn-sm mb-0"><i class="far fa-trash-alt "
                                                                                        style="font-size: 11px"></i>&nbsp
                            Trash</a>

                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>


                                <tr>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Id
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        number
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        card type
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        balance
                                    </th>
                                    {{--                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">--}}
                                    {{--                                        vehicle--}}
                                    {{--                                    </th>--}}
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        customer type
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        LastModify
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                        <i class="fas fa-cog"></i>&nbsp Option
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($blueCards as $card)

                                    <tr>

                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{$card->id}}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ $card->number }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ $card->card_type }}</span>
                                        </td>

                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ $card->balance }}</span>
                                        </td>

                                        {{--                                        <td class="align-middle text-center">--}}
                                        {{--                                            <span--}}
                                        {{--                                                class="text-secondary text-xs font-weight-bold">{{ $card->vehicle }}</span>--}}
                                        {{--                                        </td>--}}

                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ $card->customer_type }}</span>
                                        </td>


                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ $card->updated_at }}</span>
                                        </td>


                                        <td class="align-middle text-center">
                                            <a href="{{ route('blue.edit',$card->id) }}"
                                               class="text-secondary font-weight-bold text-xs"
                                               data-toggle="tooltip" data-original-title="Edit user">
                                                Edit
                                            </a>
                                            |
                                            <a class="text-secondary font-weight-bold text-xs"
                                               data-toggle="tooltip" data-original-title="Edit user">
                                                Delete
                                            </a>
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
