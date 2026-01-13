<h3>Zaključak</h3>
<form method="POST" action="{{ route('tickets.conclusion', $ticket->id) }}"> @csrf <div style="text-align:left; margin:10px 0">
		<label>
			<input type="radio" name="conclusion" value="development" required> Potreban razvoj
		</label>
		<br>
			<br>
				<label>
					<input type="radio" name="conclusion" value="no_activity"> Nema daljih aktivnosti </label>
				</div>
				<button class="btn">Potvrdi</button>
			</form>