@extends('layouts.template')
@section('title', 'Country')

@section('content')
    <div class="container-fluid">

        <div class="d-flex">
            <h1 class="h3 mb-2 text-gray-800 w-100">Table Country</h1>
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
                                <th>Country</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($country as $item)
                                <tr class="text-center">
                                    <td>{{ $item['country_name'] }}</td>
                                    <td class="w-50">
                                        <div class="d-flex justify-content-center">
                                            <a href="" class="btn btn-success mr-2 mb-2 justify-content-end"><i
                                                    class="fa fa-eye"></i></a>
                                            <a id="editButton" href="{{ url('/country-update' . '/' . $item['id']) }}" class="btn btn-warning mr-2 mb-2 justify-content-end"><i
                                                    class="fa fa-pen"></i></a>
                                            <form action="{{ url('/country-delete' . '/' . $item['id'])}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" id="deleteButton" class="btn btn-danger mb-2 justify-content-end"><i class="fa fa-trash"></i></button>
                                            </form>
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
                        <h5 class="modal-title" id="exampleModalLabel">Input New Country</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form id="insert-data" action="{{ url('/country-store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="inputCountryeCode">Country Code</label>
                                <input type="text" class="form-control" name="country_code" id="country_code">
                            </div>

                            <div class="form-group">
                                <label for="inputPCountryName">Country Name</label>
                                <input type="text" class="form-control" name="country_name" id="country_name">
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
@section('script')
    <script>

        $('#simpan').on('click', function() {

            $.confirm({
                title: 'Konfirmasi!',
                content: 'Simpan Data ?',
                buttons: {
                    confirm: function() {
                        insertData()
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

            $.ajax({
                url: "{{ url('country-store') }}",
                // dataType: 'json',
                type: 'post',
                data: {
                    country_code: countryCode,
                    country_name: countryName,
                },
                success: function(data) {
                    console.log(data)
                    $.confirm({
                        title: 'Berhasil',
                        content: 'data Berhasil di simpan',
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

<script>
    $('#deleteButton').on('click', function() {
        $.confirm({
            title: 'Konfirmasi!',
            content: 'Hapus Data ?',
            buttons: {
                confirm: function() {
                    // location.href = "{{ url('/province-store') }}"
                    // console.log(provinceCode)
                    deleteData()
                },
                cancel: function() {
                    $.alert('Canceled!');
                }
            }
        });
    })

    function deleteData() {
        let countryy = $(this).data('id');
        let token = $("meta[name='csrf-token']").attr("content");

        $.ajax({
            url: "{{ url('country-delete') }}",
            type: 'DELETE',
            data: {
                "_token": token
            },
            success: function(data) {
                console.log(data)
                $.confirm({
                    title: 'Berhasil',
                    content: 'data Berhasil dihapus',
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
