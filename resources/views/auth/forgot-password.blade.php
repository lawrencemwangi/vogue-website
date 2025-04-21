<x-app-layout>
    <div class="authentication_container login">
        <form action="{{ route('password.email') }}" method="post">
            @csrf

            <h1>Reset Notification</h1>
            <p>Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to create a new one.</p>


            <div class="input_group">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="example@gmail.com" required autofocus>
                <span class="inline_alert">{{ $errors->first('email') }}</span>
            </div>

            <button type="submit">Password Reset Link</button>
        </form>
    </div>
</x-app-layout>
