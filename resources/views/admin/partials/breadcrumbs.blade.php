<nav aria-label="breadcrumb">
	<ol class="breadcrumb mb-3">
		@php $lastIndex = isset($items) ? count($items) - 1 : -1; @endphp
		@foreach(($items ?? []) as $index => $item)
			@if($index === $lastIndex || empty($item['url']))
				<li class="breadcrumb-item active" aria-current="page">{{ $item['label'] ?? '' }}</li>
			@else
				<li class="breadcrumb-item"><a href="{{ $item['url'] }}">{{ $item['label'] }}</a></li>
			@endif
		@endforeach
	</ol>
</nav> 