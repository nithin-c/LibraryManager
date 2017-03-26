<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Library Manager</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="viewport" content="width=device-width" />
  <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

  <!-- css files -->
  @include('layouts.partials.master._css')




</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<!-- header -->
@include('layouts.partials.master._header_master')

<!-- sidebar -->
@include('layouts.partials.master._sidebar_master')

<!-- content -->
@yield('content')

</div>
<!-- footer -->
@include('layouts.partials.master._footer_master')
</body>

<!-- js files -->
@include('layouts.partials.master._js')
</html>
