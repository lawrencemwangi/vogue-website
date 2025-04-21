<div class="footer_container">
    <div class="footer_content">
        <div class="footer_infor">
            <img src="{{ config('site_settings.logo') }}" width="45px" height="45px" alt="site Logo">
            <p>{{ config('app.name') }}</p>
            <p>{{ config('site_settings.email') }}</p>
            <p>{{ config('site_settings.contact') }}</p>
            <p></p>
        </div>
    
        <div class="footer_links">
            <h3>Links</h3>
            <div class="links">
                <a href="{{ route('shop') }}">Shop</a>
                <a href="{{ route('contact') }}">Contact</a>
                <a href="#">blog</a>
            </div>
        </div>
    
        <div class="footer_social">
            <h3>Contact</h3>
            <div class="social_media">
                <a href="https://github.com/lawrencemwangi" target="_blank" rel="noopener noreferrer">
                    <img src="{{ asset('assets/images/facebook.png') }}" alt="github icon">
                </a>
                
                <a href="{{ config('site_settings.social_links.instagram') }}" target="_blank" rel="noopener noreferrer">
                    <img src="{{ asset('assets/images/instagram.png') }}" alt="instagram icon">
                </a>
    
                <a href="{{ config('site_settings.social_links.youtube') }}" target="_blank" rel="noopener noreferrer">
                    <img src="{{ asset('assets/images/youtube.png') }}" alt="youtube icon">
                </a>
            
                <a href="http://wa.me/254799509242?text='Hello {{ config('site_settings.site_name') }}'" target="_blank" rel="noopener noreferrer">
                    <img src="{{ asset('assets/images/whatsapp.png') }}" alt="whatapp icon">
                </a>
            </div>
        </div>
    </div>

    <hr>

    <div class="copyright">
         <p>&copy; 2025 | {{ config('site_settings.site_name') }} | All Rights Reserved</p>
    </div>
</div>



