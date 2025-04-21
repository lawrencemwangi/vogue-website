<x-app-layout>
    @include('partials.navbar')

    <div class="contact_container main_container">
        <div class="contact_infor">
            <p>{{ config('site_settings.email') }}</p>
            <p>{{ config('site_settings.contact') }} </p>
        </div>
        <div class="contact_form">
            <form action="{{ route('messages.store') }}" method="post">
                @csrf
                
                <div class="input_group">
                    <div class="input_content">
                        <input type="text" name="names" id="names"  required>
                        <label for="names"><i class="fas fa-user-alt"></i>Names</label>
                        <span class="inline_alert">{{ $errors->first('names') }}</span>
                    </div>

                    <div class="input_content">
                        <input type="email" name="email" id="email" required >
                        <label for="email"><i class="fas fa-envelope"></i>Email</label>
                        {{-- <span class="inline_alert">{{ $errors->first('email') }}</span> --}}
                    </div>

                    <div class="input_content">
                        <textarea name="message" id="message" cols="7" rows="6" required></textarea>
                        <label for="message"><i class="fas fa-comments"></i>Message</label>
                        <span class="inline_alert">{{ $errors->first('message') }}</span>

                    </div>
                </div>
                <button class="btn" type="submit">Submit</button>
            </form>
        </div>
    </div>

    @include('partials.footer')

</x-app-layout>