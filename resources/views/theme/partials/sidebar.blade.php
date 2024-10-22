@php
    $headerCategories = App\Models\Category::take(5)->get();
    $recentBlogs = App\Models\Blog::latest()->take(3)->get();
@endphp

<!-- Start Blog Post Siddebar -->
<div class="col-lg-4 sidebar-widgets">
    <div class="widget-wrap">
        <div class="single-sidebar-widget newsletter-widget">
            <h4 class="single-sidebar-widget__title">Newsletter</h4>
            @if (session('subscribe-status'))
                <div class="alert alert-success">
                    {{ session('subscribe-status') }}
                </div>
            @elseif (session('subscribe-error'))
                <div class="alert alert-danger">
                    {{ session('subscribe-error') }}
                </div>
            @endif
            <form action="{{ route('subscriber.store') }}" method="post">
                @csrf
                <div class="form-group mt-30">
                    <div class="col-autos">
                        <input type="text" name="email" class="form-control" placeholder="Enter email" onfocus="this.placeholder = ''"
                               onblur="this.placeholder = 'Enter email'" value="{{ old('email') }}">
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="bbtns d-block mt-20 w-100">Subcribe</button>
            </form>
        </div>

        <div class="single-sidebar-widget post-category-widget">
            <h4 class="single-sidebar-widget__title">Catgory</h4>
            <ul class="cat-list mt-20">
                @if(count($headerCategories) > 0)
                        @foreach($headerCategories as $category)
                    <li>
                            <a href="{{ route("theme.category", ['id' => $category->id]) }}" class="d-flex justify-content-between">
                                <p>{{ $category->name }}</p>
                                <p>({{ count($category->blogs) }})</p>
                            </a>
                    </li>
                        @endforeach
                @endif
            </ul>
        </div>

        <div class="single-sidebar-widget popular-post-widget">
            <h4 class="single-sidebar-widget__title">Recent Post</h4>
            <div class="popular-post-list">
                @if(count($recentBlogs) > 0)
                    <div class="single-post-list">
                        @foreach($recentBlogs as $recentBlog)
                            <div class="thumb">
                                <a href="{{ route("blogs.show", ["blog"=> $recentBlog]) }}">
                                    <img class="card-img rounded-0" src="{{ asset("storage") }}/blogs/{{ $recentBlog->image }}" alt="">
                                </a>
                                <ul class="thumb-info">
                                    <li><a href="#">{{ $recentBlog->user->name }}</a></li>
                                    <li><a href="#">{{ $recentBlog->created_at->format('M d') }}</a></li>
                                </ul>
                            </div>
                            <div class="details mt-20">
                                <a href="{{ route('blogs.show', ['blog' => $blog]) }}">
                                    <h6>{{ $recentBlog->name }}</h6>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- End Blog Post Siddebar -->
