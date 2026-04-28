---
version: alpha
name: Claude
description: Una interfaz editorial de lienzo cálido para el producto Claude de Anthropic. El sistema se apoya en un lienzo crema teñido con titulares serif, CTAs en coral cálido y superficies de producto azul marino oscuro (maquetas de editor de código, tarjetas de modelos). La energía de la marca proviene de la combinación crema/coral — deliberadamente cálida y humanista donde la mayoría de las marcas de IA usan azul frío + gris pizarra. La voz tipográfica utiliza una slab-serif ("Copernicus" / Tiempos Headline) para h1/h2 y una sans humanista para el cuerpo. La marca distintiva de Anthropic (punta radial negra) ancla el logotipo.

colors:
  primary: "#cc785c"
  primary-active: "#a9583e"
  primary-disabled: "#e6dfd8"
  ink: "#141413"
  body: "#3d3d3a"
  body-strong: "#252523"
  muted: "#6c6a64"
  muted-soft: "#8e8b82"
  hairline: "#e6dfd8"
  hairline-soft: "#ebe6df"
  canvas: "#faf9f5"
  surface-soft: "#f5f0e8"
  surface-card: "#efe9de"
  surface-cream-strong: "#e8e0d2"
  surface-dark: "#181715"
  surface-dark-elevated: "#252320"
  surface-dark-soft: "#1f1e1b"
  on-primary: "#ffffff"
  on-dark: "#faf9f5"
  on-dark-soft: "#a09d96"
  accent-teal: "#5db8a6"
  accent-amber: "#e8a55a"
  success: "#5db872"
  warning: "#d4a017"
  error: "#c64545"

typography:
  display-xl:
    fontFamily: "Copernicus, Tiempos Headline, serif"
    fontSize: 64px
    fontWeight: 400
    lineHeight: 1.05
    letterSpacing: -1.5px
  display-lg:
    fontFamily: "Copernicus, Tiempos Headline, serif"
    fontSize: 48px
    fontWeight: 400
    lineHeight: 1.1
    letterSpacing: -1px
  display-md:
    fontFamily: "Copernicus, Tiempos Headline, serif"
    fontSize: 36px
    fontWeight: 400
    lineHeight: 1.15
    letterSpacing: -0.5px
  display-sm:
    fontFamily: "Copernicus, Tiempos Headline, serif"
    fontSize: 28px
    fontWeight: 400
    lineHeight: 1.2
    letterSpacing: -0.3px
  title-lg:
    fontFamily: "StyreneB, Inter, sans-serif"
    fontSize: 22px
    fontWeight: 500
    lineHeight: 1.3
    letterSpacing: 0
  title-md:
    fontFamily: "StyreneB, Inter, sans-serif"
    fontSize: 18px
    fontWeight: 500
    lineHeight: 1.4
    letterSpacing: 0
  title-sm:
    fontFamily: "StyreneB, Inter, sans-serif"
    fontSize: 16px
    fontWeight: 500
    lineHeight: 1.4
    letterSpacing: 0
  body-md:
    fontFamily: "StyreneB, Inter, sans-serif"
    fontSize: 16px
    fontWeight: 400
    lineHeight: 1.55
    letterSpacing: 0
  body-sm:
    fontFamily: "StyreneB, Inter, sans-serif"
    fontSize: 14px
    fontWeight: 400
    lineHeight: 1.55
    letterSpacing: 0
  caption:
    fontFamily: "StyreneB, Inter, sans-serif"
    fontSize: 13px
    fontWeight: 500
    lineHeight: 1.4
    letterSpacing: 0
  caption-uppercase:
    fontFamily: "StyreneB, Inter, sans-serif"
    fontSize: 12px
    fontWeight: 500
    lineHeight: 1.4
    letterSpacing: 1.5px
  code:
    fontFamily: "JetBrains Mono, ui-monospace, monospace"
    fontSize: 14px
    fontWeight: 400
    lineHeight: 1.6
    letterSpacing: 0
  button:
    fontFamily: "StyreneB, Inter, sans-serif"
    fontSize: 14px
    fontWeight: 500
    lineHeight: 1
    letterSpacing: 0
  nav-link:
    fontFamily: "StyreneB, Inter, sans-serif"
    fontSize: 14px
    fontWeight: 500
    lineHeight: 1.4
    letterSpacing: 0

rounded:
  xs: 4px
  sm: 6px
  md: 8px
  lg: 12px
  xl: 16px
  pill: 9999px
  full: 9999px

spacing:
  xxs: 4px
  xs: 8px
  sm: 12px
  md: 16px
  lg: 24px
  xl: 32px
  xxl: 48px
  section: 96px

components:
  button-primary:
    backgroundColor: "{colors.primary}"
    textColor: "{colors.on-primary}"
    typography: "{typography.button}"
    rounded: "{rounded.md}"
    padding: 12px 20px
    height: 40px
  button-primary-active:
    backgroundColor: "{colors.primary-active}"
    textColor: "{colors.on-primary}"
    rounded: "{rounded.md}"
  button-primary-disabled:
    backgroundColor: "{colors.primary-disabled}"
    textColor: "{colors.muted}"
    rounded: "{rounded.md}"
  button-secondary:
    backgroundColor: "{colors.canvas}"
    textColor: "{colors.ink}"
    typography: "{typography.button}"
    rounded: "{rounded.md}"
    padding: 12px 20px
    height: 40px
  button-secondary-on-dark:
    backgroundColor: "{colors.surface-dark-elevated}"
    textColor: "{colors.on-dark}"
    typography: "{typography.button}"
    rounded: "{rounded.md}"
    padding: 12px 20px
  button-text-link:
    backgroundColor: transparent
    textColor: "{colors.ink}"
    typography: "{typography.button}"
  button-icon-circular:
    backgroundColor: "{colors.canvas}"
    textColor: "{colors.ink}"
    rounded: "{rounded.full}"
    size: 36px
  text-link:
    backgroundColor: transparent
    textColor: "{colors.primary}"
    typography: "{typography.body-md}"
  top-nav:
    backgroundColor: "{colors.canvas}"
    textColor: "{colors.ink}"
    typography: "{typography.nav-link}"
    height: 64px
  hero-band:
    backgroundColor: "{colors.canvas}"
    textColor: "{colors.ink}"
    typography: "{typography.display-xl}"
    padding: 96px
  hero-illustration-card:
    backgroundColor: "{colors.canvas}"
    textColor: "{colors.ink}"
    rounded: "{rounded.xl}"
  feature-card:
    backgroundColor: "{colors.surface-card}"
    textColor: "{colors.ink}"
    typography: "{typography.title-md}"
    rounded: "{rounded.lg}"
    padding: 32px
  product-mockup-card-dark:
    backgroundColor: "{colors.surface-dark}"
    textColor: "{colors.on-dark}"
    typography: "{typography.title-md}"
    rounded: "{rounded.lg}"
    padding: 32px
  code-window-card:
    backgroundColor: "{colors.surface-dark}"
    textColor: "{colors.on-dark}"
    typography: "{typography.code}"
    rounded: "{rounded.lg}"
    padding: 24px
  model-comparison-card:
    backgroundColor: "{colors.canvas}"
    textColor: "{colors.ink}"
    typography: "{typography.title-md}"
    rounded: "{rounded.lg}"
    padding: 32px
  pricing-tier-card:
    backgroundColor: "{colors.canvas}"
    textColor: "{colors.ink}"
    typography: "{typography.title-lg}"
    rounded: "{rounded.lg}"
    padding: 32px
  pricing-tier-card-featured:
    backgroundColor: "{colors.surface-dark}"
    textColor: "{colors.on-dark}"
    typography: "{typography.title-lg}"
    rounded: "{rounded.lg}"
    padding: 32px
  callout-card-coral:
    backgroundColor: "{colors.primary}"
    textColor: "{colors.on-primary}"
    typography: "{typography.title-md}"
    rounded: "{rounded.lg}"
    padding: 32px
  connector-tile:
    backgroundColor: "{colors.canvas}"
    textColor: "{colors.ink}"
    typography: "{typography.title-sm}"
    rounded: "{rounded.lg}"
    padding: 20px
  text-input:
    backgroundColor: "{colors.canvas}"
    textColor: "{colors.ink}"
    typography: "{typography.body-md}"
    rounded: "{rounded.md}"
    padding: 10px 14px
    height: 40px
  text-input-focused:
    backgroundColor: "{colors.canvas}"
    textColor: "{colors.ink}"
    rounded: "{rounded.md}"
  cookie-consent-card:
    backgroundColor: "{colors.surface-dark}"
    textColor: "{colors.on-dark}"
    typography: "{typography.body-sm}"
    rounded: "{rounded.lg}"
    padding: 24px
  category-tab:
    backgroundColor: transparent
    textColor: "{colors.muted}"
    typography: "{typography.nav-link}"
    padding: 8px 14px
    rounded: "{rounded.md}"
  category-tab-active:
    backgroundColor: "{colors.surface-card}"
    textColor: "{colors.ink}"
    typography: "{typography.nav-link}"
    rounded: "{rounded.md}"
  badge-pill:
    backgroundColor: "{colors.surface-card}"
    textColor: "{colors.ink}"
    typography: "{typography.caption}"
    rounded: "{rounded.pill}"
    padding: 4px 12px
  badge-coral:
    backgroundColor: "{colors.primary}"
    textColor: "{colors.on-primary}"
    typography: "{typography.caption-uppercase}"
    rounded: "{rounded.pill}"
    padding: 4px 12px
  cta-band-coral:
    backgroundColor: "{colors.primary}"
    textColor: "{colors.on-primary}"
    typography: "{typography.display-sm}"
    rounded: "{rounded.lg}"
    padding: 64px
  cta-band-dark:
    backgroundColor: "{colors.surface-dark}"
    textColor: "{colors.on-dark}"
    typography: "{typography.display-sm}"
    rounded: "{rounded.lg}"
    padding: 64px
  footer:
    backgroundColor: "{colors.surface-dark}"
    textColor: "{colors.on-dark-soft}"
    typography: "{typography.body-sm}"
    padding: 64px
---

## Resumen

Claude.com es la interfaz más cálida y editorial en la categoría de productos de IA. La atmósfera base es un **lienzo crema teñido** (`{colors.canvas}` — #faf9f5) — claramente cálido, deliberadamente distinto al blanco grisáceo frío que usan otras marcas de IA. Los titulares usan una **tipografía slab-serif** ("Copernicus" / Tiempos Headline) con peso 400 y espaciado de letras negativo, combinada con la fuente sans **StyreneB / Inter** para el cuerpo. La combinación se siente como una publicación literaria, no como una página de marketing de SaaS.

El voltaje de la marca proviene de la **combinación crema + coral** — el coral (`{colors.primary}` — #cc785c) es el acento distintivo de Anthropic, utilizado en todos los CTAs principales, en el logotipo de la marca y en las tarjetas de llamada (callout) de ancho completo. El coral es cálido, ligeramente apagado, nunca cian/azul — un contrapunto deliberado frente al gris pizarra de OpenAI, el azul saturado de Google y el cian corporativo de Microsoft.

El sistema tiene tres modos de superficie que se alternan página por página:
1. **Lienzo crema** (`{colors.canvas}`) — fondo base predeterminado.
2. **Tarjetas crema claro** (`{colors.surface-card}`) — fondos de tarjetas de características.
3. **Superficies de producto azul marino oscuro** (`{colors.surface-dark}`) — maquetas del editor de código, tarjetas de presentación de modelos, CTAs previos al pie de página y el pie de página mismo.

Las superficies oscuras son donde Claude muestra su "product chrome" — bloques de código, salida de terminal, tablas de comparación de modelos, diagramas de flujo agéntico. El contraste de crema a oscuro es el ritmo de la página.

**Características Clave:**
- Lienzo crema cálido (`{colors.canvas}` — #faf9f5) con texto en tinta cálida oscura (`{colors.ink}` — #141413). La elección de color que define la marca.
- CTA principal en coral (`{colors.primary}` — #cc785c). Usado con moderación en botones individuales, generosamente en tarjetas coral de ancho completo.
- Titulares slab-serif a través de Copernicus / Tiempos Headline con peso 400 y espaciado negativo. Se combina con un cuerpo sans humanista para una voz editorial literaria.
- Tarjetas oscuras de maquetas de producto (`{colors.surface-dark}` — #181715) que contienen bloques de código, paneles de terminal, datos de comparación de modelos — la marca muestra el producto a escala en lugar de ilustraciones de marketing abstractas.
- Tarjetas de características en crema claro (`{colors.surface-card}` — #efe9de) — ligeramente más oscuras que el lienzo, usadas para explicaciones de funciones basadas en contenido.
- Marca de Anthropic (radial-spike) — un pequeño glifo negro tipo asterisco (de 4 puntas) — aparece como prefijo del logotipo y como marcador de contenido.
- El radio de borde es jerárquico: `{rounded.md}` (8px) para botones + entradas, `{rounded.lg}` (12px) para tarjetas de contenido + producto, `{rounded.xl}` (16px) para el contenedor de la ilustración principal, `{rounded.pill}` para distintivos (badges).
- Ritmo de sección `{spacing.section}` (96px) — estándar moderno de SaaS. El relleno (padding) interno de las tarjetas se mantiene generoso en `{spacing.xl}` (32px).

## Colores

### Marca y Acento
- **Coral / Principal** (`{colors.primary}` — #cc785c): El coral cálido característico de Anthropic. Se utiliza en todos los fondos de CTA principales, en tarjetas de llamada coral de ancho completo y en el acento del logotipo de la marca. El color de Anthropic más reconocido fuera del logotipo de la "punta radial".
- **Coral Activo** (`{colors.primary-active}` — #a9583e): La variante más oscura para estados de presión o "hover".
- **Coral Deshabilitado** (`{colors.primary-disabled}` — #e6dfd8): Un estado deshabilitado desaturado con tinte crema.
- **Cian de Acento (Teal)** (`{colors.accent-teal}` — #5db8a6): Se usa con moderación en superficies de productos secundarios (indicadores de estado de terminal, puntos de "conexión activa" en la página de conectores).
- **Ámbar de Acento** (`{colors.accent-amber}` — #e8a55a): Un pequeño tono cálido complementario utilizado en distintivos de categoría y resaltados en línea.

### Superficie
- **Lienzo (Canvas)** (`{colors.canvas}` — #faf9f5): El fondo base por defecto de la página. Crema teñido — cálido, deliberadamente no es blanco puro.
- **Superficie Suave** (`{colors.surface-soft}` — #f5f0e8): Divisores de sección, fondos de bandas muy suaves.
- **Superficie de Tarjeta** (`{colors.surface-card}` — #efe9de): Tarjetas de características, tarjetas de contenido. Un paso más oscuro que el lienzo.
- **Superficie Crema Fuerte** (`{colors.surface-cream-strong}` — #e8e0d2): Una variante de crema más fuerte utilizada en pestañas de categorías seleccionadas y bandas de sección enfatizadas.
- **Superficie Oscura** (`{colors.surface-dark}` — #181715): Maquetas de editor de código, tarjetas de muestra de modelos, pie de página. La superficie oscura dominante.
- **Superficie Oscura Elevada** (`{colors.surface-dark-elevated}` — #252320): Tarjetas elevadas dentro de bandas oscuras (paneles de configuración en maquetas).
- **Superficie Oscura Suave** (`{colors.surface-dark-soft}` — #1f1e1b): Oscuro ligeramente más claro, usado para fondos de bloques de código dentro de tarjetas oscuras más grandes.
- **Línea de Pelo (Hairline)** (`{colors.hairline}` — #e6dfd8): El tono del borde de 1px en superficies crema. Mismo hex que `{colors.primary-disabled}` — los bordes se sienten como un paso de elevación en lugar de líneas de tinta.
- **Línea de Pelo Suave** (`{colors.hairline-soft}` — #ebe6df): Divisor apenas visible utilizado dentro de la misma banda.

### Texto
- **Tinta (Ink)** (`{colors.ink}` — #141413): Todos los titulares y el texto principal. Oscuro cálido, ligeramente diferente del negro puro.
- **Cuerpo Fuerte** (`{colors.body-strong}` — #252523): Párrafos enfatizados, texto principal.
- **Cuerpo** (`{colors.body}` — #3d3d3a): Color de texto corrido por defecto.
- **Atenuado (Muted)** (`{colors.muted}` — #6c6a64): Subtítulos, migas de pan (breadcrumbs), texto secundario adyacente al pie de página.
- **Atenuado Suave** (`{colors.muted-soft}` — #8e8b82): Leyendas, letra pequeña, líneas de derechos de autor.
- **Sobre Principal** (`{colors.on-primary}` — #ffffff): Texto en botones coral.
- **Sobre Oscuro** (`{colors.on-dark}` — #faf9f5): Blanco teñido de crema usado en superficies oscuras (evoca el tono del lienzo).
- **Sobre Oscuro Suave** (`{colors.on-dark-soft}` — #a09d96): Texto del cuerpo del pie de página, etiquetas secundarias en maquetas oscuras.

### Semántico
- **Éxito** (`{colors.success}` — #5db872): Puntos de estado verdes, indicadores de "disponible".
- **Advertencia** (`{colors.warning}` — #d4a017): Llamadas de advertencia (raras en superficies de marketing).
- **Error** (`{colors.error}` — #c64545): Errores de validación.

## Tipografía

### Familia de Fuentes
El sistema utiliza **Copernicus** (o **Tiempos Headline** como sustituto) como la fuente slab-serif para titulares, y **StyreneB** (o **Inter** como sustituto) como la sans humanista para el cuerpo, la navegación y las etiquetas de la interfaz de usuario. **JetBrains Mono** se encarga de los bloques de código. La pila de respaldo (fallback) sigue el orden `Tiempos Headline, Garamond, "Times New Roman", serif` para titulares e `Inter, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif` para el cuerpo.

La división entre titulares y cuerpo es editorial:
- Copernicus serif (peso 400, tracking negativo) → h1, h2, h3, pantalla de inicio.
- StyreneB sans (peso 400-500) → cuerpo, navegación, botones, leyendas, etiquetas.
- JetBrains Mono → todos los bloques de código y texto de terminal.

### Jerarquía

| Token | Tamaño | Peso | Interlineado | Espaciado de Letra | Uso |
|---|---|---|---|---|---|
| `{typography.display-xl}` | 64px | 400 | 1.05 | -1.5px | h1 de la página de inicio ("Meet your thinking partner") — Copernicus serif |
| `{typography.display-lg}` | 48px | 400 | 1.1 | -1px | Cabeceras de sección — Copernicus |
| `{typography.display-md}` | 36px | 400 | 1.15 | -0.5px | Cabeceras de subsección, nombres de modelos — Copernicus |
| `{typography.display-sm}` | 28px | 400 | 1.2 | -0.3px | Nombres de niveles de precios, titulares de llamadas — Copernicus |
| `{typography.title-lg}` | 22px | 500 | 1.3 | 0 | Etiquetas de tamaño del plan de precios — StyreneB |
| `{typography.title-md}` | 18px | 500 | 1.4 | 0 | Títulos de tarjetas de características, párrafos de introducción |
| `{typography.title-sm}` | 16px | 500 | 1.4 | 0 | Títulos de mosaicos de conectores, etiquetas de lista |
| `{typography.body-md}` | 16px | 400 | 1.55 | 0 | Texto corrido predeterminado — StyreneB |
| `{typography.body-sm}` | 14px | 400 | 1.55 | 0 | Cuerpo del pie de página, letra pequeña |
| `{typography.caption}` | 13px | 500 | 1.4 | 0 | Etiquetas de distintivos, leyendas |
| `{typography.caption-uppercase}` | 12px | 500 | 1.4 | 1.5px | Etiquetas de categoría, distintivos "NUEVO" |
| `{typography.code}` | 14px | 400 | 1.6 | 0 | Bloques de código — JetBrains Mono |
| `{typography.button}` | 14px | 500 | 1.0 | 0 | Etiquetas de botones estándar |
| `{typography.nav-link}` | 14px | 500 | 1.4 | 0 | Elementos del menú de navegación superior |

### Principios
Los tamaños de titulares usan peso 400 (regular), nunca negrita. El espaciado de letras negativo (-0.3 a -1.5px) es esencial — Copernicus sin él no se siente como parte de la marca. El carácter serif es lo que le da a Anthropic su voz literaria y reflexiva; cambiar a un titular sans-serif haría que Claude se sintiera como cualquier otra herramienta de IA.

El tipo de cuerpo se mantiene en peso 400 para párrafos, peso 500 para etiquetas y frases enfatizadas. El cuerpo sans es humanista (StyreneB), nunca geométrico. Inter es un sustituto aceptable debido a sus proporciones humanistas similares; Helvetica o Arial serían demasiado neutrales y romperían la sensación editorial cálida.

### Nota sobre Sustitutos de Fuentes
Si Copernicus / Tiempos Headline no están disponibles, **Cormorant Garamond** con peso 500 y espaciado de letras de -0.02em es la aproximación de código abierto más cercana. **EB Garamond** es una opción de respaldo. Para StyreneB, **Inter** es la coincidencia más cercana; ambas son sans humanistas diseñadas para lectura en pantalla. **Söhne** es otra alternativa cercana si se dispone de licencia.

## Diseño (Layout)

### Sistema de Espaciado
- **Unidad base:** 4px.
- **Tokens:** `{spacing.xxs}` 4px · `{spacing.xs}` 8px · `{spacing.sm}` 12px · `{spacing.md}` 16px · `{spacing.lg}` 24px · `{spacing.xl}` 32px · `{spacing.xxl}` 48px · `{spacing.section}` 96px.
- **Relleno (padding) de sección:** `{spacing.section}` (96px) — ritmo moderno de SaaS.
- **Relleno interno de tarjeta:** `{spacing.xl}` (32px) para tarjetas de características, tarjetas de nivel de precios, tarjetas de comparación de modelos; `{spacing.lg}` (24px) para tarjetas de ventana de código y mosaicos de conectores.
- **Bandas de llamada / CTA:** `{spacing.xxl}` (48px) dentro de las tarjetas de llamada coral; 64px dentro de la banda CTA oscura más grande.

### Cuadrícula y Contenedor
- **Ancho máximo de contenido:** ~1200px centrado.
- **Cuerpo editorial:** Cuadrícula única de 12 columnas; el "hero" a menudo utiliza una división 6/6 (h1 a la izquierda, ilustración a la derecha).
- **Cuadrículas de tarjetas de características:** 3 columnas en escritorio, 2 en tableta, 1 en móvil.
- **Cuadrículas de mosaicos de conectores:** 4 o 6 columnas en escritorio, 2 en tableta, 1 en móvil.
- **Cuadrícula de precios:** 3 columnas en escritorio (Free / Pro / Team / Enterprise), 1 en móvil.

### Filosofía del Espacio en Blanco
El lienzo crema + titulares serif + relleno interno generoso crean un ritmo editorial — Claude se lee como una columna de revista de gran formato en lugar de una plantilla de marketing. El espacio en blanco entre las bandas se mantiene uniforme en 96px; el espacio dentro de las tarjetas es generoso (32px), permitiendo que la tipografía respire.

## Elevación y Profundidad

| Nivel | Tratamiento | Uso |
|---|---|---|
| Plano | Sin sombra, sin borde | Secciones del cuerpo, navegación superior, bandas hero |
| Línea de pelo suave | Borde de 1px `{colors.hairline}` | Entradas, subnavegación, ocasionalmente en tarjetas |
| Tarjeta crema | Fondo `{colors.surface-card}` — sin sombra | Tarjetas de características, tarjetas de contenido |
| Tarjeta de superficie oscura | Fondo `{colors.surface-dark}` — sin sombra | Maquetas de editor de código, tarjetas de muestra de modelos |
| Sombra paralela sutil | Sombra tenue con alfa bajo | Estados elevados al pasar el ratón (el sistema usa `0 1px 3px rgba(20,20,19,0.08)` raramente) |

La filosofía de elevación es **primero el bloque de color, la sombra es rara**. La mayor parte de la profundidad proviene del contraste entre las superficies crema y oscura. Las sombras son mínimas. Las maquetas de superficie oscura tienen su propio "chrome" de producto interno (barras de desplazamiento del editor de código, números de línea, resaltado de sintaxis) lo que añade detalle sin necesidad de sombras externas.

### Profundidad Decorativa
- El glifo de la "punta radial" de Anthropic (asterisco radial de 4 puntas) aparece como una pequeña marca negra en el logotipo de la marca y en línea como marcador de contenido.
- Las maquetas del editor de código llevan su propia profundidad interna: texto con resaltado de sintaxis en azules / naranjas / grises apagados, números de línea en `{colors.muted-soft}`, barras de estado en la parte inferior en `{colors.surface-dark-elevated}`.
- Algunas ilustraciones principales utilizan arte lineal simple con trazos de coral y azul marino oscuro sobre crema — minimalista, con sensación de dibujo a mano, nunca fotorrealista.

## Formas

### Escala de Radio de Borde

| Token | Valor | Uso |
|---|---|---|
| `{rounded.xs}` | 4px | Reservado para acentos de distintivos y menús desplegables diminutos |
| `{rounded.sm}` | 6px | Botones pequeños en línea, elementos de menú desplegable |
| `{rounded.md}` | 8px | Botones CTA estándar, entradas de texto, pestañas de categoría |
| `{rounded.lg}` | 12px | Tarjetas de contenido (características, precios, ventana de código, comparación de modelos) |
| `{rounded.xl}` | 16px | Contenedor de ilustración hero, componentes de marquesina más grandes |
| `{rounded.pill}` | 9999px | Distintivos tipo píldora, etiquetas "NUEVO" |
| `{rounded.full}` | 9999px / 50% | Sustitutos de avatar, botones de icono |

### Fotografía e Ilustraciones
El "hero" de Claude rara vez utiliza fotografía. En su lugar utiliza:
- Ilustraciones de arte lineal simple con trazos de coral + azul marino oscuro sobre el lienzo crema.
- Maquetas de editor de código (el tratamiento dominante de "hero" en páginas enfocadas a ## Componentes

### Navegación Superior

**`top-nav`** — Barra de navegación crema fijada en la parte superior de cada página. 64px de altura, fondo `{colors.canvas}`. Lleva la punta radial de Anthropic + el logotipo "Claude" a la izquierda, menú horizontal principal (Product, Solutions, Use Cases, Pricing, Research, Company) en el centro-izquierda, y un grupo a la derecha con el enlace de texto "Sign in" y "Try Claude" `{component.button-primary}` (coral). Elementos del menú en `{typography.nav-link}` (StyreneB 14px / 500).

### Botones

**`button-primary`** — El CTA coral característico. Fondo `{colors.primary}` (#cc785c), texto `{colors.on-primary}` (blanco), tipografía `{typography.button}` (StyreneB 14px / 500), relleno 12px × 20px, altura 40px, redondeado `{rounded.md}` (8px). El estado activo `button-primary-active` se oscurece a `{colors.primary-active}` (#a9583e).

**`button-secondary`** — Botón crema con contorno de línea de pelo. Fondo `{colors.canvas}`, texto `{colors.ink}`, borde de 1px de línea de pelo, mismo relleno + altura + radio que el primario.

**`button-secondary-on-dark`** — Usado sobre tarjetas `{colors.surface-dark}`. Fondo `{colors.surface-dark-elevated}` (#252320), texto `{colors.on-dark}`. Se mantiene oscuro — el sistema nunca invierte a un secundario claro en superficies oscuras.

**`button-text-link`** — Botón de texto en línea, sin fondo. Usado para "Sign in" en la navegación superior y enlaces CTA en línea.

**`button-icon-circular`** — Botón de icono circular de 36px. Fondo `{colors.canvas}`, borde de línea de pelo, icono de color tinta. Usado para flechas de carrusel, compartir, "ver más".

**`text-link`** — Enlaces de texto en línea en el cuerpo en `{colors.primary}` (el coral). Subrayado al presionar; el enlace en línea coral es uno de los detalles pequeños más distintivos del sistema.

### Tarjetas y Contenedores

**`hero-band`** — Hero de lienzo crema con una cuadrícula 6-6: h1 + subtitular + fila de botones a la izquierda, tarjeta de ilustración hero o tarjeta de maqueta de producto a la derecha. Relleno vertical `{spacing.section}` (96px).

**`hero-illustration-card`** — Una tarjeta más grande que contiene el artefacto del lado derecho del hero — a veces una ilustración lineal de trazo coral sobre fondo crema, a veces una maqueta oscura de editor de código. Fondo `{colors.canvas}` o `{colors.surface-dark}` según el contexto, redondeado `{rounded.xl}` (16px).

**`feature-card`** — Utilizada en cuadrículas de características de 3 columnas. Fondo `{colors.surface-card}` (#efe9de — crema ligeramente más oscuro), redondeado `{rounded.lg}` (12px), relleno interno `{spacing.xl}` (32px). Lleva un icono pequeño en la parte superior, un titular `{typography.title-md}` y una descripción de cuerpo en `{typography.body-md}`.

**`product-mockup-card-dark`** — Tarjeta azul marino oscuro que muestra el "chrome" real del producto Claude (interfaz de chat, editor de código, controles de agente). Fondo `{colors.surface-dark}`, redondeado `{rounded.lg}`, relleno interno `{spacing.xl}` (32px). Lleva etiquetas de texto en `{colors.on-dark}` y fragmentos de la interfaz de usuario del producto debajo.

**`code-window-card`** — Una tarjeta oscura especializada que muestra un editor de código con números de línea, código con resaltado de sintaxis en `{typography.code}` (JetBrains Mono) y, a veces, un botón "Run" o un panel de salida de terminal debajo. Fondo `{colors.surface-dark}` con `{colors.surface-dark-soft}` para el bloque de código interno, redondeado `{rounded.lg}`, relleno `{spacing.lg}` (24px). El elemento visual distintivo de las páginas de productos de Claude Code.

**`model-comparison-card`** — Utilizada en la sección de la página de inicio "¿A qué problema te enfrentas?" comparando Opus / Sonnet / Haiku. Fondo `{colors.canvas}` con borde de línea de pelo, redondeado `{rounded.lg}`, relleno interno `{spacing.xl}` (32px). Lleva el nombre del modelo, una breve descripción de capacidades y un `{component.text-link}` para saber más.

**`pricing-tier-card`** — Tarjeta de nivel estándar. Fondo `{colors.canvas}` con borde de línea de pelo, redondeado `{rounded.lg}`, relleno `{spacing.xl}` (32px). Lleva el nombre del plan en `{typography.title-lg}` (StyreneB), el precio en `{typography.display-sm}` (¡Copernicus serif!), una lista de características en `{typography.body-md}` y un `{component.button-primary}` en la parte inferior.

**`pricing-tier-card-featured`** — El nivel destacado (típicamente "Pro" o "Team"). El fondo cambia a `{colors.surface-dark}`, el texto se invierte a `{colors.on-dark}`. La superficie oscura ES la señal del nivel destacado.

**`callout-card-coral`** — Una tarjeta coral de ancho completo que lleva una llamada a la acción importante. Fondo `{colors.primary}` (#cc785c), texto `{colors.on-primary}` (blanco), redondeado `{rounded.lg}`, relleno `{spacing.xxl}` (48px). La superficie coral ES el voltaje; el CTA en el interior utiliza un estilo de botón invertido (botón crema/lienzo sobre coral).

**`connector-tile`** — Utilizada en la cuadrícula de integración de la página de conectores. Fondo `{colors.canvas}` con borde de línea de pelo, redondeado `{rounded.lg}`, relleno 20px. Cada mosaico lleva un logotipo en la parte superior, un nombre de conector `{typography.title-sm}` y una breve descripción.

### Entradas y Formularios

**`text-input`** — Entrada de texto estándar. Fondo `{colors.canvas}`, texto `{colors.ink}`, tipo `{typography.body-md}`, redondeado `{rounded.md}` (8px), relleno 10px × 14px, altura 40px. Borde de 1px de línea de pelo en `{colors.hairline}`.

**`text-input-focused`** — Estado de enfoque. El borde se engrosa o cambia a `{colors.primary}` (coral) para dar énfasis. Lleva un anillo exterior de coral al 15% de alfa de 3px.

**`cookie-consent-card`** — Banner oscuro de cookies flotante en la parte inferior derecha. Fondo `{colors.surface-dark}`, texto `{colors.on-dark}`, redondeado `{rounded.lg}`, relleno `{spacing.lg}` (24px). Uno de los pocos lugares donde la superficie oscura aparece a pequeña escala en páginas crema.

### Etiquetas / Distintivos

**`badge-pill`** — Pequeña etiqueta de píldora utilizada para etiquetas de categoría. Fondo `{colors.surface-card}`, texto `{colors.ink}`, tipo `{typography.caption}` (13px / 500), redondeado `{rounded.pill}`, relleno 4px × 12px.

**`badge-coral`** — Distintivo con relleno coral para "NUEVO", "BETA", resaltados destacados. Fondo `{colors.primary}`, texto `{colors.on-primary}`, tipo `{typography.caption-uppercase}` (12px / 500 / 1.5px de tracking), redondeado `{rounded.pill}`, relleno 4px × 12px.

### Pestañas / Filtros

**`category-tab`** + **`category-tab-active`** — Usados en filas de subnavegación en páginas de soluciones / conectores. Inactivo: fondo transparente, texto `{colors.muted}`. Activo: fondo `{colors.surface-card}`, texto `{colors.ink}`. Relleno 8px × 14px, redondeado `{rounded.md}`.

### CTA / Pie de Página

**`cta-band-coral`** — Una tarjeta de CTA "Try Claude" antes del pie de página. Relleno coral de ancho completo, tipo blanco, redondeado `{rounded.lg}`, relleno 64px. Lleva un h2 en `{typography.display-sm}` (¡todavía serif!), una sublínea y un botón CTA crema.

**`cta-band-dark`** — Banda alternativa antes del pie de página en páginas enfocadas a desarrolladores. Fondo `{colors.surface-dark}`, texto `{colors.on-dark}`, redondeado `{rounded.lg}`, relleno 64px. A menudo se combina con una tarjeta de ventana de código.

**`footer`** — Pie de página azul marino oscuro que cierra cada página. Fondo `{colors.surface-dark}` (#181715), texto `{colors.on-dark-soft}`. Lista de enlaces de 4 columnas en escritorio que cubre Producto / Empresa / Recursos / Legal. Relleno vertical 64px. La punta radial de Anthropic + el logotipo "Anthropic" se sitúan en la parte superior en `{colors.on-dark}`. El pie de página nunca se invierte.

## Qué hacer y qué no hacer

### Qué hacer
- Ancla cada página en el lienzo crema. El blanco puro se lee como "cualquier otra herramienta de IA"; el tinte cálido es el diferenciador de la marca.
- Usa Copernicus serif para cada titular. Combínalo con el cuerpo sans StyreneB. El espaciado de letras negativo en los tamaños de titulares no es negociable.
- Reserva `{colors.primary}` (coral) para los CTA principales y los momentos de tarjetas de llamada coral de ancho completo `{component.callout-card-coral}`. No pintes momentos de acento coral en otros lugares.
- Usa `{component.product-mockup-card-dark}` y `{component.code-window-card}` para mostrar el "chrome" real del producto Claude. No pintes ilustraciones de marketing de código cuando puedas mostrar código real.
- Combina `{component.feature-card}` (crema) con `{component.product-mockup-card-dark}` (marino) en bandas alternas. El ritmo de crema a oscuro es el mecanismo de cadencia de la marca.
- Usa el glifo de la punta radial de Anthropic como prefijo del logotipo de la marca. Nunca inviertas la marca a blanco sobre oscuro dentro del propio logotipo.
- Aplica `{spacing.section}` (96px) entre las bandas principales.

### Qué no hacer
- No uses grises fríos o blanco puro para el lienzo. El crema es la marca.
- No pongas en negrita el peso de los titulares serif. Copernicus a 700 se lee como rimbombante; el sistema se mantiene en 400.
- No uses azul frío o cian saturado como acento de marca. El coral es el "voltaje" de la marca.
- No pongas coral en todas partes. El coral es escaso en los elementos individuales y generoso solo en las tarjetas de llamada coral de ancho completo.
- No uses Inter para los titulares. El carácter serif es la voz de la marca.
- No repitas el mismo modo de superficie en dos bandas consecutivas. La cadencia alterna: crema → tarjeta-crema → maqueta-oscura → crema → llamada-coral → pie-de-página-oscuro.
- No añadas estilos de estado de "hover" más allá de lo que el sistema ya codifica — el primario se oscurece al presionar; nada más cambia.

## Comportamiento Responsivo

### Puntos de Interrupción (Breakpoints)

| Nombre | Ancho | Cambios Clave |
|---|---|---|
| Móvil | < 768px | Navegación de hamburguesa; h1 del hero 64→32px; la tarjeta de ilustración del hero se apila debajo del contenido; cuadrículas de características en 1 columna; mosaicos de conectores en 2; precios en 1; pie de página de 4 columnas a 1 |
| Tableta | 768–1024px | La navegación superior se mantiene horizontal pero se ajusta; tarjetas de características en 2 columnas; mosaicos de conectores en 3; precios en 2 |
| Escritorio | 1024–1440px | Navegación superior completa con todos los elementos del menú; tarjetas de características en 3 columnas; mosaicos de conectores en 4 o 6; niveles de precios en 3 |
| Ancho | > 1440px | Igual que el escritorio con más espacio exterior; el ancho máximo del contenido se limita a 1200px |

### Objetivos Táctiles
- `{component.button-primary}` a un mínimo de 40 × 40px.
- `{component.button-icon-circular}` a exactamente 36 × 36 — ligeramente por debajo de WCAG 44 pero visualmente centrado.
- La altura de `{component.text-input}` es de 40px.
- El área total de la tarjeta del mosaico del conector es táctil; el área táctil efectiva es >> 44px.

### Estrategia de Colapso
- La navegación superior colapsa a hamburguesa en < 768px; el menú se abre como una hoja crema a pantalla completa.
- La cuadrícula 6-6 de la banda hero colapsa a una sola columna en móvil — h1 + subtitular + botones primero, luego la tarjeta de ilustración / maqueta debajo.
- Las cuadrículas de características reducen las columnas en lugar de escalar las tarjetas.
- Las tarjetas de nivel de precios colapsan 4 → 2 → 1; la superficie oscura del nivel destacado se mantiene visualmente distinta en cada punto de interrupción.
- Las tarjetas de ventana de código mantienen la legibilidad del código en cada punto de interrupción al permitir el desplazamiento horizontal dentro de la tarjeta en lugar de ajustar las líneas de código.

### Comportamiento de Imagen
- Los bloques de código dentro de las maquetas oscuras mantienen el tamaño de fuente fijo; desplazamiento horizontal en móvil en lugar de ajuste de línea.
- Las ilustraciones del hero se escalan proporcionalmente; los trazos del arte lineal se adelgazan ligeramente en móvil.
- Las fotos de avatar en los testimonios se recortan a círculos en cada punto de interrupción.

## Guía de Iteración

1. Enfócate en UN componente a la vez. Haz referencia a su clave YAML (`{component.feature-card}`, `{component.code-window-card}`).
2. Las variantes de un componente existente (`-active`, `-disabled`, `-focused`) viven como entradas separadas en `components:`.
3. Usa `{token.refs}` en todas partes — nunca hex en línea.
4. Nunca documentes el estado "hover". Solo los estados Predeterminado y Activo/Presionado.
5. Los titulares se mantienen en Copernicus serif 400 con tracking negativo. El cuerpo se mantiene en StyreneB / Inter 400. La división es inquebrantable.
6. Crema + coral + azul marino oscuro es la trinidad. No introduzcas un cuarto tono de superficie (nada de tarjetas púrpuras ni secciones verdes).
7. En caso de duda sobre el énfasis: usa un tamaño de Copernicus serif más grande antes que un peso más negrita.

## Lagunas Conocidas

- Copernicus y StyreneB son tipos de letra con licencia de Anthropic y no están disponibles como fuentes web públicas. Los sustitutos (Tiempos Headline / Cormorant Garamond / EB Garamond para serif; Inter / Söhne para sans) están documentados en la sección de tipografía.
- La punta radial de Anthropic es un glifo de marca renderizado como SVG en línea; no está formalizado como un token del sistema aquí. Trátalo como un activo del logotipo.
- Las animaciones y tiempos de transición (revelación de mensajes de chat, efecto de máquina de escribir del bloque de código en la página de inicio, animaciones de diagramas de flujo agéntico) no están en el alcance.
- Los estados de validación de formularios más allá de `{component.text-input-focused}` no se extraen — los estados de error / éxito necesitarían un flujo de registro o comentarios para confirmarse.
- La superficie real del producto Claude (interfaz de chat claude.ai) comparte algunos tokens con el sitio de marketing pero añade muchos componentes específicos del producto (burbujas de chat, herramientas de mensajes, chips de carga de archivos, barra lateral de historial de conversaciones) que están fuera del alcance de este documento de superficie de marketing.
- Las tarjetas de demostración de "agente" / "uso de computadora" en ciertas páginas muestran a Claude animado controlando un navegador — la captura de pantalla estática no captura completamente el cromo de la animación.
