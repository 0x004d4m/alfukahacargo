<!-- About Start -->
<div class="container-fluid overflow-hidden py-5 px-lg-0" id="about">
    <div class="container about py-5 px-lg-0">
        <div class="row g-5 mx-lg-0">
            <div class="col-lg-6 ps-lg-0 wow fadeInLeft" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="position-absolute img-fluid w-100 h-100" src="{{url('template/img/new/about.jpg')}}" style="object-fit: cover;" alt="">
                </div>
            </div>
            <div class="col-lg-6 about-text wow fadeInUp" data-wow-delay="0.3s">
                <h6 class="text-secondary text-uppercase mb-3">{{__('content.about')}}</h6>
                {{-- <h1 class="mb-5">{{__('content.about1')}}</h1> --}}
                <p class="mb-5">{!!nl2br(__('content.about1'))!!}</p>
                {{-- <div class="row g-4 mb-5">
                    <div class="col-sm-6 wow fadeIn" data-wow-delay="0.5s">
                        <i class="fa fa-globe fa-3x text-primary mb-3"></i>
                        <h5>Global Coverage</h5>
                        <p class="m-0">Stet stet justo dolor sed duo. Ut clita sea sit ipsum diam lorem diam justo.</p>
                    </div>
                    <div class="col-sm-6 wow fadeIn" data-wow-delay="0.7s">
                        <i class="fa fa-shipping-fast fa-3x text-primary mb-3"></i>
                        <h5>On Time Delivery</h5>
                        <p class="m-0">Stet stet justo dolor sed duo. Ut clita sea sit ipsum diam lorem diam justo.</p>
                    </div>
                </div> --}}
                <a href="#facts" class="btn btn-primary py-3 px-5">{{__('content.read_more')}}</a>
            </div>
        </div>
    </div>
</div>
<!-- About End -->
