<x-admin-layout>
    <h1>Update User</h1>
     
    <form action="{{ route('users.update', ['user' => $user]) }}" method="post">
        @csrf
        @method('PATCH')

        <ul>
            <li> Client Names:- <span>{{ $user->names }}</span></li>
            <li>Client Email:- <span>{{ $user->email }}</span></li>
            <li>Client Contact:- <span>{{ $user->phone_number }}</span></li>
        </ul>
       
        <div class="group">
            <div class="input_group">
                <label for="user_level">User Level</label>
                <div class="custom_radio_buttons">
                    <label>
                        <input class="option_radio" type="radio" name="user_level" id="admin" value="1" {{ old('user_level', $user->user_level) == '1' ? 'checked' : '' }}>
                        <span>Admin</span>
                    </label>

                    <label>
                        <input class="option_radio" type="radio" name="user_level" id="user" value="2" {{ old('user_level', $user->user_level) == '2' ? 'checked' : '' }}>
                        <span>User</span>
                    </label>
                    <span class="inline_alert">{{ $errors->first('user_level') }}</span>
                </div>
            </div>

            <div class="input_content">
                <label for="status">Status</label>
                <div class="custom_radio_buttons">
                    <label>
                        <input class="option_radio" type="radio" name="status" id="active" value="1" {{ old('status', $user->status) == '1' ? 'checked' : '' }}>
                        <span>Active</span>
                    </label>

                    <label>
                        <input class="option_radio" type="radio" name="status" id="inactive" value="0" {{ old('status', $user->status) == '0' ? 'checked' : '' }}>
                        <span>Inactive</span>
                    </label>
                    <span class="inline_alert">{{ $errors->first('status') }}</span>
                </div>
            </div>
        </div>

        <button type="submit">Update User</button>
    </form>    
</x-admin-layout>