# <img src="public/images/stockflow-icon-bg.svg" alt="StockFlow" width="150">

Gestor de productos con roles de usuario. Proyecto de aprendizaje **Laravel 13 + Vue 3 + Tailwind v4 + SQLite**.

## Características

- Autenticación completa (registro, login, logout)
- 3 roles de usuario con permisos distintos
- CRUD de productos con componentes Vue reactivos
- Búsqueda y filtro en tiempo real sin recargar la página
- Panel de administración de usuarios (solo admin)
- Dashboard personalizado según el rol
- 21 tests automatizados con Pest

## Permisos por rol

| Rol | Ver productos | Crear | Editar | Eliminar | Gestionar usuarios |
|---|---|---|---|---|---|
| **Admin** | ✅ | ✅ | ✅ | ✅ | ✅ |
| **Mid** | ✅ | ✅ | ✅ | ❌ | ❌ |
| **Low** | ✅ | ❌ | ❌ | ❌ | ❌ |

## Tecnologías

| Capa | Tecnología |
|---|---|
| Backend | Laravel 13, PHP 8.4 |
| Frontend | Blade + Vue 3 + Tailwind v4 |
| Base de datos | SQLite |
| Testing | Pest 4 |
| Build | Vite |

## Requisitos

- PHP 8.4+
- Composer
- Node.js 18+
- Extensiones PHP habilitadas: `pdo_sqlite`, `openssl`, `mbstring`, `fileinfo`

## Instalación

```bash
# 1. Clonar
git clone https://github.com/tuusuario/stockflow.git
cd stockflow

# 2. Dependencias PHP
composer install

# 3. Dependencias Node
npm install

# 4. Configurar entorno
cp .env.example .env
php artisan key:generate

# 5. Base de datos y datos de prueba
php artisan migrate --seed

# 6. Compilar assets
npm run build

# 7. Iniciar servidor
php artisan serve