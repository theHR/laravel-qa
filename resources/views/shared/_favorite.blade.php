<a title="Click to mark as favourite (Click again to undo)" href="#" 
    class="favourite mt-2 {{ auth()->guest() ? 'off' : ($model->is_favorited ? 'favorited' : '') }}"
    onclick="event.preventDefault(); document.getElementById('favorite-{{ $name }}-{{ $model->id }}').submit();">
    <i class="fas fa-star fa-2x"></i>
    <span class="favourites-count">{{ $model->favorites_count }}</span>
</a>
<form action="/{{ $firstSegment }}/{{ $model->id }}/favorites" id="favorite-{{ $name }}-{{ $model->id }}" method="POST" style="display: none;">
    @csrf
    @if($model->is_favorited)
        @method('DELETE')
    @endif
</form>