<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shop | Shop Create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title">Shop Create</h4>
                        <a href="" class="btn btn-primary">Create</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('shop.store') }}" method="post">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="name" class="form-label">Nama Toko</label>
                                    <input type="text" name="name" id="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="masukkan nama toko">
                                    @error('name')
                                        <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="province_id" class="form-label">Province</label>
                                    <select name="province_id" id="province_id"
                                        class="form-select @error('province_id') is-invalid @enderror">
                                        <option selected hidden>Pilih Provinsi</option>
                                        @foreach ($provinces as $province)
                                            <option value="{{ $province->id }}">{{ $province->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('province_id')
                                        <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="regency_id" class="form-label">Kota / Kabupaten</label>
                                    <select name="regency_id" id="regency_id"
                                        class="form-select @error('regency_id') is-invalid @enderror">
                                        <option selected hidden>Pilih Kota / Kabupaten</option>
                                    </select>
                                    @error('regency_id')
                                        <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="district_id" class="form-label">Kecamatan</label>
                                    <select name="district_id" id="district_id"
                                        class="form-select @error('district_id') is-invalid @enderror">
                                        <option selected hidden>Pilih Kecamatan</option>
                                    </select>
                                    @error('district_id')
                                        <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="village_id" class="form-label">Desa / Kelurahan</label>
                                    <select name="village_id" id="village_id"
                                        class="form-select @error('village_id') is-invalid @enderror">
                                        <option selected hidden>Pilih Desa / Kelurahan</option>
                                    </select>
                                    @error('village_id')
                                        <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary float-end">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <!-- JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            // Start getRegency
            $('#province_id').on('change', function() {
                var categoryID = $(this).val();
                if (categoryID) {
                    $.ajax({
                        url: '/getRegency/' + categoryID,
                        type: "GET",
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(data) {
                            if (data) {
                                $('#regency_id').empty();
                                $('#regency_id').append(
                                    '<option selected hidden>Pilih Kota / Kabupaten</option>'
                                );
                                $.each(data, function(key, regency) {
                                    $('select[name="regency_id"]').append(
                                        '<option value="' + regency.id + '">' +
                                        regency.name + '</option>');
                                });
                            } else {
                                $('#regency_id').empty();
                            }
                        }
                    });
                } else {
                    $('#regency_id').empty();
                }
            });
            // End getRegency
            // Start getDistrict
            $('#regency_id').on('change', function() {
                var categoryID = $(this).val();
                // alert(categoryID);
                if (categoryID) {
                    $.ajax({
                        url: '/getDistrict/' + categoryID,
                        type: "GET",
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(data) {
                            if (data) {
                                $('#district_id').empty();
                                $('#district_id').append(
                                    '<option selected hidden>Pilih Kecamatan</option>');
                                $.each(data, function(key, district) {
                                    $('select[name="district_id"]').append(
                                        '<option value="' + district.id +
                                        '">' + district.name +
                                        '</option>');
                                });
                            } else {
                                $('#district_id').empty();
                            }
                        }
                    });
                } else {
                    $('#district_id').empty();
                }
            });
            // End getDistrict
            // Start getVillage
            $('#district_id').on('change', function() {
                var categoryID = $(this).val();
                if (categoryID) {
                    $.ajax({
                        url: '/getVillage/' + categoryID,
                        type: "GET",
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(data) {
                            if (data) {
                                $('#village_id').empty();
                                $('#village_id').append(
                                    '<option selected hidden>Pilih Kecamatan</option>');
                                $.each(data, function(key, village) {
                                    $('select[name="village_id"]').append(
                                        '<option value="' + village.id +
                                        '">' + village.name +
                                        '</option>');
                                });
                            } else {
                                $('#village_id').empty();
                            }
                        }
                    });
                } else {
                    $('#village_id').empty();
                }
            });
            // End getVillage
        });
    </script>
</body>

</html>
