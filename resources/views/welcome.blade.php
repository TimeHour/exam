@extends('partials.layout')

@section('content')
    <div class="container mx-auto">
        {{$articles->links()}}
        <div class="flex flex-row flex-wrap">
            @foreach($articles as $article)
                <div class="basis-1/4 mb-4">
                    <div class="card mx-3 bg-base-100 shadow-xl">
                        @if($article->images->count() === 1)
                            <figure><img src="{{$article->image->path}}"/></figure>
                        @elseif($article->images->count()>1)
                            <div class="h-96 carousel carousel-vertical rounded-box">
                                @foreach($article->images as $image)
                                    <div class="carousel-item h-full">
                                        <img src="{{$image->path}}"/>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        <div class="card-body">
                            <h2 class="card-title">{{ $article->title }}</h2>
                            <p>{{ $article->snippet }}</p>
                            <div class="stat">
                            <a href="{{route('public.user', ['user' => $article->user])}}">
                                        <div class="stat-desc">{{ $article->user->name }}</div>
                                    </a>

                                <div class="stat-desc"><b>Price: </b>{{ $article->Hind }}€</div>

                                <div class="stat-desc"><b>Gluten free </b> @if($article->gluteeni_vaba > 0) ✔️ @else ❎ @endif</div>

                                <div class="stat-desc"><b>Vegan </b>@if($article->vegan > 0) ✔️ @else ❎ @endif</div>

                                <div class="stat-desc"><b>Vegetarian </b>@if($article->taimetoitlasele > 0) ✔️ @else ❎ @endif</div>

                                <div class="stat-desc"><b>spicy: </b>
                                    <div class="rating-gap-1">
                                        {{str_repeat("🔥",  $article->teravus)}}
                                    </div>
                                </div>


                                <br>
                                <div class="stat-desc">{{ $article->created_at->diffForHumans() }}</div>
                                <div class="stat-desc flex flex-wrap">

                                </div>
                            </div>
                            <div class="card-actions justify-end">

                                <a href="{{route('public.article', ['article' => $article])}}" class="btn btn-primary">Read
                                    More</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
