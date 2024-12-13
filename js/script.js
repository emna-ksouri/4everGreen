var btn = document.getElementById("btn");
var close = document.getElementById("close-btn");
var login = document.getElementById("login");
var sign = document.getElementById("sign");
var form = document.getElementById("form");
var blur = document.getElementById("blur");

// Function to handle opening the login form
function registreLog() {
    form.style.display = "flex";
    login.style.display = "flex";
    sign.style.display = "none";
    blur.style.display = "block";
}

// Function to handle opening the sign-up form
function registreSign() {
    form.style.display = "flex";
    login.style.display = "none";
    sign.style.display = "flex";
    blur.style.display = "block";
}

// Function to handle closing the form
function closeForm() {
    form.style.display = "none";
    blur.style.display = "none";
}

// Function to validate the sign-up form
function validateForm() {
    // Get the form and input elements
    var signForm = document.getElementById("sign");
    var email = document.getElementById("email").value;
    var newPassword = document.getElementById("new-password").value;
    var verifyPassword = document.getElementById("verify-password").value;

    // Check if the email is in a valid format
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert("Invalid email format");
        return false; // Prevent form submission
    }

    // Check if the password is strong
    if (newPassword.length < 8) {
        alert("Weak password");
        return false; // Prevent form submission
    }

    // Check if the new password and verify password match
    if (newPassword !== verifyPassword) {
        alert("Passwords do not match");
        return false; // Prevent form submission
    }

    // If all validation passes, return true to allow form submission
    return true;
}


document.getElementById('accessButton').addEventListener('click', function() {
  var accessCode = document.getElementById('accessCode').value;
  // Here you can check the access code and perform appropriate actions
  // For simplicity, let's assume the code is correct
  if (accessCode === "your_correct_code") {
    // Redirect the user to another page
    window.location.href = "grenspace.php";
  } else {
    // Show a message indicating that the code is incorrect
    document.getElementById('accessMessage').style.display = 'block';
  }
});

document.getElementById('numPlants').addEventListener('change', function() {
  var numPlants = parseInt(this.value);
  var plantDetailsDiv = document.getElementById('plantDetails');
  // Clear previous plant details inputs
  plantDetailsDiv.innerHTML = '';
  // Add input fields for plant details based on selected number of plants
  for (var i = 0; i < numPlants; i++) {
    var plantNameInput = document.createElement('input');
    plantNameInput.type = 'text';
    plantNameInput.placeholder = 'Plant Name ' + (i + 1);
    plantDetailsDiv.appendChild(plantNameInput);

    var plantTypeInput = document.createElement('input');
    plantTypeInput.type = 'text';
    plantTypeInput.placeholder = 'Plant Type ' + (i + 1);
    plantDetailsDiv.appendChild(plantTypeInput);
  }
});

document.getElementById('createButton').addEventListener('click', function() {
  // Redirect the user to another page for creating the green space
  window.location.href = "greenspace-createandjoin.php";
});


// Fetch green space details from database and populate the table
// Example: Fetch data using AJAX request and update the #greenSpaceDetails tbody

// Fetch chat messages from database and populate the #chatMessages div
// Example: Fetch chat messages using AJAX request and update the #chatMessages div

document.getElementById('chatForm').addEventListener('submit', function(event) {
  event.preventDefault(); // Prevent form submission
  
  // Get the message input value
  var message = document.getElementById('messageInput').value;

  // Send the message to the server (you will need AJAX or WebSocket for this)
  // Example: Send message to server using AJAX request
  
  // Clear the message input
  document.getElementById('messageInput').value = '';
});


/*dropdown*/
function dropdown() {
  document.getElementById("myDropdown").classList.toggle("show");
}

window.onclick = function(event) {
  if (!event.target.matches('.drop')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      for (var i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          if (openDropdown.classList.contains('show')) {
              openDropdown.classList.remove('show');
          }
      }
  }
}



// Get the post form and button elements
const postForm = document.getElementById('post-form');
const postButton = document.getElementById('post-button');

// Add event listener to the post button
postButton.addEventListener('click', (e) => {
    // Get the post text area value
    const postTextareaValue = document.getElementById('post-textarea').value;

    // Send the post text area value to the server
    fetch('/post', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            post: postTextareaValue
        })
    })
    .then((response) => {
        // Update the post list with the new post
        const postList = document.getElementById('post-list');
        const newPost = document.createElement('li');
        newPost.innerHTML = `
            <span id="post-author">John Doe</span>
            <span id="post-text">${postTextareaValue}</span>
            <button id="post-comment-button">Comment</button>
        `;
        postList.appendChild(newPost);
    })
    .catch((error) => {
        console.error(error);
    });
});



// This script will handle fetching dynamic data from the backend and populating the HTML tables

// Function to fetch Greenspace details and populate the table
function fetchGreenspaceDetails() {
  // Perform an AJAX request or fetch API to retrieve Greenspace details from the backend
  // Replace this section with your actual API call

  // Example data (replace with actual data from the backend)
  const greenspaceDetails = [
      {
          code: "GS001",
          name: "Example Greenspace",
          description: "A beautiful greenspace for relaxation",
          plants: ["Plant 1", "Plant 2"]
      }
  ];

  const tableBody = document.getElementById("greenSpaceDetails");
  greenspaceDetails.forEach(greenspace => {
      const row = tableBody.insertRow();
      row.innerHTML = `
          <td>${greenspace.code}</td>
          <td>${greenspace.name}</td>
          <td>${greenspace.description}</td>
          <td>${greenspace.plants.join(", ")}</td>
      `;
  });
}

// Function to fetch Tasks and populate the table
function fetchTasks() {
  // Perform an AJAX request or fetch API to retrieve Tasks from the backend
  // Replace this section with your actual API call

  // Example data (replace with actual data from the backend)
  const tasks = [
      {
          name: "Watering",
          description: "Water the plants in the greenspace",
          dueDate: "2024-05-15",
          completed: "No"
      }
  ];

  const tableBody = document.getElementById("tasksList");
  tasks.forEach(task => {
      const row = tableBody.insertRow();
      row.innerHTML = `
          <td>${task.name}</td>
          <td>${task.description}</td>
          <td>${task.dueDate}</td>
          <td>${task.completed}</td>
      `;
  });
}

// Call functions to fetch and populate data when the page loads
window.addEventListener("load", () => {
  fetchGreenspaceDetails();
  fetchTasks();
});



document.getElementById('adminLoginForm').addEventListener('submit', function(event) {
  event.preventDefault(); // Prevent the default form submission

  // Get form data
  let formData = new FormData(this);

  // Send form data to PHP script for validation
  fetch('admin_login.php', {
      method: 'POST',
      body: formData
  })
  .then(response => response.json())
  .then(data => {
      // Handle response from server
      if(data.success) {
          // Redirect to admin dashboard or any other page upon successful login
          window.location.href = 'admin_dashboard.php';
      } else {
          alert(data.message); // Display error message
      }
  })
  .catch(error => console.error('Error:', error));
});