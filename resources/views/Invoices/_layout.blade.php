{{-- This page holds the layout for the invoice page --}}
<x-layout>
    <x-slot name="title">PayGo - @yield('title')</x-slot>
    @include('partials._nav-menu')
    @include('partials._menu-side-bar')
    <div class="sm:w-[80%] md:h-[500px] md:border md:border-solid rounded-[20px] md:flex md:flex-col md:justify-center items-center">

        <div class="flex flex-col  items-center justify-between md:justify-center  h-screen md:h-full mt-10 ">

            @yield('content')
           

        </div>
    </div>
    </main>
    </div>

</x-layout>
