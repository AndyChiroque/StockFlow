<template>
  <div>
    <!-- Mensaje flash -->
    <div v-if="flashMessage" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
      {{ flashMessage }}
    </div>

    <!-- Filtros -->
    <div class="mb-4 flex gap-4">
      <input v-model="search" type="text" placeholder="Buscar por nombre..."
             class="border rounded px-3 py-2 w-64" />
      <select v-model="selectedCategory" class="border rounded px-3 py-2">
        <option value="">Todas las categorías</option>
        <option v-for="cat in categories" :key="cat" :value="cat">{{ cat }}</option>
      </select>
    </div>

    <!-- Tabla -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
      <table class="w-full" v-if="filteredProducts.length">
        <thead class="bg-gray-50">
          <tr>
            <th class="px-4 py-3 text-left text-sm">Nombre</th>
            <th class="px-4 py-3 text-left text-sm">Categoría</th>
            <th class="px-4 py-3 text-left text-sm">Precio</th>
            <th class="px-4 py-3 text-left text-sm">Stock</th>
            <th class="px-4 py-3 text-left text-sm">Creado por</th>
            <th class="px-4 py-3 text-left text-sm">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="product in filteredProducts" :key="product.id" class="border-t">
            <td class="px-4 py-3">{{ product.nombre }}</td>
            <td class="px-4 py-3">{{ product.categoria }}</td>
            <td class="px-4 py-3">${{ formatPrice(product.precio) }}</td>
            <td class="px-4 py-3">{{ product.stock }}</td>
            <td class="px-4 py-3">{{ product.user?.name }}</td>
            <td class="px-4 py-3 flex gap-2">
              <a :href="routes.show + '/' + product.id" class="text-blue-600 hover:underline">Ver</a>
              <a v-if="canEdit" :href="routes.edit + '/' + product.id + '/edit'" class="text-yellow-600 hover:underline">Editar</a>
              <form v-if="canDelete" :action="routes.destroy + '/' + product.id" method="POST"
                    class="inline" @submit.prevent="confirmDelete">
                <input type="hidden" name="_token" :value="csrf" />
                <input type="hidden" name="_method" value="DELETE" />
                <button class="text-red-600 hover:underline">Eliminar</button>
              </form>
            </td>
          </tr>
        </tbody>
      </table>
      <div v-else class="p-4 text-gray-500 text-center">No se encontraron productos.</div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue';

const props = defineProps({
  products: Array,
  routes: Object,
  canEdit: Boolean,
  canDelete: Boolean,
  flashMessage: String,
  csrf: String,
});

const search = ref('');
const selectedCategory = ref('');

const categories = computed(() => {
  const cats = props.products.map(p => p.categoria);
  return [...new Set(cats)].sort();
});

const filteredProducts = computed(() => {
  return props.products.filter(p => {
    const matchesSearch = p.nombre.toLowerCase().includes(search.value.toLowerCase());
    const matchesCategory = !selectedCategory.value || p.categoria === selectedCategory.value;
    return matchesSearch && matchesCategory;
  });
});

function formatPrice(price) {
  return Number(price).toLocaleString('es-ES', { minimumFractionDigits: 2 });
}

function confirmDelete(event) {
  if (confirm('¿Eliminar este producto?')) {
    event.target.submit();
  }
}
</script>