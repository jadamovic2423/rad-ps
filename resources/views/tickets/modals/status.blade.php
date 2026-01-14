<h3>Status</h3>
<form method="POST" action="{{ route('tickets.updateStatus', $ticket->id) }}">
    @csrf
    <label for="status">Odaberite:</label>
    <select name="status" id="status">
        <option value="otvoren">Otvoren</option>
        <option value="analiza">Analiza</option>
        <option value="otvoren">Razvoj</option>
        <option value="zatvoren">Zatvoren</option>
    </select>
    <button type="submit" class="btn">Promeni</button>
</form>
