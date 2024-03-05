@props([
    'keywords' => '',
    'description' => '',
    'title' => '',
])


<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<meta name="author" content="mailto:nikola.samardzic.54.21@ict.edu.rs"/>
<meta name="keywords" content="{{ $keywords }}"/>
<meta name="description" content="{{ $description }}"/>
<meta name="copyright" content="Readily 2022"/>
<meta name="language" content="english"/>

<!--Favicon-->
<link rel="icon" href="{{ asset('assets/images/favicon.png') }}"/>

<!--Fonts-->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,400;0,600;0,700;0,900;1,400;1,600;1,700&family=Source+Serif+Pro:ital,wght@0,400;0,600;0,700;0,900;1,400;1,600;1,700&display=swap" rel="stylesheet" />

<!--Icons-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

{{--<link  href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js">--}}


{{--<link href="toastr.css" rel="stylesheet"/>--}}
{{$slot}}

<title>{{ $title }} | Readily</title>
