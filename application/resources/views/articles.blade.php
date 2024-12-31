@extends('layouts.app')
@include('header')

@section('content')
<div id="app">
    <div class="trending">
        <br>
        <br>
        <br>
        <p>.</p>
        <p>.</p>
        <h1>Trending</h1>
        <p>.</p>
    </div>
    <div class="hero_section">
        <div class="cards_box swiper">
            <div class="swiper-wrapper">
                <!-- Card details -->
                <section class="card_details swiper-slide">
                    <div class="card_img_box">
                        <img class="card-img-top" src="{{ asset('images/health.jpg') }}" alt="Post image">
                    </div>
                    <div class="card_data">
                        <h5 class="card_name">Post Title</h5>
                        <br>
                        <a href="#" class="card_button">View Article</a>
                    </div>
                </section>
                <section class="card_details swiper-slide">
                    <div class="card_img_box">
                        <img class="card-img-top" src="{{ asset('images/2.jpg') }}" alt="Post image">
                    </div>
                    <div class="card_data">
                        <h5 class="card_name">Post Title</h5>
                        <br>
                        <a href="#" class="card_button">View Article</a>
                    </div>
                </section>
                <section class="card_details swiper-slide">
                    <div class="card_img_box">
                        <img class="card-img-top" src="{{ asset('images/3.jpg') }}" alt="Post image">
                    </div>
                    <div class="card_data">
                        <h5 class="card_name">Post Title</h5>
                        <br>
                        <a href="#" class="card_button">View Article</a>
                    </div>
                </section>
                <section class="card_details swiper-slide">
                    <div class="card_img_box">
                        <img class="card-img-top" src="{{ asset('images/4.jpg') }}" alt="Post image">
                    </div>
                    <div class="card_data">
                        <h5 class="card_name">Post Title</h5>
                        <br>
                        <a href="#" class="card_button">View Article</a>
                    </div>
                </section>
                <section class="card_details swiper-slide">
                    <div class="card_img_box">
                        <img class="card-img-top" src="{{ asset('images/5.jpg') }}" alt="Post image">
                    </div>
                    <div class="card_data">
                        <h5 class="card_name">Post Title</h5>
                        <br>
                        <a href="#" class="card_button">View Article</a>
                    </div>
                </section>
                <section class="card_details swiper-slide">
                    <div class="card_img_box">
                        <img class="card-img-top" src="{{ asset('images/2.jpg') }}" alt="Post image">
                    </div>
                    <div class="card_data">
                        <h5 class="card_name">Post Title</h5>
                        <br>
                        <a href="#" class="card_button">View Article</a>
                    </div>
                </section>
                <!-- Repeat for other posts as needed -->
            </div>
            <!-- Navigation buttons -->
            <div class="swiper-button-next">
                <i class="fa-solid fa-angle-right"></i>
            </div>
            <div class="swiper-button-prev">
                <i class="fa-solid fa-angle-left"></i>
            </div>
            <!-- Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <div class="art">
        <h1>Cool Articles</h1>
        <p>.</p>
    </div>
    <div class="band">
        <div class="item">
            <a href="#" class="card">
                <div class="thumb" style="background-image: url('{{ asset('images/3.jpg') }}');"></div>
                <article>
                    <h1>Article Title</h1>
                    <span>Author Name</span>
                </article>
            </a>
        </div>
        <div class="item">
            <a href="#" class="card">
                <div class="thumb" style="background-image: url('{{ asset('images/4.jpg') }}');"></div>
                <article>
                    <h1>Article Title</h1>
                    <span>Author Name</span>
                </article>
            </a>
        </div>
        <div class="item">
            <a href="#" class="card">
                <div class="thumb" style="background-image: url('{{ asset('images/5.jpg') }}');"></div>
                <article>
                    <h1>Article Title</h1>
                    <span>Author Name</span>
                </article>
            </a>
        </div>
        <div class="item">
            <a href="#" class="card">
                <div class="thumb" style="background-image: url('{{ asset('images/2.jpg') }}');"></div>
                <article>
                    <h1>Article Title</h1>
                    <span>Author Name</span>
                </article>
            </a>
        </div>
        <div class="item">
            <a href="#" class="card">
                <div class="thumb" style="background-image: url('{{ asset('images/3.jpg') }}');"></div>
                <article>
                    <h1>Article Title</h1>
                    <span>Author Name</span>
                </article>
            </a>
        </div>
        <div class="item">
            <a href="#" class="card">
                <div class="thumb" style="background-image: url('{{ asset('images/4.jpg') }}');"></div>
                <article>
                    <h1>Article Title</h1>
                    <span>Author Name</span>
                </article>
            </a>
        </div>
    </div>
    <br>
    <!-- New Section -->
    <section class="highlight_section">
        <div class="highlight_post">
            <br>
            <h1>In Case You Missed It</h1>
            <br>
            <br>
            <a href="#">
                <div class="highlight_img" style="background-image: url('{{ asset('images/5.jpg') }}');"></div>
                <div class="highlight_content">
                    <h2>Highlighted Post Title</h2>
                </div>
            </a>
        </div>
        <div class="latest_posts">
            <br>
            <br>
            <br>
            <ul>
                <li><a href="#">Post Title 1</a></li>
                <li><a href="#">Post Title 2</a></li>
                <li><a href="#">Post Title 3</a></li>
                <li><a href="#">Post Title 1</a></li>
                <li><a href="#">Post Title 2</a></li>
                <li><a href="#">Post Title 3</a></li>
                <li><a href="#">Post Title 1</a></li>
                <li><a href="#">Post Title 2</a></li>
                <li><a href="#">Post Title 3</a></li>
                <li><a href="#">Post Title 1</a></li>
                <li><a href="#">Post Title 2</a></li>
                <li><a href="#">Post Title 3</a></li>
                <li><a href="#">Post Title 2</a></li>
                <li><a href="#">Post Title 3</a></li>
            </ul>
        </div>
    </section>
    <div class="divider"></div>
</div>


@endsection

@section('styles')
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<style>
    h1 {
        font-size: 36px; /* Increase the font size */
        font-family: 'Georgia', serif;
        font-weight: bold; /* Make the text bold */
        margin-bottom: 2px;
        margin-left: 1cm;
        color: #333; /* Ensure the text is a visible color */
    }

    header h1 {
        margin-top: 1cm;
        text-align: center; /* Adjust the margin for the "Cool Articles" title */
    }
.art h1 { display: flex;
    justify-content: center;  /* Centers horizontally */
    align-items: center; ;}
.trending h1{
    display: flex;
    justify-content: center;  /* Centers horizontally */
    align-items: center;      /* Centers vertically */
}
    .cards_box {
        position: relative;
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
    }

    .swiper {
        width: 100%;
        height: 100%;
    }

    .swiper-wrapper {
        display: flex;
    }

    .swiper-slide {
        display: flex;
        justify-content: center;
    }

    .card_details {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        width: 300px;
        height: 400px;
        display: flex;
        flex-direction: column;
        box-sizing: border-box;
        margin: 10px;
    }

    .card_img_box {
        flex: 2;
        overflow: hidden;
    }

    .card-img-top {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .card_data {
        flex: 1;
        padding: 10px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .card_name {
        font-size: 1.2em;
        margin: 0;
    }

    .card_button {
        display: inline-block;
        padding: 10px 15px;
        background-color: #3579c3;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
    }

    .swiper-button-next,
    .swiper-button-prev {
        border-radius: 50%;
        background: rgba(0, 0, 0, 0.5);
        width: 40px;
        height: 40px;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .swiper-pagination-bullet {
        background-color: #ff0000;
    }

    .band {
        width: 90%;
        max-width: 1240px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr;
        grid-template-rows: auto;
        grid-gap: 20px;
    }

    @media (min-width: 30em) {
        .band {
            grid-template-columns: 1fr 1fr;
        }
    }

    @media (min-width: 60em) {
        .band {
            grid-template-columns: repeat(4, 1fr);
        }
    }

    .card {
        background: white;
        text-decoration: none;
        color: #444;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
        min-height: 100%;
        transition: all 0.1s ease-in;
        position: relative;
        top: 0;
    }

    .card:hover {
        top: -2px;
        box-shadow: 0 4px 5px rgba(0, 0, 0, 0.2);
    }

    .thumb {
        padding-bottom: 60%;
        background-size: cover;
        background-position: center;
    }

    article {
        padding: 20px;
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    h1 {
        font-size: 20px;
        margin: 0;
        color: #333;
    }

    span {
        font-size: 12px;
        font-weight: bold;
        color: #999;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        margin: 2em 0 0;
    }

    /* New section styling */
    .highlight_section {
        background-color: #a4a4a4;
        color: #000000;
        padding: 40px 20px;
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 1cm;
    }

    .highlight_post {
        display: flex;
        flex-direction: column;
        margin-left: 0.5cm;
    }

    .highlight_img {
        background-size: cover;
        background-position: center;
        height: 400px;
        width:700px;
        margin-bottom: 10px;
    }

    .highlight_content {
        color: #000000;
    }

    .highlight_post h1 {
        color: #000000;
        font-size: 28px;
        margin: 0;
    }

    .highlight_content h2 {
        font-size: 24px;
        margin: 0;
    }

    .latest_posts {
        flex: 1;
        max-width: 40%;
        margin-right: 4cm;
    }

    .latest_posts h3 {
        margin-bottom: 20px;
        font-size: 22px;
    }

    .latest_posts ul {
        list-style-type: none;
        padding: 0;
    }

    .latest_posts li {
        margin-bottom: 10px;
        border-bottom: 1px solid #000000;
    }

    .latest_posts li a {
        color: #000000;
        text-decoration: none;
        font-size: 16px;
    }

    .divider {
        height: 1px;
        background-color: #fff;
        margin: 0;
    }
</style>
@endsection

@section('scripts')
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var swiper = new Swiper('.swiper', {
            slidesPerView: 3,
            spaceBetween: 10,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                640: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                },
            },
            loop: true,
            resizeObserver: true,
        });
    });
</script>
@endsection
