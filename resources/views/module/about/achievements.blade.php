@extends('layouts.news_type_page')

@section('title', 'News & Achievements')

@section('page-title', 'News & Announcements')
{{-- @section('page-subtitle', 'Stay updated with the latest news and achievements from ACPS') --}}

@section('news-items')
    <!-- News Item 1 -->
    <div class="news-item">
        <div class="news-image">
            <img src="{{ asset('resources/images/test5.png') }}" alt="ACPS Wins National Award">
        </div>
        <div class="news-content">
            <div class="news-meta">
                <div class="news-date"><i class="far fa-calendar"></i> October 15, 2023</div>
                <div class="news-category">Achievement</div>
            </div>
            <h2 class="news-headline">ACPS Wins National Education Award 2023</h2>
            <p class="news-excerpt">Agrabad Cantonment Public School & College has been honored with the National Education Award 2023 for outstanding academic performance and holistic development of students.</p>
            <a href="#" class="see-all-link" data-news="1">Read Full Story <i class="fas fa-arrow-right"></i></a>
        </div>
    </div>

    <!-- Additional news items would be here -->
@endsection

@section('full-news')
    <!-- Full News 1 -->
    <div class="full-news" id="full-news-1">
        <div class="full-news-content">
            <div class="full-news-header">
                <div>
                    <h2 class="full-news-title">ACPS Wins National Education Award 2023</h2>
                    <div class="news-meta">
                        <div class="news-date"><i class="far fa-calendar"></i> October 15, 2023</div>
                        <div class="news-category">Achievement</div>
                    </div>
                </div>
            </div>
            <img src="{{ asset('resources/images/test5.png') }}" alt="ACPS Wins National Award" class="full-news-image">
            <div class="full-news-text">
                <p>Agrabad Cantonment Public School & College has been honored with the National Education Award 2023 for outstanding academic performance and holistic development of students. This prestigious award recognizes our commitment to excellence in education.</p>

                <p>The award ceremony was held at the National Education Complex in Dhaka, where our Principal, Dr. Rahman, received the award from the Education Minister. This is the third consecutive year that ACPS has received this recognition.</p>

                <h3>Criteria for Selection</h3>
                <p>The selection committee evaluated schools based on several criteria including academic results, extracurricular activities, teacher qualifications, infrastructure, and community engagement. ACPS scored exceptionally well in all categories.</p>

                <p>Our consistent performance in board examinations, with a 98% pass rate and 45% of students achieving GPA-5, was particularly highlighted by the committee.</p>

                <h3>Future Plans</h3>
                <p>With this recognition, we are more motivated than ever to continue our journey of excellence. Plans are underway to introduce new STEM programs and enhance our digital learning infrastructure.</p>
            </div>
            <a href="#" class="back-to-list"><i class="fas fa-arrow-left"></i> Back to News List</a>
        </div>
    </div>

    <!-- Additional full news sections would be here -->
@endsection
