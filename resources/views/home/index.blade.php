@extends('layouts.layout')
@section('title') Abdou Dev @endsection

@section('body')

{{-- header --}}
@include('home.includes.header')

<!-- content wrapper -->
<section class="content-wrapper">
	<div class="container d-flex justify-content-between flex-wrap">

		<!-- posts section -->
		<div class="posts-section">
            @foreach ($posts as $post)
            <!-- post -->
			<article class="post bg-white shadow-sm text-decoration-none d-flex flex-column justify-content-center">

				<!-- top info -->
				<div class="info d-flex align-items-center mb-3">
					<!-- date -->
					<div class="date d-flex align-items-center">
						<span class="icon me-2"><i class="far fa-calendar-alt"></i></span>
						<span class="text-capitalize">{{ $post->created_at->diffForHumans() }}</span>
					</div>
					<!-- category -->
					<a href="{{ route('search-post-by-cats', ['cat' => $post->post_category]) }}" class="category d-flex align-items-center ms-3 text-decoration-none ">
						<span class="icon me-2"><i class="far fa-folder"></i></span>
						<span class="text-capitalize">{{ $post->post_category }}</span>
					</a>
				</div>

				<!-- post title -->
				<h3 class="title text-uppercase p-0 m-0">
					<a href="{{ route('post', ['slug'=> $post->slug]) }}" class="text-decoration-none">{{ $post->title }}</a>
				</h3>

				<!-- bottom info -->
				<div class="info d-flex align-items-center mt-3">
					<!-- author -->
					<div class="author d-flex align-items-center">
						<span class="icon me-2"><i class="far fa-user"></i></span>
						<span class="text-capitalize">by {{ $post->author }} </span>
					</div>
				</div>

				<!-- post body -->
				<div class="body my-3">{!! substr($post->body, 0, 150) !!}</div>

				<!-- read more link -->
				<a href="{{ route('post', ['slug'=> $post->slug]) }}" class="read-more text-capitalize d-flex align-items-center justify-content-center text-decoration-none">read more</a>
			</article>
            @endforeach

            @if ($posts->count() <= 0)
            <div class="alert alert-info text-capitalize rounded-0">no posts are found :( </div>
            @endif
		</div>

		<!-- aside section -->
		@include('home.includes.aside', ['cats' => $cats])
	</div>
</section>

{{-- footer --}}
@include('home.includes.footer')

@endsection
