<h3>Promeni status</h3>
<form method="POST" action="{{ route('tickets.updateStatus', $ticket->id) }}">
    @csrf
    <label for="status">Izaberi status:</label>
    <select name="status" id="status">
        <option value="novi">Novi</option>
        <option value="analiza">Analiza</option>
        <option value="otvoren">Otvoren</option>
        <option value="zatvoren">Zatvoren</option>
    </select>
    <button type="submit" class="btn">Promeni</button>
</form>
