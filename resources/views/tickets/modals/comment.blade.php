<h3 style="margin-bottom: 20px; font-size: 22px;">Komentar</h3>

<form method="POST" action="{{ route('tickets.comment.ps', $ticket->id) }}">
    @csrf
    <textarea name="comment"
              rows="3"
              style="width:100%; font-size:18px; padding:6px; background:repeating-linear-gradient(to bottom,transparent 0,transparent 28px,#333 29px); border:none; resize:none; line-height:28px;"
              placeholder="Unesite komentar..."
              required></textarea>

    <br><br>
    <div style="text-align:center;">
        <button type="submit" class="btn">Potvrdi</button>
    </div>
</form>
