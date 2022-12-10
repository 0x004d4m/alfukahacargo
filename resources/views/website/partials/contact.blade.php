<!-- Contact Start -->
<div class="container-fluid overflow-hidden py-5 px-lg-0" id="contact">
    <div class="container contact-page py-5 px-lg-0">
        <div class="row g-5 mx-lg-0">
            <div class="col-md-6 contact-form wow fadeIn" data-wow-delay="0.1s">
                <h6 class="text-secondary text-uppercase">{{__('content.contact1')}}</h6>
                <h1 class="mb-4">{{__('content.contact2')}}</h1>
                <div class="row">
                    <div class="col-md-4">
                        <p class="h6">
                            {{__('content.usa')}}<br>
                            <a href="mailto:info@alfukaha.com" dir="ltr">info@alfukaha.com</a><br>
                            <a href="mailto:info@alfukahacargo.com" dir="ltr">info@alfukahacargo.com</a><br>
                            <a hreef="tel:+12164008927" dir="ltr">+12164008927</a><br>
                            <span dir="ltr">4403 Business Ln, Plant City, FL 33566</span><br>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <p class="h6">
                            {{__('content.uae')}}<br>
                            {{__('content.CARSANDAUCTIONS')}}:<br>
                            <a href="mailto:uae@alfukaha.com" dir="ltr">uae@alfukaha.com</a><br>
                            {{__('content.SHIPPINGANDCARGO')}}:<br>
                            <a href="mailto:uae@alfukahacargo.com" dir="ltr">uae@alfukahacargo.com</a><br>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <p class="h6">
                            {{__('content.JORDAN')}}<br>
                            <a href="mailto:jordan@alfukahacargo.com" dir="ltr">jordan@alfukahacargo.com</a><br>
                            <a href="mailto:qusae@alfukaha.com" dir="ltr">qusae@alfukaha.com</a><br>
                            <a href="tel:+962780600108" dir="ltr">+962780600108</a><br>
                            <span dir="ltr">15 ST FREE ZONE ZARQA</span><br>
                        </p>
                    </div>
                    <div class="footer" style="background:none">
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social text-dark" href="https://www.instagram.com/fukhaa8/" target="_blank"><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-outline-light btn-social text-dark" href="https://www.facebook.com/q.fuqaha" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social text-dark" href="https://wa.me/12164008927" target="_blank"><i class="fab fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
                @if(Session::has('success'))
                    <div class="alert alert-success">{{__('content.sent_successfuly')}}</div>
                @endif
                <div class="bg-light p-4">
                    <form method="POST" >
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="name" placeholder="{{__('content.contact3')}}" required>
                                    <label for="name">{{__('content.contact3')}}</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" name="email" placeholder="{{__('content.contact4')}}" required>
                                    <label for="email">{{__('content.contact4')}}</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="subject" placeholder="{{__('content.contact5')}}" required>
                                    <label for="subject">{{__('content.contact5')}}</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a message here" name="message" style="height: 100px" required></textarea>
                                    <label for="message">{{__('content.contact6')}}</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">{{__('content.contact7')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6 pe-lg-0 wow fadeInRight" data-wow-delay="0.1s">
                <div class="position-relative h-100">
                    <iframe class="position-absolute w-100 h-100" style="object-fit: cover;"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3523.0001836112565!2d-82.1702183849316!3d27.99389078267412!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88dd347cd038f985%3A0x140fef6906ec62bc!2s4403%20Business%20Ln%2C%20Plant%20City%2C%20FL%2033566%2C%20USA!5e0!3m2!1sen!2sjo!4v1670626420808!5m2!1sen!2sjo"
                    frameborder="0" allowfullscreen="" aria-hidden="false"
                    tabindex="0"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->
