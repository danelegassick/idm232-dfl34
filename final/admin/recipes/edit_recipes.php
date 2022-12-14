<?php

include_once __DIR__ . '/../../app.php';
$page_title = 'Edit Recipe';
include_once __DIR__ . '/../../_components/header.php';
?>

<?php
// get recipes data from database
$query = "SELECT * FROM recipes WHERE id = {$_GET['id']}";
$result = mysqli_query($db_connection, $query);
if ($result->num_rows > 0) {
    // Get row from results and assign to $recipe variable;
    $recipe = mysqli_fetch_assoc($result);
} else {
    $error_message = 'Recipe does not exist';
    // redirect_to('/admin/recipes?error=' . $error_message);
}

?>

<div class="container">
  <div>
    <div>
      <div>
        <h1>Edit Recipe</h1>
        <br>
      </div>
    </div>
    <div>
      <div>
        <div>
          <div>
            <form action="<?php echo site_url(); ?>/_includes/process-edit-recipes.php" method="POST">
              <div class="input-field">
              <input class="input-style" type="text" name="title"
                  value="<?php echo $recipe['title']?>" id="title">
                <label class="label-style-edit" for="title">Title</label>
              </div>
              <br>

              <div class="input-field">
              <input class="input-style" type="text" name="img_path"
                  value="<?php echo $recipe['img_path']?>" id="img_path">
                <label class="label-style-edit" for="img_path">Image Path</label>
              </div>
              <br>

              <div>
                <label for="overview"><h3>Overview</h3></label>
                <textarea name="overview" id="" cols="30" rows="10"><?php echo $recipe['overview']?></textarea>
              </div>
              <br>
              <div>
                <label for="ingredients"><h3>Ingredients</h3></label>
                <textarea name="ingredients" id="" cols="30" rows="10"><?php echo $recipe['ingredients']?></textarea>
              </div>
              <br>
              <div>
                <label for="instructions"><h3>Instructions</h3></label>
                <textarea name="instructions" id="" cols="30" rows="10"><?php echo $recipe['instructions']?></textarea>

              </div>
              <br>
              <input class="button" type="submit" value="Submit">

              <input type="hidden" name="id" value="<?php echo $recipe['id']?>">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<?php include_once __DIR__ . '/../../_components/footer.php';