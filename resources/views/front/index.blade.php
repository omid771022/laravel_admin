@extends('front.main')
@section('content')
    @include('front.intro')
    <main id="main">
        @include('front.about')
        @include('front.serves')
        @include('front.whyus')
        @include('front.calltoaction')
        @include('front.Features')
        @include('front.portfolio')
        @include('front.Clients')
        @include('front.Team')
        @include('front.clints_our')
        @include('front.Pricing')
        @include('front.faq')
    </main>
@endsection
