<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
        Zarządzanie drukarkami
    </title>
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+
Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1>{{ $title ?? "Zarządzanie drukarkami"}}</h1>
            </div>
        </div>
    </div>
    <hr>
    <div class="container">
        <div class="row gy-3">
            <div class="col-sm-12 col-md-6 col-lg-4">
                <a href="/printers-models" style="text-decoration:none">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title h5 text-black clearfix"><i class="material-icons-round align-middle">print</i>Zarządzanie drukarkami</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <a href="/printers-inventory" style="text-decoration:none">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title h5 text-black clearfix"><i class="material-icons-round align-middle">inventory</i>Zarządzanie inwentaryzacją drukarek</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <a href="/contractors" style="text-decoration:none">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title h5 text-black clearfix"><i class="material-icons-round align-middle">local_shipping</i>Zarządzanie dostawcami</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <a href="/shops" style="text-decoration:none">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title h5 text-black clearfix"><i class="material-icons-round align-middle">storefront</i>Zarządzanie sklepami</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <a href="/renting" style="text-decoration:none">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title h5 text-black clearfix"><i class="material-icons-round align-middle">supervisor_account</i>Zarządzanie dzierżawami</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <a href="/repairs" style="text-decoration:none">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title h5 text-black clearfix"><i class="material-icons-round align-middle">build</i>Zarządzanie naprawami</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <a href="/supplies" style="text-decoration:none">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title h5 text-black clearfix"><i class="material-icons-round align-middle">category</i>Zarządzanie tonerami</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <a href="/invoices" style="text-decoration:none">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title h5 text-black clearfix"><i class="material-icons-round align-middle">description</i>Zarządzanie fakturami</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <script src="/js/bootstrap.min.js"></script>
</body>

</html>