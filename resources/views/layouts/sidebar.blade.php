<!-- Start slidebar -->
<aside>

    <section class="links">
        <h3>Report about rumors</h3>
        <video controls width="290" height="200" loop poster=" {{ asset('/media/rumers.jpg') }} ">
            <source src="{{ asset('/media/rumers.mp4') }}">
            <source src="{{ asset('/media/rumers.ogg') }}" type="video/ogg">
            <source src="{{ asset('/media/rumers.webm') }}" type="video/webm">
            Your Browser Does Not Support Video Technology
        </video>

    </section>

    <section class="links">

        <h3>Categories</h3>
        <ul>
            @foreach($categories as $category)
                <li><a href="#">{{ $category->name }}</a></li>
            @endforeach
        </ul>
    </section>


    <section class="tags">
        <h3>Tags</h3>
        <ul>
            @foreach($tags as $tag)
                <li><a href="#">{{ '#'.$tag->name }}</a></li>
            @endforeach
        </ul>
    </section>


    <section class="recent-rumors">
        <h3>Recent rumors</h3>
        <ul>
            <li>
                <a href="#">rumer#1</a>
            </li>
            <li>
                <a href="#">rumer#2</a>
            </li>
            <li>
                <a href="#">rumer#3</a>
            </li>
            <li>
                <a href="#">rumer#4</a>
            </li>
            <li>
                <a href="#">rumer#5</a>
            </li>
        </ul>
    </section>

    <section class="top-rumors">
        <h3>Top rumors</h3>
        <ul>
            <li>
                <a href="#">rumer#1</a>
            </li>
            <li>
                <a href="#">rumer#2</a>
            </li>
            <li>
                <a href="#">rumer#3</a>
            </li>
            <li>
                <a href="#">rumer#4</a>
            </li>
            <li>
                <a href="#">rumer#5</a>
            </li>
        </ul>
    </section>

    <section class="top-writers">
        <h3>Top writers</h3>
        <ul>
            <li>Ahmed</li>
            <li>diaa</li>
            <li>Ali</li>
            <li>kamal</li>
            <li>hossam</li>
        </ul>
    </section>


    <section class="recent-questions">
        <h3>Recent questions</h3>
        <ul>
            <li>
                <a href="#">q#1</a>
            </li>
            <li>
                <a href="#">q#2</a>
            </li>
            <li>
                <a href="#">q#3</a>
            </li>
            <li>
                <a href="#">q#4</a>
            </li>
            <li>
                <a href="#">q#5</a>
            </li>
        </ul>
    </section>

</aside>
<!-- End slidebar -->


<!-- Start Clear Fix -->
<div class="clearfix"></div>
<!-- End Clear Fix -->