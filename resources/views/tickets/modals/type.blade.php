<style>
    form {
    display: flex;
    flex-direction: column;   /* vertikalni raspored */
    align-items: center;      /* centriraj sve elemente */
    gap: 12px;                /* razmak između redova */
}

.form-row {
    display: flex;
    align-items: center;      /* labela i select u istoj liniji */
    gap: 8px;                 /* razmak između labela i selecta */
}

label {
    font-weight: bold;
    font-size: 16px;
}

select {
    font-size: 16px;
    padding: 4px 8px;
    background-color: #fff9c4; /* svetlo žuta pozadina */
    border: 2px solid #000;
    cursor: pointer;
}

select option {
    background-color: #fff9c4; /* svetlo žuta i za opcije */
}

.btn {
    font-size: 18px;
    font-weight: bold;
    border: 2px solid #000;
    background-color: #8bc34a;
    padding: 8px 16px;
    cursor: pointer;
}

</style>

<h3>Vrsta</h3>
<form method="POST" action="{{ route('tickets.type', $ticket->id) }}">
    @csrf
    <div class="form-row">
        <label for="type">Odaberite:</label>
        <select name="type" id="type">
            <option value="bug">Bug</option>
            <option value="novi razvoj">Novi razvoj</option>
            <option value="regulativa">Regulativa</option>
        </select>
    </div>
    <button type="submit" class="btn">Promeni</button>
</form>
