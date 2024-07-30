@php
    $projects = App\Models\StudentProject::latest()->limit(4)->get();
@endphp

<div class="container mb-5">
    <div class="category-content-wrap d-flex justify-content-between">
        <div class="section-heading">
            <h5 class="ribbon ribbon-lg mb-2">Projects</h5>
            <h2 class="section__title">Student's Project</h2>
            <span class="section-divider"></span>
        </div>
        <div class="category-btn-box text-right">
            <a href="{{route('view.all.project')}}" class="btn theme-btn">All Projects <i
                    class="la la-arrow-right icon ml-1"></i></a>
        </div><!-- end section-heading -->
    </div>
    <div class="row justify-content-center">
        @foreach ($projects as $project)
        <div class="col-md-6 mb-4">
            <iframe width="100%" height="315" src="https://www.youtube.com/embed/{{$project->project_url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
        @endforeach
        {{-- <div class="col-md-6">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/x9ApW-MOy3g?si=qGzqBQmygNVrpjCs" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
        <div class="col-md-6">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/CNse0B5XlQM?si=s5obc-0BqySzt4gY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div> --}}
    </div>
</div>
