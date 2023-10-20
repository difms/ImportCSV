<template>
    <div>
        <input type="file" @change="uploadFile" accept=".csv">
        <progress :value="progress" max="100"></progress>

        <table>
            <thead>
                <tr>
                    <th>Код</th>
                    <th>Наименование</th>
                    <th>Цена</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="product in products" :key="product.id">
                    <td>{{ product.Код }}</td>
                    <td>{{ product.Наименование }}</td>
                    <td>{{ product.Цена }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            progress: 0,
            products: [],
        };
    },
    methods: {
        async uploadFile(event) {
            const file = event.target.files[0];
            const formData = new FormData();
            formData.append('file', file);

            try {
                const response = await this.uploadFileToServer(formData);
                this.products = response.data;
            } catch (error) {
                console.error('Ошибка загрузки и парсинга файла:', error);
            }
        },
        async uploadFileToServer(formData) {
            const config = {
                onUploadProgress: (progressEvent) => {
                    this.progress = Math.round((progressEvent.loaded / progressEvent.total) * 100);
                },
            };

            return await this.$axios.post('/api/upload', formData, config);
        },
    },
};
</script>