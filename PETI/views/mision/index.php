<head>
    <link rel="stylesheet" href="<?=base_url?>assets/css/mision/index.css">
</head>

<div class="mision-container">
    <h1>MISIÓN</h1>

    <?php if (isset($_SESSION['mision_guardada'])): ?>
        <div class="alert <?= $_SESSION['mision_guardada'] == 'completado' ? 'alert-success' : 'alert-error' ?>">
            <?= $_SESSION['mision_guardada'] == 'completado' ? '✅ Misión guardada correctamente.' : '❌ Hubo un error al guardar la misión.' ?>
        </div>
        <?php unset($_SESSION['mision_guardada']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['mision_actualizada'])): ?>
        <div class="alert <?= $_SESSION['mision_actualizada'] == 'completado' ? 'alert-success' : 'alert-error' ?>">
            <?= $_SESSION['mision_actualizada'] == 'completado' ? '✅ Misión actualizada correctamente.' : '❌ Hubo un error al actualizar la misión.' ?>
        </div>
        <?php unset($_SESSION['mision_actualizada']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['mision_eliminada'])): ?>
        <div class="alert <?= $_SESSION['mision_eliminada'] == 'completado' ? 'alert-success' : 'alert-error' ?>">
            <?= $_SESSION['mision_eliminada'] == 'completado' ? '✅ Misión eliminada correctamente.' : '❌ Hubo un error al eliminar la misión.' ?>
        </div>
        <?php unset($_SESSION['mision_eliminada']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['error_mision'])): ?>
        <div class="alert alert-error">
            <?= $_SESSION['error_mision'] ?>
        </div>
        <?php unset($_SESSION['error_mision']); ?>
    <?php endif; ?>

    <p><strong>La MISIÓN</strong> es la razón de ser de la empresa u organización. Describe la actividad y propósito fundamental en el mercado.</p>
    <ul>
        <li>Debe ser clara, concisa y compartida.</li>
        <li>Siempre orientada hacia el cliente, no solo al producto o servicio.</li>
        <li>Refleja el propósito fundamental de la empresa en el mercado.</li>
    </ul>
    <p>En términos generales, describe la actividad y razón de ser de la organización y contribuye como una referencia permanente en el proceso de planificación estratégica.</p>
    <p>Se expresa en una oración que define qué hace la empresa, por qué y para quién lo hace.</p>

    <h2>Ejemplos de misión</h2>
    <ul>
        <li><strong>Empresa de servicios:</strong> La gestión de servicios que contribuyen a la calidad de vida de las personas y generan valor para los grupos de interés.</li>
        <li><strong>Productora de café:</strong> Gracias a nuestro entusiamo, trabajo en equipo y valores, queremos deleitar a todos aquellos que, en el mundo aman la calidad de vida, a través del mejor café que la naturaleza pueda ofrecer, ensalzado por las mejores tecnologías, por la emoción y la imlicación intelectual que nacen de la búsqueda de lo bello en todo lo que hacemos.</li>
        <li><strong>Agencia de certificación:</strong> Dar a nuestros clientes avlro económico a través de la gestión de la Calidad, la Salud y la Seguridad, el Medio Ambiente y la Responsabildad Social de sus activos, proyectos, productos y sistemas, obteniendo como resultado la capacidad para lograr la reducción de riesgos y la mejora de los resultados.</li>
    </ul>

    <?php if (isset($edicion) && $edicion && isset($misionActual)): ?>
        <div class="editar-mision-container">
            <h2>Editar Misión</h2>
            <form action="<?= base_url ?>mision/guardar" method="POST">
                <input type="hidden" name="id_mision" value="<?= $misionActual->id_mision ?>">
                <textarea name="mision" placeholder="Edita tu misión aquí..." required><?= htmlspecialchars($misionActual->mision) ?></textarea>
                <div style="display: flex; gap: 10px; margin-top: 15px;">
                    <button type="submit">Guardar Cambios</button>
                    <a href="<?= base_url ?>mision/index" style="background: #e74c3c; color: white; padding: 10px 15px; border-radius: 5px; text-decoration: none;">Cancelar</a>
                </div>
            </form>
        </div>
    <?php else: ?>
        <!-- Botón flotante circular estilo Gemini IA -->
        <style>
        #btn-ia-flotante {
            position: fixed;
            bottom: 32px;
            right: 32px;
            width: 52px;
            height: 52px;
            border-radius: 50%;
            background: #232946;
            color: #fff;
            border: none;
            box-shadow: 0 4px 16px #23294633;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.7em;
            cursor: pointer;
            z-index: 10001;
            transition: background 0.2s, box-shadow 0.2s, transform 0.15s;
        }
        #btn-ia-flotante:hover {
            background: #1a1f3c;
            box-shadow: 0 8px 32px #23294655;
            transform: scale(1.08);
        }
        #btn-ia-flotante .ia-label {
            display: none;
            position: absolute;
            right: 62px;
            background: #232946;
            color: #fff;
            padding: 6px 14px;
            border-radius: 8px;
            font-size: 0.98em;
            font-weight: 500;
            box-shadow: 0 2px 8px #23294633;
            white-space: nowrap;
        }
        #btn-ia-flotante:hover .ia-label {
            display: block;
        }
        @media (max-width: 600px) {
            #btn-ia-flotante {
                bottom: 14px;
                right: 14px;
                width: 40px;
                height: 40px;
                font-size: 1.2em;
            }
            #btn-ia-flotante .ia-label {
                right: 46px;
                font-size: 0.85em;
            }
        }
        </style>


        <!-- Modal Gemini IA -->
        <div id="modal-ia" style="display:none; position:fixed; z-index:9999; left:0; top:0; width:100vw; height:100vh; background:rgba(35,41,70,0.18);">
            <div style="background:#fff; max-width:420px; margin:60px auto; border-radius:16px; box-shadow:0 8px 32px #0002; padding:32px 28px 24px 28px; position:relative;">
                <button onclick="cerrarModalIA()" style="position:absolute; right:18px; top:14px; background:none; border:none; font-size:1.5em; color:#232946; cursor:pointer;">&times;</button>
                <h3 style="text-align:center; margin-bottom:18px; font-weight:700; letter-spacing:1px; color:#232946;">
                    <span style="font-size:1.5em; vertical-align:middle;">🤖</span> Genera tu misión con Gemini
                </h3>
                <div class="mb-3">
                    <label for="nombre_empresa" class="form-label"><strong>Nombre de la empresa</strong></label>
                    <input type="text" id="nombre_empresa" class="form-control" placeholder="Ej: Café del Valle">
                </div>
                <div class="mb-3">
                    <label for="sector_empresa" class="form-label"><strong>Sector o industria</strong></label>
                    <input type="text" id="sector_empresa" class="form-control" placeholder="Ej: Alimentación, Tecnología, Servicios...">
                </div>
                <div class="mb-3">
                    <label for="publico_empresa" class="form-label"><strong>Público objetivo</strong></label>
                    <input type="text" id="publico_empresa" class="form-control" placeholder="Ej: Jóvenes, empresas, familias...">
                </div>
                <div class="mb-3">
                    <label for="valores_empresa" class="form-label"><strong>Valores principales</strong></label>
                    <input type="text" id="valores_empresa" class="form-control" placeholder="Ej: Innovación, calidad, sostenibilidad...">
                </div>
                <div class="mb-3">
                    <label for="productos_empresa" class="form-label"><strong>Productos o servicios principales</strong></label>
                    <input type="text" id="productos_empresa" class="form-control" placeholder="Ej: Café orgánico, consultoría, software...">
                </div>
                <div style="text-align:center;">
                    <button type="button"
                        class="btn"
                        style="padding:8px 24px; font-size:1em; border-radius:8px; background:#232946; color:#fff; border:none; transition:background 0.2s;"
                        onmouseover="this.style.background='#1a1f3c';"
                        onmouseout="this.style.background='#232946';"
                        onclick="generarMisionIA()">
                        <span style="font-size:1.1em;">✨</span> Generar misión
                    </button>
                </div>
                <div id="ia-loading" style="display:none; text-align:center; margin-top:10px;">
                    <span style="color:#232946;">Generando misión, por favor espera...</span>
                </div>
            </div>
        </div>

        <!-- FORMULARIO MANUAL: SIEMPRE visible debajo -->
        <form action="<?= base_url ?>mision/guardar" method="POST" style="max-width:500px; margin:auto; position:relative;">
            <label for="mision"><strong>Describe la misión de tu empresa:</strong></label>
            <div style="position:relative;">
                <textarea id="mision_textarea" name="mision" class="form-control mb-2"
                    style="min-height:180px; font-size:1.18em; padding:1.2em 3em 1.2em 1.2em; border-radius:12px; padding-right:44px;"
                    placeholder="Escribe aquí la misión de tu empresa..." required></textarea>
                <button type="button"
                    id="btn-ia-inline"
                    title="¿Te ayudo a generar tu misión con IA?"
                    onclick="abrirModalIA()"
                    style="position:absolute; top:12px; right:8px; width:36px; height:36px; border-radius:50%; background:#232946; color:#fff; border:none; display:flex; align-items:center; justify-content:center; font-size:1.3em; box-shadow:0 2px 8px #23294622; cursor:pointer; transition:background 0.2s;">
                    🤖
                </button>
            </div>
            <button type="submit" class="btn btn-success" style="width:100%; margin-top:8px;">Agregar Misión</button>
        </form>
    <?php endif; ?>

    <div class="mision-list">
        <h2>Mis Misiones Registradas</h2>
        <?php if ($misiones && $misiones->num_rows > 0): ?>
            <ul>
            <?php while($m = $misiones->fetch_object()): ?>
                <li>
                    <?= htmlspecialchars($m->mision) ?>
                    <a href="<?= base_url ?>mision/index&editar=<?= $m->id_mision ?>">Editar</a>
                    <a href="<?= base_url ?>mision/eliminar&id=<?= $m->id_mision ?>" onclick="return confirm('¿Estás seguro de eliminar esta misión?')">Eliminar</a>
                </li>
            <?php endwhile; ?>
            </ul>
        <?php else: ?>
            <p>No tienes misiones registradas aún.</p>
        <?php endif; ?>
    </div>

    <script>
    function abrirModalIA() {
        document.getElementById('modal-ia').style.display = 'block';
    }
    function cerrarModalIA() {
        document.getElementById('modal-ia').style.display = 'none';
    }
    async function generarMisionIA() {
        document.getElementById('ia-loading').style.display = 'block';
        const nombre = document.getElementById('nombre_empresa').value;
        const sector = document.getElementById('sector_empresa').value.toLowerCase();
        const publico = document.getElementById('publico_empresa').value;
        const valores = document.getElementById('valores_empresa').value;
        const productos = document.getElementById('productos_empresa').value;
        if (!nombre || !sector || !publico || !valores || !productos) {
            alert('Por favor, completa todos los campos para generar la misión.');
            document.getElementById('ia-loading').style.display = 'none';
            return;
        }

        // Definir inicio según sector
        let inicioMision = '';
        if (sector.includes('tecnolog')) {
            inicioMision = `La misión de ${nombre} es`;
        } else if (sector.includes('servicio')) {
            inicioMision = `La misión de nuestra organización es`;
        } else if (sector.includes('educa')) {
            inicioMision = `La misión de ${nombre} es`;
        } else if (sector.includes('salud')) {
            inicioMision = `La misión de ${nombre} es`;
        } else {
            inicioMision = `La misión de nuestra organización es`;
        }

        const prompt = `Redacta una misión empresarial auténtica, inspiradora y alineada a la planeación estratégica, en un solo párrafo, que comience exactamente con "${inicioMision}". Es para una empresa del sector "${sector}", cuyo público objetivo es "${publico}". La misión debe ser clara, memorable y reflejar el propósito, impacto y visión de futuro de la organización, evitando frases genéricas o demasiado formales. Adapta el estilo según el sector: si es tecnología, resalta liderazgo e innovación; si es alimentación, destaca calidad y bienestar; si es servicios, enfatiza confianza y excelencia; y así sucesivamente. Incluye los valores principales: ${valores}, y los productos o servicios principales: ${productos}. No agregues explicaciones ni contexto, solo la misión.`;

        const response = await fetch('https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=AIzaSyDXoYn43bis7un9n3JGHngX7BhpAzYslOE', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                contents: [{ parts: [{ text: prompt }] }]
            })
        });
        const data = await response.json();
        document.getElementById('ia-loading').style.display = 'none';
        const textoGenerado = data.candidates?.[0]?.content?.parts?.[0]?.text;
        if (textoGenerado) {
            document.getElementById('mision_textarea').value = textoGenerado;
            cerrarModalIA();
        } else {
            alert('No se pudo generar la misión. Verifica la clave o el uso de la API.');
            console.error(data);
        }
    }
    </script>
</div>