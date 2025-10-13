@extends('layouts.app')

@section('content')

<swiper-container class="mySwiper mt-4 mb-4">
    <swiper-slide>
        <img src="{{ asset('assets/images/slider1.jfif') }}" width="100%" height="100%">
    </swiper-slide>
    <swiper-slide>
        <img src="{{ asset('assets/images/slider2.jfif') }}" width="100%" height="100%">
    </swiper-slide>
    <swiper-slide>
        <img src="{{ asset('assets/images/slider3.jfif') }}" width="100%" height="100%">
    </swiper-slide>
    <swiper-slide>
        <img src="{{ asset('assets/images/slider4.jfif') }}" width="100%" height="100%">
    </swiper-slide>
    <swiper-slide>
        <img src="{{ asset('assets/images/slider5.jfif') }}" width="100%" height="100%">
    </swiper-slide>
</swiper-container>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 w-full">

    @foreach ($products as $product)
    <div class="relative mx-auto w-full">
        <a href="#" class="relative inline-block duration-300 ease-in-out transition-transform transform hover:-translate-y-2 w-full">
          <div class="shadow p-4 rounded-lg bg-white">
            <div class="flex justify-center relative rounded-lg overflow-hidden h-52">
              <div class="transition-transform duration-500 transform ease-in-out hover:scale-110 w-full">
                <img src="{{ Storage::url( $product->image ) }}" class="absolute h-full w-full inset-0">
              </div>

              <form action="{{ route('cart.add') }}" method="POST">
                @csrf
                    <input type="hidden" value="{{ $product->id }}" name="product_id">
                    <input type="hidden" name="quantity" value="1">
                    <button class="absolute top-0 left-0 inline-flex mt-3 ml-3 px-3 py-2 rounded-lg z-10 bg-red-500 text-sm font-medium text-white select-none">
                        Сагслах
                    </button>
              </form>
            </div>

            <div class="mt-4">
              <h2 class="font-medium text-base md:text-lg text-gray-800 line-clamp-1" title="New York">
                {{ $product->name }}
              </h2>
              <p class="mt-2 text-sm text-gray-800 line-clamp-1" title="New York, NY 10004, United States">
                {{ $product->description }}
              </p>
            </div>

            <div class="grid grid-cols-2 gap-4 mt-8">

              <p class="inline-flex flex-col xl:flex-row xl:items-center text-gray-800">
                <svg class="inline-block w-5 h-5 xl:w-4 xl:h-4 mr-3 fill-current text-gray-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M399.959 170.585c-4.686 4.686-4.686 12.284 0 16.971L451.887 239H60.113l51.928-51.444c4.686-4.686 4.686-12.284 0-16.971l-7.071-7.07c-4.686-4.686-12.284-4.686-16.97 0l-84.485 84c-4.686 4.686-4.686 12.284 0 16.971l84.485 84c4.686 4.686 12.284 4.686 16.97 0l7.071-7.07c4.686-4.686 4.686-12.284 0-16.971L60.113 273h391.773l-51.928 51.444c-4.686 4.686-4.686 12.284 0 16.971l7.071 7.07c4.686 4.686 12.284 4.686 16.97 0l84.485-84c4.687-4.686 4.687-12.284 0-16.971l-84.485-84c-4.686-4.686-12.284-4.686-16.97 0l-7.07 7.071z"></path></svg>
                <span class="mt-2 xl:mt-0">
                   Үлдэгдэл: {{ $product->stock }}
                </span>
              </p>

            </div>

            <div class="grid grid-cols-2 mt-8">
              <div class="flex items-center">
                <p class="ml-2 text-gray-800 line-clamp-1">
                   {{ $product->category->name }}
                </p>
              </div>

              <div class="flex justify-end">
                <p class="inline-block font-semibold text-primary whitespace-nowrap leading-tight rounded-xl">

                  <span class="text-lg">{{ number_format($product->price) }}</span> ₮
                </p>
              </div>
            </div>
          </div>
        </a>
      </div>
    @endforeach
    <div class="mt-6">
        {{ $products->links() }}
    </div>
  </div>
@endsection
