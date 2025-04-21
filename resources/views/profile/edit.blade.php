<x-app-layout>
    @include('partials.navbar')

    <div class="profile_container main_container">
        
        <form action="{{ route('profile.update') }}" method="post">
            @csrf
            @method('patch')

            <h1>Profile Information</h1>

           <div class="group">
                <div class="input_group">
                    <label for="names">Names</label>
                    <input type="text" name="names" id="names" value="{{ old('names', $user->names) }}"> 
                    <span class="inline_alert">{{ $errors->first('names') }}</span> 
                </div>

                <div class="input_group">
                    <label for="phone_number">Phone Number</label>
                    <input type="number" name="phone_number" id="phone_number" value="{{ old('phone_number', $user->phone_number) }}"> 
                    <span class="inline_alert">{{ $errors->first('phone_number') }}</span> 
                </div>
           </div>
           
            <div class="input_group">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"> 
                <span class="inline_alert">{{ $errors->first('email') }}</span> 
            </div>

            <button type="submit">update Profile</button>
        </form>
        <br>

        <form action="{{ route('password.update') }}" method="post">
            @csrf
            @method('put')

            <h1> Update Password</h1>

            <div class="input_group">
                <label for="update_password_current_password">Current Password</label>
                <input type="password" name="current_password" id="update_password_current_password" value="{{ old('Current Password') }}" placeholder="********"> 
                <span class="inline_alert">{{ $errors->first('Current Password') }}</span> 
            </div>

            <div class="group">
                <div class="input_group">
                    <label for="update_password_password">New Password</label>
                    <input type="password" name="password" id="update_password_password" value="{{ old('New Password') }}" placeholder="8 character password"> 
                    <span class="inline_alert">{{ $errors->first('password') }}</span> 
                </div>

                <div class="input_group">
                    <label for="update_password_password_confirmation">Email Address</label>
                    <input type="password" name="password_confirmation" id="update_password_password_confirmation" value="{{ old('Confirm Password') }}" placeholder="8 character password"> 
                    <span class="inline_alert">{{ $errors->first('password_confirmation') }}</span> 
                </div>
            </div>

            <button type="submit">Update Password</button>
        </form>
        <br>

        <form action="{{ route('profile.destroy') }}" method="post">
            @csrf
            @method('delete')

            <h1>Delete Account</h1>
            <p>Once your account is deleted, all of its resources and data will be permanently deleted.
                Before deleting your account, please download any data or information that you wish to retain.
            </p>

            <input type="password" name="latest_password" id="password" placeholder="Enter Your Password">
            <span class="inline_alert">{{ $errors->first('latest_password') }}</span>

            <button type="submit" id="deleteButton"  style="display: none;" class="alert-danger">Delete</button>
        </form>
    </div>
</x-app-layout>
