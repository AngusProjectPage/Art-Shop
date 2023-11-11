<?php
echo '
<form action="addPainting.php" class="mt-3 mb-5" method="post">
    <section class="mb-4">
        <h2>Add Painting</h2>
        <p>Required fields are followed by <span aria-label="required">*</span>.</p>
        <p class="form-group">
            <label for="paintingName">Painting Name: <span aria-label="required">*</span></label>
            <input name="paintingName" type="text" id="paintingName" class="form-control">
        </p>
        <p class="form-group">
            <label for="completionDate">Completion Date: <span aria-label="required">*</span></label>
            <input name="completionDate" type="text" id="completionDate" class="form-control">
        </p>
        <p class="form-group">
            <label for="width">Width: <span aria-label="required">*</span></label>
            <input name="width" type="text" id="width" class="form-control">
        </p>
        <p class="form-group">
            <label for="height">Height: <span aria-label="required">*</span></label>
            <input name="height" type="text" id="height" class="form-control">
        </p>
        <p class="form-group">
            <label for="price">Price: <span aria-label="required">*</span></label>
            <input name="price" type="text" id="price" class="form-control">
        </p>
        <p class="form-group">
            <label for="description">Description: <span aria-label="required">*</span></label>
            <input name="description" type="text" id="description" class="form-control">
        </p>
    </section>
    <section>
        <p>
            <button type="submit" name="submitPainting" class="btn btn-primary">Add Painting</button>
        </p>
    </section>
</form>
';

