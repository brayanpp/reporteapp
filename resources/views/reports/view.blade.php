<div class="modal-header">
    <h5 class="modal-title" id="reportModalLabel"><i class="fas fa-info-circle"></i> Detalles del Reporte</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <div class="mb-3">
        <strong>Título:</strong> {{ $report->title }}
    </div>
    <div class="mb-3">
        <strong>Descripción:</strong> {{ $report->description }}
    </div>
    <div class="mb-3">
        <strong>Ubicación:</strong> {{ $report->location }}
    </div>
    <div class="mb-3">
        <strong>Prioridad:</strong> {{ $report->priority }}
    </div>
    <div class="mb-3">
        <strong>Tipo:</strong> {{ $report->type }}
    </div>

    <!-- Mapa -->
    <div id="map" style="height: 400px;"></div> <!-- Aquí se cargará el mapa -->

</div>

