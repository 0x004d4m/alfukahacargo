@extends('website.layout.main')
@section('title', __('content.home'))
@section('content')
    @if (true)
        <h3 class="text-center"><br><br>Comming Soon</h3>
        @include('website.partials.contact')
    @else
        @include('website.partials.carousel')
        @include('website.partials.about')
        @include('website.partials.fact')
        @include('website.partials.service')
        @include('website.partials.feature')
        @include('website.partials.contact')
    @endif
@endsection
