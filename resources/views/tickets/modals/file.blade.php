<h3>Fajl</h3>
<form method="POST" action="{{ route('tickets.file.upload', $ticket->id) }}" enctype="multipart/form-data"> @csrf <p>Priloži fajl:</p>
	<input type="file" name="file" required>
	<br>
		<br>
			<button class="btn">Dodaj</button>
		</form>