@include('layouts.header')

<style>
    .portfolio-content {
        aspect-ratio: 1/1;  /* Makes containers square */
        margin-bottom: 15px;
        position: relative;
        cursor: pointer;
    }

    .portfolio-content img {
        width: 100%;
        height: 100%;
        object-fit: cover;  /* Maintains aspect ratio while covering container */
    }

    .col-lg-3-custom {  /* Custom column size for 4 items per row */
        width: 25%;
        padding-right: 15px;
        padding-left: 15px;
    }

    .portfolio-info {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(0, 0, 0, 0.7);
        padding: 10px;
        color: white;
        opacity: 0;
        transition: all 0.3s ease;
    }

    .portfolio-content:hover .portfolio-info {
        opacity: 1;
    }

    @media (max-width: 991.98px) {
        .col-lg-3-custom {
            width: 33.333%;  /* 3 per row on medium screens */
        }
    }

    @media (max-width: 767.98px) {
        .col-lg-3-custom {
            width: 50%;  /* 2 per row on small screens */
        }
    }
</style>

<main class="main py-4" style="margin-top: 100px">
    <section id="portfolio" class="portfolio section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <p>Activity gallery</p>
        </div>

        <div class="container">
            <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

                <!-- Dynamic Album Type Filters -->
                <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                    <li data-filter="*" class="filter-active">All</li>
                    @foreach($albums->keys() as $albumType)
                        <li data-filter=".filter-{{ Str::slug($albumType) }}">{{ ucfirst($albumType) }}</li>
                    @endforeach
                </ul>

                <!-- Photo Albums Grid -->
                <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                    @foreach($albums as $albumType => $albumGroup)
                        @foreach($albumGroup as $album)
                            @foreach($album->media as $index => $media)
                                <div class="col-lg-3-custom col-md-6 portfolio-item isotope-item filter-{{ Str::slug($albumType) }}">
                                    <a href="{{ $media->getUrl() }}"
                                       data-gallery="portfolio-gallery-{{ $album->id }}"
                                       class="glightbox"
                                       title="{{ $album->title }} - Image {{ $index + 1 }}">
                                        <div class="portfolio-content">
                                            <img src="{{ $media->getUrl() }}" alt="{{ $album->title }} - Image {{ $index + 1 }}">
                                            <div class="portfolio-info">
                                                <p>{{ $album->description ?? $albumType }} ({{ $index + 1 }}/{{ $album->media->count() }})</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach

                            {{-- Create a hidden container for all album images to enable full gallery view --}}
                            <div class="hidden">
                                @foreach($album->media as $media)
                                    <a href="{{ $media->getUrl() }}"
                                       data-gallery="portfolio-gallery-{{ $album->id }}"
                                       title="{{ $album->title }} - Image {{ $loop->iteration }}/{{ $album->media->count() }}">
                                    </a>
                                @endforeach
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</main>

@include('layouts.footer')

<script>
    window.addEventListener('load', () => {
        let portfolioContainer = document.querySelector('.isotope-container');
        if (portfolioContainer) {
            let portfolioIsotope = new Isotope(portfolioContainer, {
                itemSelector: '.portfolio-item',
                layoutMode: 'masonry',
                masonry: {
                    columnWidth: '.col-lg-3-custom'
                }
            });

            let portfolioFilters = document.querySelectorAll('.isotope-filters li');
            portfolioFilters.forEach(filter => {
                filter.addEventListener('click', (e) => {
                    e.preventDefault();
                    portfolioFilters.forEach(el => el.classList.remove('filter-active'));
                    filter.classList.add('filter-active');

                    portfolioIsotope.arrange({
                        filter: filter.getAttribute('data-filter')
                    });
                });
            });
        }
    });
</script>
