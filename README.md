# ⚡ ERP-BOLIVIA CORE: High-Performance SIAT Integrated Engine
> **Enterprise Resource Planning Framework | PHP 8.5.5 | Laravel 13 | TALL Stack Architecture**

---

## 🛠️ Arquitectura del Sistema
Este no es solo un software de gestión; es un **motor de alto rendimiento** diseñado bajo patrones de arquitectura de software modernos. **ERP-BOLIVIA CORE** implementa una infraestructura desacoplada y reactiva para el procesamiento de datos fiscales y comerciales.

### 🔌 Integración SIAT Core (Fiscal Engine)
El sistema ha sido desarrollado con un enfoque de **Fiscal-First**, integrando la lógica compleja del SIAT directamente en el núcleo del negocio:
- 🧬 **Lógica de Generación de CUF/CUFD**: Algoritmos optimizados para el timbrado electrónico.
- 📡 **Protocolos de Comunicación**: Preparado para Web Services SOAP/REST de Impuestos Nacionales.
- 💾 **Normalización de Datos SIN**: Base de datos mapeada bajo los estándares de codificación de la oficina virtual.

---

## 🚀 Especificaciones Técnicas (Stack V5)

### 🏎️ Motor de Ejecución
- **Runtime:** PHP 8.5.5 (JIT Compliant)
- **Framework:** Laravel 13 (Optimized Service Container)
- **Engine UI:** Filament 5 Professional (High-Response Dashboard)

### 📡 Comunicación y Reactividad
- **TALL Stack Integration**: Reactividad asíncrona total sin recargas de página (SPA).
- **Livewire 3 Engine**: Manejo de estados en tiempo real para el inventario y ventas.
- **Tailwind JIT**: Compilación de estilos bajo demanda para carga mínima de assets.

### 🗄️ Capa de Persistencia
- **RDBMS:** MariaDB / MySQL 8.4+ (Optimized Indexing)
- **Data Integrity**: Relaciones en cascada y validación a nivel de base de datos para cumplimiento fiscal.

---

## 🧩 Módulos de Ingeniería

- **[MODULE] Inventory Control**: Algoritmos de stock crítico y gestión de SKUs de alta concurrencia.
- **[MODULE] Customer Hub**: Gestión de entidades fiscales (NIT/CI) con normalización de datos.
- **[MODULE] Invoicing Engine**: Generación de documentos digitales bajo el estándar SIAT.
- **[MODULE] Dashboard Analytics**: Capa de visualización de datos con Widgets de métricas de rendimiento.

---

## 🔧 Instalación Técnica

```bash
# Inyectar dependencias de backend
composer install --optimize-autoloader

# Compilar motor de estilos
npm install && npm run build

# Desplegar estructura de datos
php artisan migrate --force

# Iniciar servidor de alta disponibilidad
php artisan serve --port=8001
```

> [!TIP]
> **Nota para Windows**: Asegúrate de tener habilitadas las extensiones `intl`, `bcmath` y `pdo_mysql` en tu archivo `php.ini`. Si usas **XAMPP** o **Laragon**, recuerda iniciar el servicio de MySQL antes de correr las migraciones.

---

## 📖 Guía de Inicio Rápido (Usuario)
Una vez que el motor esté encendido, sigue estos pasos para configurar tu empresa:

1. **Acceso al Cockpit**: Entra a `http://localhost:8001/admin` y logueate con `admin@admin.com` / `password`.
2. **Configura el Catálogo**: Ve a **Categorías** y crea tu primera categoría (ej: *Electrónica*). No olvides poner el código SIN correspondiente.
3. **Carga tus Productos**: En el módulo **Productos**, agrega tus artículos con su SKU y precio. El sistema te avisará automáticamente si el stock baja de 5 unidades.
4. **Registra a tus Clientes**: Entra a **Clientes** y registra a tu primer comprador con su NIT o CI. El sistema está listo para validar el formato boliviano.
5. **Emite tu primera Factura**: Ve a **Facturas**, selecciona al cliente, agrega los productos y ¡listo! Tienes una factura SIAT-Ready generada en segundos.

---

## 📡 Roadmap de Ingeniería
- [x] Despliegue de Arquitectura Base (MySQL Core).
- [x] Implementación de UI Engine (Claude Theme).
- [/] Desarrollo del Fiscal Logic Engine (SIAT Integration).
- [ ] Implementación de Capa de Reportes en PDF/XLSX.

---
**¿Quieres hackear este ERP?** Abre un PR y ayuda a construir el estándar tecnológico de Bolivia. 🇧🇴🛠️
