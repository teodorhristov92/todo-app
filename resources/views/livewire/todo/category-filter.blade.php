<!-- Category Filter Livewire Component View --> 
<div
    x-data="{
        categories: [],
        selectedCategory: '',
        token: '{{ session('api_token') }}',
        fetchCategories() {
            fetch('/api/categories', {
                headers: {
                    'Authorization': 'Bearer ' + this.token,
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                }
            })
                .then(res => res.json())
                .then(data => this.categories = data.data)
        },
        filterCategory() {
            $dispatch('categorySelected', [this.selectedCategory]);
        }
    }"
    x-init="fetchCategories()"
>
    <label for="category-filter">Filter by Category:</label>
    <select id="category-filter" x-model="selectedCategory" @change="filterCategory()">
        <option value="">All</option>
        <template x-for="cat in categories" :key="cat.id">
            <option :value="cat.id" x-text="cat.name"></option>
        </template>
    </select>
</div> 