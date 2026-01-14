<h3>Vrsta</h3>
<form method="POST" action="{{ route('tickets.type', $ticket->id) }}">
    @csrf
    <label for="type">Odaberite:</label>
    <select name="type" id="type">
        <option value="bug">Bug</option>
        <option value="novi razvoj">Novi razvoj</option>
        <option value="regulativa">Regulativa</option>
    </select>
    <button type="submit" class="btn">Promeni</button>
</form>
