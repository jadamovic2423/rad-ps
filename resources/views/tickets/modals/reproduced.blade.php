<h3>Reprodukovano</h3>
<form method="POST" action="{{ route('tickets.reproduced', $ticket->id) }}">
    @csrf
    <label for="reproduced">Rezultat:</label>
    <select name="reproduced" id="reproduced" style="width:100%">
        <option value="uspesno"
            {{ optional($ticket->reprodukovanja->last())->reprodukovan ? 'selected' : '' }}>
            Uspešno
        </option>
        <option value="neuspesno"
            {{ optional($ticket->reprodukovanja->last())->reprodukovan === false ? 'selected' : '' }}>
            Neuspešno
        </option>
    </select>
    <br><br>
    <button type="submit" class="btn">Potvrdi</button>
</form>
