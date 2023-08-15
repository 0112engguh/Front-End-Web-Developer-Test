@extends('layouts.template')
@section('title', 'Province')

@section('content')
    <div class="container-fluid">

        <div class="d-flex">
            <h1 class="h3 mb-2 text-gray-800 w-100">Edit Province</h1>
        </div>

        <div class="card shadow mb-4">
            {{-- <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div> --}}

            {{-- {{ dd($province) }} --}}

            <div class="card-body">
                <form id="edit-data" action="{{ url('/province-update/' . $province['id']) }}" method="put"
                    enctype="multipart/form-data">
                    {{-- <form id="insert-data" method="" enctype="multipart/form-data"> --}}
                    @csrf
                    <div class="form-group">
                        <label for="inputProvinceCode">Province Code</label>
                        <input type="text" class="form-control" value="{{ $province['province_code'] }}"
                            name="province_code" id="province_code">
                    </div>

                    <div class="form-group">
                        <label for="inputProvinceName">Province Name</label>
                        <input type="text" class="form-control" value="{{ $province['province_name'] }}"
                            name="province_name" id="province_name">
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
            let provinceCode = $('#province_code').val();
            let provinceName = $('#province_name').val();
            let countryId = $('#country_id').val();

            console.log(provinceCode)

            var data = "{{ $provinces }}"
            var datas = data.replaceAll('&quot;', '"');
            var jsonData = JSON.parse(datas);

            $.ajax({
                url: "{{ url('/province-edit') }}" + "/" + jsonData.id,
                // dataType: 'json',
                type: 'post',
                data: {
                    id: jsonData.id,
                    province_code: provinceCode,
                    province_name: provinceName,
                    country_id: countryId
                },
                success: function(data) {
                    console.log(data)
                    $.confirm({
                        title: 'Berhasil',
                        content: 'data Berhasil di edit',
                        buttons: {
                            confirm: function() {
                                location.href = "{{ url('/provinsi') }}"

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
