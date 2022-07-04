@extends('layout.mainlayout')

@section('content')

    <div class="py-5 " style="background-color: #e3f2fd">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    @foreach ($tags as $tag)
                        <span class="badge badge-pill badge-secondary">{{ $tag->name }}</span>
                    @endforeach
                </div>
                <div class="col-sm-9">
                    @foreach ($articles as $article)
                        <div  class="card mb-4">
                            <a href="{{ url("/articles/{$article->id}") }}">
                                <img class="card-img-top" src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Картинка" alt="card image">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">{{ $article->name }}</h5>
                                <p class="card-text">{{ $article->preview }}</p>
                                <div class="row">
                                    <div class="col-6 col-sm-6 text-left">
                                        <button class="btn btn-link">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <span>{{ $article->cnt_show }}</span>
                                    </div>
                                    <div class="col-6 col-sm-6 text-right">
                                        <button class="btn btn-link like" id="like_{{ $article->id }}">
                                            <i class="far fa-heart"></i>
                                        </button>
                                        <span id="like_result_{{ $article->id }}">{{ $article->cnt_like }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{ $articles->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
