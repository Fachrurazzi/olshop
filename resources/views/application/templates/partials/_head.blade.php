    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>{{ config('app.name') }} | Dashboard</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="ThemeDesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="{{ asset('admin-assets/assets/images/favicon.ico') }}">

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="{{ asset('admin-assets/assets/plugins/morris/morris.css') }}">

        <link href="{{ asset('admin-assets/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('admin-assets/assets/css/icons.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('admin-assets/assets/css/style.css') }}" rel="stylesheet" type="text/css">
        <script src="{{ asset('admin-assets/assets/js/jquery.min.js') }}"></script>
        @stack('css')

    </head>