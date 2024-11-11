// public/js/tasks.js

function confirmDelete() {
    return confirm('Are you sure you want to delete this task?');
}

// Make the function accessible globally
window.confirmDelete = confirmDelete;
