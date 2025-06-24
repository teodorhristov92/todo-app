<!-- List Todos Livewire Component View --> 
<div
    x-data="{
        todos: [],
        totalTodos: 0,
        page: 1,
        perPage: 5,
        token: '{{ session('api_token') }}',
        editingTodo: null,
        showEditModal: false,
        categories: [],
        priorities: [],
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
        fetchTodos(categoryId = '') {
            let url = '/api/todos';
            if (categoryId) {
                url += `?category_id=${categoryId}`;
            }
            fetch(url, {
                headers: {
                    'Authorization': 'Bearer ' + this.token,
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                }
            })
                .then(res => {
                    if (!res.ok) {
                        return { data: [], total_todos: 0 };
                    }
                    return res.json().catch(() => ({ data: [], total_todos: 0 }));
                })
                .then(data => {
                    this.todos = Array.isArray(data.data) ? data.data : [];
                    this.totalTodos = data.total_todos || 0;
                    this.page = 1; 
                })
                .catch(() => {
                    this.todos = [];
                    this.totalTodos = 0;
                });
        },
        toggleComplete(todo) {
            const newCompleted = !todo.completed;
            
            todo.completed = newCompleted;
            fetch(`/api/todos/${todo.id}`, {
                method: 'PATCH',
                headers: {
                    'Authorization': 'Bearer ' + this.token,
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
                body: JSON.stringify({ completed: newCompleted })
            })
            .then(res => res.json())
            .then(data => {
              
            })
            .catch(() => {
                todo.completed = !newCompleted;
            });
        },
        deleteTodo(todoId) {
            if (confirm('Are you sure you want to delete this todo?')) {
                fetch(`/api/todos/${todoId}`, {
                    method: 'DELETE',
                    headers: {
                        'Authorization': 'Bearer ' + this.token,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    }
                })
                .then(res => res.json())
                .then(data => {
                    // Refresh the todos list
                    this.fetchTodos();
                })
                .catch(error => {
                    console.error('Error deleting todo:', error);
                });
            }
        },
        editTodo(todo) {
            console.log('Editing todo:', JSON.parse(JSON.stringify(todo)));
            this.editingTodo = { 
                id: todo.id,
                title: todo.title,
                description: todo.description || '',
                category_id: todo.category_id ?? (todo.category ? todo.category.id : null),
                priority_id: todo.priority_id ?? (todo.priority ? todo.priority.id : null),
                completed: todo.completed
            };
            console.log('Editing todo data:', JSON.parse(JSON.stringify(this.editingTodo)));
            this.showEditModal = true;
        },
        updateTodo() {
            console.log('Updating todo:', this.editingTodo);
            
            fetch(`/api/todos/${this.editingTodo.id}`, {
                method: 'PATCH',
                headers: {
                    'Authorization': 'Bearer ' + this.token,
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
                body: JSON.stringify({
                    title: this.editingTodo.title,
                    description: this.editingTodo.description,
                    category_id: Number(this.editingTodo.category_id),
                    priority_id: Number(this.editingTodo.priority_id),
                    completed: this.editingTodo.completed
                })
            })
            .then(res => {
                console.log('Response status:', res.status);
                if (!res.ok) {
                    throw new Error(`HTTP error! status: ${res.status}`);
                }
                return res.json();
            })
            .then(data => {
                console.log('Update successful:', data);
                this.showEditModal = false;
                this.editingTodo = null;
                this.fetchTodos();
            })
            .catch(error => {
                console.error('Error updating todo:', error);
                alert('Error updating todo: ' + error.message);
            });
        },
        get paginatedTodos() {
            const start = (this.page - 1) * this.perPage;
            return this.todos.slice(start, start + this.perPage);
        },
        get totalPages() {
            return Math.ceil(this.todos.length / this.perPage) || 1;
        }
    }"
    x-init="
        fetchTodos();
        fetchCategories();
        fetchPriorities();
        window.addEventListener('todo-updated', () => fetchTodos());
        window.addEventListener('categorySelected', e => fetchTodos(e.detail));
    "
>
    <div class="flex items-center justify-between mb-4">
        <span class="text-sm text-gray-600">Total todos: <span x-text="totalTodos"></span></span>
    </div>
    <ul class="space-y-4">
        <template x-for="(todo, idx) in paginatedTodos" :key="todo.id">
            <li class="bg-white shadow rounded-lg p-4 flex items-start gap-4 border border-gray-200 relative">
                <div class="flex-1">
                    <div class="flex items-center gap-2">
                        <strong :class="todo.completed ? 'line-through text-gray-400' : ''" x-text="todo.title"></strong>
                        <span class="text-xs px-2 py-1 rounded-full" :class="todo.completed ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700'" x-text="todo.completed ? 'Completed' : 'Incomplete'"></span>
                    </div>
                    <div class="mt-1 text-sm text-gray-600" :class="todo.completed ? 'line-through text-gray-400' : ''" x-text="todo.description"></div>
                    <div class="mt-2 text-xs text-gray-500 flex gap-4">
                        <span>Category: <span x-text="todo.category?.name ?? '-'" class="font-medium"></span></span>
                        <span>Priority: <span x-text="todo.priority?.name ?? '-'" class="font-medium"></span></span>
                    </div>
                </div>
                <div class="flex flex-col items-end justify-between h-full gap-2 min-w-[140px]">
                    <div class="flex items-center gap-2">
                        <label :for="'completed-' + todo.id" class="text-sm text-gray-700 mb-0">Is it completed?</label>
                        <input type="checkbox" :id="'completed-' + todo.id" :checked="todo.completed" @change="toggleComplete(todo)" class="accent-green-600">
                    </div>
                    <div class="flex gap-2">
                        <button @click="editTodo(todo)" class="text-blue-600 hover:text-blue-800 text-sm font-medium transition">
                            Edit
                        </button>
                        <button @click="deleteTodo(todo.id)" class="text-red-600 hover:text-red-800 text-sm font-medium transition">
                            Delete
                        </button>
                    </div>
                </div>
                <template x-if="idx < paginatedTodos.length - 1">
                    <div class="absolute left-0 right-0 bottom-[-16px] h-4 flex items-center justify-center pointer-events-none">
                        <div class="w-11/12 border-b border-gray-200"></div>
                    </div>
                </template>
            </li>
        </template>
    </ul>
    <div class="flex justify-center items-center gap-4 mt-6" x-show="totalPages > 1">
        <button @click="page = Math.max(1, page - 1)" :disabled="page === 1" class="px-3 py-1 rounded border bg-gray-100 disabled:opacity-50">Prev</button>
        <span>Page <span x-text="page"></span> of <span x-text="totalPages"></span></span>
        <button @click="page = Math.min(totalPages, page + 1)" :disabled="page === totalPages" class="px-3 py-1 rounded border bg-gray-100 disabled:opacity-50">Next</button>
    </div>

    <!-- Edit Todo Modal -->
    <div x-show="showEditModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <template x-if="editingTodo">
            <div class="bg-white rounded-lg p-6 w-full max-w-md mx-4">
                <h3 class="text-lg font-semibold mb-4">Edit Todo</h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Title</label>
                        <input type="text" x-model="editingTodo.title" required class="mt-1 block w-full rounded border-2 border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea x-model="editingTodo.description" class="mt-1 block w-full rounded border-2 border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                    </div>
                    <div class="flex gap-4">
                        <div class="flex-1">
                            <label class="block text-sm font-medium text-gray-700">Category</label>
                            <select x-model="editingTodo.category_id" required class="mt-1 block w-full rounded border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <template x-for="cat in categories" :key="cat.id">
                                    <option :value="cat.id" x-text="cat.name"></option>
                                </template>
                            </select>
                        </div>
                        <div class="flex-1">
                            <label class="block text-sm font-medium text-gray-700">Priority</label>
                            <select x-model="editingTodo.priority_id" required class="mt-1 block w-full rounded border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <template x-for="pri in priorities" :key="pri.id">
                                    <option :value="pri.id" x-text="pri.name"></option>
                                </template>
                            </select>
                        </div>
                    </div>
                    <div class="flex items-center justify-between gap-2">
                        <label class="text-sm text-gray-700 mb-0">Is it completed?</label>
                        <input type="checkbox" x-model="editingTodo.completed" class="accent-green-600">
                    </div>
                    <div class="flex gap-2 justify-end">
                        <button @click="showEditModal = false; editingTodo = null" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition">Cancel</button>
                        <button @click="updateTodo()" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">Update</button>
                    </div>
                </div>
            </div>
        </template>
    </div>
</div> 