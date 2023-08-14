@extends('layouts.template')
@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">

  <h1 class="h3 mb-2 text-gray-800">Table Management</h1>

  <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
      </div>
      <div class="card-body">

          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                      <th>Country</th>
                      <th>Province</th>
                      <th>City</th>
                  </tr>
                </thead>

                <tbody>
                  @foreach ($city as $item)
                    <tr class="text-center">
                      <td>{{ optional($item['province'])['country_id'] }}</td>
                      <td>{{ optional($item['province'])['province_name'] }}</td>
                      <td>{{$item['city_name']}}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
          </div>

      </div>
  </div>

</div>
@endsection