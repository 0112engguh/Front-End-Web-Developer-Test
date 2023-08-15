@extends('layouts.template')
@section('title', 'Edit Country')

@section('content')
    <div class="container-fluid">

        <div class="d-flex">
            <h1 class="h3 mb-2 text-gray-800 w-100">Edit Country</h1>
        </div>

        <div class="card shadow mb-4">
            {{-- <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div> --}}

            {{-- {{ dd($province) }} --}}

            <div class="card-body">
                <form id="edit-data" action="{{ url('/country-update/' . $country['id']) }}" method="put"
                    enctype="multipart/form-data">
                    {{-- <form id="insert-data" method="" enctype="multipart/form-data"> --}}
                    @csrf
                    <div class="form-group">
                        <label for="inputCountryCode">Country Code</label>
                        <input type="text" class="form-control" value="{{ $country['country_code'] }}"
                            name="country_code" id="country_code">
                    </div>

                    <div class="form-group">
                        <label for="inputCountryName">Country Name</label>
                        <input type="text" class="form-control" value="{{ $country['country_name'] }}"
                            name="country_name" id="country_name">
                    </div>

                    <div class="modal-footer">
                        <a href="{{ URL::previous() }}" class="btn btn-secondary">Close</button>
                            <a class="btn btn-primary" id="edit">Save changes</a>
                    </div>
                </form>
            </div>
        </div>

    </div>

@section('script')
    <script>
        $('#edit').on('click', function() {

            $.confirm({
                title: 'Konfirmasi!',
                content: 'Edit Data ?',
                buttons: {
                    confirm: function() {
                        // location.href = "{{ url('/province-store') }}"
                        // console.log(provinceCode)
                        insertData()
                        // console.log('masuk')
                    },
                    cancel: function() {
                        $.alert('Canceled!');
                    }
                }
            });
        })

        function insertData() {
            let countryCode = $('#country_code').val();
            let countryName = $('#country_name').val();

            console.log(countryCode)

            var data = "{{ $countrys }}"
            var datas = data.replaceAll('&quot;', '"');
            var jsonData = JSON.parse(datas);

            $.ajax({
                url: "{{ url('/country-edit') }}" + "/" + jsonData.id,
                // dataType: 'json',
                type: 'post',
                data: {
                    id: jsonData.id,
                    country_code: countryCode,
                    country_name: countryName,
                },
                success: function(data) {
                    console.log(data)
                    $.confirm({
                        title: 'Berhasil',
                        content: 'data Berhasil di edit',
                        buttons: {
                            confirm: function() {
                                location.href = "{{ url('/country') }}"

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
