@extends('layouts.template')
@section('title', 'Province')

@section('content')
    <div class="container-fluid">

        <div class="d-flex">
            <h1 class="h3 mb-2 text-gray-800 w-100">Table Province</h1>
            <a href="" class="btn btn-primary mb-2 justify-content-end " data-toggle="modal"
                data-target="#exampleModal">Input+</a>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Province</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($province as $item)
                                <tr class="text-center">
                                    <td>{{ $item['province_name'] }}</td>
                                    <td class="w-50">
                                        <div class="d-flex justify-content-center">
                                            <a href="" class="btn btn-success mr-2 mb-2 justify-content-end"><i
                                                    class="fa fa-eye"></i></a>
                                            <a href="" class="btn btn-warning mr-2 mb-2 justify-content-end" data-toggle="modal"
                                            data-target="#editModal"><i
                                                    class="fa fa-pen"></i></a>
                                            <a href="" class="btn btn-danger mb-2 justify-content-end"><i
                                                    class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Input New Province</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        {{-- <form id="insert-data"> --}}
                        <form id="insert-data" action="{{ url('/province-store') }}" method="POST"
                            enctype="multipart/form-data">
                            {{-- <form id="insert-data" method="" enctype="multipart/form-data"> --}}
                            @csrf
                            <div class="form-group">
                                <label for="inputProvinceCode">Province Code</label>
                                <input type="text" class="form-control" name="province_code" id="province_code">
                            </div>

                            <div class="form-group">
                                <label for="inputProvinceName">Province Name</label>
                                <input type="text" class="form-control" name="province_name" id="province_name">
                            </div>

                            <div class="form-group">
                                <label for="">Select Country Id</label>
                                <select class="form-control" name="country_id" id="country_id">
                                    @foreach ($country as $item)
                                        <option value={{ $item['id'] }}>{{ $item['country_name'] }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <a class="btn btn-primary" id="simpan">Save changes</a>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>

    @include('management.modal_edit')

@section('script')
    <script>
        // let provinceCode = $(this).data('province_code');
        // let provinceName = $(this).data('province_name');
        // let countryId = $(this).data('country_id');
        // $(body).on('click', '#simpan', function(e) {
        //     $.ajax({
        //       url: "{{ url('/province-store') }}",
        //       dataType: 'json',
        //       type: 'post',
        //       data: {
        //         province_code: provinceCode,
        //         province_Name: provinceName,
        //         country_id: countryId
        //       }
        //     })
        // })

        $('#simpan').on('click', function() {

            $.confirm({
                title: 'Konfirmasi!',
                content: 'Simpan Data ?',
                buttons: {
                    confirm: function() {
                        // location.href = "{{ url('/province-store') }}"
                        // console.log(provinceCode)
                        insertData()
                    },
                    cancel: function() {
                        $.alert('Canceled!');
                    }
                }
            });
        })

        function insertData() {
            let provinceCode = $('#province_code').val();
            let provinceName = $('#province_name').val();
            let countryId = $('#country_id').val();

            $.ajax({
                url: "{{ url('province-store') }}",
                // dataType: 'json',
                type: 'post',
                data: {
                    province_code: provinceCode,
                    province_name: provinceName,
                    country_id: countryId
                },
                success: function(data) {
                    console.log(data)
                    $.confirm({
                        title: 'Berhasil',
                        content: 'data Berhasil di simpan',
                        buttons: {
                            confirm: function() {
                                location.href = "{{ url('/provinsi') }}"
                                // console.log(provinceCode)
                            },
                            cancel: function() {}
                        }
                    });
                },
                error: function(err) {
                    console.log(err)
                }
            })
        }
    </script>
@endsection
@endsection
