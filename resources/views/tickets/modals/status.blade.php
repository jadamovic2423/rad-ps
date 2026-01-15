<style>
    form {
    display: flex;
    flex-direction: column;   /* vertikalni raspored */
    align-items: center;      /* centriraj sve elemente */
    gap: 12px;                /* razmak između label/select i dugmeta */
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
    background-color: #fff9c4; /* svetlo žuta */
    border: 2px solid #000;
    cursor: pointer;
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
<h3>Status</h3>
<form method="POST" action="{{ route('tickets.updateStatus', $ticket->id) }}">
    @csrf
    <div class="form-row">
        <label for="status">Odaberite:</label>
        <select name="status" id="status">
            <option value="otvoren">Otvoren</option>
            <option value="analiza">Analiza</option>
            <option value="razvoj">Razvoj</option>
            <option value="zatvoren">Zatvoren</option>
        </select>
    </div>
    <button type="submit" class="btn">Promeni</button>
</form>
