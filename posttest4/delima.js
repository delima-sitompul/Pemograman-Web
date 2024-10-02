
const homeLink = document.querySelector('a[href="#home"]');
const popupNotification = document.getElementById('popup-notification');
const nameInput = document.getElementById('name-input');
const submitNameBtn = document.getElementById('submit-name');


function showPopup() {
    popupNotification.classList.remove('hidden');
}


homeLink.addEventListener('click', (e) => {
    e.preventDefault(); 
    showPopup();
});


submitNameBtn.addEventListener('click', () => {
    const name = nameInput.value.trim();
    if (name) {
        alert(`Hi ${name}, selamat datang di To-Do List!`);
        popupNotification.classList.add('hidden'); 
        nameInput.value = ''; 
    } else {
        alert('Silakan masukkan nama terlebih dahulu.');
    }
});


const hamburger = document.getElementById('hamburger');
const navLinks = document.querySelector('.nav-links');


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

   
    const homeLink = document.querySelector('a[href="#home"]');

    if (homeLink) {
        homeLink.addEventListener('click', (e) => {
            e.preventDefault(); // Prevent default behavior
            showPopup();
        });
    }


    
    function renderTasks() {
        taskList.innerHTML = '';
        completedTasks = 0; 
        tasks.forEach((task) => {
            const taskItem = document.createElement('li');
            taskItem.textContent = task.text;

            if (task.completed) {
                taskItem.classList.add('completed');
                completedTasks++; 
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

   
    const darkModeToggle = document.getElementById('dark-mode-toggle');

    darkModeToggle.addEventListener('click', () => {
        document.body.classList.toggle('light-mode'); 

        // Change button text based on the active mode
        if (document.body.classList.contains('light-mode')) {
            darkModeToggle.textContent = 'Dark Mode';
        } else {
            darkModeToggle.textContent = 'Light Mode';
        }
    });

    
    const loginModal = document.getElementById('loginModal');
    const registerModal = document.getElementById('registerModal');
    const loginBtn = document.getElementById('loginBtn');
    const closeButtons = document.querySelectorAll('.close');
    const registerLink = document.getElementById('registerLink');
    const loginLink = document.getElementById('loginLink');

   
    loginBtn.onclick = () => {
        loginModal.style.display = "block";
    };

   
    registerLink.onclick = (event) => {
        event.preventDefault();
        loginModal.style.display = "none";
        registerModal.style.display = "block";
    };

    
    loginLink.onclick = (event) => {
        event.preventDefault();
        registerModal.style.display = "none";
        loginModal.style.display = "block";
    };

    
    closeButtons.forEach((button) => {
        button.onclick = () => {
            loginModal.style.display = "none";
            registerModal.style.display = "none";
        };
    });

    window.onclick = (event) => {
        if (event.target === loginModal || event.target === registerModal) {
            loginModal.style.display = "none";
            registerModal.style.display = "none";
        }
    };
});


const loginBtn = document.getElementById('login-btn');
const loginModal = document.getElementById('loginModal');
const registerModal = document.getElementById('registerModal');
const registerLink = document.getElementById('registerLink');
const loginLink = document.getElementById('loginLink');
const closeButtons = document.querySelectorAll('.close');

loginBtn.addEventListener('click', () => {
    loginModal.style.display = 'block';
});

registerLink.addEventListener('click', (e) => {
    e.preventDefault();
    loginModal.style.display = 'none';
    registerModal.style.display = 'block';
});

loginLink.addEventListener('click', (e) => {
    e.preventDefault();
    registerModal.style.display = 'none';
    loginModal.style.display = 'block';
});

closeButtons.forEach(button => {
    button.addEventListener('click', () => {
        loginModal.style.display = 'none';
        registerModal.style.display = 'none';
    });
});

window.addEventListener('click', (event) => {
    if (event.target === loginModal) {
        loginModal.style.display = 'none';
    }
    if (event.target === registerModal) {
        registerModal.style.display = 'none';
    }
});

function renderTasks() {
    taskList.innerHTML = '';
    completedTasks = 0;
    tasks.forEach((task, index) => {
        const taskItem = document.createElement('li');
        taskItem.textContent = task.text;

        if (task.completed) {
            taskItem.classList.add('completed');
            completedTasks++;
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
    updateProgress(); 
}


