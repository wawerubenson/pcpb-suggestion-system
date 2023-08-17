<?php
//  include "config/db.php";
$current_page = "home";
include "header.php";

if (!isset($_SESSION['user-id'])) {
  header('Location: signin.php');
  die();
}



?>


<main>
  <div style="display:flex;flex-wrap:wrap;">
    <!-- <div style="flex:1;padding:10px;">
      <h2>Suggestions History</h2>
      <ul id="my-suggestions">
        
      </ul>
    </div> -->

    <div style="flex:1;padding:10px;">
      <h2>Submit a Suggestion/Complaint</h2>
      <form method="post" action="index-script.php">
        <label for="department-select">Category:</label>
        <select required id="department-select" name="department">
          <option value="Suggestion">Suggestion</option>
          <option value="Complaint">Complaint</option>
          <!-- <option value="Finance">Finance</option>
          <option value="Technical">Technical</option> -->
        </select>
        <label for="suggestion-textarea">Suggestion/Complaint:</label>
        <textarea placeholder="type here..." required id="suggestion-textarea" name="suggestion"></textarea>

        <br><br>

        <button name="submit_suggestion" type="submit" onclick="addSuggestion()">Submit</button>
      </form>
    </div>
  </div>

  <script>
    function addSuggestion() {
      // Get the department and suggestion from the form
      const department = document.getElementById("department-select").value;
      const suggestion = document.getElementById("suggestion-textarea").value;

      // Create a new list item with the suggestion text
      const newSuggestionItem = document.createElement("li");
      newSuggestionItem.innerText = suggestion;

      // Add the new list item to the "My Suggestions" list
      const mySuggestionsList = document.getElementById("my-suggestions");
      mySuggestionsList.appendChild(newSuggestionItem);

      // TODO: Save the suggestion to the server

      // Clear the form
      document.getElementById("department-select").selectedIndex = 0;
      document.getElementById("suggestion-textarea").value = "";
    }
  </script>

</main>


<?php include "footer.php" ?>