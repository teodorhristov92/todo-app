<!-- Todo Form Livewire Component View --> 
<div
    class="bg-white shadow rounded-lg p-6 border border-gray-200 max-w-xl mb-8"
    x-data="{
        title: '',
        description: '',
        category_id: '',
        priority_id: '',
        completed: false,
        error: '',
        categories: [],
        priorities: [],
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
        fetchPriorities() {
            fetch('/api/priorities', {
                headers: {
                    'Authorization': 'Bearer ' + this.token,
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                }
            })
                .then(res => res.json())
                .then(data => this.priorities = data.data)
        },
        async testAuth() {
            const res = await fetch('/api/test-auth', {
                headers: {
                    'Authorization': 'Bearer ' + this.token,
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                }
            });
            const data = await res.json();
            console.log('Auth test:', data);
            return data.authenticated;
        },
        async createTodo() {
            // Test authentication first
            const isAuthenticated = await this.testAuth();
            if (!isAuthenticated) {
                this.error = 'Not authenticated. Please log in again.';
                return;
            }
            
            fetch('/api/todos', {
                method: 'POST',
                headers: {
                    'Authorization': 'Bearer ' + this.token,
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
                body: JSON.stringify({
                    title: this.title,
                    description: this.description,
                    category_id: Number(this.category_id),
                    priority_id: Number(this.priority_id),
                    completed: this.completed
                })
            })
            .then(res => res.json())
            .then(data => {
                if (data.message) {
                    this.error = data.message;
                } else {
                    this.title = '';
                    this.description = '';
                    this.category_id = '';
                    this.priority_id = '';
                    this.completed = false;
                    this.error = '';
                    $dispatch('todo-updated');
                }
            });
        }
    }"
    x-init="fetchCategories(); fetchPriorities();"
>
    <form @submit.prevent="createTodo" class="space-y-4">
        <h3 class="text-lg font-semibold mb-2">Add a new Todo</h3>
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" id="title" x-model="title" required class="mt-1 block w-full rounded border-2 border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        </div>
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea id="description" x-model="description" class="mt-1 block w-full rounded border-2 border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
        </div>
        <div class="flex gap-4">
            <div class="flex-1">
                <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
                <select id="category_id" x-model="category_id" required class="mt-1 block w-full rounded border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value="">Select category</option>
                    <template x-for="cat in categories" :key="cat.id">
                        <option :value="cat.id" x-text="cat.name"></option>
                    </template>
                </select>
            </div>
            <div class="flex-1">
                <label for="priority_id" class="block text-sm font-medium text-gray-700">Priority</label>
                <select id="priority_id" x-model="priority_id" required class="mt-1 block w-full rounded border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value="">Select priority</option>
                    <template x-for="pri in priorities" :key="pri.id">
                        <option :value="pri.id" x-text="pri.name"></option>
                    </template>
                </select>
            </div>
        </div>
        <div class="flex items-center justify-between gap-2">
            <label for="completed" class="text-sm text-gray-700 mb-0">Is it completed?</label>
            <input type="checkbox" id="completed" x-model="completed" class="accent-green-600">
        </div>
        <div class="flex gap-2">
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">Save</button>
            
        </div>
        <div x-show="error" x-text="error" class="text-red-600 text-sm"></div>
    </form>
</div> 