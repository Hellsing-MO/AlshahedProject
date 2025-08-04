<!--contact-->
<section class="contact" id="contact">
  <div class="contact-text">
    <h2 class="revial-top">{{__('messages.contact us')}}</h2>
   
    <div class="social">
      <a href="https://www.instagram.com/alshahedhoney?igsh=MThka284ZmdsemIxYQ=="><i class='bx bxl-instagram-alt revial-lift'></i></a>
      <a href="https://www.facebook.com/profile.php?id=61560393087783"><i class='bx bxl-facebook revial-top'></i></a>
      <a href="http://wa.me/14379951819/"><i class='bx bxl-whatsapp revial-bottom'></i></a>
    </div>
  </div>

  <div class="footer-content">
    <!-- Quick Links and Contact Info Row -->
    <div class="footer-row">
      <!-- Website Links Section -->
      <div class="footer-section">
        <h3>{{__('messages.quick_links')}}</h3>
        <ul class="footer-links">
          <li><a href="{{url('/')}}"><i class='bx bx-home-alt'></i> {{__('messages.Home')}}</a></li>
          <li><a href="{{url('about_us')}}"><i class='bx bx-info-circle'></i> {{__('messages.about us')}}</a></li>
          <li><a href="{{url('our_shop')}}"><i class='bx bx-store'></i> {{__('messages.our shop')}}</a></li>
          <li><a href="{{ route('privacy.policy') }}"><i class='bx bx-shield-quarter'></i> {{ __('messages.privacy_policy') }}</a></li>
        </ul>
      </div>

      <!-- Contact Information Section -->
      <div class="footer-section">
        <h3>{{__('messages.contact_info')}}</h3>
        <div class="contact-details">
          <div class="contact-item">
            <a href="https://maps.google.com/?q=45+Grenoble+Dr,+North+York,+ON+M3C+1C4,+Canada" target="_blank">
              <i class='bx bxs-location-plus'></i>
              <span>North York, Canada</span>
            </a>
          </div>
          <div class="contact-item">
            <a href="tel:+14379951819">
              <i class='bx bx-mobile-alt'></i>
              <span>+1 (437) 995-1819</span>
            </a>
          </div>
          <div class="contact-item">
            <a href="mailto:alshahedhoney@gmail.com" target="_blank" rel="noopener" title="Send email to alshahedhoney@gmail.com">
              <i class='bx bxs-envelope'></i>
              <span>alshahedhoney@gmail.com</span>
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Newsletter Section -->
  </div>

  <!-- Footer Bottom -->
  <div class="footer-bottom">
    <div class="container">
      <p class="copyright">
        Copyright by <span>Alshahed</span>. All rights reserved.
      </p>
    </div>
  </div>
</section>