@extends('layouts.master')

@section('title')
    {{ $category['name'] }}
@endsection

@section('content')
    <!-- ======= Post Grid Section ======= -->
    <section id="posts" class="posts">
        <div class="container" data-aos="fade-up">
            <div class="row g-5">
                <div class="col-lg-12">
                    <div class="row g-5">
                        @foreach ($getPostsByCategoryID as $item)
                            <div class="col-lg-4 border-start custom-border">
                                @include('components.post-entry-1', [
                                    'post' => $item,
                                    'hiddenAuthor' => false,
                                    'hiddenExcerpt' => false,
                                ])
                            </div>
                        @endforeach
                    </div>
                </div>

                
            </div>
        </div>
    </section> <!-- End Post Grid Section -->
@endsection
