<x-app-layout>
    <div class="authentication_container login">

        <form action="{{ route('register') }}" method="post">
            @csrf

            <h1>Register</h1>

            <div class="input_group">
                <label for="names">Names</label>
                <input type="text" name="names" id="names" value="{{ old('names') }}" placeholder="User names" required>
                <span class="inline_alert">{{ $errors->first('names') }}</span>
            </div>

            <div class="input_group">
                <label for="phone_number">Phone Number</label>
                <input type="number" name="phone_number" id="phone_number" value="{{ old('phone_number') }}" placeholder="0700000000" required>
                <span class="inline_alert">{{ $errors->first('phone_number') }}</span>
            </div>

            <div class="input_group">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="example@gmail.com" required>
                <span class="inline_alert">{{ $errors->first('email') }}</span>
            </div>

            <div class="input_group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" value="{{ old('password') }}" placeholder="8 character password" required>
                <span class="inline_alert">{{ $errors->first('password') }}</span>
            </div>
            <div class="input_group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="8 character password" required>
                <span class="inline_alert">{{ $errors->first('password_confirmation') }}</span>
            </div>

            <div class="input_group">
                Already have an account? <a href="{{ route('login') }}">Login</a>
            </div>

            <button type="submit">Register</button>
        </form>
    </div>
</x-app-layout>
