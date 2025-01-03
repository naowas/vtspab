@include('layouts.header')
<main class="main">

    <!-- Page Title -->
    <div class="page-title" style="margin-top: 20px">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">

                        {{--                        <p class="mb-0">Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>--}}

                    </div>
                </div>
            </div>
        </div>
    </div><!-- End Page Title -->

    <div class="container">
        <div class="row">

            <div class="col-lg-12">

                <!-- Blog Details Section -->
                <section id="blog-details" class="blog-details section">
                    <div class="container">

                        <article class="article">
                            <div class="post-img">
                                <img src="{{Storage::url($post->banner)}}" alt="" class="img-fluid">
                            </div>

                            <h2 class="title">{{$post->title}}</h2>

                            <div class="meta-top">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                            href="#">{{$post->author->name}}</a></li>
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#">
                                            <time
                                                datetime="{{\Carbon\Carbon::parse($post->published_at)->format('D M Y')}}">{{\Carbon\Carbon::parse($post->published_at)->format('D M Y')}}</time>
                                        </a></li>
                                </ul>
                            </div><!-- End meta top -->

                            <div class="content">
                                {!! $post->content !!}

                            </div><!-- End post content -->

                            <div class="meta-bottom">
                                <i class="bi bi-folder"></i>
                                <ul class="cats">
                                    <li><a href="#">{{$post->category->name}}</a></li>
                                </ul>

                                {{--                                <i class="bi bi-tags"></i>--}}
                                {{--                                <ul class="tags">--}}
                                {{--                                    <li><a href="#">Creative</a></li>--}}
                                {{--                                    <li><a href="#">Tips</a></li>--}}
                                {{--                                    <li><a href="#">Marketing</a></li>--}}
                                {{--                                </ul>--}}
                            </div><!-- End meta bottom -->

                        </article>

                    </div>
                </section><!-- /Blog Details Section -->

            </div>

        </div>
    </div>

</main>

@include('layouts.footer')
