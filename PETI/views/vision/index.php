<head>
    <link rel="stylesheet" href="<?=base_url?>assets/css/vision/index.css">
</head>


<div class="vision-container">
    <h1>VISIÓN</h1>

    <?php if (isset($_SESSION['vision_guardada'])): ?>
        <div class="alert <?= $_SESSION['vision_guardada'] == 'completado' ? 'alert-success' : 'alert-error' ?>">
            <?= $_SESSION['vision_guardada'] == 'completado' ? '✅ Visión guardada correctamente.' : '❌ Hubo un error al guardar la visión.' ?>
        </div>
        <?php unset($_SESSION['vision_guardada']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['vision_actualizada'])): ?>
        <div class="alert <?= $_SESSION['vision_actualizada'] == 'completado' ? 'alert-success' : 'alert-error' ?>">
            <?= $_SESSION['vision_actualizada'] == 'completado' ? '✅ Visión actualizada correctamente.' : '❌ Hubo un error al actualizar la visión.' ?>
        </div>
        <?php unset($_SESSION['vision_actualizada']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['vision_eliminada'])): ?>
        <div class="alert <?= $_SESSION['vision_eliminada'] == 'completado' ? 'alert-success' : 'alert-error' ?>">
            <?= $_SESSION['vision_eliminada'] == 'completado' ? '✅ Visión eliminada correctamente.' : '❌ Hubo un error al eliminar la visión.' ?>
        </div>
        <?php unset($_SESSION['vision_eliminada']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['error_vision'])): ?>
        <div class="alert alert-error">
            <?= $_SESSION['error_vision'] ?>
        </div>
        <?php unset($_SESSION['error_vision']); ?>
    <?php endif; ?>

    <p><strong>La VISIÓN</strong> es la imagen futura que se desea tener de la empresa u organización. Representa el estado ideal al que se quiere llegar.</p>
    <ul>
        <li>Debe ser inspiradora, motivadora y alcanzable.</li>
        <li>Orienta las decisiones estratégicas de la organización.</li>
        <li>Proyecta lo que la empresa quiere ser en el futuro.</li>
    </ul>
    <p>La visión es una declaración que indica hacia dónde se dirige la empresa a largo plazo y qué espera conseguir. Sirve como guía para el camino a seguir.</p>
    <p>Se expresa en términos claros y debe ser compartida por todos los miembros de la organización.</p>

    <h2>Ejemplos de visión</h2>
    <ul>
        <li><strong>Empresa tecnológica:</strong> Ser reconocidos como la empresa líder en soluciones innovadoras que transforman la manera en que las personas interactúan con la tecnología, mejorando su calidad de vida.</li>
        <li><strong>Cadena de restaurantes:</strong> Convertirnos en la opción preferida de alimentación en toda la región, siendo sinónimo de calidad, servicio excepcional y compromiso con nuestros clientes y comunidades.</li>
        <li><strong>Institución educativa:</strong> Ser reconocidos como el referente nacional en educación de calidad, formando profesionales íntegros y competitivos que contribuyan al desarrollo del país.</li>
    </ul>

    <?php if (isset($edicion) && $edicion && isset($visionActual)): ?>
        <div class="editar-vision-container">
            <h2>Editar Visión</h2>
            
            <form action="<?= base_url ?>vision/guardar" method="POST">
                <input type="hidden" name="id_vision" value="<?= $visionActual->id_vision ?>">
                
                <textarea name="vision" placeholder="Edita tu visión aquí..." required><?= htmlspecialchars($visionActual->vision) ?></textarea>
                
                <div style="display: flex; gap: 10px; margin-top: 15px;">
                    <button type="submit">Guardar Cambios</button>
                    <a href="<?= base_url ?>vision/index" style="background: #e74c3c; color: white; padding: 10px 15px; border-radius: 5px; text-decoration: none;">Cancelar</a>
                </div>
            </form>
        </div>
    <?php else: ?>
            <form action="<?= base_url ?>vision/guardar" method="POST" style="max-width:500px; margin:auto; position:relative;">
            <label for="vision"><strong>Describe la visión de tu empresa:</strong></label>
            <div style="position:relative;">
                <textarea id="vision_textarea" name="vision" class="form-control mb-2"
                    style="min-height:180px; font-size:1.18em; padding:1.2em 3em 1.2em 1.2em; border-radius:12px; padding-right:44px;"
                    placeholder="Escribe aquí la visión de tu empresa..." required></textarea>
                <button type="button"
                    id="btn-ia-vision"
                    title="¿Te ayudo a generar tu visión con IA?"
                    onclick="abrirModalIAVision()"
                    style="position:absolute; top:12px; right:8px; width:36px; height:36px; border-radius:50%; background:#232946; color:#fff; border:none; display:flex; align-items:center; justify-content:center; font-size:1.3em; box-shadow:0 2px 8px #23294622; cursor:pointer; transition:background 0.2s;">
                    🤖
                </button>
            </div>
            <button type="submit" class="btn btn-success" style="width:100%; margin-top:8px;">Agregar Visión</button>
        </form>

        <!-- Modal IA para visión -->
        <div id="modal-ia-vision" style="display:none; position:fixed; z-index:9999; left:0; top:0; width:100vw; height:100vh; background:rgba(35,41,70,0.18);">
            <div style="background:#fff; max-width:420px; margin:60px auto; border-radius:16px; box-shadow:0 8px 32px #0002; padding:32px 28px 24px 28px; position:relative;">
                <button onclick="cerrarModalIAVision()" style="position:absolute; right:18px; top:14px; background:none; border:none; font-size:1.5em; color:#232946; cursor:pointer;">&times;</button>
                <h3 style="text-align:center; margin-bottom:18px; font-weight:700; letter-spacing:1px; color:#232946;">
                    <span style="font-size:1.5em; vertical-align:middle;">🤖</span> Genera tu visión con IA
                </h3>
                <div class="mb-3">
                    <label for="nombre_empresa_v" class="form-label"><strong>Nombre de la empresa</strong></label>
                    <input type="text" id="nombre_empresa_v" class="form-control" placeholder="Ej: Café del Valle">
                </div>
                <div class="mb-3">
                    <label for="sector_empresa_v" class="form-label"><strong>Sector o industria</strong></label>
                    <input type="text" id="sector_empresa_v" class="form-control" placeholder="Ej: Alimentación, Tecnología, Servicios...">
                </div>
                <div class="mb-3">
                    <label for="futuro_empresa_v" class="form-label"><strong>¿Cómo te gustaría que sea tu empresa en el futuro?</strong></label>
                    <input type="text" id="futuro_empresa_v" class="form-control" placeholder="Ej: Líder en innovación, referente nacional, expandida internacionalmente...">
                </div>
                <div class="mb-3">
                    <label for="valores_empresa_v" class="form-label"><strong>Valores principales</strong></label>
                    <input type="text" id="valores_empresa_v" class="form-control" placeholder="Ej: Innovación, calidad, sostenibilidad...">
                </div>
                <div class="mb-3">
                    <label for="agregar_vision_v" class="form-label"><strong>¿Qué visión te gustaría agregar?</strong></label>
                    <input type="text" id="agregar_vision_v" class="form-control" placeholder="Ej: Ser la empresa líder en...">
                </div>
                <div style="text-align:center;">
                    <button type="button"
                        class="btn"
                        style="padding:8px 24px; font-size:1em; border-radius:8px; background:#232946; color:#fff; border:none; transition:background 0.2s;"
                        onmouseover="this.style.background='#1a1f3c';"
                        onmouseout="this.style.background='#232946';"
                        onclick="generarVisionIA()">
                        <span style="font-size:1.1em;">✨</span> Generar visión
                    </button>
                </div>
                <div id="ia-loading-vision" style="display:none; text-align:center; margin-top:10px;">
                    <span style="color:#232946;">Generando visión, por favor espera...</span>
                </div>
            </div>
        </div>

        <script>
        function abrirModalIAVision() {
            document.getElementById('modal-ia-vision').style.display = 'block';
        }
        function cerrarModalIAVision() {
            document.getElementById('modal-ia-vision').style.display = 'none';
        }
        async function generarVisionIA() {
            document.getElementById('ia-loading-vision').style.display = 'block';
            const nombre = document.getElementById('nombre_empresa_v').value;
            const sector = document.getElementById('sector_empresa_v').value;
            const futuro = document.getElementById('futuro_empresa_v').value;
            const valores = document.getElementById('valores_empresa_v').value;
            const agregarVision = document.getElementById('agregar_vision_v').value;
            if (!nombre || !sector || !futuro || !valores || !agregarVision) {
                alert('Por favor, completa todos los campos para generar la visión.');
                document.getElementById('ia-loading-vision').style.display = 'none';
                return;
            }
            const prompt = `Redacta una visión empresarial inspiradora, clara y profesional, en un solo párrafo, para una empresa llamada "${nombre}", del sector "${sector}". La visión debe proyectar el futuro ideal de la organización, ser motivadora y alineada a sus valores principales: ${valores}. Describe cómo te gustaría que sea la empresa en el futuro: ${futuro}. Además, incluye la siguiente idea o frase que el usuario desea agregar: "${agregarVision}". No agregues explicaciones ni contexto, solo la visión.`;
            const response = await fetch('https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=AIzaSyDXoYn43bis7un9n3JGHngX7BhpAzYslOE', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    contents: [{ parts: [{ text: prompt }] }]
                })
            });
            const data = await response.json();
            document.getElementById('ia-loading-vision').style.display = 'none';
            const textoGenerado = data.candidates?.[0]?.content?.parts?.[0]?.text;
            if (textoGenerado) {
                document.getElementById('vision_textarea').value = textoGenerado;
                cerrarModalIAVision();
            } else {
                alert('No se pudo generar la visión. Verifica la clave o el uso de la API.');
                console.error(data);
            }
        }
        </script>
    <?php endif; ?>

    <div class="vision-list">
        <h2>Mis Visiones Registradas</h2>
        <?php if ($visiones && $visiones->num_rows > 0): ?>
            <ul>
            <?php while($v = $visiones->fetch_object()): ?>
                <li>
                    <?= htmlspecialchars($v->vision) ?>
                    <a href="<?= base_url ?>vision/index&editar=<?= $v->id_vision ?>">Editar</a>
                    <a href="<?= base_url ?>vision/eliminar&id=<?= $v->id_vision ?>" onclick="return confirm('¿Estás seguro de eliminar esta visión?')">Eliminar</a>
                </li>
            <?php endwhile; ?>
            </ul>
        <?php else: ?>
            <p>No tienes visiones registradas aún.</p>
        <?php endif; ?>
    </div>
</div>