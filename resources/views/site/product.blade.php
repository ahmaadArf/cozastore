@extends('site.master')
@section('title','Product | '.env('APP_NAME'))
@section('content')
	<!-- Product -->
	<div class="bg0 m-t-23 p-b-140">
		<div class="container">

            <div class="flex-w flex-sb-m p-b-52">
                <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                        All Products
                    </button>
                    @foreach ($categories   as $category )
                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".{{ $category->name }}">
                        {{ $category->name }}
                    </button>
                    @endforeach

                </div>

                @include('site.part.search')



            </div>

            <div class="row isotope-grid">
                @foreach ($products  as $product )
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{ $product->Category->name }}">
			      @include('site.part.product')
                </div>
                 @endforeach
            </div>

			<!-- Load more -->
			<div class="flex-c-m flex-w w-full p-t-45">
				<a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
					Load More
				</a>
			</div>
		</div>
	</div>
@stop
