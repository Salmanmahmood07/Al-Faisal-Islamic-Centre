@extends('frontend.layouts.app')
@section('header')
@include('frontend.layouts.header')
@endsection

  @section('content')


    <!-- Header -->

    <!-- Top Banner -->

    <!-- Breadcrumb area -->
    			<section class="cr-section breadcrumb-area" data-black-overlay="7">
    				<div class="container">
    					<div class="row">
    						<div class="col-lg-12 text-center">
    							<div class="cr-breadcrumb text-center">
    								<h2 class="cr-breadcrumb__title">Blog</h2>
    								<div class="cr-breadcrumb__tree text-left text-md-left text-center">
    									<ul>
    										<li><a href="index.html">Home</a></li>
    										<li>Blog</li>
    									</ul>
    								</div>
    							</div>
    						</div>
    					</div>
    				</div>
    			</section><!-- //Breadcrumb area -->

          <!-- Page Conent -->
        			<main class="page-content">

        				<!-- Blogs area -->
        				<div class="pg-blogs bg--white ptb--150">
        					<div class="container">
        						<div class="row">
        							<!-- Start Single Blog -->
                      @foreach($posts as $post)
        							<div class="col-lg-4 col-md-6 col-xl-3">
        								<article class="blog wow fadeInUp">
        									<div class="blog__thumb">
        										<a href="{{url('/blog_detail',$post->id)}}">
        											<img src="{{url('/assets/blogposts')}}/{{$post->image}}" alt="single blog thumb">
        										</a>
        									</div>
        									<div class="blog__content">
        										<div class="blog__content__meta">
                              <p>{{$post ->created_at->format('M d Y')}} - <a href="{{url('/blog_detail',$post->id)}}">Admin</a></p>

        										</div>
                            <h4 class="blog-title"><a href="{{url('/blog_detail',$post->id)}}">{{$post->posttitle}}</a></h4>
                            <p>{!!Illuminate\Support\Str::limit($post->description, 300,'...')!!}</p>

        										<a href="{{url('/blog_detail',$post->id)}}" class="cr-readmore">Read More</a>
        									</div>
        								</article>
        							</div><!-- //Start Single Blog -->

                      @endforeach














        						</div>
        						<div class="row">
        							<div class="col-lg-12">
        								<div class="cr-pagination text-center">
        									<ul>
        										<li><a href="events.html">01</a></li>
        										<li class="active"><a href="events.html">02</a></li>
        										<li><a href="events.html">03</a></li>
        										<li><a href="events.html">04</a></li>
        										<li><a href="events.html">05</a></li>
        										<li><a href="events.html">06</a></li>
        									</ul>
        								</div>
        							</div>
        						</div>
        					</div>
        				</div><!-- //Blogs area -->

        			</main><!-- //Page Conent -->


    <!-- Footer -->

    <!-- Login Form -->
    @section('modals')
    @include('frontend.layouts.modals')
    @endsection
    <!-- Cartbox -->




  @endsection

@section('footer')
@include('frontend.layouts.footer')
@endsection
