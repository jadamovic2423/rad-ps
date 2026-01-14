<h3>Zaključak</h3>
<form method="POST" action="{{ route('tickets.conclusion', $ticket->id) }}">
    @csrf
    <div style="text-align:left; margin:10px 0">
        <label>
            <input type="radio" name="conclusion" value="development"
                {{ optional($ticket->reprodukovanja->last())->komentar === 'development' ? 'checked' : '' }} required>
            Potreban razvoj
        </label>
        <br><br>
        <label>
            <input type="radio" name="conclusion" value="no_activity"
                {{ optional($ticket->reprodukovanja->last())->komentar === 'no_activity' ? 'checked' : '' }}>
            Nema daljih aktivnosti
        </label>
    </div>
    <button class="btn">Potvrdi</button>
</form>
