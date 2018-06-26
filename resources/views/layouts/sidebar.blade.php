<!-- Start slidebar -->
<aside>


    <section class="links">

        <h3>Categories</h3>
        <ul>
            @foreach($categories as $category)
                <li><a href="{{ url('/categories/'.$category->id) }}">{{ $category->name }}
                        <span class="badge badge-pill badge-info">{{ count($category->articles) }}</span>
                    </a>


                </li>
            @endforeach
        </ul>
    </section>


    <section class="tags">
        <h3>Tags</h3>
        <ul>
            @foreach($tags as $tag)
                <li>
                    <a href="{{ url('/tags/'.$tag->id) }}">{{ '#'.$tag->name }}
                        <span class="badge badge-pill badge-info">{{ count($tag->articles) }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </section>


    <section class="recent-rumors">
        <h3>Recent rumors</h3>
        <ul>
            @foreach($recent_rumors as $rumor)
                <li><a href="{{ url('/info/'.$rumor->id) }}">{{ '#'.$rumor->title }}</a></li>
            @endforeach
        </ul>
    </section>

    <section class="recent-questions">
        <h3>Recent questions</h3>
        <ul>
            @foreach($recent_questions as $question)
                <li><a href="{{ url('/questions/'.$question->id) }}">{{ '#'.$question->title }}</a></li>
            @endforeach
        </ul>
    </section>

</aside>
<!-- End slidebar -->


<!-- Start Clear Fix -->
<div class="clearfix"></div>
<!-- End Clear Fix -->