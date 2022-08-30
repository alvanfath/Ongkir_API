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
                        <button class="navbar-toggler pt-2" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"><i class="fa-solid fa-align-justify"></i></span>
                        </button>
                        <div class="collapse navbar-collapse ms" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="about">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="help">Help</a>
                                </li>
                            </ul>
                        </div>
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
                    <h3>Cek ongkir</h3>
                </div>
            </div>
            <section class="row">
                <div class="col-12 col-lg-12">
                    <div class="row align-items-center bg-light text-dark p-2">
                        <form action="{{ route('progress-shipping') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-3 col-12">
                                    <div class="form-group position-relative has-icon-left mb-4">
                                        <label for="" class="mb-1">Origin City :</label>
                                        <input type="text" name="origin_city" id="id_origin" hidden>
                                        <input type="text" id="origin"
                                            class="form-control form-control-xl @error('origin_city') is-invalid @enderror"
                                            placeholder="Origin city" value="{{ old('origin_city') }}">
                                        @error('origin_city')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="form-group position-relative has-icon-left mb-4">
                                        <label for="" class="mb-1">Destination City :</label>
                                        <input type="text" name="destination_city" id="id_destination" hidden>
                                        <input type="text" id="destination"
                                            class="form-control form-control-xl @error('destination_city') is-invalid @enderror"
                                            placeholder="Destination city" value="{{ old('destination_city') }}">
                                        @error('destination_city')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-2 col-12">
                                    <div class="form-group position-relative has-icon-left mb-4">
                                        <label for="" class="mb-1">Weight :</label>
                                        <input type="number" name="weight"
                                            class="form-control form-control-xl @error('weight') is-invalid @enderror"
                                            placeholder="gram" value="{{ old('weight') }}">
                                        @error('weight')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-2 col-12">
                                    <div class="form-group position-relative has-icon-left mb-4">
                                        <label for="" class="mb-1">Courier :</label>
                                        <select name="courier" class="form-select" id="">
                                            <option value="" selected disabled>--courier--</option>
                                            @foreach ($courier as $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-1 col-12 pt-4 pr-1">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-sm btn-primary me-1 mb-1">
                                            Check
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
            </section>

        </div>
    </section>
    <!-- End header Area -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $(function() {
            $('#origin').autocomplete({
                source: function(request, response) {

                    $.getJSON('{{ url('autocomplete-city') }}', function(data) {

                        var array = $.map(data, function(row) {
                            return {
                                value: row.name,
                                label: [row.name, row.type],
                                id: row.id,
                            }
                        })
                        response($.ui.autocomplete.filter(array, request.term))
                    })
                },
                delay: 500,
                select: function(event, ui) {
                    $('#id_origin').val(ui.item.id);
                }
            })
        });

        $(function() {
            $('#destination').autocomplete({
                source: function(request, response) {

                    $.getJSON('{{ url('autocomplete-city') }}', function(data) {

                        var array = $.map(data, function(row) {
                            return {
                                value: row.name,
                                label: [row.name, row.type],
                                id: row.id,
                            }
                        })
                        response($.ui.autocomplete.filter(array, request.term))
                    })
                },
                delay: 500,
                select: function(event, ui) {
                    $('#id_destination').val(ui.item.id);
                }
            })
        });
    </script>
</body>

</html>
