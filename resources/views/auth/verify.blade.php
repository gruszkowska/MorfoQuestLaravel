@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
    <div class="flex">
        <div class="w-full">

            @if (session('resent'))
            <div class="text-sm border border-t-8 rounded text-red-500 border-red-500 bg-gray-100  px-3 py-4 mb-4"
                role="alert">
                {{ __('A fresh verification link has been sent to your email address.') }}
            </div>
            @endif

            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm">
                <header class="font-semibold bg-gray-300 text-black py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    {{ __('Verify Your Email Address') }}
                </header>

                <div class="w-full flex flex-wrap text-black leading-normal text-sm p-6 space-y-4 sm:text-base sm:space-y-6">
                    <p>
                        {{ __('Before proceeding, please check your email for a verification link.') }}
                    </p>

                    <p>
                        {{ __('If you did not receive the email') }}, <a
                            class="text-red-500 hover:text-red-600 no-underline hover:underline cursor-pointer"
                            onclick="event.preventDefault(); document.getElementById('resend-verification-form').submit();">{{ __('click here to request another') }}</a>.
                    </p>

                    <form id="resend-verification-form" method="POST" action="{{ route('verification.resend') }}"
                        class="hidden">
                        @csrf
                    </form>
                </div>

            </section>
        </div>
    </div>
</main>
@endsection
