import { createApp } from 'vue';
import ProductList from './components/ProductList.vue';
import ProductForm from './components/ProductForm.vue';
import ProductDetail from './components/ProductDetail.vue';

const app = createApp({});

app.component('product-list', ProductList);
app.component('product-form', ProductForm);
app.component('product-detail', ProductDetail);

app.mount('#app');