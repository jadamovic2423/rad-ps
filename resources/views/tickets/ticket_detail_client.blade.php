@extends('layouts.app') @section('title', 'Detalji zahteva') @section('content') <table style="width:90%; margin:20px auto">
	<tr>
		<td style="width:60%">
			<strong>Zahtev {{ $ticket->id }}</strong>
			<br>
				<br> Naziv: <strong>{{ $ticket->title }}</strong>
					<br>
						<br> Opis: {{ $ticket->description }}<br>
								<br> Vrsta: {{ $ticket->type }}<br> Prioritet: {{ $ticket->priority }}<br> Status: <strong>{{ $ticket->status }}</strong>
											<br> Fajlovi: / </td>
											<td style="vertical-align:top">
												<strong>Komunikacija</strong>
												<br>
													<br> @foreach($ticket->messages as $msg) <p>{{ $msg->sender }}: {{ $msg->content }}</p> @endforeach </td>
												</tr>
											</table>
											<div style="width:300px; margin:20px auto">
												<a class="btn" href="{{ route('tickets.index') }}">Nazad na listu zahteva</a>
												<a class="btn" href="{{ route('tickets.show.client', $ticket->id) }}?modal=message">Pošalji poruku</a>
												<a class="btn" href="{{ route('tickets.show.client', $ticket->id) }}?modal=file">Dodaj fajl</a>
											</div> {{-- MODALI --}} @if(request('modal')) <div class="overlay">
												<div class="modal"> @if(request('modal') === 'message') @include('tickets.modals.message') @elseif(request('modal') === 'file') @include('tickets.modals.file') @endif <br>
														<a class="btn" href="{{ route('tickets.show.client', $ticket->id) }}">Zatvori</a>
													</div>
												</div> @endif @endsection