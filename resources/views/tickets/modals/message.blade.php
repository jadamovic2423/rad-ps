<style>
    .modal-title {
    font-size: 26px;     
    font-weight: normal; 
    margin-bottom: 20px;
    text-align: center;  
}

</style>

<h3 class="modal-title">Poruka</h3>

<form method="POST" action="{{ route('tickets.message', $ticket->id) }}">
    @csrf

    <textarea name="poruka"
              rows="3"
              style="
                width: 100%;
                font-size: 26px;
                padding: 6px;
                background: repeating-linear-gradient(
                    to bottom,
                    transparent 0,
                    transparent 28px,
                    #333 29px
                );
                border: none;
                resize: none;
                line-height: 28px;
              "
              placeholder="Pišite ovde..."
              required></textarea>

    <br><br>
    <div style="text-align: center;">
        <button type="submit" class="btn">Pošalji</button>
    </div>
</form>
