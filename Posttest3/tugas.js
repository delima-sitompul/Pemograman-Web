function addTask() {
    const taskInput = document.getElementById("taskInput");
    const taskList = document.getElementById("taskList");

    // Get the task text
    const taskText = taskInput.value.trim();

    if (taskText !== "") {
        // Create list item
        const li = document.createElement("li");
        li.classList.add("task-item");

        // Create span for task text
        const span = document.createElement("span");
        span.textContent = taskText;

        // Create delete button
        const deleteBtn = document.createElement("button");
        deleteBtn.textContent = "Delete";
        deleteBtn.classList.add("btn-delete");
        deleteBtn.onclick = function () {
            taskList.removeChild(li);
        };

        // Add event listener to toggle completion
        li.addEventListener("click", function () {
            li.classList.toggle("completed");
        });

        // Append span and delete button to list item
        li.appendChild(span);
        li.appendChild(deleteBtn);

        // Add the new task to the list
        taskList.appendChild(li);

        // Clear the input field
        taskInput.value = "";
    } else {
        alert("Please enter a task.");
    }
}

function addTask() {
    const taskInput = document.getElementById("taskInput");
    const taskList = document.getElementById("taskList");

    // Get the task text
    const taskText = taskInput.value.trim();

    if (taskText !== "") {
        // Create list item
        const li = document.createElement("li");
        li.classList.add("task-item");

        // Create span for task text
        const span = document.createElement("span");
        span.textContent = taskText;

        // Create delete button
        const deleteBtn = document.createElement("button");
        deleteBtn.textContent = "Delete";
        deleteBtn.classList.add("btn-delete");
        deleteBtn.onclick = function () {
            taskList.removeChild(li);
        };

        // Add event listener to toggle completion
        li.addEventListener("click", function () {
            li.classList.toggle("completed");
        });

        // Append span and delete button to list item
        li.appendChild(span);
        li.appendChild(deleteBtn);

        // Add the new task to the list
        taskList.appendChild(li);

        // Clear the input field
        taskInput.value = "";
    } else {
        alert("Please enter a task.");
    }
}

