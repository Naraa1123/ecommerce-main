@extends('layouts.app')

@section('content')
    <div class="bg-gray-100 dark:bg-gray-800 py-8 mt-8">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row -mx-4">
                <div class="md:flex-1 px-4">
                    <div class="h-[460px] rounded-lg bg-gray-300 dark:bg-gray-700 mb-4">
                        <img class="w-full h-full object-cover" src="{{ Storage::url($product->image) }}" alt="Product Image">
                    </div>
                    <div class="flex -mx-2 mb-4">
                        <div class="w-1/2 px-2">
                            <form action="{{ route('cart.add') }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{ $product->id }}" name="product_id">
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class="w-full bg-gray-900 dark:bg-gray-600 text-white py-2 px-4 rounded-full font-bold hover:bg-gray-800 dark:hover:bg-gray-700">Сагсанд нэмэх</button>
                            </form>
                        </div>
                        <div class="w-1/2 px-2">
                            <button class="w-full bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-white py-2 px-4 rounded-full font-bold hover:bg-gray-300 dark:hover:bg-gray-600">Add to Wishlist</button>
                        </div>
                    </div>
                </div>
                <div class="md:flex-1 px-4">
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">{{ $product->name }}</h2>
                    <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed
                        ante justo. Integer euismod libero id mauris malesuada tincidunt.
                    </p>
                    <div class="flex mb-4">
                        <div class="mr-4">
                            <span class="font-bold text-gray-700 dark:text-gray-300">Үнэ:</span>
                            <span class="text-gray-600 dark:text-gray-300">{{ $product->price }}₮</span>
                        </div>
                        <div>
                            <span class="font-bold text-gray-700 dark:text-gray-300">Үлдэгдэл:</span>
                            <span class="text-gray-600 dark:text-gray-300">{{ $product->stock }}</span>
                        </div>
                    </div>
                    <div>
                        <span class="font-bold text-gray-700 dark:text-gray-300">Барааны мэдээлэл:</span>
                        <p class="text-gray-600 dark:text-gray-300 text-sm mt-2">
                            {{ $product->description }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- component -->
    <div class="antialiased mx-auto mt-8">
        <h3 class="mb-4 text-lg font-semibold text-gray-900">Сэтгэгдлүүд</h3>

        <!-- component -->
        <!-- comment form -->
        <div class="flex mx-auto items-center justify-center shadow-lg mx-8 mb-4">
            <form action="{{ route('comment.store', ['id' => $product->id]) }}" method="POST" class="w-full bg-white rounded-lg px-4 pt-2">
                @csrf
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-full px-3 mb-2 mt-2">
                        <textarea name="comment" " class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" name="body" placeholder='Сэтгэгдэл бичих' required></textarea>
                    </div>
                    <div class="w-full md:w-full flex items-start md:w-full px-3">

                        <div class="-mr-1">
                            <input type='submit' class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100" value='Сэтгэгдэл илгээх'>
                        </div>
                    </div>

            </form>
        </div>
    </div>
        <div class="space-y-4">

            @foreach($product->comments as $comment)
                <div class="flex">
                    <div class="flex-shrink-0 mr-3">
                        <img class="mt-2 rounded-full w-8 h-8 sm:w-10 sm:h-10" src="https://images.unsplash.com/photo-1604426633861-11b2faead63c?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=200&h=200&q=80" alt="">
                    </div>
                    <div class="flex-1 border rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
                        <strong>{{ $comment->user->name }}</strong> <span class="text-xs text-gray-400">3:34 PM</span>
                        <p class="text-sm">
                            {{ $comment->comment }}
                        </p>
                    </div>
                </div>
            @endforeach



        </div>
    </div>
@endsection
