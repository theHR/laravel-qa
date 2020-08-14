@if($model instanceof App\Question)
    @php
        $name = 'question';
        $firstSegment = 'questions';
    @endphp
@elseif($model instanceof App\Answer)
    @php
        $name = 'answer';
        $firstSegment = 'answers';
    @endphp
@endif

@php
    $formId = $name."-".$model->id;
    $formAction = $model->id."/vote";
@endphp
<div class="d-flex flex-column vote-controls">
    <a title="This {{ $name }} is useful" 
        class="vote-up {{ auth()->guest() ? 'off' : '' }}"
        onclick="event.preventDefault(); document.getElementById('up-vote-{{ $formId }}').submit();">
        <i class="fas fa-caret-up fa-3x"></i>
    </a>
    <form action="/{{ $firstSegment }}/{{ $formAction }}" id="up-vote-{{ $formId }}" method="POST" style="display: none;">
        @csrf
        <input type="hidden" value="1" name="vote">
    </form>
    <span class="votes-count">{{ $model->votes_count }}</span>
    <a title="This {{ $name }} is not useful" 
        class="vote-down {{ auth()->guest() ? 'off' : '' }}"
        onclick="event.preventDefault(); document.getElementById('down-vote-{{ $formId }}').submit();">
        <i class="fas fa-caret-down fa-3x"></i>
    </a>
    <form action="/{{ $firstSegment }}/{{ $formAction }}" id="down-vote-{{ $formId }}" method="POST" style="display: none;">
        @csrf
        <input type="hidden" value="-1" name="vote">
    </form>

    @if($model instanceof App\Question)
        <favorite :question="{{ $model }}"></favorite>        
    @elseif($model instanceof App\Answer)
        @include('shared._accept', [
            'model' => $model,
            ])
    @endif
</div>