<!DOCTYPE html>
<html lang="en">

<head>
    <!--====== Required meta tags ======-->
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!--====== Title ======-->
    <title>Linxx-Id</title>

    <script src="https://kit.fontawesome.com/b32f3494a3.js" crossorigin="anonymous"></script>
    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/logo.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/logo.png') }}" type="image/png">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="{{ asset('template/css/bootstrap.min.css') }}" />

    <!--====== Nucleo ======-->
    <link rel="stylesheet" href="{{ asset('template/nucleo/css/nucleo.css') }}" type="text/css">

    <link rel="stylesheet" href="{{ asset('template/style.css') }}" />
    {{-- jquery --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />

    <style>
        .navbar {
            background-color: #435EBE;
        }
    </style>
</head>

<body>

    <!--====== NAVBAR START ======-->

    <section class="navbar-area navbar-nine">
        <div class="container">
            <div class="row">
                <nav class="navbar navbar-expand-lg px-3">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="/">
                            <span style="font-size: 25px; font-weight: 500;"><i
                                    class="ni ni-delivery-fast mr-2"></i>&nbsp;&nbsp;Linxx-Id</span>
                        </a>
                    </div>
                </nav>
            </div>
        </div>
    </section>

    <!--====== NAVBAR ENDS ======-->

    <!-- Start header Area -->
    <section id="hero-area" class="header-area header-eight">
        <div class="container">
            <div class="row align-items-center bg-light text-dark p-3">
                <div class="col-lg-12 col-md-12 col-12 text-center mb-3">
                    <h3>Check postage</h3>
                </div>
                <div class="col-lg-12 col-md-12 col-12 mb-3">
                    <span>From : {{$origin}}</span>
                    <br>
                    <span>To : {{$destination}}</span>
                    <br>
                    <span>Weight : {{number_format($weight)}} grams</span>
                    <br>
                    <span>Courier : {{$courier}}</span>
                </div>
            </div>
            <section class="row">
                <div class="col-12 col-lg-12">
                    <div class="row align-items-center bg-light text-dark p-2">
                        <div class="row">
                            <table class="table table-striped table-hover align-items-center" id="dataTable">
                                <thead class="table-info">
                                    <tr>
                                        <th>Service name</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>ETD</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($data as $item)
                                        <tr>
                                            <td>{{ $item['service'] }}</td>
                                            <td>{{ $item['description'] }}</td>
                                            <td>Rp {{ number_format($item['cost'][0]['value']) }}</td>
                                            <td>{{ $item['cost'][0]['etd'] }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">Didn't find any service</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
            </section>

        </div>
    </section>
    <!-- End header Area -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</body>

</html>
