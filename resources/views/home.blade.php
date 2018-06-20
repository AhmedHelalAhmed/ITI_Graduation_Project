@extends('layouts.app')


@section('title')
    <title>Home</title>
@endsection

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
                    <h2 class="section-heading text-uppercase"> Welcome {{ Auth::user()->name }}</h2>
                    <h3 class="section-subheading text-muted"> {{ date('Y-m-d H:i:s') }}</h3>
                </div>
            </div>
            <div class="row">


                <div class="infinite-scroll">


                    @foreach($articles as $article)


                        <span class="col-md-4 col-sm-6 portfolio-item">

                        <h4 class="media-heading">
                            <img class="img-fluid avatar"
                                 src="{{ asset('storage/images/avatars/'.$article->user->avatar) }}"
                                 alt="">
                            {{ $article->user->name }}
                            <small>{{ $article->created_at->diffForHumans() }}</small>
                             <div class="portfolio-caption">
                            <h4>{{ $article->title }}</h4>
                            <p class="badge badge-secondary">
                                @if($article->type_id==1)
                                    Rumor
                                @else
                                    Question
                                 @endif

                                                <span class="badge badge-success">{{ \App\Vote::all()->where("article_id","==",$article->id )->where("vote",'=',1)->count() }}</span>
                                                <span class="badge badge-danger">{{ \App\Vote::all()->where("article_id","==",$article->id )->where("vote",'=',0)->count() }}</span>

                                 </p>
                        </div>
                        </h4>
                            {{ $article->body }}
                            <div class="text-right container " id="portfolio">
                                <a data-toggle="modal" href="#portfolioModal1">


                                        <button class="btn btn-success btnviewmore" id="{{ $article->id }}" target="{{ $article->type_id }}">Read More</button>

                                </a>
                            </div>
                            <hr style="margin-top:5px;">
                        </span>



                    @endforeach

                    {{ $articles->links() }}


                </div>
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


    <!-- Start infinite-scroll -->

    <!-- Start jscroll -->
    <script src="/js/jquery.jscroll.min.js"></script>
    <!-- End jscroll -->

    <script type="text/javascript">
        $('ul.pagination').hide();
        $(function () {
            $('.infinite-scroll').jscroll({
                autoTrigger: true,
                loadingHtml: '<img class="center-block" src="media/loading.gif" alt="Loading..." />',
                padding: 0,
                nextSelector: '.pagination li.active + li a',
                contentSelector: 'div.infinite-scroll',
                callback: function () {
                    $('ul.pagination').remove();
                }
            });
        });
    </script>


    <!-- End infinite-scroll -->

    <!-- Start modal -->
    <script>

        $(function () {

                $(document).on('click', '.btnviewmore', function() {

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