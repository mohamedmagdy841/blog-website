@extends("theme.master")

@section("head", "Home")
@section('home-active', 'active')

@section("content")
    <main class="site-main">
        <!--================Hero Banner start =================-->
        <section class="mb-30px">
            <div class="container">
                <div class="hero-banner">
                    <div class="hero-banner__content">
                        <h3>Global Perspectives: Travel, Sports, Food, and Technology Trends</h3>
                        <h4>{{ date("d M Y") }}</h4>
                    </div>
                </div>
            </div>
        </section>
        <!--================Hero Banner end =================-->

        <!--================ Blog slider start =================-->
        @if(count($sliderBlogs) > 0)
            <section>
                <div class="container">
                    <div class="owl-carousel owl-theme blog-slider">
                        @foreach($sliderBlogs as $blog)
                            <div class="item">
                                <div class="blog-slider-content">
                                    <a href="{{ route("blogs.show", ["blog"=> $blog]) }}">
                                        <img src="{{ asset('storage/blogs/' . $blog->image) }}" alt="{{ $blog->name }}" class="blog-slider-img img-fluid">
                                    </a>
                                    <div class="blog-details">
                                        <h5>{{ $blog->name }}</h5>
                                        <p>{{ $blog->category->name }} | {{ $blog->created_at->format('M d, Y') }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
        <!--================ Blog slider end =================-->

        <!--================ Start Blog Post Area =================-->
        <section class="blog-post-area section-margin mt-4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        @if(count($blogs) > 0)
                            @foreach($blogs as $blog)
                                <div class="single-recent-blog-post">
                                    <div class="thumb">
                                        <img class="img-fluid" src="{{ asset("storage")}}/blogs/{{ $blog->image }}" alt="">
                                        <ul class="thumb-info">
                                            <li><a href="#"><i class="ti-user"></i>{{ $blog->user->name }}</a></li>
                                            <li><a href="#"><i class="ti-notepad"></i>{{ $blog->created_at->format("d M Y") }}</a></li>
                                            <li><a href="#"><i class="ti-themify-favicon"></i>{{ count($blog->comments) }} comments</a></li>
                                        </ul>
                                    </div>
                                    <div class="details mt-20">
                                        <a href="{{ route('blogs.show', ['blog' => $blog]) }}">
                                            <h3>{{ $blog->name }}</h3>
                                        </a>
                                        <p>{{ $blog->description }}</p>
                                        <a class="button" href="{{ route("blogs.show", ["blog"=> $blog]) }}">Read More <i class="ti-arrow-right"></i></a>
                                    </div>
                                </div>
                            @endforeach
                        @endif


                        <div class="row">
                            <div class="col-lg-12">
                                {{ $blogs->render("pagination::bootstrap-5") }}
                            </div>
                        </div>
                    </div>
                    @include("theme.partials.sidebar")
                </div>
            </div> </section>
        <!--================ End Blog Post Area =================-->
    </main>
@endsection

