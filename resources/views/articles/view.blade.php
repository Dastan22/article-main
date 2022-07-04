@extends('layout.mainlayout')

@section('content')

    <div class="py-5 " style="background-color: #e3f2fd;">
        <div class="container" >
            <div class="row">
                <div class="col-sm-2">
                </div>
                <div class="col-sm-7">
                    <h5>{{ $article->name }}</h5>
                    <button class="btn btn-link">
                        <i class="fas fa-eye"></i>
                    </button>
                    <span id="show_result_{{ $article->id }}">{{ $article->cnt_show }}</span>
                    <button class="btn btn-link like" id="like_{{ $article->id }}">
                        <i class="far fa-heart"></i>
                    </button>
                    <span id="like_result_{{ $article->id }}">{{ $article->cnt_like }}</span>
                    <p>
                        @foreach ($article->tags as $tag)
                            <span class="badge badge-pill badge-secondary">{{ $tag->name }}</span>
                        @endforeach
                    </p>
                    <p>{{ $article->preview }}</p>
                    <hr>
                    <div id="comment-form">
                        <input type="hidden" id="article_id" name="article_id" value="{{ $article->id }}">
                        <div class="form-group">
                            <div class="col-sm-12 p-0">
                                <input type="text" id="subject" name="subject" class="form-control" placeholder="Тема сообщения">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 p-0">
                                <textarea rows="4" id="body" name="body" class="form-control" placeholder="Сообщение"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6 p-0 ">
                                <button id="submit_button" class="btn btn-dark">
                                     Отправить комментарий
                                </button>
                            </div>
                        </div>
                    </div>
                    <div id="comment-msg" style="display: none;">
                        <div class="alert alert-success" role="alert">
                            Спасибо! Ваш комментарий успешно отправлен.
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js-for-page')

    <script type="text/javascript">
        setTimeout(function () {
            $(document).ready(function(){
                showUp({{ $article->id }});
            });
        }, 5000);
        $(document).ready(function(){
            $('#submit_button').on('click',function() {
                let body = $('#body').val();
                let subject = $('#subject').val();
                let article_id = $('#article_id').val();
                $.ajax({
                    url: '/api/comment',
                    type: "POST",
                    data: {body : body, subject: subject, article_id: article_id},
                    success: function (data) {
                        $('#comment-msg').show();
                        $('#comment-form').hide();
                    },
                    error: function (msg) {
                        alert('Error');
                    }
                });
            });
        });
    </script>

@endsection
