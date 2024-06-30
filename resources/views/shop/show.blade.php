<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shop | Shop Show</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title">Shop Show</h4>
                        <a href="{{ route('shop.create') }}" class="btn btn-primary">Create</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                               <tbody>
                                    <tr>
                                        <th>Name</th>
                                        <td>{{ $shop->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Provinsi</th>
                                        <td>{{ $shop->provincies->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Kabupaten</th>
                                        <td>{{ $shop->regencies->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Kecamatan</th>
                                        <td>{{ $shop->districts->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Desa / Kelurahan</th>
                                        <td>{{ $shop->villages->name }}</td>
                                    </tr>
                               </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('shop.index') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>    
        </div>    
    </div> 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>