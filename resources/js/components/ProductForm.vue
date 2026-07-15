<template>
  <div class="bg-white rounded-lg shadow p-6 max-w-lg">
    <form :action="actionUrl" method="POST">
      <input type="hidden" name="_token" :value="csrf" />
      <input v-if="isEditing" type="hidden" name="_method" value="PUT" />

      <div class="mb-4">
        <label class="block text-gray-700 mb-2">Nombre</label>
        <input type="text" name="nombre" v-model="form.nombre"
               class="w-full border rounded px-3 py-2"
               :class="{ 'border-red-500': errors.nombre }" />
        <p v-if="errors.nombre" class="text-red-500 text-sm mt-1">{{ errors.nombre[0] }}</p>
      </div>

      <div class="mb-4">
        <label class="block text-gray-700 mb-2">Descripción</label>
        <textarea name="descripcion" v-model="form.descripcion" rows="3"
                  class="w-full border rounded px-3 py-2"></textarea>
      </div>

      <div class="mb-4">
        <label class="block text-gray-700 mb-2">Precio</label>
        <input type="number" step="0.01" name="precio" v-model="form.precio"
               class="w-full border rounded px-3 py-2"
               :class="{ 'border-red-500': errors.precio }" />
        <p v-if="errors.precio" class="text-red-500 text-sm mt-1">{{ errors.precio[0] }}</p>
      </div>

      <div class="mb-4">
        <label class="block text-gray-700 mb-2">Stock</label>
        <input type="number" name="stock" v-model="form.stock"
               class="w-full border rounded px-3 py-2"
               :class="{ 'border-red-500': errors.stock }" />
        <p v-if="errors.stock" class="text-red-500 text-sm mt-1">{{ errors.stock[0] }}</p>
      </div>

      <div class="mb-4">
        <label class="block text-gray-700 mb-2">Categoría</label>
        <input type="text" name="categoria" v-model="form.categoria"
               class="w-full border rounded px-3 py-2"
               :class="{ 'border-red-500': errors.categoria }" />
        <p v-if="errors.categoria" class="text-red-500 text-sm mt-1">{{ errors.categoria[0] }}</p>
      </div>

      <div class="mb-6">
        <label class="block text-gray-700 mb-2">URL de Imagen</label>
        <input type="text" name="imagen" v-model="form.imagen"
               class="w-full border rounded px-3 py-2" />
      </div>

      <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Guardar
      </button>
      <a :href="backUrl" class="ml-2 text-gray-600 hover:underline">Cancelar</a>
    </form>
  </div>
</template>

<script setup>
import { reactive, computed } from 'vue';

const props = defineProps({
  product: { type: Object, default: null },
  actionUrl: String,
  backUrl: String,
  errors: { type: Object, default: () => ({}) },
  csrf: String,
});

const isEditing = computed(() => props.product !== null);

const form = reactive({
  nombre: props.product?.nombre || '',
  descripcion: props.product?.descripcion || '',
  precio: props.product?.precio || '',
  stock: props.product?.stock || '',
  categoria: props.product?.categoria || '',
  imagen: props.product?.imagen || '',
});
</script>