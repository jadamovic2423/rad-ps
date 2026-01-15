<h3>Fajl</h3>
<style>
.upload-icon {
    cursor: pointer;
    font-size: 24px;
    margin-left: 8px;
}
.upload-icon:hover {
    color: #333;
}

.modal h3 {
    font-size: 26px;      
    margin-bottom: 10px;
}

.modal .form-row label {
    font-size: 22px;      
    font-weight: normal;  
}

</style>

<form method="POST" action="{{ route('tickets.file.upload', $ticket->id) }}" enctype="multipart/form-data">
    @csrf
    <div class="form-row">
        <label for="file">Priloži fajl:</label>
        <input type="file" name="file" id="file" style="display:none;">
        <label for="file" class="upload-icon">📤</label>
    </div>
    <br>
    <button class="btn">Dodaj</button>
</form>
