<template>
  <div class="bg-white rounded-lg shadow p-6 max-w-2xl">
    <h1 class="text-2xl font-bold mb-4">{{ product.nombre }}</h1>

    <div class="grid grid-cols-2 gap-4">
      <div><strong>Categoría:</strong> {{ product.categoria }}</div>
      <div><strong>Precio:</strong> ${{ formatPrice(product.precio) }}</div>
      <div><strong>Stock:</strong> {{ product.stock }} unidades</div>
      <div><strong>Creado por:</strong> {{ product.user?.name }}</div>
    </div>

    <div v-if="product.descripcion" class="mt-4">
      <strong>Descripción:</strong> {{ product.descripcion }}
    </div>

    <img v-if="product.imagen" :src="product.imagen" :alt="product.nombre"
         class="mt-4 max-w-sm rounded" />

    <div class="mt-6">
      <a :href="backUrl" class="text-blue-600 hover:underline">Volver</a>
    </div>
  </div>
</template>

<script setup>
defineProps({
  product: Object,
  backUrl: String,
});

function formatPrice(price) {
  return Number(price).toLocaleString('es-ES', { minimumFractionDigits: 2 });
}
</script>