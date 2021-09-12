@extends('layouts.index')
@section('content')
    <!--Stat Main Header -->
    <div>
        <div class="header_main">
            <div>
                <h4>All Question</h4>
            </div>
            <div>
                <a  href="{{ route('questions.create') }}" class="btn-group btn btn-primary">Ask Question</a>
            </div>
        </div>


        <div class="header_main">
            <div class="couns_question"><span>21,429,551 questions</span></div>
        </div>
        <!--End Main Header -->
        <!--Start Main Body For Posts -->
        <div class="wrap-cntaner">
            @foreach($questions as $question)
                <div>
                    <div class="main_main">
                        <div class="post">
                            <div class="left">
                                <span>0</span>
                                <div>Votes</div>
                                <span>{{ $question->answers_count() }}</span>
                                <div>answer</div>
                                <div>{{  $question->views }} views</div>
                            </div>
                            <div class="right">
                                <a href="{{route('questions.show', $question->id)}}">{{$question->title}}</a>
                                <p>{{$question->body}}</p>
                                <div class="tags">
                                       @foreach ( $question->tags as $tag )
                                       <a href="">{{ $tag->name}}</a>
                                       @endforeach


                                    <div class="user_info">
                                        <div>asked 55 secs ago</div>
                                        <div class="user_last">
                                            <div class="left"><img src="https://via.placeholder.com/50" alt=""></div>
                                            <div class="right">
                                                <div><a href="">Moh</a></div>
                                                <div>5</div>
                                            </div>


                                            <div class="cleatFix"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearFix"></div>


                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!--End Main Body For Posts -->
    </div>

@endsection

