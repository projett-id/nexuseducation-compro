<footer id="footer" class="footer accent-background">
    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">Nexuseducation</span>
          </a>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-6 footer-links">
          <!-- <h4>Useful Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Contact Us</a></li>
          </ul> -->
        </div>

        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>Contact Us</h4>
          <p>{{$footerData->address}}</p>
          <p class="mt-4"><strong>Phone:</strong> <span>{{$footerData->contact_no}}</span></p>
          <p><strong>Email:</strong> <span>{{$footerData->email}}</span></p>
        </div>

      </div>
    </div>
  </footer>