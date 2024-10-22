<!--================ Start Footer Area =================-->
<footer class="footer-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-3  col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>About Us</h6>
                    <p>
                        Global Perspectives is your go-to source for the latest trends in Technology, Travel, Sports, and Food.
                        Our mission is to inspire and inform our readers through engaging articles and insights.
                        Join us as we explore the dynamic world around us and share experiences that ignite curiosity and passion.
                    </p>
                </div>
            </div>
            <div class="col-lg-4  col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>Newsletter</h6>
                    <p>Stay update with our latest</p>
                    <div>
                        @if (session('subscribe-status'))
                            <div class="alert alert-success">
                                {{ session('subscribe-status') }}
                            </div>
                        @elseif (session('subscribe-error'))
                            <div class="alert alert-danger">
                                {{ session('subscribe-error') }}
                            </div>
                        @endif
                        <form action="{{ route("subscriber.store") }}" method="post" class="form-inline">
                            @csrf

                            <div class="d-flex flex-row">

                                <input class="form-control" name="email" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '"
                                       type="email" value="{{ old("email") }}">


                                <button type="submit" class="click-btn btn btn-default"><span class="lnr lnr-arrow-right"></span></button>


                                <!-- <div class="col-lg-4 col-md-4">
                                      <button class="bb-btn btn"><span class="lnr lnr-arrow-right"></span></button>
                                    </div>  -->
                            </div>
                            <div class="info"></div>
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3  col-md-6 col-sm-6">
                <div class="single-footer-widget mail-chimp">
                    <h6 class="mb-20">Instragram Feed</h6>
                    <ul class="instafeed d-flex flex-wrap">
                        <li><img src="{{ asset("assets")}}/img/instagram/i1.jpg" alt=""></li>
                        <li><img src="{{ asset("assets")}}/img/instagram/i2.jpg" alt=""></li>
                        <li><img src="{{ asset("assets")}}/img/instagram/i3.jpg" alt=""></li>
                        <li><img src="{{ asset("assets")}}/img/instagram/i4.jpg" alt=""></li>
                        <li><img src="{{ asset("assets")}}/img/instagram/i5.jpg" alt=""></li>
                        <li><img src="{{ asset("assets")}}/img/instagram/i6.jpg" alt=""></li>
                        <li><img src="{{ asset("assets")}}/img/instagram/i7.jpg" alt=""></li>
                        <li><img src="{{ asset("assets")}}/img/instagram/i8.jpg" alt=""></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>Follow Us</h6>
                    <p>Let us be social</p>
                    <div class="footer-social d-flex align-items-center">
                        <a href="#">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-dribbble"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-behance"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
            <p class="footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved </p>
        </div>
    </div>
</footer>
<!--================ End Footer Area =================-->
