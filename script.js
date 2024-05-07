// scripts.js
// FOR CATEGORY PAGE
// populates articles that are stored in the database

function populateMisc() {
  // Clear the content of the academic articles container
  const academicArticlesDiv = document.getElementById("academicArticles");
  academicArticlesDiv.innerHTML = "";
  // Clear the content of the career articles container
  const careerArticlesDiv = document.getElementById("careerArticles");
  careerArticlesDiv.innerHTML = "";
  // Clear the content of the hobbies articles container
  const hobbiesArticlesDiv = document.getElementById("hobbiesArticles");
  hobbiesArticlesDiv.innerHTML = "";
  // Clear the content of the healthwell articles container
  const healthwellArticlesDiv = document.getElementById("healthwellArticles");
  healthwellArticlesDiv.innerHTML = "";
  // Clear the content of the student articles container
  const studentArticlesDiv = document.getElementById("studentArticles");
  studentArticlesDiv.innerHTML = "";

  // Make an AJAX request to fetch the miscellaneous articles from the server
  fetch("php/miscAJAX.php")
    .then((response) => response.json())
    .then((data) => {

      // Log the data to understand its structure
      console.log("Data received:", data);

      // Process the data and populate the miscArticles div
      const miscArticlesDiv = document.getElementById("miscArticles");
      miscArticlesDiv.innerHTML = ""; // Clear previous content


      if (data && data.articles && Array.isArray(data.articles)) {
        for (let i = 0; i < data.articles.length; i++) {
    const article = data.articles[i];
    // Create HTML elements for each article
    const articleTitle = document.createElement("h3");
    articleTitle.textContent = article.title;
    // Extract the date part from the timestamp
    const date = new Date(article.created_at);
    const formattedDate = date.toISOString().split('T')[0];
    // Create a new element for the formatted date
    const articleDate = document.createElement("p");
    articleDate.textContent = "Created on: " + formattedDate;
    const articleContent = document.createElement("p");
    articleContent.textContent = article.body;

    // Append the elements to academicArticles div
    academicArticlesDiv.appendChild(articleTitle);
    academicArticlesDiv.appendChild(articleDate); // Append the formatted date
    academicArticlesDiv.appendChild(articleContent);
    academicArticlesDiv.appendChild(document.createElement("br"));
    academicArticlesDiv.appendChild(document.createElement("br")); //adds 2 line spaces between each article
}      } else {
        console.error("No articles found in the response or invalid data structure.");
      }

    })
    .catch((error) =>
      console.error("Error fetching miscellaneous articles:", error)
    );
}
function populateAcademic() {
  // Clear the content of the misc articles container
  const miscArticlesDiv = document.getElementById("miscArticles");
  miscArticlesDiv.innerHTML = "";
  // Clear the content of the career articles container
  const careerArticlesDiv = document.getElementById("careerArticles");
  careerArticlesDiv.innerHTML = "";
  // Clear the content of the hobbies articles container
  const hobbiesArticlesDiv = document.getElementById("hobbiesArticles");
  hobbiesArticlesDiv.innerHTML = "";
  // Clear the content of the healthwell articles container
  const healthwellArticlesDiv = document.getElementById("healthwellArticles");
  healthwellArticlesDiv.innerHTML = "";
  // Clear the content of the student articles container
  const studentArticlesDiv = document.getElementById("studentArticles");
  studentArticlesDiv.innerHTML = "";

  // Make an AJAX request to fetch the academic articles from the server
  fetch("php/academicAJAX.php")
    .then((response) => response.json())
    .then((data) => {

      // Log the data to understand its structure
      console.log("Data received:", data);


      // Process the data and populate the academicArticles div
      const academicArticlesDiv = document.getElementById("academicArticles");
      academicArticlesDiv.innerHTML = ""; // Clear previous content

      if (data && data.articles && Array.isArray(data.articles)) {
        for (let i = 0; i < data.articles.length; i++) {
    const article = data.articles[i];
    // Create HTML elements for each article
    const articleTitle = document.createElement("h3");
    articleTitle.textContent = article.title;
    // Extract the date part from the timestamp
    const date = new Date(article.created_at);
    const formattedDate = date.toISOString().split('T')[0];
    // Create a new element for the formatted date
    const articleDate = document.createElement("p");
    articleDate.textContent = "Created on: " + formattedDate;
    const articleContent = document.createElement("p");
    articleContent.textContent = article.body;

    // Append the elements to academicArticles div
    academicArticlesDiv.appendChild(articleTitle);
    academicArticlesDiv.appendChild(articleDate); // Append the formatted date
    academicArticlesDiv.appendChild(articleContent);
    academicArticlesDiv.appendChild(document.createElement("br"));
    academicArticlesDiv.appendChild(document.createElement("br")); //adds 2 line spaces between each article
}      } else {
        console.error("No articles found in the response or invalid data structure.");
      }

    })
    .catch((error) =>
      console.error("Error fetching academic articles:", error)
    );
}
function populateCareer() {
  // Clear the content of the misc articles container
  const miscArticlesDiv = document.getElementById("miscArticles");
  miscArticlesDiv.innerHTML = "";
  // Clear the content of the academic articles container
  const academicArticlesDiv = document.getElementById("academicArticles");
  academicArticlesDiv.innerHTML = "";
  // Clear the content of the hobbies articles container
  const hobbiesArticlesDiv = document.getElementById("hobbiesArticles");
  hobbiesArticlesDiv.innerHTML = "";
  // Clear the content of the healthwell articles container
  const healthwellArticlesDiv = document.getElementById("healthwellArticles");
  healthwellArticlesDiv.innerHTML = "";
  // Clear the content of the student articles container
  const studentArticlesDiv = document.getElementById("studentArticles");
  studentArticlesDiv.innerHTML = "";

// Make an AJAX request to fetch the career articles from the server
  fetch("php/careerAJAX.php")
    .then((response) => response.json())
    .then((data) => {
      // Log the data to understand its structure
      console.log("Data received:", data);


      // Process the data and populate the careerArticles div
      const careerArticlesDiv = document.getElementById("careerArticles");
      careerArticlesDiv.innerHTML = ""; // Clear previous content

      if (data && data.articles && Array.isArray(data.articles)) {
        for (let i = 0; i < data.articles.length; i++) {
    const article = data.articles[i];
    // Create HTML elements for each article
    const articleTitle = document.createElement("h3");
    articleTitle.textContent = article.title;
    // Extract the date part from the timestamp
    const date = new Date(article.created_at);
    const formattedDate = date.toISOString().split('T')[0];
    // Create a new element for the formatted date
    const articleDate = document.createElement("p");
    articleDate.textContent = "Created on: " + formattedDate;
    const articleContent = document.createElement("p");
    articleContent.textContent = article.body;

    // Append the elements to academicArticles div
    academicArticlesDiv.appendChild(articleTitle);
    academicArticlesDiv.appendChild(articleDate); // Append the formatted date
    academicArticlesDiv.appendChild(articleContent);
    academicArticlesDiv.appendChild(document.createElement("br"));
    academicArticlesDiv.appendChild(document.createElement("br")); //adds 2 line spaces between each article
}      } else {
        console.error("No articles found in the response or invalid data structure.");
      }
    })
    .catch((error) =>
      console.error("Error fetching career articles:", error)
    );

}
function populateHealthwell() {
  // Clear the content of the misc articles container
  const miscArticlesDiv = document.getElementById("miscArticles");
  miscArticlesDiv.innerHTML = "";
  // Clear the content of the academic articles container
  const academicArticlesDiv = document.getElementById("academicArticles");
  academicArticlesDiv.innerHTML = "";
  // Clear the content of the career articles container
  const careerArticlesDiv = document.getElementById("careerArticles");
  careerArticlesDiv.innerHTML = "";
  // Clear the content of the hobbies articles container
  const hobbiesArticlesDiv = document.getElementById("hobbiesArticles");
  hobbiesArticlesDiv.innerHTML = "";
  // Clear the content of the student articles container
  const studentArticlesDiv = document.getElementById("studentArticles");
  studentArticlesDiv.innerHTML = "";

// Make an AJAX request to fetch the healthwell articles from the server
  fetch("php/healthwellAJAX.php")
    .then((response) => response.json())
    .then((data) => {
      // Log the data to understand its structure
      console.log("Data received:", data);

      // Process the data and populate the healthwellArticles div
      const healthwellArticlesDiv = document.getElementById("healthwellArticles");
      healthwellArticlesDiv.innerHTML = ""; // Clear previous content

      if (data && data.articles && Array.isArray(data.articles)) {
        for (let i = 0; i < data.articles.length; i++) {
    const article = data.articles[i];
    // Create HTML elements for each article
    const articleTitle = document.createElement("h3");
    articleTitle.textContent = article.title;
    // Extract the date part from the timestamp
    const date = new Date(article.created_at);
    const formattedDate = date.toISOString().split('T')[0];
    // Create a new element for the formatted date
    const articleDate = document.createElement("p");
    articleDate.textContent = "Created on: " + formattedDate;
    const articleContent = document.createElement("p");
    articleContent.textContent = article.body;

    // Append the elements to academicArticles div
    academicArticlesDiv.appendChild(articleTitle);
    academicArticlesDiv.appendChild(articleDate); // Append the formatted date
    academicArticlesDiv.appendChild(articleContent);
    academicArticlesDiv.appendChild(document.createElement("br"));
    academicArticlesDiv.appendChild(document.createElement("br")); //adds 2 line spaces between each article
}      } else {
        console.error("No articles found in the response or invalid data structure.");
      }

    })
    .catch((error) =>
      console.error("Error fetching healthwell articles:", error)
    );
}

function populateHobbies() {
  // Clear the content of the misc articles container
  const miscArticlesDiv = document.getElementById("miscArticles");
  miscArticlesDiv.innerHTML = "";
  // Clear the content of the academic articles container
  const academicArticlesDiv = document.getElementById("academicArticles");
  academicArticlesDiv.innerHTML = "";
  // Clear the content of the career articles container
  const careerArticlesDiv = document.getElementById("careerArticles");
  careerArticlesDiv.innerHTML = "";
  // Clear the content of the healthwell articles container
  const healthwellArticlesDiv = document.getElementById("healthwellArticles");
  healthwellArticlesDiv.innerHTML = "";
  // Clear the content of the student articles container
  const studentArticlesDiv = document.getElementById("studentArticles");
  studentArticlesDiv.innerHTML = "";


// Make an AJAX request to fetch the hobbies articles from the server
  fetch("php/hobbiesAJAX.php")
    .then((response) => response.json())
    .then((data) => {
      // Log the data to understand its structure
      console.log("Data received:", data);

      // Process the data and populate the hobbiesArticles div
      const hobbiesArticlesDiv = document.getElementById("hobbiesArticles");
      hobbiesArticlesDiv.innerHTML = ""; // Clear previous content


      if (data && data.articles && Array.isArray(data.articles)) {
        for (let i = 0; i < data.articles.length; i++) {
    const article = data.articles[i];
    // Create HTML elements for each article
    const articleTitle = document.createElement("h3");
    articleTitle.textContent = article.title;
    // Extract the date part from the timestamp
    const date = new Date(article.created_at);
    const formattedDate = date.toISOString().split('T')[0];
    // Create a new element for the formatted date
    const articleDate = document.createElement("p");
    articleDate.textContent = "Created on: " + formattedDate;
    const articleContent = document.createElement("p");
    articleContent.textContent = article.body;

    // Append the elements to academicArticles div
    academicArticlesDiv.appendChild(articleTitle);
    academicArticlesDiv.appendChild(articleDate); // Append the formatted date
    academicArticlesDiv.appendChild(articleContent);
    academicArticlesDiv.appendChild(document.createElement("br"));
    academicArticlesDiv.appendChild(document.createElement("br")); //adds 2 line spaces between each article
}      } else {
        console.error("No articles found in the response or invalid data structure.");
      }
    })
    .catch((error) =>
      console.error("Error fetching hobbies articles:", error)
    );
}
function populateStudent() {
  // Clear the content of the misc articles container
  const miscArticlesDiv = document.getElementById("miscArticles");
  miscArticlesDiv.innerHTML = "";
  // Clear the content of the academic articles container
  const academicArticlesDiv = document.getElementById("academicArticles");
  academicArticlesDiv.innerHTML = "";
  // Clear the content of the career articles container
  const careerArticlesDiv = document.getElementById("careerArticles");
  careerArticlesDiv.innerHTML = "";
  // Clear the content of the healthwell articles container
  const healthwellArticlesDiv = document.getElementById("healthwellArticles");
  healthwellArticlesDiv.innerHTML = "";
  // Clear the content of the hobbies articles container
  const hobbiesArticlesDiv = document.getElementById("hobbiesArticles");
  hobbiesArticlesDiv.innerHTML = "";


// Make an AJAX request to fetch the student articles from the server
  fetch("php/studentAJAX.php")
    .then((response) => response.json())
    .then((data) => {
      // Log the data to understand its structure
      console.log("Data received:", data);

      // Process the data and populate the studentArticles div
      const studentArticlesDiv = document.getElementById("studentArticles");
      studentArticlesDiv.innerHTML = ""; // Clear previous content

      if (data && data.articles && Array.isArray(data.articles)) {
        for (let i = 0; i < data.articles.length; i++) {
    const article = data.articles[i];
    // Create HTML elements for each article
    const articleTitle = document.createElement("h3");
    articleTitle.textContent = article.title;
    // Extract the date part from the timestamp
    const date = new Date(article.created_at);
    const formattedDate = date.toISOString().split('T')[0];
    // Create a new element for the formatted date
    const articleDate = document.createElement("p");
    articleDate.textContent = "Created on: " + formattedDate;
    const articleContent = document.createElement("p");
    articleContent.textContent = article.body;

    // Append the elements to academicArticles div
    academicArticlesDiv.appendChild(articleTitle);
    academicArticlesDiv.appendChild(articleDate); // Append the formatted date
    academicArticlesDiv.appendChild(articleContent);
    academicArticlesDiv.appendChild(document.createElement("br"));
    academicArticlesDiv.appendChild(document.createElement("br")); //adds 2 line spaces between each article
}      } else {
        console.error("No articles found in the response or invalid data structure.");
      }
    })
    .catch((error) =>
      console.error("Error fetching student articles:", error)
    );
}
