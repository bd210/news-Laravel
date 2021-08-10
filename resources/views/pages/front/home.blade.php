@extends('layouts.frontend')

@section('title')
Home
@endsection


@section('content')

    @include('components.front.slider')

    @include('components.front.latest')

    <div class="row">

        <div class="col-lg-8 col-md-8 col-sm-8">

            <div class="left_content">

                @include('components.front.business')

                <div class="fashion_technology_area">

                    @include('components.front.sport')


                    @include('components.front.health')

                </div>

            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <aside class="right_content">



                    @include('components.front.popular')


                    @include('components.front.tags')

                    @include('components.front.sponsorAndCategory')



                </aside>
            </div>


@endsection
