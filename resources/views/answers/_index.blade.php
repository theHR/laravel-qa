@if ($answerCount > 0)
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h2>{{ $answerCount ." ".\Str::plural('answer', $answerCount) }}</h2>
                    </div>
                    <hr>
                    @include('layouts._messages')
                    @foreach($answers as $answer)
                        @include('answers._answer')
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endif