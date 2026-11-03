<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FilaCeroCR – Vistas del cliente</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:wght@600;800&family=Figtree:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/cliente.css">
</head>

<body>

  <nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
    <div class="container">
      <a class="navbar-brand fw-bold" href="#"><b>0</b>FilaCeroCR</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Abrir menú">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="menu">
        <ul class="nav nav-pills ms-md-auto">
          <li class="nav-item"><button class="nav-link active" data-vista="registro">Registro</button></li>
          <li class="nav-item"><button class="nav-link" data-vista="negocios">Negocios</button></li>
          <li class="nav-item"><button class="nav-link" data-vista="horarios">Horarios</button></li>
          <li class="nav-item"><button class="nav-link" data-vista="reservar">Reservar</button></li>
          <li class="nav-item"><button class="nav-link" data-vista="citas">Mis citas</button></li>
        </ul>
      </div>
    </div>
  </nav>

  <main class="container py-4 pb-5">

    <!-- 1. REGISTRO -->
    <section id="registro" class="vista visible">
      <h1 class="mb-1">Crea tu cuenta</h1>
      <p class="text-secondary mb-4">Reserva en tu barbería, salón o clínica favorita sin llamadas ni mensajes.</p>
      <div class="card shadow-sm">
        <div class="card-body p-4">
          <div class="row g-3">
            <div class="col-md-6"><label for="nombre" class="form-label fw-semibold">Nombre</label><input id="nombre" class="form-control" placeholder="María"></div>
            <div class="col-md-6"><label for="apellidos" class="form-label fw-semibold">Apellidos</label><input id="apellidos" class="form-control" placeholder="Rodríguez Mora"></div>
            <div class="col-md-6"><label for="correo" class="form-label fw-semibold">Correo electrónico</label><input id="correo" type="email" class="form-control" placeholder="maria@correo.com"></div>
            <div class="col-md-6"><label for="telefono" class="form-label fw-semibold">Teléfono</label><input id="telefono" type="tel" class="form-control" placeholder="8888 0000">
              <div class="form-text">Te avisaremos de cambios en tu cita.</div>
            </div>
            <div class="col-md-6"><label for="clave" class="form-label fw-semibold">Contraseña</label><input id="clave" type="password" class="form-control">
              <div class="form-text">Mínimo 8 caracteres.</div>
            </div>
            <div class="col-md-6"><label for="clave2" class="form-label fw-semibold">Confirmar contraseña</label><input id="clave2" type="password" class="form-control"></div>
            <div class="col-12">
              <div class="form-check"><input class="form-check-input" type="checkbox" id="terminos"><label class="form-check-label" for="terminos">Acepto los términos y la política de privacidad</label></div>
            </div>
          </div>
          <div class="d-flex flex-wrap gap-2 mt-4">
            <button class="btn btn-primary">Crear cuenta</button>
            <button class="btn btn-outline-primary">Ya tengo cuenta</button>
          </div>
        </div>
      </div>
    </section>

    <!-- 2. NEGOCIOS Y SERVICIOS -->
    <section id="negocios" class="vista">
      <h1 class="mb-1">Encuentra tu negocio</h1>
      <p class="text-secondary mb-4">Compara servicios y precios, y elige dónde reservar.</p>
      <div class="row g-2 mb-4">
        <div class="col-md-6"><input type="search" class="form-control" placeholder="Buscar por nombre o servicio" aria-label="Buscar"></div>
        <div class="col-md-3"><select class="form-select" aria-label="Tipo de negocio">
            <option>Todos los tipos</option>
            <option>Barbería</option>
            <option>Salón de belleza</option>
            <option>Clínica dental</option>
            <option>Centro de estética</option>
          </select></div>
        <div class="col-md-3"><select class="form-select" aria-label="Provincia">
            <option>Todas las provincias</option>
            <option>San José</option>
            <option>Alajuela</option>
            <option>Cartago</option>
            <option>Heredia</option>
          </select></div>
      </div>
      <div class="row g-3">
        <div class="col-md-6 col-lg-4">
          <article class="card h-100 shadow-sm">
            <div class="card-body d-flex flex-column">
              <span class="badge text-bg-primary align-self-start">Barbería</span>
              <h3 class="h5 mt-2 mb-0">Barbería El Corte</h3>
              <p class="text-secondary small">Escazú, San José · Abierto hasta las 7:00 p. m.</p>
              <ul class="list-group list-group-flush mb-3">
                <li class="list-group-item d-flex justify-content-between px-0">Corte clásico <span class="text-secondary">30 min · ₡6 000</span></li>
                <li class="list-group-item d-flex justify-content-between px-0">Corte y barba <span class="text-secondary">50 min · ₡9 500</span></li>
                <li class="list-group-item d-flex justify-content-between px-0">Afeitado con toalla <span class="text-secondary">25 min · ₡5 000</span></li>
              </ul>
              <button class="btn btn-primary mt-auto" data-ir="horarios">Ver horarios</button>
            </div>
          </article>
        </div>
        <div class="col-md-6 col-lg-4">
          <article class="card h-100 shadow-sm">
            <div class="card-body d-flex flex-column">
              <span class="badge text-bg-warning align-self-start">Salón de belleza</span>
              <h3 class="h5 mt-2 mb-0">Salón Lumbre</h3>
              <p class="text-secondary small">Heredia centro · Abierto hasta las 6:00 p. m.</p>
              <ul class="list-group list-group-flush mb-3">
                <li class="list-group-item d-flex justify-content-between px-0">Corte y peinado <span class="text-secondary">60 min · ₡12 000</span></li>
                <li class="list-group-item d-flex justify-content-between px-0">Tinte completo <span class="text-secondary">2 h · ₡28 000</span></li>
                <li class="list-group-item d-flex justify-content-between px-0">Manicure <span class="text-secondary">45 min · ₡8 000</span></li>
              </ul>
              <button class="btn btn-primary mt-auto" data-ir="horarios">Ver horarios</button>
            </div>
          </article>
        </div>
        <div class="col-md-6 col-lg-4">
          <article class="card h-100 shadow-sm">
            <div class="card-body d-flex flex-column">
              <span class="badge text-bg-secondary align-self-start">Clínica dental</span>
              <h3 class="h5 mt-2 mb-0">Clínica Sonrisa Viva</h3>
              <p class="text-secondary small">Cartago · Abierto hasta las 5:00 p. m.</p>
              <ul class="list-group list-group-flush mb-3">
                <li class="list-group-item d-flex justify-content-between px-0">Limpieza dental <span class="text-secondary">40 min · ₡20 000</span></li>
                <li class="list-group-item d-flex justify-content-between px-0">Valoración inicial <span class="text-secondary">30 min · ₡12 000</span></li>
                <li class="list-group-item d-flex justify-content-between px-0">Blanqueamiento <span class="text-secondary">1 h · ₡65 000</span></li>
              </ul>
              <button class="btn btn-primary mt-auto" data-ir="horarios">Ver horarios</button>
            </div>
          </article>
        </div>
      </div>
    </section>

    <!-- 3. HORARIOS -->
    <section id="horarios" class="vista">
      <h1 class="mb-1">Horarios disponibles</h1>
      <p class="text-secondary mb-4">Barbería El Corte · Corte clásico (30 min)</p>
      <div class="card shadow-sm">
        <div class="card-body p-4">
          <div class="row g-3 mb-4">
            <div class="col-md-6"><label for="h-servicio" class="form-label fw-semibold">Servicio</label><select id="h-servicio" class="form-select">
                <option>Corte clásico</option>
                <option>Corte y barba</option>
                <option>Afeitado con toalla</option>
              </select></div>
            <div class="col-md-6"><label for="h-prof" class="form-label fw-semibold">Profesional</label><select id="h-prof" class="form-select">
                <option>Cualquiera disponible</option>
                <option>Andrés</option>
                <option>Luis</option>
              </select></div>
          </div>

          <div class="d-flex gap-2 overflow-auto pb-2 mb-3" aria-label="Días">
            <button class="dia btn btn-outline-dark active"><small class="d-block">Mar</small><strong class="fs-5">3</strong></button>
            <button class="dia btn btn-outline-dark"><small class="d-block">Mié</small><strong class="fs-5">4</strong></button>
            <button class="dia btn btn-outline-dark"><small class="d-block">Jue</small><strong class="fs-5">5</strong></button>
            <button class="dia btn btn-outline-dark"><small class="d-block">Vie</small><strong class="fs-5">6</strong></button>
            <button class="dia btn btn-outline-dark"><small class="d-block">Sáb</small><strong class="fs-5">7</strong></button>
            <button class="dia btn btn-outline-dark"><small class="d-block">Lun</small><strong class="fs-5">9</strong></button>
            <button class="dia btn btn-outline-dark"><small class="d-block">Mar</small><strong class="fs-5">10</strong></button>
          </div>

          <p class="fw-semibold mb-2">Mañana</p>
          <div class="row g-2 mb-3">
            <div class="col-4 col-sm-3 col-md-2"><button class="hora btn btn-outline-primary w-100" disabled>9:00</button></div>
            <div class="col-4 col-sm-3 col-md-2"><button class="hora btn btn-outline-primary w-100">9:30</button></div>
            <div class="col-4 col-sm-3 col-md-2"><button class="hora btn btn-outline-primary w-100">10:00</button></div>
            <div class="col-4 col-sm-3 col-md-2"><button class="hora btn btn-outline-primary w-100" disabled>10:30</button></div>
            <div class="col-4 col-sm-3 col-md-2"><button class="hora btn btn-outline-primary w-100">11:00</button></div>
            <div class="col-4 col-sm-3 col-md-2"><button class="hora btn btn-outline-primary w-100">11:30</button></div>
          </div>
          <p class="fw-semibold mb-2">Tarde</p>
          <div class="row g-2">
            <div class="col-4 col-sm-3 col-md-2"><button class="hora btn btn-outline-primary w-100">1:00</button></div>
            <div class="col-4 col-sm-3 col-md-2"><button class="hora btn btn-outline-primary w-100">1:30</button></div>
            <div class="col-4 col-sm-3 col-md-2"><button class="hora btn btn-outline-primary w-100" disabled>2:00</button></div>
            <div class="col-4 col-sm-3 col-md-2"><button class="hora btn btn-outline-primary w-100">2:30</button></div>
            <div class="col-4 col-sm-3 col-md-2"><button class="hora btn btn-outline-primary w-100">3:00</button></div>
            <div class="col-4 col-sm-3 col-md-2"><button class="hora btn btn-outline-primary w-100">3:30</button></div>
            <div class="col-4 col-sm-3 col-md-2"><button class="hora btn btn-outline-primary w-100">4:00</button></div>
            <div class="col-4 col-sm-3 col-md-2"><button class="hora btn btn-outline-primary w-100" disabled>4:30</button></div>
          </div>
          <p class="text-secondary small mt-3 mb-0">Con borde verde: disponible. Tachado: ocupado.</p>
          <button class="btn btn-primary mt-4" data-ir="reservar">Continuar con la reserva</button>
        </div>
      </div>
    </section>

    <!-- 4. RESERVAR -->
    <section id="reservar" class="vista">
      <h1 class="mb-1">Confirma tu reserva</h1>
      <p class="text-secondary mb-4">Revisa los datos y agrega una nota si la necesitas.</p>
      <div class="row g-4">
        <div class="col-lg-7">
          <div class="card shadow-sm">
            <div class="card-body p-4">
              <h2 class="h5 mb-3">Tus datos</h2>
              <div class="row g-3">
                <div class="col-md-6"><label for="r-nombre" class="form-label fw-semibold">Nombre completo</label><input id="r-nombre" class="form-control" value="María Rodríguez"></div>
                <div class="col-md-6"><label for="r-tel" class="form-label fw-semibold">Teléfono</label><input id="r-tel" type="tel" class="form-control" value="8888 0000"></div>
                <div class="col-12"><label for="r-nota" class="form-label fw-semibold">Nota para el negocio (opcional)</label><textarea id="r-nota" class="form-control" rows="3" placeholder="Ej.: llegaré 5 minutos antes"></textarea></div>
                <div class="col-12">
                  <div class="form-check"><input class="form-check-input" type="checkbox" id="r-wa" checked><label class="form-check-label" for="r-wa">Quiero recibir recordatorio por WhatsApp</label></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <aside class="col-lg-5">
          <div class="card shadow-sm">
            <div class="card-body p-4">
              <h2 class="h5">Resumen</h2>
              <dl class="row my-3">
                <dt class="col-5 fw-normal text-secondary">Negocio</dt>
                <dd class="col-7 text-end fw-semibold">Barbería El Corte</dd>
                <dt class="col-5 fw-normal text-secondary">Servicio</dt>
                <dd class="col-7 text-end fw-semibold">Corte clásico</dd>
                <dt class="col-5 fw-normal text-secondary">Profesional</dt>
                <dd class="col-7 text-end fw-semibold">Andrés</dd>
                <dt class="col-5 fw-normal text-secondary">Fecha</dt>
                <dd class="col-7 text-end fw-semibold">Mar 3 nov, 2026</dd>
                <dt class="col-5 fw-normal text-secondary">Hora</dt>
                <dd class="col-7 text-end fw-semibold">3:00 p. m.</dd>
                <dt class="col-5 fw-normal text-secondary">Duración</dt>
                <dd class="col-7 text-end fw-semibold">30 min</dd>
              </dl>
              <div class="d-flex justify-content-between border-top pt-3 mb-3 fs-5 fw-semibold"><span>Total a pagar en el local</span><span>₡6 000</span></div>
              <button class="btn btn-primary w-100" data-ir="citas">Confirmar reserva</button>
              <button class="btn btn-outline-primary w-100 mt-2" data-ir="horarios">Cambiar horario</button>
            </div>
          </div>
        </aside>
      </div>
    </section>

    <!-- 5. CANCELAR / REPROGRAMAR -->
    <section id="citas" class="vista">
      <h1 class="mb-1">Mis citas</h1>
      <p class="text-secondary mb-4">Cancela o cambia tu cita hasta 2 horas antes de la hora reservada.</p>

      <ul class="nav nav-tabs mb-3" role="tablist">
        <li class="nav-item"><button class="nav-link active" data-bs-toggle="tab" data-bs-target="#t-proximas" type="button" role="tab">Próximas</button></li>
        <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#t-pasadas" type="button" role="tab">Pasadas</button></li>
        <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#t-canceladas" type="button" role="tab">Canceladas</button></li>
      </ul>

      <div class="tab-content">
        <div class="tab-pane fade show active" id="t-proximas" role="tabpanel">
          <article class="card shadow-sm mb-3">
            <div class="card-body d-flex flex-wrap align-items-center gap-3">
              <div class="fecha-cita rounded-3 text-center p-2"><strong>3</strong><small>nov · 3:00 p. m.</small></div>
              <div class="flex-grow-1">
                <h3 class="h6 mb-1">Corte clásico · Barbería El Corte</h3>
                <p class="text-secondary small mb-1">Con Andrés · 30 min · ₡6 000</p>
                <span class="badge text-bg-primary">Confirmada</span>
              </div>
              <div class="d-flex gap-2 flex-wrap">
                <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#m-repro">Reprogramar</button>
                <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#m-cancelar">Cancelar</button>
              </div>
            </div>
          </article>
          <article class="card shadow-sm mb-3">
            <div class="card-body d-flex flex-wrap align-items-center gap-3">
              <div class="fecha-cita rounded-3 text-center p-2"><strong>12</strong><small>nov · 10:00 a. m.</small></div>
              <div class="flex-grow-1">
                <h3 class="h6 mb-1">Limpieza dental · Clínica Sonrisa Viva</h3>
                <p class="text-secondary small mb-1">Con Dra. Vargas · 40 min · ₡20 000</p>
                <span class="badge text-bg-warning">Pendiente de confirmar</span>
              </div>
              <div class="d-flex gap-2 flex-wrap">
                <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#m-repro">Reprogramar</button>
                <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#m-cancelar">Cancelar</button>
              </div>
            </div>
          </article>
        </div>
        <div class="tab-pane fade" id="t-pasadas" role="tabpanel">
          <p class="text-secondary">Aún no tienes citas pasadas.</p>
        </div>
        <div class="tab-pane fade" id="t-canceladas" role="tabpanel">
          <p class="text-secondary">No has cancelado ninguna cita.</p>
        </div>
      </div>
    </section>

  </main>

  <!-- Modal: cancelar -->
  <div class="modal fade" id="m-cancelar" tabindex="-1" aria-labelledby="t-cancelar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title h5" id="t-cancelar">¿Cancelar esta cita?</h2><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">
          <p class="text-secondary">Corte clásico, 3 de noviembre a las 3:00 p. m. El horario quedará libre para otras personas.</p>
          <label for="motivo" class="form-label fw-semibold">Motivo (opcional)</label>
          <select id="motivo" class="form-select">
            <option>Prefiero no decir</option>
            <option>Ya no puedo asistir</option>
            <option>Reservé por error</option>
            <option>Otro</option>
          </select>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Mantener cita</button>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Sí, cancelar cita</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal: reprogramar -->
  <div class="modal fade" id="m-repro" tabindex="-1" aria-labelledby="t-repro" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title h5" id="t-repro">Reprogramar cita</h2><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">
          <p class="text-secondary">Elige una nueva fecha y hora para tu corte clásico.</p>
          <div class="row g-3">
            <div class="col-sm-6"><label for="n-fecha" class="form-label fw-semibold">Nueva fecha</label><input id="n-fecha" type="date" class="form-control"></div>
            <div class="col-sm-6"><label for="n-hora" class="form-label fw-semibold">Nueva hora</label><select id="n-hora" class="form-select">
                <option>9:30 a. m.</option>
                <option>11:00 a. m.</option>
                <option>1:30 p. m.</option>
                <option>4:00 p. m.</option>
              </select></div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Volver</button>
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Guardar cambio</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Solo navegación visual entre vistas. No hay lógica de negocio ni de datos.
    const vistas = document.querySelectorAll('.vista');
    const botonesNav = document.querySelectorAll('[data-vista]');

    function mostrarVista(id) {
      vistas.forEach(v => v.classList.toggle('visible', v.id === id));
      botonesNav.forEach(b => b.classList.toggle('active', b.dataset.vista === id));
      window.scrollTo({
        top: 0
      });
    }
    botonesNav.forEach(b => b.addEventListener('click', () => mostrarVista(b.dataset.vista)));
    document.querySelectorAll('[data-ir]').forEach(b => b.addEventListener('click', () => mostrarVista(b.dataset.ir)));

    // Selección visual de día y hora
    document.querySelectorAll('.dia').forEach(d => d.addEventListener('click', () => {
      document.querySelectorAll('.dia').forEach(x => x.classList.remove('active'));
      d.classList.add('active');
    }));
    document.querySelectorAll('.hora:not(:disabled)').forEach(h => h.addEventListener('click', () => {
      document.querySelectorAll('.hora').forEach(x => x.classList.remove('active'));
      h.classList.add('active');
    }));
  </script>
</body>

</html>