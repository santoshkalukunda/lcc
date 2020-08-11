@extends('dashboard')
@section('title')
    Company List
@endsection

@section('body')
    <div class="col-md-10">
        <div class="card">
            @if (Session::has('success'))
                <div class="bg-success text-white p-2">
                    {{ Session::get('success') }}
                </div>
            @endif

            <div class="card-header">Company List </div>
            <br>
          
            <form action="" method="POST" class="container-fluid" >
                <div class="row">
                  <div class="col-3">
                    <select name="search_type" class="form-control" for="search" id="">
                      <option value="name">Company Name</option>
                      <option value="reg_no">Reg. No.</option>
                      <option value="reg_date">Reg. Date</option>
                      <option value="fiscal_year">Fiscal Year</option>
                      <option value="contact_no">Contact No.</option>
                      <option value="id">Id</option>
                    </select>
                  </div>
                    <div class="col-4"><input type="search" class="form-control" name="search" id="search"
                            placeholder="Search"></div>
                    <div class="col-1"><input type="submit" class="btn btn-info" value="Search"></div>
                </div>
            </form>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Company Name</th>
                            <th scope="col">Reg. No.</th>
                            <th scope="col">Reg. date</th>
                            <th scope="col">Fiscal Year</th>
                            <th scope="col">Address</th>
                            <th scope="col">Cantact No.</th>

                            <th colspan="2" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($company_data)
                            @foreach ($company_data as $item)
                                <tr>
                                    <th>{{ $item->id }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->reg_no }}</td>
                                    <td>{{ $item->reg_date }}</td>
                                    <td>{{ $item->fiscal_year }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>{{ $item->contact_no }}</td>

                                    <td><a href="{{ route('company.edit', $item->id) }}"><i
                                                class="fa fa-edit btn btn-primary"></i></a></td>
                                    <td>
                                        <form method="post" action="{{ route('company.destroy', $item->id) }}">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm" type="submit"
                                                onclick="return confirm('Are you sure to delete this banner?')"><i
                                                    class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        @endif

                    </tbody>

                </table>
                {{ $company_data->links() }}

            </div>
        </div>
    </div>
@endsection
