<div>
    <form wire:submit.prevent="movieSearch">
        <input wire:model.defer='search' placeholder="enter movie name ">
        <button wire:click(movieSearch()) type="submit">search</button>
        <button wire:click="clear()" type="reset" style="color: red">clear</button>
    </form>
    {{-- <button wire:click="clear()" >clear</button> --}}


    <div>
        @forelse($searchMovie as $item)
            <li>Name: {{ $item->title }}</li>
            <li>Years: {{ $item->year }}</li>
            <li>Country: {{ $item->country }}</li>
            <li>Rate: {{ $item->imdb_rating }}</li>
            <img src="{{ $item->poster }}">
        @empty
            <div> no result </div>
        @endforelse

    </div>
</div>
