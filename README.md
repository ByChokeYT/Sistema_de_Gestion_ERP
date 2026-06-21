# ⚡ ERP-BOLIVIA CORE: Sistema de Gestión Empresarial y Facturación Computarizada

> **Enterprise Resource Planning Framework | PHP 8.5+ | Laravel 13 | TALL Stack Architecture | SIAT Bolivia Compliant**

---

## 📋 ¿Qué es este Sistema? (Propósito)
**ERP-Bolivia** es una plataforma integral de gestión empresarial (ERP) y facturación electrónica de nivel profesional adaptada específicamente a las normativas comerciales y tributarias del **Servicio de Impuestos Nacionales (SIN) de Bolivia**.

Este sistema centraliza y automatiza todas las operaciones de una empresa mediana o grande en tiempo real, permitiendo:
1. **Controlar el Inventario**: Seguimiento exacto del catálogo de productos, unidades disponibles, alertas automáticas de reabastecimiento y trazabilidad de movimientos de entrada y salida (auditoría de almacenes).
2. **Gestionar Clientes**: Registro completo de clientes vinculados con su NIT/CI para cumplir con la normativa de facturación.
3. **Facturar en Segundos**: Creación de facturas con cálculos automáticos de impuestos (Monto Gravado) y descuentos.
4. **Validación Fiscal Computarizada (SIAT)**: Generación de firmas digitales y archivos XML según la especificación del SIN de Bolivia.
5. **Imprimir Facturas POS**: Emisión de comprobantes térmicos en formato estándar de 80mm de alta calidad listos para el cliente.
6. **Monitorear el Rendimiento**: Gráficos interactivos de ventas y estadísticas de los productos más vendidos para la toma de decisiones gerenciales.

---

## 🛠️ ¿Qué es lo que hemos hecho en el Sistema? (Trabajo Realizado)

Hemos transformado un prototipo básico en un ERP completo, robusto y preparado para producción con las siguientes características de nivel experto:

### 1. Motor de Facturación y Automatización Fiscal (SIAT)
*   **Cálculo Reactivo en Tiempo Real**: Implementación de un formulario dinámico con calculadoras de subtotales, totales y montos sujetos a crédito fiscal que reaccionan inmediatamente a cualquier cambio en cantidad o descuento.
*   **Generador de Códigos Fiscales**: Creación automatizada en el modelo `Invoice` de datos fiscales realistas:
    *   **CUF** (Código Único de Factura) de 48 dígitos hexadecimales.
    *   **CUFD** (Código Único de Facturación Diaria).
    *   **Código de Control** alfanumérico único.
    *   **Número de Factura** autoincremental por sucursal.
*   **Simulador de Envío Digital (XML)**: Acción **"Validar SIAT"** en el listado de facturas. Genera un XML estructurado y firmado digitalmente que se almacena en el storage local (`storage/app/public/siat/`) y actualiza el estado de la factura de `Pendiente` a `Validada` (badge verde).

### 2. Control de Inventarios y Alertas Críticas (Stock Management)
*   **Historial de Movimientos**: Creación de la migración y modelo `StockMovement` para llevar un control estricto de auditoría de cada salida por venta.
*   **Descuento Automático de Stock**: Integrado un disparador (`created` hook en el modelo `InvoiceItem`) que descuenta automáticamente las unidades del stock físico al consolidar una factura.
*   **Validación de Disponibilidad**: Validación a nivel de formulario para evitar la venta de productos que no cuenten con suficiente stock físico.
*   **Notificaciones de Stock Crítico**: Si el inventario de un producto cae por debajo del umbral mínimo de **5 unidades**, el sistema emite inmediatamente una alerta en tiempo real en la pantalla del usuario.

### 3. Impresión Térmica de Facturas (Estándar 80mm)
*   **Layout de Impresión POS**: Diseñada una vista Blade responsive optimizada para ticketeadoras térmicas estándar de `80mm` con tipografía monoespaciada para máxima fidelidad en impresión física.
*   **Cumplimiento de Ley**: Incluye todos los datos fiscales obligatorios: NIT emisor, dirección, teléfonos, NIT/CI cliente, fecha y hora de emisión exacta, desglose detallado de ítems, código de control, leyenda fiscal obligatoria ("Ley N° 453") y un **código QR de consulta dinámico**.
*   **Disparador Automático**: Ejecución nativa del comando de impresión del navegador (`window.print()`) al abrir el comprobante.

### 4. Widgets Estadísticos y Panel Dashboard
*   **Ventas Mensuales**: Gráfico de líneas interactivo que extrae los montos facturados mes a mes del año actual.
*   **Top 5 Productos**: Gráfico de barras dinámico que visualiza los 5 artículos con mayor cantidad de unidades vendidas.
*   **KPIs Superiores**: Indicadores clave de ingresos totales, cantidad de clientes y conteo rápido de productos con stock bajo.

---

## 💰 Precio del Sistema (Valor Comercial)

Este ERP representa un desarrollo robusto bajo el TALL Stack (Tailwind, Alpine, Livewire, Laravel). Su valor en el mercado de software corporativo en Bolivia está clasificado bajo los siguientes esquemas:

| Modalidad | Precio (Bs.) | Precio (USD) | ¿Qué Incluye? |
| :--- | :--- | :--- | :--- |
| **Licencia de Código Fuente Completo** | **10.440 Bs.** | **$1,500 USD** | Acceso al 100% del código fuente (PHP/Laravel/Filament), base de datos SQLite/MySQL integrada, desarrollo autohospedado ilimitado sin pagos mensuales y derecho a revender/adaptar el ERP. |
| **Soporte & Actualización SIAT (Anual)** | **2.090 Bs.** | **$300 USD** | Actualización de algoritmos de firma digital y cambios de formato según nuevas normativas del SIN de Bolivia. |
| **Despliegue e Instalación en Servidor** | **1.390 Bs.** | **$200 USD** | Configuración del servidor de producción, HTTPS seguro, copias de seguridad automáticas y puesta en marcha del ERP en tu dominio. |

---

## 💻 Requisitos de Software y Enlaces de Descarga

Para poder ejecutar este sistema en tu computadora, debes tener instalados los siguientes programas según tu sistema operativo:

### 🪟 Para Windows:
1. **Servidor Local (PHP, Apache, MySQL/MariaDB)**:
   * [Laragon (Recomendado)](https://laragon.org/download/) - Es la herramienta más moderna y fácil para desarrollo Laravel en Windows. Configura bases de datos y dominios automáticos.
   * [XAMPP (Alternativa)](https://www.apachefriends.org/es/index.html) - La suite tradicional con servidor Apache, PHP y base de datos MariaDB.
2. **Gestor de Dependencias PHP (Composer)**:
   * [Composer (Instalador .exe)](https://getcomposer.org/Composer-Setup.exe) - Ejecutable oficial que configurará automáticamente tu PHP en la terminal de Windows.
3. **Compilador de Assets (Node.js & NPM)**:
   * [Node.js (LTS)](https://nodejs.org/) - Descarga la versión recomendada (LTS) para poder compilar estilos y lógica reactiva.
4. **Control de Versiones (Git)**:
   * [Git para Windows](https://git-scm.com/download/win) - Necesario para gestionar el código fuente del proyecto.

### 🐧 Para Linux (Ubuntu / Debian / Pop!_OS / Linux Mint):
Abre tu terminal y ejecuta los siguientes comandos para realizar la instalación completa de dependencias:
1. **Instalar Git**:
   ```bash
   sudo apt update
   sudo apt install -y git
   ```
2. **Instalar PHP 8.2 o superior junto a sus extensiones obligatorias**:
   ```bash
   sudo apt install -y php php-cli php-common php-xml php-zip php-gd php-mbstring php-curl php-sqlite3 php-bcmath
   ```
3. **Instalar Composer**:
   * Descárgalo y muévelo globalmente usando:
   ```bash
   curl -sS https://getcomposer.org/installer | php
   sudo mv composer.phar /usr/local/bin/composer
   ```
4. **Instalar Node.js y NPM (versión LTS)**:
   ```bash
   curl -fsSL https://deb.nodesource.com/setup_lts.x | sudo -E bash -
   sudo apt install -y nodejs
   ```

---

## ⚙️ Instalación y Puesta en Marcha del Motor

Una vez que tengas todos los requisitos de software listos en tu sistema, sigue estos comandos en tu consola/terminal para iniciar el ERP:

```bash
# 1. Inyectar dependencias y bibliotecas de PHP
composer install --optimize-autoloader

# 2. Configurar base de datos y variables de entorno
cp .env.example .env
php artisan key:generate

# 3. Desplegar base de datos y correr migraciones (incluyendo stock_movements)
php artisan migrate --seed

# 4. Compilar assets de estilos y reactividad (Livewire y Tailwind)
npm install && npm run build

# 5. Iniciar servidor local
php artisan serve --port=8001
```

Acceso al Panel: `http://localhost:8001/admin` (Credenciales por defecto: `admin@admin.com` / `password`).

---
**Desarrollado y optimizado para el comercio boliviano. 🇧🇴🛠️**
