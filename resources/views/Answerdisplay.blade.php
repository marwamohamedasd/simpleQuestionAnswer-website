@foreach( $answers as  $answer)
    <div class="display-comment" @if( $answer->parent_id != null) style="margin-left:40px;" @endif>
        <strong>{{  $answer->user->name }}</strong>
        <p>{{  $answer->body }}</p>
        <a href="" id="reply"></a>
        <form method="post" action="{{ route('answerspost') }}">
            @csrf
            <div class="form-group">
                <input type="text" name="body" class="form-control" />
                <input type="hidden" name="question_id" value="{{ $question_id }}" />
                <input type="hidden" name="parent_id" value="{{ $answer->id }}" />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-warning" value="Reply" />
            </div>
        </form>
        @include('answersadd', ['answers' => $answer->replies])
    </div>
@endforeach
