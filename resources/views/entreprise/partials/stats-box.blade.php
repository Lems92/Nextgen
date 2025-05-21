<div class="col-md-2">
    <div class="stat-box">
        <span class="stat-icon la la-eye"></span>
        <h5>Vues</h5>
        <p>{{ $stats['total_views'] }}</p>
    </div>
</div>
<div class="col-md-2">
    <div class="stat-box">
        <span class="stat-icon la la-file-invoice"></span>
        <h5>Candidatures</h5>
        <p>{{ $stats['total_postules'] }}</p>
    </div>
</div>
<div class="col-md-2">
    <div class="stat-box">
        <span class="stat-icon la la-hourglass-half"></span>
        <h5>En attente</h5>
        <p>{{ $stats['total_pending'] }}</p>
    </div>
</div>
<div class="col-md-2">
    <div class="stat-box">
        <span class="stat-icon la la-check-circle"></span>
        <h5>Acceptés</h5>
        <p>{{ $stats['total_accepted'] }}</p>
    </div>
</div>
<div class="col-md-2">
    <div class="stat-box">
        <span class="stat-icon la la-times-circle"></span>
        <h5>Refusés</h5>
        <p>{{ $stats['total_rejected'] }}</p>
    </div>
</div>
<div class="col-md-2">
    <div class="stat-box">
        <span class="stat-icon la la-user-check"></span>
        <h5>Recrutés</h5>
        <p>{{ $stats['total_recruited'] }}</p>
    </div>
</div>
<script>
document.getElementById('offreFilter').addEventListener('change', function() {
    let value = this.value;
    document.querySelectorAll('.stats-block').forEach(function(block) {
        block.style.display = 'none';
    });
    if(value === 'global') {
        document.getElementById('stats-global').style.display = '';
    } else {
        let el = document.getElementById('stats-offre-' + value);
        if(el) el.style.display = '';
    }
});
</script>