@extends("theme.master")

@section("head", "My Blogs")

@section("content")
    <!--================ Hero sm banner start =================-->
    <section class="mb-5px">
        <div class="container">
            <div class="hero-banner hero-banner--sm">
                <div class="hero-banner__content">
                    <h1>My Blogs</h1>
                </div>
            </div>
        </div>
    </section>
    <!--================ Hero sm banner end =================-->

    <!-- ================ contact section start ================= -->
    <section class="section-margin--small section-margin">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if(count($blogs) > 0)
                        @if (session('status-delete-blog'))
                            <div class="alert alert-success">
                                {{ session('status-delete-blog') }}
                            </div>
                        @endif
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Created at</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($blogs as $blog)
                                <tr>
                                    <th scope="row">{{ $loop->iteration  }}</th>
                                    <td>{{ $blog->name }}</td>
                                    <td>{{ $blog->created_at->format("d M Y, h:i A") }}</td>
                                    <td>
                                        <a href="{{ route("blogs.edit", ["blog"=>$blog]) }}" class="btn btn-primary">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{ route("blogs.destroy", ['blog'=>$blog]) }}" method="post" id="deleteForm-{{ $blog->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $blog->id }})">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif

                </div>
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->
@endsection


