@extends('portal.app')
@section('sc-css')
<link href="{{ url('assets/02-Single-post/css/styles.css') }}" rel="stylesheet">
<link href="{{ url('assets/02-Single-post/css/responsive.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="single-post">
    <h3 class="title"><a href="#"><b class="light-color">{{ $infos->judul_info }}</b></a></h3>
    {!! $infos->isi_info !!}
    <p class="date"><em>{{ date('D, M Y', strtotime($infos->created_at)) }}</em></p>

</div>
<!-- single-post -->


<div class="post-author">
    <div class="author-image"><img src="{{ url($data['user']->image) }}" alt="{{$data['user']->name}}"></div>

    <div class="author-info">
        <h4 class="name"><b class="light-color">{{ $data['user']->name }}</b></h4>

        {!! $data['user']->desc !!}

        {{-- <ul class="social-icons">
            <li><a href="#"><i class="ion-social-facebook-outline"></i></a></li>
            <li><a href="#"><i class="ion-social-twitter-outline"></i></a></li>
            <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
            <li><a href="#"><i class="ion-social-vimeo-outline"></i></a></li>
            <li><a href="#"><i class="ion-social-pinterest-outline"></i></a></li>
        </ul> --}}
        <!-- right-area -->

    </div>
    <!-- author-info -->
</div>
<!-- post-author -->
@endsection