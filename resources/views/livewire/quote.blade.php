<div>
    <ul wire:poll.60s="getQuotes">
        @foreach ($quotes as $quote)
        <li>{{ $quote }}</li>
        @endforeach
    </ul>
    <button type="button" class="btn btn-primary btn-lg" wire:click="getQuotes">
        Refresh
    </button>
</div>
