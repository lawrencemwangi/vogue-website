<x-app-layout>
    <div class="authentication_container login">
        <div class="mb-4 text-sm text-gray-600">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>
    
        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <form action="{{ route('verification.send') }}" method="post">
            @csrf
            <h1>Verify Email Address</h1>

            <button type="submit">Resend Verification Email</button>
        </form>
    </div>
</x-app-layout>

