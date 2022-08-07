     @php

    $slider = App\Models\Slider::orderBy('slider_title','ASC')->get();
    @endphp

 <section class="home-slider position-relative mb-30">
            <div class="container">
                <div class="home-slide-cover mt-30">
                    <div class="hero-slider-1 style-4 dot-style-1 dot-style-1-position-1">

                    @foreach($slider as $item)
                        <div class="single-hero-slider single-animation-wrap" style="background-image: url({{ asset($item->slider_image ) }})">
                            <div class="slider-content">
                                <h1 class="display-2 mb-40">
                                    {{ $item->slider_title }}
                                </h1>
                                <p class="mb-65">{{ $item->short_title }}</p>
                                <form class="form-subcriber d-flex">
                                    <input type="email" placeholder="Your emaill address" />
                                    <button class="btn" type="submit">Subscribe</button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="slider-arrow hero-slider-1-arrow"></div>
                </div>
            </div>
        </section>