@extends('layouts.app')

@section('content')
@include('home.partials.hero', ['carouselSlides' => $carouselSlides])
@include('home.partials.mission-vision', ['organization' => $organization])
@include('home.partials.explore-panels', ['panelFilters' => $panelFilters])
@include('home.partials.sectors', ['sectors' => $sectors])
@include('home.partials.highlights', ['highlights' => $highlights])
@include('home.partials.most-viewed', ['mostViewed' => $mostViewed])
@endsection
