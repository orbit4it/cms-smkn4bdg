<div class="sidebar">
	<div class="card sidebar-title">
		<div class="card-body px-3 py-2">
			<p class="card-text text-center">Berita Terbaru</p>
		</div>
	</div>

	@foreach (\App\Berita::orderBy('created_at', 'DESC')->get()->take(4) as $beritaItem)
    <div class="card berita-item my-3">
        <img class="card-img-top" src="{{ asset('uploads/' . $beritaItem->foto) }}" alt="Card {{ asset('') }}/image cap">
        <div class="card-body">
            <h5 class="card-title">{{ $beritaItem->judul }}</h5>
            <p class="card-text">{{ $beritaItem->created_at->format('d F Y') }}</p>
            @php
            $deskripsi = strip_tags($beritaItem->deskripsi);
            $deskripsi = trim(str_replace('&nbsp;', '', $deskripsi));
            @endphp
			<p class="card-text">{{ substr($deskripsi, 0, 42) }}{{ strlen($deskripsi) > 42 ? '...' : '' }}</p>
            <a href="{{ url('berita/' . $beritaItem->slug) }}">Baca Selengkapnya</a>
        </div>
    </div>
	@endforeach
</div>