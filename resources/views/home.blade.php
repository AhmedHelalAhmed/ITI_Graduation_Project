@extends('layouts.app')



@section('style')
    <!-- Start custom -->
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <!-- End custom -->

@endsection

@section('content')
    <!-- Start Grid -->
    <section class="bg-light" id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading text-uppercase">   Welcome {{ Auth::user()->name }}</h2>
                    <h3 class="section-subheading text-muted"> {{ date('Y-m-d H:i:s') }}</h3>
                </div>
            </div>
            <div class="row">

            @foreach($articles as $article)
                <!-- start item1 -->

                    <div class="col-md-4 col-sm-6 portfolio-item">
                        <a class="portfolio-link" data-toggle="modal" href="#portfolioModal1" id="{{ $article->id }}"
                           target="{{ $article->type_id }}">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content">
                                    <i class="fa fa-plus fa-3x"></i>
                                </div>
                            </div>
                            <img class="img-fluid"
                                 src="{{ asset('storage/images/'.$article->cover) }}"
                                 alt="">
                        </a>
                        <div class="portfolio-caption">
                            <h4>{{ $article->title }}</h4>
                            <p class="text-muted">
                                @if($article->type_id==1)
                                    Rumor
                                @else
                                    Question
                                @endif
                            </p>
                        </div>
                    </div>


                    <!-- end item1 -->
                @endforeach


            </div>
        </div>
    </section>
    <!-- End Grid -->







    <!-- Start Modal -->

    <!-- Modal 1 -->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl"></div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <div class="modal-body">

                                <!-- Project Details Go Here -->
                                <div id="myContent"></div>
                                <button class="btn btn-primary" data-dismiss="modal" type="button">
                                    <i class="fa fa-times"></i>
                                    Close
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End Modal -->

@endsection






@section('include_files_body')

    <!-- Start modal -->
    <script>

        $(function () {


            $("#portfolio a").on("click", function () {

                let targetModalId = this.id;

                let targetModalType = $(this).attr('target');

                let myUrl;


                if (targetModalType === 1) {

                    myUrl = '/question/' + targetModalId;

                }
                else {
                    myUrl = '/info/' + targetModalId;

                }


                $.ajax({
                    url: myUrl,
                    type: 'GET',
                    data: {
                        '_method': 'show'
                    },
                    success: res => {
                        $("#myContent").html(res);

                    }
                });


            });


        });
    </script>
    <!-- End modal -->

@endsection