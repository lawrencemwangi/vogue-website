<x-app-layout>
    <div class="authentication_container">
        <form action="{{ route('password.store') }}" method="post">
            @csrf

            <h1>Reset Password</h1>

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="input_group">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" value="{{ old('email', $request->email ) }}" required>
                <span class="inline_alert">{{ $errors->first('email') }}</span>
            </div>

            <div class="input_group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" value="{{ old('password') }}" required>
                <span class="inline_alert">{{ $errors->first('password') }}</span>
            </div>

            <div class="input_group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" value="{{ old('password_confirmation') }}" required>
                <span class="inline_alert">{{ $errors->first('password_confirmation') }}</span>
            </div>

            <button type="submit">Reset Password</button>
        </form>
    </div>
</x-app-layout>
