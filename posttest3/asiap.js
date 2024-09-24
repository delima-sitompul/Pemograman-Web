// Pop-up notification logic
const homeLink = document.querySelector('a[href="#home"]');
const popupNotification = document.getElementById('popup-notification');
const nameInput = document.getElementById('name-input');
const submitNameBtn = document.getElementById('submit-name');

// Function to show pop-up
function showPopup() {
    popupNotification.classList.remove('hidden');
}

// Event listener to show the pop-up when "Home" is clicked
homeLink.addEventListener('click', (e) => {
    e.preventDefault(); // Prevent default behavior
    showPopup();
});

// Function to handle name submission
submitNameBtn.addEventListener('click', () => {
    const name = nameInput.value.trim();
    if (name) {
        alert(`Hi ${name}, selamat datang di To-Do List!`);
        popupNotification.classList.add('hidden'); // Sembunyikan pop-up setelah submit
        nameInput.value = ''; // Reset input setelah submit
    } else {
        alert('Silakan masukkan nama terlebih dahulu.');
    }
});

// Logic for Hamburger menu
const hamburger = document.getElementById('hamburger');
const navLinks = document.querySelector('.nav-links');

// Toggle menu when hamburger is clicked
hamburger.addEventListener('click', () => {
    navLinks.classList.toggle('active');
    
});




document.addEventListener('DOMContentLoaded', () => {
    const taskForm = document.getElementById('task-form');
    const taskInput = document.getElementById('task-input');
    const taskList = document.getElementById('task-list');
    const progressBar = document.getElementById('progress');
    const numbersDisplay = document.getElementById('numbers');
    const motivationText = document.getElementById('motivation-text');

    let tasks = [];
    let completedTasks = 0;

    // Update the progress and task statistics
    function updateProgress() {
        const totalTasks = tasks.length;
        const progressPercentage = totalTasks > 0 ? (completedTasks / totalTasks) * 100 : 0;

        progressBar.style.width = `${progressPercentage}%`;
        numbersDisplay.textContent = `${completedTasks} / ${totalTasks}`;

        if (completedTasks === totalTasks && totalTasks !== 0) {
            motivationText.textContent = 'Great job, all tasks completed!';
        } else {
            motivationText.textContent = 'Let\'s get things done!';
        }
    }

    // Add a new task
    taskForm.addEventListener('submit', (e) => {
        e.preventDefault();

        const taskText = taskInput.value.trim();
        if (taskText === '') return;

        const task = {
            text: taskText,
            completed: false,
        };

        tasks.push(task);
        taskInput.value = '';

        renderTasks();
        updateProgress();
    });

    // Render the tasks
    function renderTasks() {
        taskList.innerHTML = '';
        completedTasks = 0; // Reset completedTasks sebelum menghitung ulang
        tasks.forEach((task, index) => {
            const taskItem = document.createElement('li');
            taskItem.textContent = task.text;

            if (task.completed) {
                taskItem.classList.add('completed');
                completedTasks++; // Hitung task yang sudah complete
            }

            const completeBtn = document.createElement('button');
            completeBtn.textContent = task.completed ? 'Undo' : 'Complete';
            completeBtn.addEventListener('click', () => {
                task.completed = !task.completed;
                renderTasks();
                updateProgress();
            });

            taskItem.appendChild(completeBtn);
            taskList.appendChild(taskItem);
        });
    }

    updateProgress();
});

// Dark/Light Mode Toggle
const darkModeToggle = document.getElementById('dark-mode-toggle');

darkModeToggle.addEventListener('click', () => {
    document.body.classList.toggle('light-mode'); // Menambahkan atau menghapus kelas 'light-mode'

    // Ubah teks tombol berdasarkan mode aktif
    if (document.body.classList.contains('light-mode')) {
        darkModeToggle.textContent = 'Dark Mode'; // Mode terang, jadi tombol mengatakan "Dark Mode"
    } else {
        darkModeToggle.textContent = 'Light Mode'; // Mode gelap, jadi tombol mengatakan "Light Mode"
    }
});


