<!DOCTYPE html>
<html>
	<head>
		<title>Detalji zahteva</title>
		<style> body { background:#dfe9c7; font-family: Arial; } table { border-collapse: collapse; width:90%; margin:20px auto; } td { border:1px solid #333; padding:8px; background:#eef7c4; } .btn { display:block; margin:6px 0; padding:6px; background:#8bc34a; border:1px solid #333; text-decoration:none; color:#000; text-align:center; } /* MODAL */ .overlay { position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.2); } .modal { width:320px; margin:120px auto; background:#cfd8c3; border:1px solid #333; padding:15px; text-align:center; } </style>
	</head>
	<body>
		<h2 style="text-align:center">Zahtev {{ $ticket->id }}</h2>
		<table>
			<tr>
				<td>Naziv</td>
				<td>{{ $ticket->title }}</td>
			</tr>
			<tr>
				<td>Opis</td>
				<td>{{ $ticket->description }}</td>
			</tr>
			<tr>
				<td>Status</td>
				<td>{{ $ticket->status }}</td>
			</tr>
		</table>
		<div style="width:300px; margin:20px auto">
			<a class="btn" href="{{ route('tickets.show', $ticket->id) }}?modal=message">Pošalji poruku</a>
			<a class="btn" href="{{ route('tickets.show', $ticket->id) }}?modal=comment">Unesi komentar</a>
			<a class="btn" href="{{ route('tickets.show', $ticket->id) }}?modal=status">Promeni status</a>
			<a class="btn" href="{{ route('tickets.show', $ticket->id) }}?modal=type">Promeni vrstu</a>
			<a class="btn" href="{{ route('tickets.show', $ticket->id) }}?modal=reproduced">Reprodukovano</a>
		</div>
		<a class="btn" href="{{ route('tickets.index') }}">Nazad na listu zahteva</a> {{-- MODALI --}} @if(request('modal')) <div class="overlay">
			<div class="modal"> @if(request('modal') === 'message') @include('tickets.modals.message') @elseif(request('modal') === 'comment') @include('tickets.modals.comment') @elseif(request('modal') === 'status') @include('tickets.modals.status') @elseif(request('modal') === 'type') @include('tickets.modals.type') @elseif(request('modal') === 'reproduced') @include('tickets.modals.reproduced') @endif <br>
					<a class="btn" href="{{ route('tickets.show', $ticket->id) }}">Zatvori</a>
				</div>
			</div> @endif </body>
	</html>