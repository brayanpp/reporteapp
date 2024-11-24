<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Reportar Contaminación Ambiental</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
            integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </head>

    <body class="bg-gray-100 font-sans">

        <!-- Navbar -->
        <nav class="bg-white shadow-md py-4">
            <div class="max-w-screen-xl mx-auto flex justify-between items-center px-6">
                <a href="#" class="flex items-center">
                    <img src="{{ asset('logo/logo.png') }}" alt="Logo" class="h-20" />
                    <span class="ml-2 text-2xl font-semibold text-blue-600"> EcoAlert</span>
                </a>
                <div class="flex items-center space-x-8 text-gray-800 text-lg">
                    <a href="#about" class="hover:text-blue-600">¿Quiénes somos?</a>
                    <a href="#importance" class="hover:text-blue-600">Importancia</a>
                    <a href="#contact" class="hover:text-blue-600">Contacto</a>
                    <button class="bg-blue-600 text-white px-6 py-2 rounded-full hover:bg-blue-700 transition" data-bs-toggle="modal" data-bs-target="#reportModal">
                        Crear Reporte
                    </button>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <section class="bg-blue-600 text-white text-center py-24">
            <h1 class="text-4xl md:text-5xl font-semibold mb-4">¡Actúa contra la contaminación!</h1>
            <p class="text-lg md:text-xl mb-6">Reporta casos de contaminación y protege nuestro planeta.</p>
            <button class="bg-white text-blue-600 px-6 py-2 rounded-lg hover:bg-gray-100 transition" data-bs-toggle="modal" data-bs-target="#reportModal">
                Reportar Ahora
            </button>
        </section>

        <!-- About Section -->
        <section id="about" class="py-10 bg-white text-center">
            <div class="max-w-screen-xl mx-auto px-6">
                <h2 class="text-3xl font-semibold text-blue-600">¿Quiénes somos?</h2>
                <p class="mt-4 text-gray-600 text-lg">
                    Somos una plataforma comprometida con la conservación del medio ambiente, donde cualquier ciudadano puede reportar contaminación ambiental de forma sencilla y rápida.
                </p>
            </div>
        </section>

        <!-- Importance Section -->
        <section id="importance" class="py-10 bg-gray-50 text-center">
            <div class="max-w-screen-xl mx-auto px-6">
                <h2 class="text-3xl font-semibold text-blue-600">¿Por qué es importante?</h2>
                <p class="mt-4 text-gray-600 text-lg">
                    La contaminación es una de las mayores amenazas para nuestro planeta. Al reportar estos casos, todos podemos contribuir a mantener nuestros ecosistemas saludables y limpios.
                </p>
                <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-12">
                    <div>
                        <i class="fas fa-globe text-blue-600 text-4xl mb-4"></i>
                        <h3 class="text-xl font-semibold">Preservar la Tierra</h3>
                        <p class="text-gray-600">Cada acción cuenta para cuidar el entorno en el que vivimos.</p>
                    </div>
                    <div>
                        <i class="fas fa-water text-blue-600 text-4xl mb-4"></i>
                        <h3 class="text-xl font-semibold">Cuidar los recursos hídricos</h3>
                        <p class="text-gray-600">La contaminación del agua afecta nuestra salud y el ecosistema.</p>
                    </div>
                    <div>
                        <i class="fas fa-hands-helping text-blue-600 text-4xl mb-4"></i>
                        <h3 class="text-xl font-semibold">Impacto positivo</h3>
                        <p class="text-gray-600">Juntos podemos marcar una diferencia real en la lucha contra la contaminación.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer Section -->
        <footer id="contact" class="bg-blue-600 text-white py-8 text-center">
            <p class="text-lg mb-4">Contáctanos</p>
            <p class="text-md">Email: info@contaminacion.com | Teléfono: 123-456-789</p>
            <div class="mt-4">
                <a href="https://www.facebook.com" class="text-white mx-2"><i class="fab fa-facebook-square text-2xl"></i></a>
                <a href="https://www.twitter.com" class="text-white mx-2"><i class="fab fa-twitter-square text-2xl"></i></a>
                <a href="https://www.instagram.com" class="text-white mx-2"><i class="fab fa-instagram-square text-2xl"></i></a>
            </div>
            <p class="mt-4 text-sm">© 2024 Reporta Contaminación. Todos los derechos reservados.</p>
        </footer>

        <!-- Modal HTML -->
        <div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="reportModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-blue-600 text-white">
                        <h5 class="modal-title" id="reportModalLabel"><i class="fas fa-flag"></i> Crear un Reporte</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="text-muted text-center mb-4"><i class="fas fa-info-circle"></i> Por favor, llena los campos requeridos para reportar un caso de contaminación ambiental.</p>
                        <form id="reportForm" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- Token CSRF -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="title" class="form-label"><i class="fas fa-heading"></i> Título</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Ej: Basura en el río" required />
                                </div>
                                <div class="col-md-6">
                                    <label for="type" class="form-label"><i class="fas fa-leaf"></i> Tipo de Contaminación</label>
                                    <input type="text" class="form-control" id="type" name="type" placeholder="Ej: Basura, Derrames químicos" required />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label"><i class="fas fa-align-left"></i> Descripción</label>
                                <textarea class="form-control" id="description" name="description" rows="4" placeholder="Describe el problema con detalles" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="location" class="form-label"><i class="fas fa-map-marker-alt"></i> Locación</label>
                                <input type="text" class="form-control" id="location" name="location" placeholder="Ej: Parque X, Calle Y" required>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="latitude" class="form-label"><i class="fas fa-map-marker-alt"></i> Latitud</label>
                                    <input type="number" step="0.00000001" class="form-control" id="latitude" name="latitude" placeholder="Ej: 19.432608" required />
                                </div>
                                <div class="col-md-6">
                                    <label for="longitude" class="form-label"><i class="fas fa-map-marker-alt"></i> Longitud</label>
                                    <input type="number" step="0.00000001" class="form-control" id="longitude" name="longitude" placeholder="Ej: -99.133209" required />
                                </div>
                            </div>
                            <div class="mb-3 text-center">
                                <button type="button" class="btn btn-secondary" onclick="getLocation()"><i class="fas fa-map-pin"></i> Obtener mi ubicación</button>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="priority" class="form-label"><i class="fas fa-exclamation-circle"></i> Prioridad</label>
                                    <select class="form-control" id="priority" name="priority" required>
                                        <option value="low">Baja</option>
                                        <option value="medium">Media</option>
                                        <option value="high">Alta</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="photo" class="form-label"><i class="fas fa-camera"></i> Fotografía (opcional)</label>
                                    <input type="file" class="form-control" id="photo" name="photo" accept="image/*" />
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-paper-plane"></i> Enviar Reporte</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function getLocation() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(
                        function (position) {
                            document.getElementById("latitude").value = position.coords.latitude;
                            document.getElementById("longitude").value = position.coords.longitude;
                        },
                        function (error) {
                            switch (error.code) {
                                case error.PERMISSION_DENIED:
                                    alert("Permiso denegado para obtener la ubicación.");
                                    break;
                                case error.POSITION_UNAVAILABLE:
                                    alert("La información de la ubicación no está disponible.");
                                    break;
                                case error.TIMEOUT:
                                    alert("El tiempo de espera para obtener la ubicación ha terminado.");
                                    break;
                                case error.UNKNOWN_ERROR:
                                    alert("Ocurrió un error desconocido.");
                                    break;
                            }
                        }
                    );
                } else {
                    alert("La geolocalización no está soportada por este navegador.");
                }
            }
        </script>

        <script>
            document.getElementById("reportForm").addEventListener("submit", function(e) {
                e.preventDefault();  // Evitar el comportamiento por defecto del formulario

                // Crear un FormData con los datos del formulario
                const formData = new FormData(this);

                // Usar fetch para enviar la solicitud POST
                fetch("{{ route('reports.store') }}", {
                    method: "POST",
                    body: formData
                })
                .then(response => response.json())  // Convertir la respuesta a JSON
                .then(data => {
                    // Si la respuesta es exitosa, mostramos un mensaje de éxito
                    if (data.message) {
                        Swal.fire({
                            icon: 'success',
                            title: '¡Éxito!',
                            text: data.message,
                            confirmButtonText: 'Aceptar'
                        });
                        // Limpiar el formulario después de enviar
                        document.getElementById("reportForm").reset();
                    }
                })
                .catch(error => {
                    // Si ocurre un error, mostrarlo con SweetAlert
                    Swal.fire({
                        icon: 'error',
                        title: '¡Error!',
                        text: 'Hubo un problema al enviar el reporte. Intenta nuevamente.',
                        confirmButtonText: 'Aceptar'
                    });
                    console.error('Error al enviar el reporte:', error);
                });
            });
        </script>

    </body>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</html>
