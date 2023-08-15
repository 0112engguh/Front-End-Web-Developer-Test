@extends('layouts.template')
@section('title', 'Edit City')

@section('content')
    <div class="container-fluid">

        <div class="d-flex">
            <h1 class="h3 mb-2 text-gray-800 w-100">Edit City</h1>
        </div>

        <div class="card shadow mb-4">
            {{-- <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div> --}}

            {{-- {{ dd($province) }} --}}

            <div class="card-body">
                <form id="edit-data" action="{{ url('/city-update/' . $city['id']) }}" method="put"
                    enctype="multipart/form-data">
                    {{-- <form id="insert-data" method="" enctype="multipart/form-data"> --}}
                    @csrf
                    <div class="form-group">
                        <label for="inputCityCode">City Code</label>
                        <input type="text" class="form-control" value="{{ $city['city_code'] }}"
                            name="city_code" id="city_code">
                    </div>

                    <div class="form-group">
                        <label for="inputCityName">City Name</label>
                        <input type="text" class="form-control" value="{{ $city['city_name'] }}"
                            name="city_name" id="city_name">
                    </div>

                    <div class="form-group">
                        <label for="">Select Province Id</label>
                        <select class="form-control" name="province_id" id="province_id">
                            @foreach ($province as $item)
                                <option value={{ $item['id'] }}>{{ $item['province_name'] }}</option>
                            @endforeach
                        </select>
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
            let cityCode = $('#city_code').val();
            let cityName = $('#city_name').val();
            let provinceId = $('#province_id').val();

            // console.log(provinceCode)

            var data = "{{ $citys }}"
            var datas = data.replaceAll('&quot;', '"');
            var jsonData = JSON.parse(datas);

            $.ajax({
                url: "{{ url('/city-edit') }}" + "/" + jsonData.id,
                // dataType: 'json',
                type: 'post',
                data: {
                    id: jsonData.id,
                    city_code: cityCode,
                    city_name: cityName,
                    province_id: provinceId
                },
                success: function(data) {
                    console.log(data)
                    $.confirm({
                        title: 'Berhasil',
                        content: 'data Berhasil di edit',
                        buttons: {
                            confirm: function() {
                                location.href = "{{ url('/city') }}"

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
