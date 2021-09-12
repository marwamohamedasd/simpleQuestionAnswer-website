@extends('layouts.index')
@section('style')


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <style>
        .question {
            border: 1px black solid;
             margin: 10px;
             padding: 10px;

        }
        .answer{
            border: 1px black solid;
             margin: 10px;
             padding: 10px;
        }

    </style>
@endsection
@section('content')
    <div>
        <div class="wrap-cntaner">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2> Show questions</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('home') }}"> Back</a>
                    </div>

                </div>
            </div>

            <div class="row">
                <div  class=" col-md-12 question  ">


                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>title:</strong>
                            {{ $question->title}}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>body:</strong>
                            {{ $question->description }}
                        </div>
                    </div>
                     <div >
                        <form method="post" action="{{ route('Vote.store.question') }}">
                            @csrf


                            <div class="form-group">

                                <input type="hidden" name="question_id" value="{{ $question->id }}" />
                            </div>
                            <div class="form-group">

                                <input type="submit" class="btn btn-success" value=" {{ ( $question->CheckVotes(1)) ?"unvote":"Add vote" }}" />
                            </div>
                        </form>
                     </div>
                     <div >
                        <form method="post" action="{{ route('Tag.store') }}">
                            @csrf


                            <div class="form-group">

                                <input type="hidden" name="question_id" value="{{ $question->id }}" />
                            </div>
                            <div class="form-group">


                                <input type="submit" class="btn btn-success" value= "Add Tag"  />
                            </div>
                            <div class="form-group">


                                <input type="text" name="name" value= "{{ $tags->name }}"  />
                            </div>

                        </form>
                     </div>


                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>answer:</strong>



                    @foreach ( $question->answers as  $answer )
                    <div class=" answer col-md-12">
                    {!!$answer->content!!}
                    <strong>Comment:</strong>
                    @foreach ( $answer->comments as  $comment )
                   <p>{{ $comment->content }}</p>
                   @endforeach
                   <div>
                       <a href="#"  class="add-comment"> Add Comment</a>
                       <div  style="display: none" class="commentdiv">
                        <h4>Add comment</h4>
                        <form method="post" action="{{ route('comments.store') }}">
                            @csrf
                            <div class="form-group">
                                <textarea class="form-control" name="content"></textarea>
                                <input type="hidden" name="answer_id" value="{{ $answer->id }}" />
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value="Add Comment" />
                            </div>
                        </form>



                    </div>


                    <h4>Add Vote</h4>
                        <form method="post" action="{{ route('Vote.store') }}">
                            @csrf


                            <div class="form-group">

                                <input type="hidden" name="answer_id" value="{{ $answer->id }}" />
                            </div>
                            <div class="form-group">

                                <input type="submit" class="btn btn-success" value=" {{ ( $answer->CheckVotes(1)) ?"unvote":"Add vote" }}" />
                            </div>
                        </form>
                   </div>

        </div>

                    @endforeach

                    </div>
                </div>
            </div>
            <form method="POST" action="{{ route('answers.store') }}">
                @csrf
                <div class="form-group">
                    <textarea class="form-control" name="content" id="summernote"></textarea>
                    <input type="hidden" name="question_id" id="" value="{{ $question->id }}">
                </div>
                <button type="submit" class="btn btn-danger btn-block">Save</button>
            </form>

            <hr />

        </div>

   </div>
    </div>

@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script type="text/javascript">
        $('#summernote').summernote({
            height: 400
        });

        $('.add-comment').on('click',function(){

             var commentdiv=$(this).parent().find('.commentdiv');
                //  commentdiv.attr('style','display:block');
                 if (commentdiv.is(':hidden')) {
                    commentdiv.attr('style','display:block');
                } else {
                    commentdiv.attr('style','display:none');
                 }






        });


    </script>
@endsection
