@extends('welcome')
@section('main-content')
    <div class="container">
        <div class=" text-center font-bold  text-white  mt-md-5 " style="font-size: 30px">
            <u>Downloads</u>
        </div>
        <div id="row justify-content-center">

            <div class=" table-responsive-md">
                <table class=" table mt-md-5 shadow  table-primary table-hover  table-striped table-md">
                    <thead class=" bg-blue-light  text-white">
                        <tr>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tr>
                        @isset($download)
                            @foreach ($download as $item)
                        <tr>
                            <td>{{ $item->date }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                                <a href="{{ asset('storage/' . $item->file) }}"
                                    class=" btn-info btn fa fa-download rounded-pill" data-toggle="tooltip"
                                    data-placement="bottom" title="Download"> Download</a>
                            </td>
                        </tr>

                        @endforeach
                    @endisset
                    </tr>
                </table>
            </div>
        </div>
    </div>


@endsection
