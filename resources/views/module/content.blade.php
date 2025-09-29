@extends('layouts.description_type_page')
@php
    $contentController = new \App\Http\Controllers\ContentController();
    
@endphp
@section('title', 'About Us')

@php

    $sliderImages = [
        [
            'image' => 'https://images.unsplash.com/photo-1562813733-b31f71025d54?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
            'title' => 'ACPS Main Campus',
            'desc' => 'Our beautiful campus with state-of-the-art facilities'
        ],
        [
            'image' => 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
            'title' => 'Modern Classrooms',
            'desc' => 'Spacious and well-equipped learning environments'
        ],
        [
            'image' => 'https://images.unsplash.com/photo-1541339907198-e08756dedf3f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
            'title' => 'Science Laboratories',
            'desc' => 'Advanced labs for practical learning and experiments'
        ],
        [
            'image' => 'https://images.unsplash.com/photo-1571260899304-425eee4c7efc?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
            'title' => 'Library Resources',
            'desc' => 'Extensive collection of books and digital resources'
        ]
    ];
@endphp

@section('slider-content')
    @foreach($sliderImages as $index => $slide)
        <div class="slide {{ $index === 0 ? 'active' : '' }}" style="background-image: url('{{ $slide['image'] }}');">
            <div class="slide-content">
                <h3 class="slide-title">{{ $slide['title'] }}</h3>
                <p class="slide-desc">{{ $slide['desc'] }}</p>
            </div>
        </div>
    @endforeach
@endsection

@section('headline', 'About Bawany Government  Adarsha Biddyalaya')

@section('description')
    <p>Bawany Government  Adarsha Biddyalaya (ACPS) is a premier educational institution established in 1985 with a vision to provide quality education to the children of armed forces personnel and civilians in the Chittagong region. Over the years, we have grown into one of the most prestigious educational institutions in Bangladesh, known for our academic excellence and holistic development approach.</p>

    <p>Our campus spans over 10 acres and features state-of-the-art facilities including modern classrooms, well-equipped laboratories, a comprehensive library, and extensive sports facilities. We believe in nurturing not just academic excellence but also character, creativity, and critical thinking skills in our students.</p>

    <h2>Our Mission</h2>
    <p>To provide a stimulating learning environment that encourages students to realize their full potential, develop a sense of responsibility, and become productive members of society. We aim to foster intellectual curiosity, ethical values, and leadership qualities in every student.</p>

    <h2>Our Vision</h2>
    <p>To be a center of excellence in education that prepares students to meet the challenges of a rapidly changing global society while preserving our cultural heritage and values.</p>

    <h2>Academic Programs</h2>
    <p>We offer comprehensive educational programs from primary to higher secondary levels:</p>
    <ul>
        <li><strong>Primary Education (Grades 1-5):</strong> Focus on foundational skills in literacy, numeracy, and social development</li>
        <li><strong>Secondary Education (Grades 6-10):</strong> Comprehensive curriculum following national guidelines</li>
        <li><strong>Higher Secondary (Grades 11-12):</strong> Specialized programs in Science, Commerce, and Humanities</li>
    </ul>

    <p>Our dedicated faculty members are highly qualified and committed to providing personalized attention to each student. We maintain a low student-teacher ratio to ensure effective learning and individual growth.</p>
@endsection
